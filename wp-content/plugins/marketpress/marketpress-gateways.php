<?php
/*
MarketPress Payment Gateway Plugin Base Class
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
if(!class_exists('MP_Gateway_API')) {

  class MP_Gateway_API {

    //private gateway slug. Lowercase alpha (a-z) and dashes (-) only please!
    var $plugin_name = '';
    
    //name of your gateway, for the admin side.
    var $admin_name = '';
    
    //public name of your gateway, for lists and such.
    var $public_name = '';
    
    //url for an image for your checkout method. Displayed on method form
    var $method_img_url = '';

    //url for an submit button image for your checkout method. Displayed on checkout form if set
    var $method_button_img_url = '';
    
    //always contains the url to send payment notifications to if needed by your gateway. Populated by the parent class
    var $ipn_url;
    
    /****** Below are the public methods you may overwrite via a plugin ******/

    /**
     * Runs when your class is instantiated. Use to setup your plugin instead of __construct()
     */
    function on_creation() {

		}

    /**
     * Echo fields you need to add to the payment screen, like your credit card info fields
     *
     * @param array $shipping_info. Contains shipping info and email in case you need it
     */
		function payment_form($cart, $shipping_info) {

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
      wp_die( __("You must override the process_payment_form() method in your {$this->admin_name} payment gateway plugin!", 'mp') );
    }
    
    /**
     * Echo the chosen payment details here for final confirmation. You probably don't need
     *  to post anything in the form as it should be in your $_SESSION var already.
     *
     * @param array $shipping_info. Contains shipping info and email in case you need it
     */
		function confirm_payment_form($cart, $shipping_info) {
      wp_die( __("You must override the confirm_payment_form() method in your {$this->admin_name} payment gateway plugin!", 'mp') );
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
      wp_die( __("You must override the process_payment() method in your {$this->admin_name} payment gateway plugin!", 'mp') );
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
      wp_die( __("You must override the order_confirmation_msg() method in your {$this->admin_name} payment gateway plugin!", 'mp') );
    }
		
		/**
     * Echo a settings meta box with whatever settings you need for you gateway.
     *  Form field names should be prefixed with mp[gateways][plugin_name], like "mp[gateways][plugin_name][mysetting]".
     *  You can access saved settings via $settings array.
     */
		function gateway_settings_box($settings) {

    }
    
    /**
     * Filters posted data from your settings form. Do anything you need to the $settings['gateways']['plugin_name']
     *  array. Don't forget to return!
     */
		function process_gateway_settings($settings) {

      return $settings;
    }
    
		/**
     * Use to handle any payment returns to the ipn_url. Do not display anything here. If you encounter errors
     *  return the proper headers. Exits after.
     */
		function process_ipn_return() {

    }
		
		/****** Do not override any of these private methods please! ******/
		
		//populates ipn_url var
		function _generate_ipn_url() {
      $settings = get_option('mp_settings');
      $this->ipn_url = home_url($settings['slugs']['store'] . '/payment-return/' . $this->plugin_name);
    }
		
		//creates the payment method selections
		function _payment_form_wrapper($cart, $shipping_info) {
      global $mp, $mp_gateway_active_plugins;
      
      if (count((array)$mp_gateway_active_plugins) > 1 && $_SESSION['mp_payment_method'] != $this->plugin_name)
        $hidden = ' style="display:none;"';
        
      echo '<div class="mp_gateway_form" id="' . $this->plugin_name . '"' . $hidden . '>';
      $this->payment_form($cart, $shipping_info);

      echo '<p class="mp_cart_direct_checkout">';
      //if an img exists use that for submit button
      if ($this->method_button_img_url)
        echo '<input type="image" name="mp_payment_submit" id="mp_payment_submit" src="' . $this->method_button_img_url . '" alt="' . __('Continue Checkout &raquo;', 'mp') . '" />';
      else
        echo '<input type="submit" name="mp_payment_submit" id="mp_payment_submit" value="' . __('Continue Checkout &raquo;', 'mp') . '" />';
      echo '</p></div>';
    }
    
    //DO NOT override the construct! instead use the on_creation() method.
  	function MP_Gateway_API() {
  		$this->__construct();
  	}

    function __construct() {
    
      $this->_generate_ipn_url();
      
      //run plugin construct
      $this->on_creation();
      
      //check required vars
      if (empty($this->plugin_name) || empty($this->admin_name) || empty($this->public_name))
        wp_die( __("You must override all required vars in your {$this->admin_name} payment gateway plugin!", 'mp') );

      add_action( 'mp_checkout_payment_form', array(&$this, '_payment_form_wrapper'), 10, 2 );
      add_action( 'mp_payment_submit_' . $this->plugin_name, array(&$this, 'process_payment_form'), 10, 2 );
      add_action( 'mp_checkout_confirm_payment_' . $this->plugin_name, array(&$this, 'confirm_payment_form'), 10, 2 );
      add_action( 'mp_payment_confirm_' . $this->plugin_name, array(&$this, 'process_payment'), 10, 2 );
      add_filter( 'mp_order_notification_' . $this->plugin_name, array(&$this, 'order_confirmation_email') );
      add_action( 'mp_checkout_payment_confirmation_' . $this->plugin_name, array(&$this, 'order_confirmation_msg') );
      add_action( 'mp_gateway_settings', array(&$this, 'gateway_settings_box') );
      add_filter( 'mp_gateway_settings_filter', array(&$this, 'process_gateway_settings') );
      add_action( 'mp_handle_payment_return_' . $this->plugin_name, array(&$this, 'process_ipn_return') );
  	}
  }
  
}

/**
 * Use this function to register your gateway plugin class
 *
 * @param string $plugin_name - the sanitized private name for your plugin
 * @param string $class_name - the case sensitive name of your plugin class
 * @param string $admin_name - name of your gateway, for the admin side.
 */
function mp_register_gateway_plugin($class_name, $plugin_name, $admin_name) {
  global $mp_gateway_plugins;
  
  if(!is_array($mp_gateway_plugins)) {
		$mp_gateway_plugins = array();
	}
	
	if(class_exists($class_name)) {
		$mp_gateway_plugins[$plugin_name] = array($class_name, $admin_name);
	} else {
		return false;
	}
}
?>