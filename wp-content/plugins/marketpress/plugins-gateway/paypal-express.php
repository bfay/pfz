<?php
/*
MarketPress PayPal Express Gateway Plugin
Version: 1.0
Plugin URI: http://premium.wpmudev.org/project/e-commerce
Description: Community eCommerce for WordPress, WPMU, and BuddyPress
Author: Aaron Edwards (Incsub)
Author URI: http://uglyrobot.com

Copyright 2009-2010 Incsub (http://incsub.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License (Version 2 - GPLv2) as published by
the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

class MP_Gateway_Paypal_Express extends MP_Gateway_API {

  //private gateway slug. Lowercase alpha (a-z) and dashes (-) only please!
  var $plugin_name = 'paypal-express';
  
  //name of your gateway, for the admin side.
  var $admin_name = '';
  
  //public name of your gateway, for lists and such.
  var $public_name = '';

  //url for an image for your checkout method. Displayed on checkout form if set
  var $method_img_url = '';
  
  //url for an submit button image for your checkout method. Displayed on checkout form if set
  var $method_button_img_url = '';

  //always contains the url to send payment notifications to if needed by your gateway. Populated by the parent class
  var $ipn_url;

  //paypal vars
  var $API_Username, $API_Password, $API_Signature, $SandboxFlag, $returnURL, $cancelURL, $API_Endpoint, $paypalURL, $version, $currencyCode, $locale;
    
  /****** Below are the public methods you may overwrite via a plugin ******/

  /**
   * Runs when your class is instantiated. Use to setup your plugin instead of __construct()
   */
  function on_creation() {
    global $mp;
    $settings = get_option('mp_settings');
    
    //set names here to be able to translate
    $this->admin_name = __('PayPal Express Checkout', 'mp');
    $this->public_name = __('PayPal', 'mp');
    
    //dynamic button img, see: https://cms.paypal.com/us/cgi-bin/?&cmd=_render-content&content_ID=developer/e_howto_api_ECButtonIntegration
    $this->method_img_url = 'https://fpdbs.paypal.com/dynamicimageweb?cmd=_dynamic-image&buttontype=ecmark&locale=' . get_locale();
    $this->method_button_img_url = 'https://fpdbs.paypal.com/dynamicimageweb?cmd=_dynamic-image&locale=' . get_locale();
    
    //set paypal vars
    $this->API_Username = $settings['gateways']['paypal-express']['api_user'];
  	$this->API_Password = $settings['gateways']['paypal-express']['api_pass'];
  	$this->API_Signature = $settings['gateways']['paypal-express']['api_sig'];
  	$this->currencyCode = $settings['gateways']['paypal-express']['currency'];
  	$this->locale = $settings['gateways']['paypal-express']['locale'];
    $this->returnURL = mp_checkout_step_url('confirm-checkout');
	  $this->cancelURL = mp_checkout_step_url('checkout') . "?cancel=1";
  	$this->version = "63.0"; //api version

    //set api urls
  	if ($settings['gateways']['paypal-express']['mode'] == 'sandbox')	{
  		$this->API_Endpoint = "https://api-3t.sandbox.paypal.com/nvp";
  		$this->paypalURL = "https://www.sandbox.paypal.com/webscr?cmd=_express-checkout&token=";
  	} else {
  		$this->API_Endpoint = "https://api-3t.paypal.com/nvp";
  		$this->paypalURL = "https://www.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=";
  	}
	}

  /**
   * Echo fields you need to add to the top of the payment screen, like your credit card info fields
   *
   * @param array $shipping_info. Contains shipping info and email in case you need it
   */
	function payment_form($cart, $shipping_info) {
    if (isset($_GET['cancel']))
      echo '<div class="mp_checkout_error">' . __('Your PayPal transaction has been canceled.', 'mp') . '</div>';
  }
  
  /**
   * Use this to process any fields you added. Use the $_POST global,
   *  and be sure to save it to both the $_SESSION and usermeta if logged in.
   *  DO NOT save credit card details to usermeta as it's not PCI compliant.
   *  Call $mp->cart_checkout_error($msg, $context); to handle errors. If no errors
   *  it will redirect to the next step.
   *
   * @param array $shipping_info. Contains shipping info and email in case you need it
   */
	function process_payment_form($cart, $shipping_info) {
    global $mp;
    
    //create order id for paypal invoice
    $order_id = $mp->generate_order_id();
    
    //set it up with PayPal
    $result = $this->SetExpressCheckout($cart, $shipping_info, $order_id);
    
    //check response
		if($result["ACK"] == "Success" || $result["ACK"] == "SuccessWithWarning")	{
			$token = urldecode($result["TOKEN"]);
      $this->RedirectToPayPal($token);
		} else { //whoops, error
      for ($i = 0; $i <= 5; $i++) { //print the first 5 errors
        if (isset($result["L_ERRORCODE$i"]))
          $error .= "<li>{$result["L_ERRORCODE$i"]} - {$result["L_SHORTMESSAGE$i"]} - {$result["L_LONGMESSAGE$i"]}</li>";
      }
      $error = '<br /><ul>' . $error . '</ul>';
      $mp->cart_checkout_error( __('There was a problem connecting to PayPal to setup your purchase. Please try again.', 'mp') . $error );
    }
  }
  
  /**
   * Echo the chosen payment details here for final confirmation. You probably don't need
   *  to post anything in the form as it should be in your $_SESSION var already.
   *
   * @param array $shipping_info. Contains shipping info and email in case you need it
   */
	function confirm_payment_form($cart, $shipping_info) {
	  global $mp;
	  
    if (isset($_GET['token']) && isset($_GET['PayerID'])) {
      $_SESSION['token'] = $_GET['token'];
      $_SESSION['PayerID'] = $_GET['PayerID'];
      
      //get details from PayPal
      $result = $this->GetExpressCheckoutDetails($_SESSION['token']);
      
      //check response
  		if($result["ACK"] == "Success" || $result["ACK"] == "SuccessWithWarning")	{

        $account_name = ($result["BUSINESS"]) ? $result["BUSINESS"] : $result["EMAIL"];
        
        //set final amount
        $_SESSION['final_amt'] = $result['PAYMENTREQUEST_0_AMT'];
        
        //print payment details
        echo '<p>' . sprintf(__('Please confirm your final payment for this order totaling %s. It will be made via your "%s" PayPal account.', 'mp'), $mp->format_currency('', $_SESSION['final_amt']), $account_name) . '</p>';

  		} else { //whoops, error
        for ($i = 0; $i <= 5; $i++) { //print the first 5 errors
          if (isset($result["L_ERRORCODE$i"]))
            $error .= "<li>{$result["L_ERRORCODE$i"]} - {$result["L_SHORTMESSAGE$i"]} - {$result["L_LONGMESSAGE$i"]}</li>";
        }
        $error = '<br /><ul>' . $error . '</ul>';
        echo '<div class="mp_checkout_error">' . sprintf(__('There was a problem with your PayPal transaction. Please <a href="%s">go back and try again</a>.', 'mp'), mp_checkout_step_url('checkout')) . $error . '</div>';
      }

    } else {
      echo '<div class="mp_checkout_error">' . sprintf(__('Whoops, looks like you skipped a step! Please <a href="%s">go back and try again</a>.', 'mp'), mp_checkout_step_url('checkout')) . '</div>';
    }

  }

  /**
   * Use this to do the final payment. Create the order then process the payment. If
   *  you know the payment is successful right away go ahead and change the order status
   *  as well.
   *  Call $mp->cart_checkout_error($msg, $context); to handle errors. If no errors
   *  it will redirect to the next step.
   *
   * @param array $shipping_info. Contains shipping info and email in case you need it
   */
	function process_payment($cart, $shipping_info) {
    global $mp;
    
    if (isset($_SESSION['token']) && isset($_SESSION['PayerID']) && isset($_SESSION['final_amt'])) {
      //attempt the final payment
      $result = $this->DoExpressCheckoutPayment($_SESSION['token'], $_SESSION['PayerID'], $_SESSION['final_amt']);
      
      //check response
  		if($result["ACK"] == "Success" || $result["ACK"] == "SuccessWithWarning")	{
  		
        //setup our payment details
  		  $payment_info['gateway_public_name'] = $this->public_name;
        $payment_info['gateway_private_name'] = $this->admin_name;
  		  $payment_info['method'] = ($result["PAYMENTINFO_0_PAYMENTTYPE"] == 'echeck') ? __('eCheck', 'mp') : __('PayPal balance, Credit Card, or Instant Transfer', 'mp');
  		  $payment_info['transaction_id'] = $result["PAYMENTINFO_0_TRANSACTIONID"];
  		  
  		  $timestamp = strtotime($result["PAYMENTINFO_0_ORDERTIME"]);
        //setup status
        switch ($result["PAYMENTINFO_0_PAYMENTSTATUS"]) {

          case 'Canceled-Reversal':
            $status = __('A reversal has been canceled; for example, when you win a dispute and the funds for the reversal have been returned to you.', 'mp');
            $paid = true;
  					break;
  					
          case 'Expired':
            $status = __('The authorization period for this payment has been reached.', 'mp');
            $paid = false;
  					break;
  					
          case 'Voided':
            $status = __('An authorization for this transaction has been voided.', 'mp');
            $paid = false;
  					break;
  					
          case 'Failed':
            $status = __('The payment has failed. This happens only if the payment was made from your customerís bank account.', 'mp');
            $paid = false;
  					break;

  				case 'Partially-Refunded':
            $status = __('The payment has been partially refunded.', 'mp');
            $paid = true;
  					break;

  				case 'In-Progress':
            $status = __('The transaction has not terminated, e.g. an authorization may be awaiting completion.', 'mp');
            $paid = false;
  					break;

  				case 'Completed':
            $status = __('The payment has been completed, and the funds have been added successfully to your account balance.', 'mp');
            $paid = true;
  					break;
  					
  				case 'Processed':
  					$status = __('A payment has been accepted.', 'mp');
            $paid = true;
  					break;

  				case 'Reversed':
  					$status = __('A payment was reversed due to a chargeback or other type of reversal. The funds have been removed from your account balance and returned to the buyer:', 'mp');
            $reverse_reasons = array(
              'none' => '',
              'chargeback' => __('A reversal has occurred on this transaction due to a chargeback by your customer.', 'mp'),
              'guarantee' => __('A reversal has occurred on this transaction due to your customer triggering a money-back guarantee.', 'mp'),
              'buyer-complaint' => __('A reversal has occurred on this transaction due to a complaint about the transaction from your customer.', 'mp'),
              'refund' => __('A reversal has occurred on this transaction because you have given the customer a refund.', 'mp'),
              'other' => __('A reversal has occurred on this transaction due to an unknown reason.', 'mp')
              );
            $status .= '<br />' . $reverse_reasons[$result["PAYMENTINFO_0_REASONCODE"]];
            $paid = false;
  					break;

  				case 'Refunded':
  					$status = __('You refunded the payment.', 'mp');
            $paid = false;
  					break;

  				case 'Denied':
  					$status = __('You denied the payment when it was marked as pending.', 'mp');
            $paid = false;
  					break;

  				case 'Pending':
  					$pending_str = array(
  						'address' => __('The payment is pending because your customer did not include a confirmed shipping address and your Payment Receiving Preferences is set such that you want to manually accept or deny each of these payments. To change your preference, go to the Preferences  section of your Profile.', 'mp'),
  						'authorization' => __('The payment is pending because it has been authorized but not settled. You must capture the funds first.', 'mp'),
  						'echeck' => __('The payment is pending because it was made by an eCheck that has not yet cleared.', 'mp'),
  						'intl' => __('The payment is pending because you hold a non-U.S. account and do not have a withdrawal mechanism. You must manually accept or deny this payment from your Account Overview.', 'mp'),
  						'multi-currency' => __('You do not have a balance in the currency sent, and you do not have your Payment Receiving Preferences set to automatically convert and accept this payment. You must manually accept or deny this payment.', 'mp'),
              'order' => __('The payment is pending because it is part of an order that has been authorized but not settled.', 'mp'),
              'paymentreview' => __('The payment is pending while it is being reviewed by PayPal for risk.', 'mp'),
              'unilateral' => __('The payment is pending because it was made to an email address that is not yet registered or confirmed.', 'mp'),
  						'upgrade' => __('The payment is pending because it was made via credit card and you must upgrade your account to Business or Premier status in order to receive the funds. It can also mean that you have reached the monthly limit for transactions on your account.', 'mp'),
  						'verify' => __('The payment is pending because you are not yet verified. You must verify your account before you can accept this payment.', 'mp'),
  						'other' => __('The payment is pending for an unknown reason. For more information, contact PayPal customer service.', 'mp'),
              '*' => ''
  						);
            $status = __('The payment is pending.', 'mp');
            $status .= '<br />' . $pending_str[$result["PAYMENTINFO_0_PENDINGREASON"]];
            $paid = false;
  					break;

  				default:
  					// case: various error cases

  					$paid = false;
  			}
  			$status = $result["PAYMENTINFO_0_PAYMENTSTATUS"] . ': '. $status;
  			
        //status's are stored as an array with unix timestamp as key
  		  $payment_info['status'][$timestamp] = $status;
  		  $payment_info['total'] = $result["PAYMENTINFO_0_AMT"];
  		  $payment_info['currency'] = $result["PAYMENTINFO_0_CURRENCYCODE"];
  		  $payment_info['note'] = $result["NOTE"]; //optional, only shown if gateway supports it

        //succesful payment, create our order now
        $result = $mp->create_order($_SESSION['mp_order'], $cart, $shipping_info, $payment_info, $paid);

        //success. Do nothing, it will take us to the confirmation page
  		} else { //whoops, error
        for ($i = 0; $i <= 5; $i++) { //print the first 5 errors
          if (isset($result["L_ERRORCODE$i"]))
            $error .= "<li>{$result["L_ERRORCODE$i"]} - {$result["L_SHORTMESSAGE$i"]} - {$result["L_LONGMESSAGE$i"]}</li>";
        }
        $error = '<br /><ul>' . $error . '</ul>';
        $mp->cart_checkout_error( sprintf(__('There was a problem finalizing your purchase with PayPal. Please <a href="%s">go back and try again</a>.', 'mp'), mp_checkout_step_url('checkout')) . $error );
      }
      
    } else {
      $mp->cart_checkout_error( sprintf(__('There was a problem finalizing your purchase with PayPal. Please <a href="%s">go back and try again</a>.', 'mp'), mp_checkout_step_url('checkout')) );
    }
  }
	
  /**
   * Filters the order confirmation email message body. You may want to append something to
   *  the message. Optional
   *
   * Don't forget to return!
   */
	function order_confirmation_email($msg) {
    return $msg;
  }
  
  /**
   * Echo any html you want to show on the confirmation screen after checkout. This
   *  should be a payment details box and message.
   */
	function order_confirmation_msg($order) {
    global $mp;
    if ($order->post_status == 'order_received') {
      echo '<p>' . sprintf(__('Your PayPal payment for this order totaling %s is not yet complete. Here is the latest status:', 'mp'), $mp->format_currency($order->mp_payment_info['currency'], $order->mp_payment_info['total'])) . '</p>';
      $statuses = $order->mp_payment_info['status'];
      krsort($statuses); //sort with latest status at the top
      $status = reset($statuses);
      $timestamp = key($statuses);
      echo '<p><strong>' . date(get_option('date_format') . ' - ' . get_option('time_format'), $timestamp) . ':</strong>' . htmlentities($status) . '</p>';
    } else {
      echo '<p>' . sprintf(__('Your PayPal payment for this order totaling %s is complete. The PayPal transaction number is <strong>%s</strong>.', 'mp'), $mp->format_currency($order->mp_payment_info['currency'], $order->mp_payment_info['total']), $order->mp_payment_info['transaction_id']) . '</p>';
    }
  }
	
	/**
   * Echo a settings meta box with whatever settings you need for you gateway.
   *  Form field names should be prefixed with mp[gateways][plugin_name], like "mp[gateways][plugin_name][mysetting]".
   *  You can access saved settings via $settings array.
   */
	function gateway_settings_box($settings) {
    global $mp;
    ?>
    <div id="mp_paypal_express" class="postbox">
      <script type="text/javascript">
    	  jQuery(document).ready(function ($) {
      		$('#mp-hdr-bdr').ColorPicker({
          	onSubmit: function(hsb, hex, rgb, el) {
          		$(el).val(hex);
          		$(el).ColorPickerHide();
          	},
          	onBeforeShow: function () {
          		$(this).ColorPickerSetColor(this.value);
          	},
            onChange: function (hsb, hex, rgb) {
          		$('#mp-hdr-bdr').val(hex);
          	}
          })
          .bind('keyup', function(){
          	$(this).ColorPickerSetColor(this.value);
          });
          $('#mp-hdr-bck').ColorPicker({
          	onSubmit: function(hsb, hex, rgb, el) {
          		$(el).val(hex);
          		$(el).ColorPickerHide();
          	},
          	onBeforeShow: function () {
          		$(this).ColorPickerSetColor(this.value);
          	},
            onChange: function (hsb, hex, rgb) {
          		$('#mp-hdr-bck').val(hex);
          	}
          })
          .bind('keyup', function(){
          	$(this).ColorPickerSetColor(this.value);
          });
          $('#mp-pg-bck').ColorPicker({
          	onSubmit: function(hsb, hex, rgb, el) {
          		$(el).val(hex);
          		$(el).ColorPickerHide();
          	},
          	onBeforeShow: function () {
          		$(this).ColorPickerSetColor(this.value);
          	},
            onChange: function (hsb, hex, rgb) {
          		$('#mp-pg-bck').val(hex);
          	}
          })
          .bind('keyup', function(){
          	$(this).ColorPickerSetColor(this.value);
          });
    		});
    	</script>
      <h3 class='hndle'><span><?php _e('PayPal Express Checkout Settings', 'mp'); ?></span></h3>
      <div class="inside">
        <span class="description"><?php _e('Express Checkout is PayPal\'s premier checkout solution, which streamlines the checkout process for buyers and keeps them on the your site after making a purchase. Unlike PayPal Pro, there are no additional fees to use Express Checkout, though you may need to do a free upgrade to a business account. <a target="_blank" href="https://cms.paypal.com/us/cgi-bin/?&cmd=_render-content&content_ID=developer/e_howto_api_ECGettingStarted">More Info &raquo;</a>', 'mp') ?></span>
        <table class="form-table">
          <tr>
  				<th scope="row"><?php _e('PayPal Site', 'mp') ?></th>
  				<td>
            <select name="mp[gateways][paypal-express][locale]">
            <?php
            $sel_locale = ($settings['gateways']['paypal-express']['locale']) ? $settings['gateways']['paypal-express']['locale'] : $settings['base_country'];
            $locales = array(
              'AU'	=> 'Australia',
              'AT'	=> 'Austria',
              'BE'	=> 'Belgium',
              'CA'	=> 'Canada',
              'CN'	=> 'China',
              'FR'	=> 'France',
              'DE'	=> 'Germany',
              'HK'	=> 'Hong Kong',
              'IT'	=> 'Italy',
              'MX'	=> 'Mexico',
              'NL'	=> 'Netherlands',
              'PL'	=> 'Poland',
              'SG'	=> 'Singapore',
              'ES'	=> 'Spain',
              'SE'	=> 'Sweden',
              'CH'	=> 'Switzerland',
              'GB'	=> 'United Kingdom',
              'US'	=> 'United States'
            );

            foreach ($locales as $k => $v) {
                echo '		<option value="' . $k . '"' . ($k == $sel_locale ? ' selected' : '') . '>' . wp_specialchars($v, true) . '</option>' . "\n";
            }
            ?>
            </select>
  				</td>
          </tr>
          <tr valign="top">
        <th scope="row"><?php _e('Paypal Currency', 'mp') ?></th>
        <td>
          <select name="mp[gateways][paypal-express][currency]">
          <?php
          $sel_currency = ($settings['gateways']['paypal-express']['currency']) ? $settings['gateways']['paypal-express']['currency'] : $settings['currency'];
          $currencies = array(
              'AUD' => 'AUD - Australian Dollar',
              'BRL' => 'BRL - Brazilian Real',
              'CAD' => 'CAD - Canadian Dollar',
              'CHF' => 'CHF - Swiss Franc',
              'CZK' => 'CZK - Czech Koruna',
              'DKK' => 'DKK - Danish Krone',
              'EUR' => 'EUR - Euro',
              'GBP' => 'GBP - Pound Sterling',
              'ILS' => 'ILS - Israeli Shekel',
              'HKD' => 'HKD - Hong Kong Dollar',
              'HUF' => 'HUF - Hungarian Forint',
              'JPY' => 'JPY - Japanese Yen',
              'MYR' => 'MYR - Malaysian Ringgits',
              'MXN' => 'MXN - Mexican Peso',
              'NOK' => 'NOK - Norwegian Krone',
              'NZD' => 'NZD - New Zealand Dollar',
              'PHP' => 'PHP - Philippine Pesos',
              'PLN' => 'PLN - Polish Zloty',
              'SEK' => 'SEK - Swedish Krona',
              'SGD' => 'SGD - Singapore Dollar',
              'TWD' => 'TWD - Taiwan New Dollars',
              'THB' => 'THB - Thai Baht',
              'USD' => 'USD - U.S. Dollar'
          );

          foreach ($currencies as $k => $v) {
              echo '		<option value="' . $k . '"' . ($k == $sel_currency ? ' selected' : '') . '>' . wp_specialchars($v, true) . '</option>' . "\n";
          }
          ?>
          </select>
        </td>
        </tr>
        <tr>
				<th scope="row"><?php _e('PayPal Mode', 'mp') ?></th>
				<td>
				<select name="mp[gateways][paypal-express][mode]">
          <option value="sandbox"<?php selected($settings['gateways']['paypal-express']['mode'], 'sandbox') ?>><?php _e('Sandbox', 'mp') ?></option>
          <option value="live"<?php selected($settings['gateways']['paypal-express']['mode'], 'live') ?>><?php _e('Live', 'mp') ?></option>
        </select>
				</td>
        </tr>
        <tr>
				<th scope="row"><?php _e('PayPal API Credentials', 'mp') ?></th>
				<td>
  				<span class="description"><?php _e('You must login to PayPal and create and API signature to get your credentials. <a target="_blank" href="https://cms.paypal.com/us/cgi-bin/?cmd=_render-content&content_ID=developer/e_howto_api_NVPAPIBasics#id084DN0AK0HS">Instructions &raquo;</a>', 'mp') ?></span>
          <p><label><?php _e('API Username', 'mp') ?><br />
          <input value="<?php echo esc_attr($settings['gateways']['paypal-express']['api_user']); ?>" size="30" name="mp[gateways][paypal-express][api_user]" type="text" />
          </label></p>
          <p><label><?php _e('API Password', 'mp') ?><br />
          <input value="<?php echo esc_attr($settings['gateways']['paypal-express']['api_pass']); ?>" size="20" name="mp[gateways][paypal-express][api_pass]" type="text" />
          </label></p>
          <p><label><?php _e('Signature', 'mp') ?><br />
          <input value="<?php echo esc_attr($settings['gateways']['paypal-express']['api_sig']); ?>" size="70" name="mp[gateways][paypal-express][api_sig]" type="text" />
          </label></p>
        </td>
        </tr>
        <tr>
				<th scope="row"><?php _e('PayPal Header Image (optional)', 'mp') ?></th>
				<td>
  				<span class="description"><?php _e('URL for an image you want to appear at the top left of the payment page. The image has a maximum size of 750 pixels wide by 90 pixels high. PayPal recommends that you provide an image that is stored on a secure (https) server. If you do not specify an image, the business name is displayed.', 'mp') ?></span>
          <p>
          <input value="<?php echo esc_attr($settings['gateways']['paypal-express']['header_img']); ?>" size="40" name="mp[gateways][paypal-express][header_img]" type="text" />
          </p>
        </td>
        </tr>
        <tr>
				<th scope="row"><?php _e('PayPal Header Border Color (optional)', 'mp') ?></th>
				<td>
  				<span class="description"><?php _e('Sets the border color around the header of the payment page. The border is a 2-pixel perimeter around the header space, which is 750 pixels wide by 90 pixels high. By default, the color is black.', 'mp') ?></span>
          <p>
          <input value="<?php echo esc_attr($settings['gateways']['paypal-express']['header_border']); ?>" size="6" maxlength="6" name="mp[gateways][paypal-express][header_border]" id="mp-hdr-bdr" type="text" />
          </p>
        </td>
        </tr>
        <tr>
				<th scope="row"><?php _e('PayPal Header Background Color (optional)', 'mp') ?></th>
				<td>
  				<span class="description"><?php _e('Sets the background color for the header of the payment page. By default, the color is white.', 'mp') ?></span>
          <p>
          <input value="<?php echo esc_attr($settings['gateways']['paypal-express']['header_back']); ?>" size="6" maxlength="6" name="mp[gateways][paypal-express][header_back]" id="mp-hdr-bck" type="text" />
          </p>
        </td>
        </tr>
        <tr>
				<th scope="row"><?php _e('PayPal Page Background Color (optional)', 'mp') ?></th>
				<td>
  				<span class="description"><?php _e('Sets the background color for the payment page. By default, the color is white.', 'mp') ?></span>
          <p>
          <input value="<?php echo esc_attr($settings['gateways']['paypal-express']['page_back']); ?>" size="6" maxlength="6" name="mp[gateways][paypal-express][page_back]" id="mp-pg-bck" type="text" />
          </p>
        </td>
        </tr>
        </table>
      </div>
    </div>
    <?php
  }
  
  /**
   * Filters posted data from your settings form. Do anything you need to the $settings['gateways']['plugin_name']
   *  array. Don't forget to return!
   */
	function process_gateway_settings($settings) {

    return $settings;
  }
  
	/**
   * Use to handle any payment returns from your gateway to the ipn_url. Do not echo anything here. If you encounter errors
   *  return the proper headers to your ipn sender. Exits after.
   */
	function process_ipn_return() {
    global $mp;
    
    // PayPal IPN handling code
    if (isset($_POST['payment_status']) || isset($_POST['txn_type'])) {
      $settings = get_option('mp_settings');
      
			if ($settings['gateways']['paypal-express']['mode'] == 'sandbox') {
				$domain = 'https://www.sandbox.paypal.com';
			} else {
				$domain = 'https://www.paypal.com';
			}

			$req = 'cmd=_notify-validate';
			if (!isset($_POST)) $_POST = $HTTP_POST_VARS;
			foreach ($_POST as $k => $v) {
				if (get_magic_quotes_gpc()) $v = stripslashes($v);
				$req .= '&' . $k . '=' . $v;
			}

			$header = 'POST /cgi-bin/webscr HTTP/1.0' . "\r\n"
					. 'Content-Type: application/x-www-form-urlencoded' . "\r\n"
					. 'Content-Length: ' . strlen($req) . "\r\n"
					. "\r\n";

			@set_time_limit(60);
			if ($conn = @fsockopen($domain, 80, $errno, $errstr, 30)) {
				fputs($conn, $header . $req);
				socket_set_timeout($conn, 30);

				$response = '';
				$close_connection = false;
				while (true) {
					if (feof($conn) || $close_connection) {
						fclose($conn);
						break;
					}

					$st = @fgets($conn, 4096);
					if ($st === false) {
						$close_connection = true;
						continue;
					}

					$response .= $st;
				}

				$error = '';
				$lines = explode("\n", str_replace("\r\n", "\n", $response));
				// looking for: HTTP/1.1 200 OK
				if (count($lines) == 0) $error = 'Response Error: Header not found';
				else if (substr($lines[0], -7) != ' 200 OK') $error = 'Response Error: Unexpected HTTP response';
				else {
					// remove HTTP header
					while (count($lines) > 0 && trim($lines[0]) != '') array_shift($lines);

					// first line will be empty, second line will have the result
					if (count($lines) < 2) $error = 'Response Error: No content found in transaction response';
					else if (strtoupper(trim($lines[1])) != 'VERIFIED') $error = 'Response Error: Unexpected transaction response';
				}

				if ($error != '') {
          header("HTTP/1.1 503 Service Unavailable");
					echo $error;
					exit;
				}
			} else {
        //error connecting
        header("HTTP/1.1 503 Service Unavailable");
        echo 'Could not make a connection with fsockopen while verifying with PayPal: ' . $errstr;
    		exit;
      }


			// process PayPal response
			switch ($_POST['payment_status']) {
			
			  case 'Canceled-Reversal':
          $status = __('A reversal has been canceled; for example, when you win a dispute and the funds for the reversal have been returned to you.', 'mp');
          $paid = true;
					break;

        case 'Expired':
          $status = __('The authorization period for this payment has been reached.', 'mp');
          $paid = false;
					break;

        case 'Voided':
          $status = __('An authorization for this transaction has been voided.', 'mp');
          $paid = false;
					break;

        case 'Failed':
          $status = __('The payment has failed. This happens only if the payment was made from your customerís bank account.', 'mp');
          $paid = false;
					break;
					
   			case 'Partially-Refunded':
          $status = __('The payment has been partially refunded.', 'mp');
          $paid = true;
					break;

				case 'In-Progress':
          $status = __('The transaction has not terminated, e.g. an authorization may be awaiting completion.', 'mp');
          $paid = false;
					break;

				case 'Completed':
          $status = __('The payment has been completed, and the funds have been added successfully to your account balance.', 'mp');
          $paid = true;
					break;

				case 'Processed':
					$status = __('A payment has been accepted.', 'mp');
          $paid = true;
					break;

				case 'Reversed':
					$status = __('A payment was reversed due to a chargeback or other type of reversal. The funds have been removed from your account balance and returned to the buyer:', 'mp');
          $reverse_reasons = array(
            'none' => '',
            'chargeback' => __('A reversal has occurred on this transaction due to a chargeback by your customer.', 'mp'),
            'guarantee' => __('A reversal has occurred on this transaction due to your customer triggering a money-back guarantee.', 'mp'),
            'buyer-complaint' => __('A reversal has occurred on this transaction due to a complaint about the transaction from your customer.', 'mp'),
            'refund' => __('A reversal has occurred on this transaction because you have given the customer a refund.', 'mp'),
            'other' => __('A reversal has occurred on this transaction due to an unknown reason.', 'mp')
            );
          $status .= '<br />' . $reverse_reasons[$result["PAYMENTINFO_0_REASONCODE"]];
          $paid = false;
					break;

				case 'Refunded':
					$status = __('You refunded the payment.', 'mp');
          $paid = false;
					break;

				case 'Denied':
					$status = __('You denied the payment when it was marked as pending.', 'mp');
          $paid = false;
					break;

				case 'Pending':
					$pending_str = array(
						'address' => __('The payment is pending because your customer did not include a confirmed shipping address and your Payment Receiving Preferences is set such that you want to manually accept or deny each of these payments. To change your preference, go to the Preferences  section of your Profile.', 'mp'),
						'authorization' => __('The payment is pending because it has been authorized but not settled. You must capture the funds first.', 'mp'),
						'echeck' => __('The payment is pending because it was made by an eCheck that has not yet cleared.', 'mp'),
						'intl' => __('The payment is pending because you hold a non-U.S. account and do not have a withdrawal mechanism. You must manually accept or deny this payment from your Account Overview.', 'mp'),
						'multi-currency' => __('You do not have a balance in the currency sent, and you do not have your Payment Receiving Preferences set to automatically convert and accept this payment. You must manually accept or deny this payment.', 'mp'),
            'order' => __('The payment is pending because it is part of an order that has been authorized but not settled.', 'mp'),
            'paymentreview' => __('The payment is pending while it is being reviewed by PayPal for risk.', 'mp'),
            'unilateral' => __('The payment is pending because it was made to an email address that is not yet registered or confirmed.', 'mp'),

						'upgrade' => __('The payment is pending because it was made via credit card and you must upgrade your account to Business or Premier status in order to receive the funds. It can also mean that you have reached the monthly limit for transactions on your account.', 'mp'),
						'verify' => __('The payment is pending because you are not yet verified. You must verify your account before you can accept this payment.', 'mp'),
						'other' => __('The payment is pending for an unknown reason. For more information, contact PayPal customer service.', 'mp'),
            '*' => ''
						);
          $status = __('The payment is pending.', 'mp');
          $status .= '<br />' . $pending_str[$result["PAYMENTINFO_0_PENDINGREASON"]];
          $paid = false;
					break;

				default:
					// case: various error cases
			}
      $status = $result["PAYMENTINFO_0_PAYMENTSTATUS"] . ': '. $status;
      
      //record transaction
      $mp->update_order_payment_status($_POST['invoice'], $status, $paid);

		} else {
			// Did not find expected POST variables. Possible access attempt from a non PayPal site.
			header('Status: 404 Not Found');
			echo 'Error: Missing POST variables. Identification is not possible.';
			exit;
		}
  }
  
  
  /**** PayPal API methods *****/
  

	//Purpose: 	Prepares the parameters for the SetExpressCheckout API Call.
	function SetExpressCheckout($cart, $shipping_info, $order_id)	{
    global $mp;
    $settings = get_option('mp_settings');
    
		$nvpstr = "&PAYMENTREQUEST_0_PAYMENTACTION=Sale";
		$nvpstr .= "&ReturnUrl=" . $this->returnURL;
		$nvpstr .= "&CANCELURL=" . $this->cancelURL;
		$nvpstr .= "&PAYMENTREQUEST_0_CURRENCYCODE=" . $this->currencyCode;
		$nvpstr .= "&ADDROVERRIDE=1";
		$nvpstr .= "&NOSHIPPING=2";
		$nvpstr .= "&LANDINGPAGE=Billing";
		$nvpstr .= "&PAYMENTREQUEST_0_NOTIFYURL=" . $this->ipn_url;  //this is supposed to be in DoExpressCheckoutPayment, but I put it here as well as docs are lacking
		$nvpstr .= "&LOCALECODE=" . $this->locale;
		$nvpstr .= "&EMAIL=" . urlencode($shipping_info['email']);
		$nvpstr .= "&PAYMENTREQUEST_0_SHIPTONAME=" . urlencode($shipping_info['name']);
		$nvpstr .= "&PAYMENTREQUEST_0_SHIPTOSTREET=" . urlencode($shipping_info['address1']);
		$nvpstr .= "&PAYMENTREQUEST_0_SHIPTOSTREET2=" . urlencode($shipping_info['address2']);
		$nvpstr .= "&PAYMENTREQUEST_0_SHIPTOCITY=" . urlencode($shipping_info['city']);
		$nvpstr .= "&PAYMENTREQUEST_0_SHIPTOSTATE=" . urlencode($shipping_info['state']);
		$nvpstr .= "&PAYMENTREQUEST_0_SHIPTOCOUNTRY=" . urlencode($shipping_info['country']);
		$nvpstr .= "&PAYMENTREQUEST_0_SHIPTOZIP=" . urlencode($shipping_info['zip']);
		$nvpstr .= "&PAYMENTREQUEST_0_SHIPTOPHONENUM=" . urlencode($shipping_info['phone']);
		
		//formatting
		$nvpstr .= "&HDRIMG=" . urlencode($settings['gateways']['paypal-express']['header_img']);
    $nvpstr .= "&HDRBORDERCOLOR=" . urlencode($settings['gateways']['paypal-express']['header_border']);
		$nvpstr .= "&HDRBACKCOLOR=" . urlencode($settings['gateways']['paypal-express']['header_back']);
    $nvpstr .= "&PAYFLOWCOLOR=" . urlencode($settings['gateways']['paypal-express']['page_back']);
    
	  //loop through cart items
		$i = 0;
    foreach ($cart as $product_id => $data) {
      $totals[] = $data['price'] * $data['quantity'];
  		$detailstr .= "&L_PAYMENTREQUEST_0_NAME$i=" . urlencode($data['name']);
  		$detailstr .= "&L_PAYMENTREQUEST_0_AMT$i=" . urlencode($data['price']);
  		$detailstr .= "&L_PAYMENTREQUEST_0_NUMBER$i=" . urlencode($data['SKU']);
  		$detailstr .= "&L_PAYMENTREQUEST_0_QTY$i=" . urlencode($data['quantity']);
  		$detailstr .= "&L_PAYMENTREQUEST_0_ITEMURL$i=" . urlencode(get_permalink($product_id));
  		$i++;
    }
		$total = array_sum($totals);

    //coupon line
    if ( $coupon = $mp->coupon_value($mp->get_coupon_code(), $total) )
      $total = $coupon['new_total'];
      
    $detailstr .= "&PAYMENTREQUEST_0_ITEMAMT=" . $total; //items subtotal

    //shipping line
    if ( ($shipping_price = $mp->shipping_price()) !== false ) {
      $total = $total + $shipping_price;
      $detailstr .= "&PAYMENTREQUEST_0_SHIPPINGAMT=" . $shipping_price; //shipping total
    }
    
    //tax line
    if ( ($tax_price = $mp->tax_price()) !== false ) {
      $total = $total + $tax_price;
      $detailstr .= "&PAYMENTREQUEST_0_TAXAMT=" . $tax_price; //taxes total
    }
    
    //only add cart details if no coupon, as that's unsupported (stupid PayPal)
    if (!$coupon)
      $nvpstr .= $detailstr;
    
		//order details
    $nvpstr .= "&PAYMENTREQUEST_0_DESC=" . urlencode(sprintf(__('%s Store Purchase', 'mp'), get_bloginfo('name'))); //cart name
    $nvpstr .= "&PAYMENTREQUEST_0_AMT=" . $total; //cart total
		$nvpstr .= "&PAYMENTREQUEST_0_INVNUM=" . $order_id;
		$nvpstr .= "&PAYMENTREQUEST_0_ALLOWEDPAYMENTMETHOD=InstantPaymentOnly";

		//'---------------------------------------------------------------------------------------------------------------
		//' Make the API call to PayPal
		//' If the API call succeded, then redirect the buyer to PayPal to begin to authorize payment.
		//' If an error occured, show the resulting errors
		//'---------------------------------------------------------------------------------------------------------------
	  $resArray = $this->api_call("SetExpressCheckout", $nvpstr);
		$ack = strtoupper($resArray["ACK"]);
		if($ack=="SUCCESS" || $ack=="SUCCESSWITHWARNING")	{
			$token = urldecode($resArray["TOKEN"]);
			$_SESSION['TOKEN'] = $token;
		}
	  return $resArray;
	}

	//Purpose: 	Prepares the parameters for the GetExpressCheckoutDetails API Call.
	function GetExpressCheckoutDetails( $token )	{
		//'--------------------------------------------------------------
		//' At this point, the buyer has completed authorizing the payment
		//' at PayPal.  The function will call PayPal to obtain the details
		//' of the authorization, incuding any shipping information of the
		//' buyer.  Remember, the authorization is not a completed transaction
		//' at this state - the buyer still needs an additional step to finalize
		//' the transaction
		//'--------------------------------------------------------------

	    //'---------------------------------------------------------------------------
		//' Build a second API request to PayPal, using the token as the
		//'  ID to get the details on the payment authorization
		//'---------------------------------------------------------------------------
	  $nvpstr = "&TOKEN=" . $token;

		//'---------------------------------------------------------------------------
		//' Make the API call and store the results in an array.
		//'	If the call was a success, show the authorization details, and provide
		//' 	an action to complete the payment.
		//'	If failed, show the error
		//'---------------------------------------------------------------------------
    $resArray = $this->api_call("GetExpressCheckoutDetails", $nvpstr);
    $ack = strtoupper($resArray["ACK"]);
		if($ack == "SUCCESS" || $ack=="SUCCESSWITHWARNING") {
			$_SESSION['payer_id'] =	$resArray['PAYERID'];
		}
		return $resArray;
	}

	//Purpose: 	Prepares the parameters for the DoExpressCheckoutPayment API Call.
	function DoExpressCheckoutPayment($token, $payer_id, $final_amt) {

		$nvpstr  = '&TOKEN=' . urlencode($token);
    $nvpstr .= '&PAYERID=' . urlencode($payer_id);
    $nvpstr .= '&PAYMENTACTION=Sale';
    $nvpstr .= '&AMT=' . $final_amt;
		$nvpstr .= '&CURRENCYCODE=' . $this->currencyCode;
		$nvpstr .= "&PAYMENTREQUEST_0_NOTIFYURL=" . $this->ipn_url;

		 /* Make the call to PayPal to finalize payment
		    */
		return $this->api_call("DoExpressCheckoutPayment", $nvpstr);
	}

	/**
	  '-------------------------------------------------------------------------------------------------------------------------------------------
	  * $this->api_call: Function to perform the API call to PayPal using API signature
	  * @methodName is name of API  method.
	  * @nvpStr is nvp string.
	  * returns an associtive array containing the response from the server.
	  '-------------------------------------------------------------------------------------------------------------------------------------------
	*/
	function api_call($methodName, $nvpStr) {
    global $mp;
    
    //NVPRequest for submitting to server
		$query_string = "METHOD=" . urlencode($methodName) . "&VERSION=" . urlencode($this->version) . "&PWD=" . urlencode($this->API_Password) . "&USER=" . urlencode($this->API_Username) . "&SIGNATURE=" . urlencode($this->API_Signature) . $nvpStr;

    //build args
  	$args['user-agent'] = "MarketPress/{$mp->version}: http://premium.wpmudev.org/project/e-commerce | PayPal Express Plugin/{$mp->version}";
    $args['body'] = $query_string;
    $args['sslverify'] = false;
    
    //use built in WP http class to work with most server setups
  	$response = wp_remote_post($this->API_Endpoint, $args);

  	if (is_wp_error($response) || wp_remote_retrieve_response_code($response) != 200) {
      $mp->cart_checkout_error( __('There was a problem connecting to PayPal. Please try again.', 'mp') );
      return false;
    } else {
      //convert NVPResponse to an Associative Array
		  $nvpResArray = $this->deformatNVP($response['body']);
		  return $nvpResArray;
    }


	}

	/*'----------------------------------------------------------------------------------
	 Purpose: Redirects to PayPal.com site.
	 Inputs:  NVP string.
	 Returns:
	----------------------------------------------------------------------------------
	*/
	function RedirectToPayPal($token) {
		// Redirect to paypal.com here
		$payPalURL = $this->paypalURL . $token;
    //header("Location: ".$payPalURL);
		wp_redirect($payPalURL);
    exit;
	}


	//This function will take NVPString and convert it to an Associative Array and it will decode the response.
	function deformatNVP($nvpstr) {
		parse_str($nvpstr, $nvpArray);
		return $nvpArray;
	}

}

//register shipping plugin
mp_register_gateway_plugin( 'MP_Gateway_Paypal_Express', 'paypal-express', __('PayPal Express Checkout', 'mp') );
?>