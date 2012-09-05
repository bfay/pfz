<?php
/*
MarketPress Template Functions
Version: 1.0
Plugin URI: http://premium.wpmudev.org/project/marketpress
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

/**
 * Display product tag cloud.
 *
 * The text size is set by the 'smallest' and 'largest' arguments, which will
 * use the 'unit' argument value for the CSS text size unit. The 'format'
 * argument can be 'flat' (default), 'list', or 'array'. The flat value for the
 * 'format' argument will separate tags with spaces. The list value for the
 * 'format' argument will format the tags in a UL HTML list. The array value for
 * the 'format' argument will return in PHP array type format.
 *
 * The 'orderby' argument will accept 'name' or 'count' and defaults to 'name'.
 * The 'order' is the direction to sort, defaults to 'ASC' and can be 'DESC'.
 *
 * The 'number' argument is how many tags to return. By default, the limit will
 * be to return the top 45 tags in the tag cloud list.
 *
 * The 'topic_count_text_callback' argument is a function, which, given the count
 * of the posts  with that tag, returns a text for the tooltip of the tag link.
 *
 * The 'exclude' and 'include' arguments are used for the {@link get_tags()}
 * function. Only one should be used, because only one will be used and the
 * other ignored, if they are both set.
 *
 * @param bool $echo Optional. Whether or not to echo.
 * @param array|string $args Optional. Override default arguments.
 */
function mp_tag_cloud($echo = true, $args = array()) {

  $args['echo'] = false;
  $args['taxonomy'] = 'product_tag';

  $cloud = '<div id="mp_tag_cloud">' . wp_tag_cloud( $args ) . '</div>';

  if ($echo)
    echo $cloud;
  else
    return $cloud;
}


/**
 * Display or retrieve the HTML list of product categories.
 *
 * The list of arguments is below:
 *     'show_option_all' (string) - Text to display for showing all categories.
 *     'orderby' (string) default is 'ID' - What column to use for ordering the
 * categories.
 *     'order' (string) default is 'ASC' - What direction to order categories.
 *     'show_last_update' (bool|int) default is 0 - See {@link
 * walk_category_dropdown_tree()}
 *     'show_count' (bool|int) default is 0 - Whether to show how many posts are
 * in the category.
 *     'hide_empty' (bool|int) default is 1 - Whether to hide categories that
 * don't have any posts attached to them.
 *     'use_desc_for_title' (bool|int) default is 1 - Whether to use the
 * description instead of the category title.
 *     'feed' - See {@link get_categories()}.
 *     'feed_type' - See {@link get_categories()}.
 *     'feed_image' - See {@link get_categories()}.
 *     'child_of' (int) default is 0 - See {@link get_categories()}.
 *     'exclude' (string) - See {@link get_categories()}.
 *     'exclude_tree' (string) - See {@link get_categories()}.
 *     'current_category' (int) - See {@link get_categories()}.
 *     'hierarchical' (bool) - See {@link get_categories()}.
 *     'title_li' (string) - See {@link get_categories()}.
 *     'depth' (int) - The max depth.
 *
 * @param bool $echo Optional. Whether or not to echo.
 * @param string|array $args Optional. Override default arguments.
 */
function mp_list_categories( $echo = true, $args = '' ) {
  $args['taxonomy'] = 'product_category';
  $args['echo'] = false;

  $list = '<ul id="mp_category_list">' . wp_list_categories( $args ) . '</ul>';


  if ($echo)
    echo $list;
  else
    return $list;
}


/**
 * Display or retrieve the HTML dropdown list of product categories.
 *
 * The list of arguments is below:
 *     'show_option_all' (string) - Text to display for showing all categories.
 *     'show_option_none' (string) - Text to display for showing no categories.
 *     'orderby' (string) default is 'ID' - What column to use for ordering the
 * categories.
 *     'order' (string) default is 'ASC' - What direction to order categories.
 *     'show_last_update' (bool|int) default is 0 - See {@link get_categories()}
 *     'show_count' (bool|int) default is 0 - Whether to show how many posts are
 * in the category.
 *     'hide_empty' (bool|int) default is 1 - Whether to hide categories that
 * don't have any posts attached to them.
 *     'child_of' (int) default is 0 - See {@link get_categories()}.
 *     'exclude' (string) - See {@link get_categories()}.
 *     'depth' (int) - The max depth.
 *     'tab_index' (int) - Tab index for select element.
 *     'name' (string) - The name attribute value for select element.
 *     'id' (string) - The ID attribute value for select element. Defaults to name if omitted.
 *     'class' (string) - The class attribute value for select element.
 *     'selected' (int) - Which category ID is selected.
 *     'taxonomy' (string) - The name of the taxonomy to retrieve. Defaults to category.
 *
 * The 'hierarchical' argument, which is disabled by default, will override the
 * depth argument, unless it is true. When the argument is false, it will
 * display all of the categories. When it is enabled it will use the value in
 * the 'depth' argument.
 *
 *
 * @param bool $echo Optional. Whether or not to echo.
 * @param string|array $args Optional. Override default arguments.
 */
function mp_dropdown_categories( $echo = true, $args = '' ) {
  $args['taxonomy'] = 'product_category';
  $args['echo'] = false;
  $args['id'] = 'mp_category_dropdown';

  $dropdown = wp_dropdown_categories( $args );

  if ($echo)
    echo $dropdown;
  else
    return $dropdown;
}


/**
 * Displays a list of popular products ordered by sales.
 *
 * @param bool $echo Optional, whether to echo or return
 * @param int $num Optional, max number of products to display. Defaults to 5
 */
function mp_popular_products( $echo = true, $num = 5 ) {
  //The Query
  $custom_query = new WP_Query('post_type=product&posts_per_page='.intval($num).'&meta_key=mp_sales_count&meta_compare=>&meta_value=0&orderby=meta_value&order=DESC');

  $content = '<ul id="mp_popular_products">';

  if (count($custom_query->posts)) {
    foreach ($custom_query->posts as $post) {
      $content .= '<li><a href="' . get_permalink( $post->ID ) . '">' . $post->post_title . '</a></li>';
    }
  } else {
    $content .= '<li>' . __('No Products', 'mp') . '</li>';
  }

  $content .= '</ul>';

  if ($echo)
    echo $content;
  else
    return $content;
}


//Prints cart table, for internal use
function _mp_cart_table($cart, $type = 'checkout') {
  global $mp;
  $settings = get_option('mp_settings');
  //get coupon code
  $coupon_code = $mp->get_coupon_code();

  if ($type == 'checkout-edit') {
    do_action('mp_cart_updated_msg');
    ?>
    <form id="mp_cart_form" method="post" action="">
    <table class="mp_cart_contents">
      <thead><tr>
        <th class="mp_cart_col_product" colspan="2"><?php _e('Item:', 'mp'); ?></th>
        <th class="mp_cart_col_price"><?php _e('Price:', 'mp'); ?></th>
        <th class="mp_cart_col_quant"><?php _e('Quantity:', 'mp'); ?></th>
      </tr></thead>
      <tbody>
      <?php
      $totals = array();
      foreach ($cart as $product_id => $data) {
        $totals[] = $data['price'] * $data['quantity'];
        echo '<tr>';
        echo '  <td class="mp_cart_col_thumb">' . mp_product_image( false, 'widget', $product_id ) . '</td>';
        echo '  <td class="mp_cart_col_product"><a href="' . get_permalink($product_id) . '">' . $data['name'] . '</a></td>';
        echo '  <td class="mp_cart_col_price">' . $mp->format_currency('', $data['price'] * $data['quantity']) . '</td>';
        echo '  <td class="mp_cart_col_quant"><input type="text" size="2" name="quant[' . $product_id . ']" value="' . $data['quantity'] . '" />&nbsp;<label><input type="checkbox" name="remove[]" value="' . $product_id . '" /> ' . __('Remove', 'mp') . '</label></td>';
        echo '</tr>';
      }
      $total = array_sum($totals);

      
      //coupon line
      if ( $coupon = $mp->coupon_value($coupon_code, $total) ) {
        echo '<tr>';
        echo '  <td class="mp_cart_subtotal_lbl" colspan="2">' . __('Subtotal:', 'mp') . '</td>';
        echo '  <td class="mp_cart_col_subtotal">' . $mp->format_currency('', $total) . '</td>';
        echo '  <td>&nbsp;</td>';
        echo '</tr>';
        echo '<tr>';
        echo '  <td class="mp_cart_subtotal_lbl" colspan="2">' . __('Discount:', 'mp') . '</td>';
        echo '  <td class="mp_cart_col_discount">' . $coupon['discount'] . '</td>';
        echo '  <td class="mp_cart_remove_coupon"><a href="?remove_coupon=1">' . __('Remove Coupon &raquo;', 'mp') . '</a></td>';
        echo '</tr>';
        $total = $coupon['new_total'];
      } else {
        echo '<tr>';
        echo '  <td class="mp_cart_subtotal_lbl" colspan="4">
            <a id="coupon-link" class="alignright" href="#coupon-code">' . __('Have a coupon code?', 'mp') . '</a>
            <div id="coupon-code" class="alignright" style="display: none;">
              <label for="coupon_code">' . __('Enter your code:', 'mp') . '</label>
              <input type="text" name="coupon_code" id="coupon_code" />
              <input type="submit" name="update_cart_submit" value="' . __('Apply &raquo;', 'mp') . '" />
            </div>
        </td>';
        echo '</tr>';
      }

      //shipping line
      if ( ($shipping_price = $mp->shipping_price()) !== false ) {
        if (has_filter( 'mp_shipping_method_lbl' ))
          $shipping_method = ' (' . apply_filters( 'mp_shipping_method_lbl', '' ) . ')';
        echo '<tr>';
        echo '  <td class="mp_cart_subtotal_lbl" colspan="2">' . __('Shipping:', 'mp') . '</td>';
        echo '  <td class="mp_cart_col_shipping">' . $mp->format_currency('', $shipping_price) . '</td>';
        echo '  <td>' . $shipping_method . '</td>';
        echo '</tr>';
        $total = $total + $shipping_price;
      }
      
      //tax line
      if ( ($tax_price = $mp->tax_price()) !== false ) {
        echo '<tr>';
        echo '  <td class="mp_cart_subtotal_lbl" colspan="2">' . __('Taxes:', 'mp') . '</td>';
        echo '  <td class="mp_cart_col_tax">' . $mp->format_currency('', $tax_price) . '</td>';
        echo '  <td>&nbsp;</td>';
        echo '</tr>';
        $total = $total + $tax_price;
      }
      
      echo '<tfoot><tr>';
      echo '  <td class="mp_cart_subtotal_lbl" colspan="2">' . __('Cart Total:', 'mp') . '</td>';
      echo '  <td class="mp_cart_col_total">' . $mp->format_currency('', $total) . '</td>';
      echo '  <td class="mp_cart_col_updatecart"><input type="submit" name="update_cart_submit" value="' . __('Update Cart &raquo;', 'mp') . '" /></td>';
      echo '</tr></tfoot>';
      ?>
      </tbody>
    </table>
    </form>
    <?php
  } else if ($type == 'checkout') {
    ?>
    <table class="mp_cart_contents">
      <thead><tr>
        <th class="mp_cart_col_product" colspan="2"><?php _e('Item:', 'mp'); ?></th>
        <th class="mp_cart_col_quant"><?php _e('Qty:', 'mp'); ?></th>
        <th class="mp_cart_col_price"><?php _e('Price:', 'mp'); ?></th>
      </tr></thead>
      <tbody>
      <?php
      $totals = array();
      foreach ($cart as $product_id => $data) {
        $totals[] = $data['price'] * $data['quantity'];
        echo '<tr>';
        echo '  <td class="mp_cart_col_thumb">' . mp_product_image( false, 'widget', $product_id, 25 ) . '</td>';
        echo '  <td class="mp_cart_col_product"><a href="' . get_permalink($product_id) . '">' . $data['name'] . '</a></td>';
        echo '  <td class="mp_cart_col_quant">' . number_format_i18n($data['quantity']) . '</td>';
        echo '  <td class="mp_cart_col_price">' . $mp->format_currency('', $data['price'] * $data['quantity']) . '</td>';
        echo '</tr>';
      }
      $total = array_sum($totals);

      //coupon line
      if ( $coupon = $mp->coupon_value($coupon_code, $total) ) {
        echo '<tr>';
        echo '  <td class="mp_cart_subtotal_lbl" colspan="3">' . __('Subtotal:', 'mp') . '</td>';
        echo '  <td class="mp_cart_col_subtotal">' . $mp->format_currency('', $total) . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '  <td class="mp_cart_subtotal_lbl" colspan="3">' . __('Discount:', 'mp') . '</td>';
        echo '  <td class="mp_cart_col_discount">' . $coupon['discount'] . '</td>';
        echo '</tr>';
        $total = $coupon['new_total'];
      }

      //shipping line
      if ( ($shipping_price = $mp->shipping_price()) !== false ) {
        if (has_filter( 'mp_shipping_method_lbl' ))
          $shipping_method = ' (' . apply_filters( 'mp_shipping_method_lbl', '' ) . ')';
        echo '<tr>';
        echo '  <td class="mp_cart_subtotal_lbl" colspan="3">' . __('Shipping:', 'mp') . $shipping_method . '</td>';
        echo '  <td class="mp_cart_col_shipping">' . $mp->format_currency('', $shipping_price) . '</td>';
        echo '</tr>';
        $total = $total + $shipping_price;
      }

      //tax line
      if ( ($tax_price = $mp->tax_price()) !== false ) {
        echo '<tr>';
        echo '  <td class="mp_cart_subtotal_lbl" colspan="3">' . __('Taxes:', 'mp') . '</td>';
        echo '  <td class="mp_cart_col_tax">' . $mp->format_currency('', $tax_price) . '</td>';
        echo '</tr>';
        $total = $total + $tax_price;
      }
      
      echo '<tr>';
      echo '  <td class="mp_cart_subtotal_lbl" colspan="3">' . __('Cart Total:', 'mp') . '</td>';
      echo '  <td class="mp_cart_col_total">' . $mp->format_currency('', $total) . '</td>';
      echo '</tr>';
      ?>
      </tbody>
    </table>
    <?php
  } else if ($type == 'widget') {
    ?>
    <table class="mp_cart_contents_widget">
      <thead><tr>
        <th class="mp_cart_col_product" colspan="2"><?php _e('Item:', 'mp'); ?></th>
        <th class="mp_cart_col_quant"><?php _e('Qty:', 'mp'); ?></th>
        <th class="mp_cart_col_price"><?php _e('Price:', 'mp'); ?></th>
      </tr></thead>
      <tbody>
      <?php
      $totals = array();
      foreach ($cart as $product_id => $data) {
        $totals[] = $data['price'] * $data['quantity'];
        echo '<tr>';
        echo '  <td class="mp_cart_col_thumb">' . mp_product_image( false, 'widget', $product_id, 25 ) . '</td>';
        echo '  <td class="mp_cart_col_product"><a href="' . get_permalink($product_id) . '">' . $data['name'] . '</a></td>';
        echo '  <td class="mp_cart_col_quant">' . number_format_i18n($data['quantity']) . '</td>';
        echo '  <td class="mp_cart_col_price">' . $mp->format_currency('', $data['price'] * $data['quantity']) . '</td>';
        echo '</tr>';
      }
      $total = array_sum($totals);

      echo '<tr>';
      echo '  <td class="mp_cart_subtotal_lbl" colspan="3">' . __('Subtotal:', 'mp') . '</td>';
      echo '  <td class="mp_cart_col_total">' . $mp->format_currency('', $total) . '</td>';
      echo '</tr>';
      ?>
      </tbody>
    </table>
    <?php
  }
}

//Prints cart login/register form, for internal use
function _mp_cart_login() {
  global $mp;

  //don't show if logged in
  if (is_user_logged_in()) {
    ?>
    <p class="mp_cart_direct_checkout">
      <a class="mp_cart_direct_checkout_link" href="<?php echo mp_checkout_step_url('shipping'); ?>"><?php _e('Checkout Now &raquo;', 'mp'); ?></a>
    </p>
    <?php
  } else {
    ?>
    <table class="mp_cart_login">
      <thead><tr>
        <th class="mp_cart_login"><?php _e('Have a User Account?', 'mp'); ?></th>
        <th>&nbsp;</th>
        <th><?php _e('Checkout Directly', 'mp'); ?></th>
      </tr></thead>
      <tbody>
      <tr>
        <td class="mp_cart_login">
          <form name="loginform" id="loginform" action="<?php echo wp_login_url(); ?>" method="post">
        		<label><?php _e('Username', 'mp'); ?><br />
        		<input type="text" name="log" id="user_login" class="input" value="" size="20" /></label>
            <br />
        		<label><?php _e('Password', 'mp'); ?><br />
        		<input type="password" name="pwd" id="user_pass" class="input" value="" size="20" /></label>
            <br />
        		<input type="submit" name="wp-submit" id="mp_login_submit" value="<?php _e('Login and Checkout &raquo;', 'mp'); ?>" />
        		<input type="hidden" name="redirect_to" value="<?php echo mp_checkout_step_url('shipping'); ?>" />
          </form>
        </td>
        <td class="mp_cart_or_label"><?php _e('or', 'mp'); ?></td>
        <td class="mp_cart_checkout">
          <a class="mp_cart_direct_checkout_link" href="<?php echo mp_checkout_step_url('shipping'); ?>"><?php _e('Checkout Now &raquo;', 'mp'); ?></a>
        </td>
      </tr>
      </tbody>
    </table>
    <?php
  }
}

//Prints cart shipping form, for internal use
function _mp_cart_shipping($editable = false) {
  global $mp, $current_user;
  $settings = get_option('mp_settings');
  
  $meta = get_user_meta($current_user->ID, 'mp_shipping_info');
  $meta = $meta[0]; //offset

  //get address
  $email = (!empty($_SESSION['mp_shipping_info']['email'])) ? $_SESSION['mp_shipping_info']['email'] : $current_user->user_email;
  $name = (!empty($_SESSION['mp_shipping_info']['name'])) ? $_SESSION['mp_shipping_info']['name'] : $current_user->user_firstname . ' ' . $current_user->user_lastname;
  $address1 = (!empty($_SESSION['mp_shipping_info']['address1'])) ? $_SESSION['mp_shipping_info']['address1'] : $meta['address1'];
  $address2 = (!empty($_SESSION['mp_shipping_info']['address2'])) ? $_SESSION['mp_shipping_info']['address2'] : $meta['address2'];
  $city = (!empty($_SESSION['mp_shipping_info']['city'])) ? $_SESSION['mp_shipping_info']['city'] : $meta['city'];
  $state = (!empty($_SESSION['mp_shipping_info']['state'])) ? $_SESSION['mp_shipping_info']['state'] : $meta['state'];
  $zip = (!empty($_SESSION['mp_shipping_info']['zip'])) ? $_SESSION['mp_shipping_info']['zip'] : $meta['zip'];
  $country = (!empty($_SESSION['mp_shipping_info']['country'])) ? $_SESSION['mp_shipping_info']['country'] : $meta['country'];
  if (!$country)
    $country = $settings['base_country'];
  $phone = (!empty($_SESSION['mp_shipping_info']['phone'])) ? $_SESSION['mp_shipping_info']['phone'] : $meta['phone'];

  //don't show if logged in
  if (!is_user_logged_in() && $editable) {
    ?>
    <p class="mp_cart_login_msg">
      <?php _e('Made a purchase here before?', 'mp'); ?> <a class="mp_cart_login_link" href="<?php echo wp_login_url(mp_checkout_step_url('checkout')); ?>"><?php _e('Login now to retrieve your saved info &raquo;', 'mp'); ?></a>
    </p>
    <?php
  }

  if ($editable) {
    ?>
    <form id="mp_shipping_form" method="post" action="">

    <?php do_action( 'mp_checkout_before_shipping' ); ?>

    <table class="mp_cart_shipping">
      <thead><tr>
        <th colspan="2"><?php _e('Enter Your Shipping Information:', 'mp'); ?></th>
      </tr></thead>
      <tbody>
      <tr>
    	<td align="right"><?php _e('Email:', 'mp'); ?>*</td><td>
      <?php do_action( 'mp_checkout_error_email' ); ?>
      <input size="35" name="email" type="text" value="<?php echo esc_attr($email); ?>" /></td>
    	</tr>

    	<tr>
    	<td align="right"><?php _e('Full Name:', 'mp'); ?>*</td><td>
      <?php do_action( 'mp_checkout_error_name' ); ?>
      <input size="35" name="name" type="text" value="<?php echo esc_attr($name); ?>" /> </td>
    	</tr>

    	<tr>
    	<td align="right"><?php _e('Address:', 'mp'); ?>*</td><td>
      <?php do_action( 'mp_checkout_error_address1' ); ?>
      <input size="45" name="address1" type="text" value="<?php echo esc_attr($address1); ?>" /><br />
      <small><em><?php _e('Street address, P.O. box, company name, c/o', 'mp'); ?></em></small>
      </td>
    	</tr>

    	<tr>
    	<td align="right"><?php _e('Address 2:', 'mp'); ?>&nbsp;</td><td>
      <input size="45" name="address2" type="text" value="<?php echo esc_attr($address2); ?>" /><br />
      <small><em><?php _e('Apartment, suite, unit, building, floor, etc.', 'mp'); ?></em></small>
      </td>
    	</tr>

    	<tr>
    	<td align="right"><?php _e('City:', 'mp'); ?>*</td><td>
      <?php do_action( 'mp_checkout_error_city' ); ?>
      <input size="25" name="city" type="text" value="<?php echo esc_attr($city); ?>" /></td>
    	</tr>

    	<tr>
    	<td align="right"><?php _e('State/Province/Region:', 'mp'); ?>*</td><td>
      <?php do_action( 'mp_checkout_error_state' ); ?>
      <input size="15" name="state" type="text" value="<?php echo esc_attr($state); ?>" /></td>
    	</tr>

    	<tr>
    	<td align="right"><?php _e('Postal/Zip Code:', 'mp'); ?>*</td><td>
      <?php do_action( 'mp_checkout_error_zip' ); ?>
      <input size="10" id="mp_zip" name="zip" type="text" value="<?php echo esc_attr($zip); ?>" /></td>
    	</tr>

    	<tr>
    	<td align="right"><?php _e('Country:', 'mp'); ?>*</td><td>
    	<?php do_action( 'mp_checkout_error_country' ); ?>
      <select id="mp_" name="country">
        <?php
        foreach ((array)$settings['shipping']['allowed_countries'] as $code) {
          ?><option value="<?php echo $code; ?>"<?php selected($country, $code); ?>><?php echo esc_attr($mp->countries[$code]); ?></option><?php
        }
        ?>
      </select>
      </td>
    	</tr>

    	<tr>
    	<td align="right"><?php _e('Phone Number:', 'mp'); ?></td><td>
      <input size="20" name="phone" type="text" value="<?php echo esc_attr($phone); ?>" /></td>
    	</tr>

      <?php do_action( 'mp_checkout_shipping_field' ); ?>

      </tbody>
    </table>

    <?php do_action( 'mp_checkout_after_shipping' ); ?>

      <p class="mp_cart_direct_checkout">
        <input type="submit" name="mp_shipping_submit" id="mp_shipping_submit" value="<?php _e('Continue Checkout &raquo;', 'mp'); ?>" />
      </p>
    </form>
    <?php
  } else {
    ?>
    <table class="mp_cart_shipping">
      <thead><tr>
        <th><?php _e('Shipping Information:', 'mp'); ?></th>
        <th align="right"><a href="<?php echo mp_checkout_step_url('shipping'); ?>"><?php _e('&laquo; Edit', 'mp'); ?></a></th>
      </tr></thead>
      <tbody>
      <tr>
    	<td align="right"><?php _e('Email:', 'mp'); ?></td><td>
      <?php echo esc_attr($email); ?></td>
    	</tr>

    	<tr>
    	<td align="right"><?php _e('Full Name:', 'mp'); ?></td><td>
      <?php echo esc_attr($name); ?></td>
    	</tr>

    	<tr>
    	<td align="right"><?php _e('Address:', 'mp'); ?></td>
      <td><?php echo esc_attr($address1); ?></td>
    	</tr>

      <?php if ($address2) { ?>
    	<tr>
    	<td align="right"><?php _e('Address 2:', 'mp'); ?></td>
      <td><?php echo esc_attr($address2); ?></td>
    	</tr>
      <?php } ?>

    	<tr>
    	<td align="right"><?php _e('City:', 'mp'); ?></td>
      <td><?php echo esc_attr($city); ?></td>
    	</tr>

    	<?php if ($state) { ?>
    	<tr>
    	<td align="right"><?php _e('State/Province/Region:', 'mp'); ?></td>
      <td><?php echo esc_attr($state); ?></td>
    	</tr>
      <?php } ?>

    	<tr>
    	<td align="right"><?php _e('Postal/Zip Code:', 'mp'); ?></td>
      <td><?php echo esc_attr($zip); ?></td>
    	</tr>

    	<tr>
    	<td align="right"><?php _e('Country:', 'mp'); ?></td>
      <td><?php echo $mp->countries[$country]; ?></td>
    	</tr>

      <?php if ($phone) { ?>
    	<tr>
    	<td align="right"><?php _e('Phone Number:', 'mp'); ?></td>
      <td><?php echo esc_attr($phone); ?></td>
    	</tr>
      <?php } ?>

      </tbody>
    </table>
    <?php
  }

}

//Prints cart payment gateway form, for internal use
function _mp_cart_payment($type) {
  global $mp, $mp_gateway_active_plugins;
  $cart = $mp->get_cart_contents();
  
  if ($type == 'form') {
    ?>
    <form id="mp_payment_form" method="post" action="<?php echo mp_checkout_step_url('checkout'); ?>">

    <?php if (count((array)$mp_gateway_active_plugins) == 1) { ?>
      <input type="hidden" name="mp_choose_gateway" value="<?php echo $mp_gateway_active_plugins[0]->plugin_name; ?>" />
    <?php } else if (count((array)$mp_gateway_active_plugins) > 1) { ?>
      <table class="mp_cart_payment_methods">
      <thead><tr>
        <th><?php _e('Choose a Payment Method:', 'mp'); ?></th>
      </tr></thead>
      <tbody><tr><td>
      <?php
      foreach ((array)$mp_gateway_active_plugins as $plugin) {
        ?>
        <label>
        <input type="radio" class="mp_choose_gateway" name="mp_choose_gateway" value="<?php echo $plugin->plugin_name; ?>"<?php checked($_SESSION['mp_payment_method'], $plugin->plugin_name); ?> />
        <?php
        if ($plugin->method_img_url) {
          echo '<img src="' . $plugin->method_img_url . '" alt="' . $plugin->public_name . '" />';
        } else {
          echo $plugin->public_name;
        }
        ?></label>
        <?php
      }
      ?>
      </td>
      </tr>
      </tbody>
      </table>
    <?php } ?>

      <?php do_action( 'mp_checkout_payment_form', $cart, $_SESSION['mp_shipping_info'] ); ?>

    </form>
    <?php
  } else if ($type == 'confirm') {
    ?>
    <form id="mp_payment_form" method="post" action="<?php echo mp_checkout_step_url('confirm-checkout'); ?>">

      <?php do_action( 'mp_checkout_confirm_payment_' . $_SESSION['mp_payment_method'], $cart, $_SESSION['mp_shipping_info'] ); ?>

      <p class="mp_cart_direct_checkout">
        <input type="submit" name="mp_payment_confirm" id="mp_payment_confirm" value="<?php _e('Confirm Payment &raquo;', 'mp'); ?>" />
      </p>
    </form>
    <?php
  } else if ($type == 'confirmation') {
  
    //if coming to the page outside of normal process show cart
    if (!$mp->get_order($_SESSION['mp_order'])) {
      mp_show_cart('checkout');
      return;
    }

    //gateway plugin message hook
    do_action( 'mp_checkout_payment_confirmation_' . $_SESSION['mp_payment_method'], $mp->get_order($_SESSION['mp_order']) );

    //tracking information
    $track_link = '<a href="' . mp_orderstatus_link(false, true) . $_SESSION['mp_order'] . '/' . '">' . mp_orderstatus_link(false, true) . $_SESSION['mp_order'] . '/' . '</a>';
    echo '<p>' . sprintf(__('You may track the latest status of your order here:<br />%s', 'mp'), $track_link) . '</p>';

    //clear cart session vars
    unset($_SESSION['mp_payment_method']);
    unset($_SESSION['mp_order']);
  }
}

/**
 * Echos the current shopping cart contents. Use in the cart template.
 *
 * @param bool $context Optional. Possible values: widget, checkout
 */
function mp_show_cart($context = '', $checkoutstep = null) {
  global $mp;
	$settings = get_option('mp_settings');

  $cart = $mp->get_cart_contents();

  if ((is_array($cart) && count($cart)) || $checkoutstep == 'confirmation') {

    if ($context == 'widget') {
      _mp_cart_table($cart, 'widget');
      ?>
      <div class="mp_cart_actions_widget">
    		<a class="mp_empty_cart" href="<?php mp_cart_link(true, true); ?>?empty-cart=1" title="<?php _e('Empty your shopping cart', 'mp') ?>"><?php _e('Empty Cart', 'mp') ?></a>
    		<a class="mp_checkout_link" href="<?php mp_cart_link(true, true); ?>" title="<?php _e('Go To Checkout Page', 'mp') ?>"><?php _e('Checkout &raquo;', 'mp') ?></a>
    	</div>
      <?php
    } else if ($context == 'checkout') {
      //generic error message context for plugins to hook into
      do_action( 'mp_checkout_error_checkout' );
      
      //handle checkout steps
      switch($checkoutstep) {

        case 'shipping':
          echo $settings['msg']['shipping'];
          _mp_cart_shipping(true);
          break;

        case 'checkout':
          echo $settings['msg']['checkout'];
          _mp_cart_payment('form');
          break;

        case 'confirm-checkout':
          echo $settings['msg']['confirm_checkout'];
          _mp_cart_table($cart, 'checkout');
          _mp_cart_shipping(false);
          _mp_cart_payment('confirm');
          break;

        case 'confirmation':
          echo $settings['msg']['success'];
          _mp_cart_payment('confirmation');
          break;

        default:
          echo $settings['msg']['cart'];
          _mp_cart_table($cart, 'checkout-edit');
          _mp_cart_login();
          break;
      }

    } else {
      _mp_cart_table($cart, 'checkout');
      ?>
      <div class="mp_cart_actions">
    		<a class="mp_empty_cart" href="<?php mp_cart_link(true, true); ?>?empty-cart=1" title="<?php _e('Empty your shopping cart', 'mp') ?>"><?php _e('Empty Cart', 'mp') ?></a>

        <a class="mp_checkout_link" href="<?php mp_cart_link(true, true); ?>" title="<?php _e('Go To Checkout Page', 'mp') ?>"><?php _e('Checkout &raquo;', 'mp') ?></a>
    	</div>
      <?php
    }

  } else {
    ?>
		<div class="mp_cart_empty">
			<?php _e('There are no items in your cart.', 'mp') ?>
		</div>
		<div id="mp_cart_actions_widget">
			<a class="mp_store_link" href="<?php mp_store_link(true, true); ?>"><?php _e('Browse Products &raquo;', 'mp') ?></a>
		</div>
    <?php
  }
}


/**
 * Echos the order status page. Use in the mp_orderstatus.php template.
 *
 */
function mp_order_status() {
  global $mp, $wp_query;
	$settings = get_option('mp_settings');
  echo $settings['msg']['order_status'];
  
  $order_id = ($wp_query->query_vars['order_id']) ? $wp_query->query_vars['order_id'] : $_GET['order_id'];
  
  if (!empty($order_id)) {
    //get order
    $order = $mp->get_order($order_id);
    
    if ($order) { //valid order
      echo '<h2><em>' . sprintf( __('Order Details (%s):', 'mp'), htmlentities($order_id)) . '</em></h2>';
      ?>
      <h3><?php _e('Current Status', 'mp'); ?></h3>
      <ul>
      <?php
      //get times
      $received = mysql2date(get_option('date_format') . ' - ' . get_option('time_format'), $order->post_date);
      if ($order->mp_paid_time)
        $paid = date(get_option('date_format') . ' - ' . get_option('time_format'), $order->mp_paid_time);
      if ($order->mp_shipped_time)
        $shipped = date(get_option('date_format') . ' - ' . get_option('time_format'), $order->mp_shipped_time);
        
      if ($order->post_status == 'order_received') {
        echo '<li>' . __('Received:', 'mp') . ' <strong>' . $received . '</strong></li>';
      } else if ($order->post_status == 'order_paid') {
        echo '<li>' . __('Paid:', 'mp') . ' <strong>' . $paid . '</strong></li>';
        echo '<li>' . __('Received:', 'mp') . ' <strong>' . $received . '</strong></li>';
      } else if ($order->post_status == 'order_shipped' || $order->post_status == 'order_closed') {
        echo '<li>' . __('Shipped:', 'mp') . ' <strong>' . $shipped . '</strong></li>';
        echo '<li>' . __('Paid:', 'mp') . ' <strong>' . $paid . '</strong></li>';
        echo '<li>' . __('Received:', 'mp') . ' <strong>' . $received . '</strong></li>';
      }
      ?>
      </ul>
      
      <h3><?php _e('Payment Information:', 'mp'); ?></h3>
      <ul>
        <li>
          <?php _e('Payment Method:', 'mp'); ?>
          <strong><?php echo $order->mp_payment_info['gateway_public_name']; ?></strong>
        </li>
        <li>
          <?php _e('Payment Type:', 'mp'); ?>
          <strong><?php echo $order->mp_payment_info['method']; ?></strong>
        </li>
        <li>
          <?php _e('Transaction ID:', 'mp'); ?>
          <strong><?php echo $order->mp_payment_info['transaction_id']; ?></strong>
        </li>
        <li>
          <?php _e('Payment Total:', 'mp'); ?>
          <strong><?php echo $mp->format_currency($order->mp_payment_info['currency'], $order->mp_payment_info['total']) . ' ' . $order->mp_payment_info['currency']; ?></strong>
        </li>
      </ul>


      <h3><?php _e('Order Information:', 'mp'); ?></h3>
      <table id="mp-order-product-table" class="mp_cart_contents">
        <thead><tr>
          <th class="mp_cart_col_thumb">&nbsp;</th>
          <th class="mp_cart_col_product"><?php _e('Item', 'mp'); ?></th>
          <th class="mp_cart_col_quant"><?php _e('Quantity', 'mp'); ?></th>
          <th class="mp_cart_col_price"><?php _e('Price', 'mp'); ?></th>
          <th class="mp_cart_col_subtotal"><?php _e('Subtotal', 'mp'); ?></th>
        </tr></thead>
        <tbody>
        <?php
        if (is_array($order->mp_cart_info) && count($order->mp_cart_info)) {
          foreach ($order->mp_cart_info as $product_id => $data) {
            echo '<tr>';
            echo '  <td class="mp_cart_col_thumb">' . mp_product_image( false, 'widget', $product_id ) . '</td>';
            echo '  <td class="mp_cart_col_product"><a href="' . get_permalink($product_id) . '">' . esc_attr($data['name']) . '</a></td>';
            echo '  <td class="mp_cart_col_quant">' . number_format_i18n($data['quantity']) . '</td>';
            echo '  <td class="mp_cart_col_price">' . $mp->format_currency('', $data['price']) . '</td>';
            echo '  <td class="mp_cart_col_subtotal">' . $mp->format_currency('', $data['price'] * $data['quantity']) . '</td>';
            echo '</tr>';
          }
        } else {
          echo '<tr><td colspan="6">' . __('No products could be found for this order', 'mp') . '</td></tr>';
        }
        ?>
        </tbody>
      </table>
      <ul>
        <?php //coupon line
        if ( $order->mp_discount_info ) { ?>
        <li><?php _e('Coupon Discount:', 'mp'); ?> <strong><?php echo $order->mp_discount_info['discount']; ?></strong></li>
        <?php } ?>

        <?php //shipping line
        if ( $order->mp_shipping_total ) { ?>
        <li><?php _e('Shipping:', 'mp'); ?> <strong><?php echo $mp->format_currency('', $order->mp_shipping_total); ?></strong></li>
        <?php } ?>

        <?php //tax line
        if ( $order->mp_tax_total ) { ?>
        <li><?php _e('Taxes:', 'mp'); ?> <strong><?php echo $mp->format_currency('', $order->mp_tax_total); ?></strong></li>
        <?php } ?>

        <li><?php _e('Order Total:', 'mp'); ?> <strong><?php echo $mp->format_currency('', $order->mp_order_total); ?></strong></li>
      </ul>

      <h3><?php _e('Shipping Information:', 'mp'); ?></h3>
      <table>
        <tr>
      	<td align="right"><?php _e('Full Name:', 'mp'); ?></td><td>
        <?php echo esc_attr($order->mp_shipping_info['name']); ?></td>
      	</tr>

      	<tr>
      	<td align="right"><?php _e('Address:', 'mp'); ?></td>
        <td><?php echo esc_attr($order->mp_shipping_info['address1']); ?></td>
      	</tr>

        <?php if ($order->mp_shipping_info['address2']) { ?>
      	<tr>
      	<td align="right"><?php _e('Address 2:', 'mp'); ?></td>
        <td><?php echo esc_attr($order->mp_shipping_info['address2']); ?></td>
      	</tr>
        <?php } ?>

      	<tr>
      	<td align="right"><?php _e('City:', 'mp'); ?></td>
        <td><?php echo esc_attr($order->mp_shipping_info['city']); ?></td>
      	</tr>

      	<?php if ($order->mp_shipping_info['state']) { ?>
      	<tr>
      	<td align="right"><?php _e('State/Province/Region:', 'mp'); ?></td>
        <td><?php echo esc_attr($order->mp_shipping_info['state']); ?></td>
      	</tr>
        <?php } ?>

      	<tr>
      	<td align="right"><?php _e('Postal/Zip Code:', 'mp'); ?></td>
        <td><?php echo esc_attr($order->mp_shipping_info['zip']); ?></td>
      	</tr>

      	<tr>
      	<td align="right"><?php _e('Country:', 'mp'); ?></td>
        <td><?php echo $mp->countries[$order->mp_shipping_info['country']]; ?></td>
      	</tr>

        <?php if ($order->mp_shipping_info['phone']) { ?>
      	<tr>
      	<td align="right"><?php _e('Phone Number:', 'mp'); ?></td>
        <td><?php echo esc_attr($order->mp_shipping_info['phone']); ?></td>
      	</tr>
        <?php } ?>
      </table>
      <?php mp_orderstatus_link(true, false, __('&laquo; Back', 'mp')); ?>
      <?php

    } else { //not valid order id
      echo '<h3>' . __('Invalid Order ID. Please try again:', 'mp') . '</h3>';
      ?>
      <form action="<?php mp_orderstatus_link(true, true); ?>" method="get">
    		<label><?php _e('Enter your 12-digit Order ID number:', 'mp'); ?><br />
    		<input type="text" name="order_id" id="order_id" class="input" value="" size="20" /></label>
    		<input type="submit" id="order-id-submit" value="<?php _e('Look Up &raquo;', 'mp'); ?>" />
      </form>
      <?php
    }

  } else {

    //get from usermeta
    $user_id = get_current_user_id();
    if ($user_id) {
      if (is_multisite()) {
        global $blog_id;
        $meta_id = 'mp_order_history_' . $blog_id;
      } else {
        $meta_id = 'mp_order_history';
      }
      $orders = get_user_meta($user_id, $meta_id, true);
    } else {
      //get from cookie
      if (is_multisite()) {
        global $blog_id;
        $cookie_id = 'mp_order_history_' . $blog_id . '_' . COOKIEHASH;
      } else {
        $cookie_id = 'mp_order_history_' . COOKIEHASH;
      }

      if (isset($_COOKIE[$cookie_id]))
        $orders = unserialize($_COOKIE[$cookie_id]);
    }

    if (is_array($orders) && count($orders)) {
      krsort($orders);
      //list orders
      echo '<h3>' . __('Your Recent Orders:', 'mp') . '</h3>';
      echo '<ul id="mp-order-list">';
      foreach ($orders as $timestamp => $order)
        echo '  <li><strong>' . date(get_option('date_format') . ' - ' . get_option('time_format'), $timestamp) . ':</strong> <a href="./' . trailingslashit($order['id']) . '">' . $order['id'] . '</a> - ' . $mp->format_currency('', $order['total']) . '</li>';
      echo '</ul>';
      
      ?>
      <form action="<?php mp_orderstatus_link(true, true); ?>" method="get">
    		<label><?php _e('Or enter your 12-digit Order ID number:', 'mp'); ?><br />
    		<input type="text" name="order_id" id="order_id" class="input" value="" size="20" /></label>
    		<input type="submit" id="order-id-submit" value="<?php _e('Look Up &raquo;', 'mp'); ?>" />
      </form>
      <?php
      
    } else {

      if (!is_user_logged_in()) {
        ?>
        <table class="mp_cart_login">
          <thead><tr>
            <th class="mp_cart_login" colspan="2"><?php _e('Have a User Account? Login To View Your Order History:', 'mp'); ?></th>
            <th>&nbsp;</th>
          </tr></thead>
          <tbody>
          <tr>

            <td class="mp_cart_login">
              <form name="loginform" id="loginform" action="<?php echo wp_login_url(); ?>" method="post">
            		<label><?php _e('Username', 'mp'); ?><br />
            		<input type="text" name="log" id="user_login" class="input" value="" size="20" /></label>
                <br />
            		<label><?php _e('Password', 'mp'); ?><br />
            		<input type="password" name="pwd" id="user_pass" class="input" value="" size="20" /></label>
                <br />
            		<input type="submit" name="wp-submit" id="mp_login_submit" value="<?php _e('Login &raquo;', 'mp'); ?>" />
            		<input type="hidden" name="redirect_to" value="<?php mp_orderstatus_link(true, true); ?>" />
              </form>
            </td>
            <td class="mp_cart_or_label"><?php _e('or', 'mp'); ?></td>
            <td class="mp_cart_checkout">
              <form action="<?php mp_orderstatus_link(true, true); ?>" method="get">
            		<label><?php _e('Enter your 12-digit Order ID number:', 'mp'); ?><br />
            		<input type="text" name="order_id" id="order_id" class="input" value="" size="20" /></label>
            		<input type="submit" id="order-id-submit" value="<?php _e('Look Up &raquo;', 'mp'); ?>" />
              </form>
            </td>
          </tr>
          </tbody>
        </table>
        <?php
      } else {
        ?>
        <form action="<?php mp_orderstatus_link(true, true); ?>" method="get">
      		<label><?php _e('Enter your 12-digit Order ID number:', 'mp'); ?><br />
      		<input type="text" name="order_id" id="order_id" class="input" value="" size="20" /></label>
      		<input type="submit" id="order-id-submit" value="<?php _e('Look Up &raquo;', 'mp'); ?>" />
        </form>
        <?php
      }
      
    }
  }
}


/*
 * Displays a list of products according to preference. Optional values default to the values in Presentation Settings -> Product List
 *
 * @param bool $echo Optional, whether to echo or return
 * @param bool $paginate Optional, whether to paginate
 * @param int $page Optional, The page number to display in the product list if $paginate is set to true.
 * @param int $per_page Optional, How many products to display in the product list if $paginate is set to true.
 * @param string $order_by Optional, What field to order products by. Can be: title, date, ID, author, price, sales, rand
 * @param string $order Optional, Direction to order products by. Can be: DESC, ASC
 */
function mp_list_products( $echo = true, $paginate = '', $page = '', $per_page = '', $order_by = '', $order = '' ) {
  global $wp_query, $mp;
  $settings = get_option('mp_settings');

  //setup pagination
  $paged = false;
  if ($paginate == true) {
    $paged = true;
  } else if ($paginate === '') {
    if ($settings['paginate'])
      $paged = true;
    else
      $paginate_query = '&nopaging=true';
  } else {
    $paginate_query = '&nopaging=true';
  }

  //get page details
  if ($paged) {
    //figure out perpage
    if (intval($per_page))
      $paginate_query = '&posts_per_page='.intval($per_page);
    else
      $paginate_query = '&posts_per_page='.$settings['per_page'];

    //figure out page
    if ($wp_query->query_vars['paged'])
      $paginate_query .= '&paged='.intval($wp_query->query_vars['paged']);

    if (intval($page))
      $paginate_query .= '&paged='.intval($page);
    else if ($wp_query->query_vars['paged'])
      $paginate_query .= '&paged='.intval($wp_query->query_vars['paged']);
  }

  //get order by
  if (!$order_by) {
    if ($settings['order_by'] == 'price')
      $order_by_query = '&meta_key=mp_price&orderby=mp_price';
    else if ($settings['order_by'] == 'sales')
      $order_by_query = '&meta_key=mp_sales_count&orderby=mp_sales_count';
    else
      $order_by_query = '&orderby='.$settings['order_by'];
  } else {
    $order_by_query = '&orderby='.$order_by;
  }

  //get order direction
  if (!$order) {
    $order_query = '&order='.$settings['order'];
  } else {
    $order_query = '&orderby='.$order;
  }

  //The Query
  $custom_query = new WP_Query('post_type=product' . $paginate_query . $order_by_query . $order_query);

  $content = '<div id="mp_product_list">';

  if (count($custom_query->posts)) {
    foreach ($custom_query->posts as $post) {

      $content .= '<div '.mp_product_class(false, 'mp_product', $post->ID).'>';
      $content .= '<h3 class="mp_product_name"><a href="' . get_permalink( $post->ID ) . '">' . $post->post_title . '</a></h3>';
      $content .= '<div class="mp_product_content">';
      $content .= mp_product_image( false, 'list', $post->ID );
      $content .= $mp->product_excerpt($post->post_excerpt, $post->post_content, $post->ID);
      $content .= '</div>';

      $content .= '<div class="mp_product_meta">';
      //price
      $content .= mp_product_price(false, $post->ID);
      //button
      $content .= mp_buy_button(false, 'list', $post->ID);
      $content .= '</div>';
      $content .= '</div>';
    }
  } else {
    $content .= __('No Products', 'mp');
  }

  $content .= '</div>';

  if ($echo)
    echo $content;
  else
    return $content;
}


/**
 * Display the classes for the product div.
 *
 * @param bool $echo Whether to echo class.
 * @param string|array $class One or more classes to add to the class list.
 * @param int $post_id The post_id for the product. Optional if in the loop
 */
function mp_product_class( $echo = true, $class = '', $post_id = null ) {
	// Separates classes with a single space, collates classes for post DIV
	$content = 'class="' . join( ' ', mp_get_product_class( $class, $post_id ) ) . '"';

	if ($echo)
    echo $content;
  else
    return $content;
}


/**
 * Retrieve the list of classes for the product as an array.
 *
 * The class names are add are many. If the post is a sticky, then the 'sticky'
 * class name. The class 'hentry' is always added to each post. For each
 * category, the class will be added with 'category-' with category slug is
 * added. The tags are the same way as the categories with 'tag-' before the tag
 * slug. All classes are passed through the filter, 'post_class' with the list
 * of classes, followed by $class parameter value, with the post ID as the last
 * parameter.
 *
 *
 * @param string|array $class One or more classes to add to the class list.
 * @param int $post_id The post_id for the product. Optional if in the loop
 * @return array Array of classes.
 */
function mp_get_product_class( $class = '', $post_id = null ) {
  global $id;
  $post_id = ( NULL === $post_id ) ? $id : $post_id;

	$post = get_post($post_id);

	$classes = array();

	if ( empty($post) )
		return $classes;

	$classes[] = 'product-' . $post->ID;
	$classes[] = $post->post_type;
	$classes[] = 'type-' . $post->post_type;

	// sticky for Sticky Posts
	if ( is_sticky($post->ID))

		$classes[] = 'sticky';

	// hentry for hAtom compliace
	$classes[] = 'hentry';

	// Categories
	$categories = get_the_terms($post->ID, "product_category");
	foreach ( (array) $categories as $cat ) {
		if ( empty($cat->slug ) )
			continue;
		$classes[] = 'category-' . sanitize_html_class($cat->slug, $cat->cat_ID);
	}

	// Tags
	$tags = get_the_terms($post->ID, "product_tag");
	foreach ( (array) $tags as $tag ) {
		if ( empty($tag->slug ) )
			continue;
		$classes[] = 'tag-' . sanitize_html_class($tag->slug, $tag->term_id);
	}

	if ( !empty($class) ) {
		if ( !is_array( $class ) )
			$class = preg_split('#\s+#', $class);
		$classes = array_merge($classes, $class);
	}

	$classes = array_map('esc_attr', $classes);

	return $classes;
}


/*
 * Displays the product price (and sale price)
 *
 * @param bool $echo Optional, whether to echo
 * @param int $post_id The post_id for the product. Optional if in the loop
 * @param sting $label A label to prepend to the price. Defaults to "Price: "
 */
function mp_product_price( $echo = true, $post_id = NULL, $label = '' ) {
  global $id, $mp;
  $post_id = ( NULL === $post_id ) ? $id : $post_id;

  $label = ($label) ? $label : __('Price: ', 'mp');

  $settings = get_option('mp_settings');
	$meta = get_post_custom($post_id);

	if ($meta["mp_sale_price"][0]) {
    $price = '<del class="mp_old_price">'.$mp->format_currency('', $meta["mp_price"][0]).'</del>';
    $price .= $mp->format_currency('', $meta["mp_sale_price"][0]);
  } else {
    $price = $mp->format_currency('', $meta["mp_price"][0]);
  }

  $price = '<span class="mp_product_price">' . $label . $price . '</span>';

  if ($echo)
    echo $price;
  else
    return $price;
}


/*
 * Displays the buy or add to cart button
 *
 * @param bool $echo Optional, whether to echo
 * @param string $context Options are list or single
 * @param int $post_id The post_id for the product. Optional if in the loop
 */
function mp_buy_button( $echo = true, $context = 'list', $post_id = NULL ) {
  global $id;
  $post_id = ( NULL === $post_id ) ? $id : $post_id;

  $settings = get_option('mp_settings');

  //display an external link or form button
  if ($product_link = get_post_meta($post_id, 'mp_product_link', true)) {

    if ($context == 'list') {
      if ($settings['list_button_type'] == 'addcart') {
        $button = '<a class="mp_link_addcart" href="' . esc_url($product_link) . '">' . __('Add To Cart &raquo;', 'mp') . '</a>';
      } else if ($settings['list_button_type'] == 'buynow') {
        $button = '<a class="mp_link_buynow" href="' . esc_url($product_link) . '">' . __('Buy Now &raquo;', 'mp') . '</a>';
      }
    } else {
      if ($settings['product_button_type'] == 'addcart') {
        $button = '<a class="mp_link_addcart" href="' . esc_url($product_link) . '">' . __('Add To Cart &raquo;', 'mp') . '</a>';
      } else if ($settings['product_button_type'] == 'buynow') {
        $button = '<a class="mp_link_buynow" href="' . esc_url($product_link) . '">' . __('Buy Now &raquo;', 'mp') . '</a>';
      }
    }

  } else {

    $button = '<form class="mp_buy_form" method="post" action="' . mp_cart_link(false, true) . '">';
    $button .= '<input type="hidden" name="product_id" value="' . $post_id . '" />';

    if ($context == 'list') {
      if ($settings['list_button_type'] == 'addcart') {
        $button .= '<input type="hidden" name="action" value="mp-update-cart" />';
        $button .= '<input class="mp_button_addcart" type="submit" name="addcart" value="' . __('Add To Cart &raquo;', 'mp') . '" />';
      } else if ($settings['list_button_type'] == 'buynow') {
        $button .= '<input class="mp_button_buynow" type="submit" name="buynow" value="' . __('Buy Now &raquo;', 'mp') . '" />';
      }
    } else {
      //add quantity field
      if ($settings['show_quantity']) {
        $button .= '<span class="mp_quantity"><label>' . __('Quantity:', 'mp') . ' <input class="mp_quantity_field" type="text" size="1" name="quantity" value="1" /></label></span>&nbsp;';
      }

      if ($settings['product_button_type'] == 'addcart') {
        $button .= '<input type="hidden" name="action" value="mp-update-cart" />';
        $button .= '<input class="mp_button_addcart" type="submit" name="addcart" value="' . __('Add To Cart &raquo;', 'mp') . '" />';
      } else if ($settings['product_button_type'] == 'buynow') {
        $button .= '<input class="mp_button_buynow" type="submit" name="buynow" value="' . __('Buy Now &raquo;', 'mp') . '" />';
      }
    }

    $button .= '</form>';
  }

  if ($echo)
    echo $button;
  else
    return $button;
}


/*
 * Displays the product featured image
 *
 * @param bool $echo Optional, whether to echo
 * @param string $context Options are list, single, or widget
 * @param int $post_id The post_id for the product. Optional if in the loop
 * @param int $size An optional width/height for the image if contect is widget
 */
function mp_product_image( $echo = true, $context = 'list', $post_id = NULL, $size = NULL ) {
  global $id;
  $post_id = ( NULL === $post_id ) ? $id : $post_id;

  $post = get_post($post_id);

  $settings = get_option('mp_settings');
  $post_thumbnail_id = get_post_thumbnail_id( $post_id );

  if ($context == 'list') {
    //quit if no thumbnails on listings
    if (!$settings['show_thumbnail'])
      return '';

    //size
    if ($settings['list_img_size'] == 'custom')
      $size = array($settings['list_img_width'], $settings['list_img_height']);
    else
      $size = $settings['list_img_size'];

    //link
    $link = get_permalink($post_id);

    $title = esc_attr($post->post_title);

  } else if ($context == 'single') {
    //size
    if ($settings['product_img_size'] == 'custom')
      $size = array($settings['product_img_width'], $settings['product_img_height']);
    else
      $size = $settings['product_img_size'];

    //link
    $temp = wp_get_attachment_image_src( $post_thumbnail_id, 'large' );
    $link = $temp[0];

    $title = __('View Larger Image &raquo;', 'mp');
    $class = ' class="mp_product_image_link mp_lightbox"';

  } else if ($context == 'widget') {
    //size
    if (intval($size))
      $size = array(intval($size), intval($size));
    else
      $size = array(50, 50);

    //link
    $link = get_permalink($post_id);

    $title = esc_attr($post->post_title);

  }

  $image = get_the_post_thumbnail($post_id, $size, array('class' => 'alignleft mp_product_image_'.$context, 'title' => $title));

  //add the link
  if ($link)
    $image = '<a id="product_image-' . $post_id . '"' . $class . ' href="' . $link . '">' . $image . '</a>';

  if ($echo)
    echo $image;
  else
    return $image;
}

/**
 * Echos the current shopping cart link.
 * @param bool $echo Optional, whether to echo. Defaults to true
 * @param bool $url Optional, whether to return a link or url. Defaults to show link.
 * @param string $link_text Optional, text to show in link.
 */
function mp_cart_link($echo = true, $url = false, $link_text = '') {
	$settings = get_option('mp_settings');
  $link = home_url( $settings['slugs']['store'] . '/' . $settings['slugs']['cart'] . '/' );

  if (!$url) {
    $text = ($link_text) ? $link_text : __('Shopping Cart', 'mp');
    $link = '<a href="' . $link . '" class="mp_cart_link">' . $text . '</a>';
  }

  if ($echo)
    echo $link;
  else
    return $link;
}

/**
 * Echos the current store link.
 * @param bool $echo Optional, whether to echo. Defaults to true
 * @param bool $url Optional, whether to return a link or url. Defaults to show link.
 * @param string $link_text Optional, text to show in link.
 */
function mp_store_link($echo = true, $url = false, $link_text = '') {
	$settings = get_option('mp_settings');
  $link = home_url(trailingslashit($settings['slugs']['store']));

  if (!$url) {
    $text = ($link_text) ? $link_text : __('Visit Store', 'mp');
    $link = '<a href="' . $link . '" class="mp_store_link">' . $text . '</a>';
  }

  if ($echo)
    echo $link;
  else
    return $link;
}

/**
 * Echos the current product list link.
 * @param bool $echo Optional, whether to echo. Defaults to true
 * @param bool $url Optional, whether to return a link or url. Defaults to show link.
 * @param string $link_text Optional, text to show in link.
 */
function mp_products_link($echo = true, $url = false, $link_text = '') {
	$settings = get_option('mp_settings');
  $link = home_url( $settings['slugs']['store'] . '/' . $settings['slugs']['products'] . '/' );

  if (!$url) {
    $text = ($link_text) ? $link_text : __('View Products', 'mp');
    $link = '<a href="' . $link . '" class="mp_products_link">' . $text . '</a>';
  }

  if ($echo)
    echo $link;
  else
    return $link;
}

/**
 * Echos the current order status link.
 * @param bool $echo Optional, whether to echo. Defaults to true
 * @param bool $url Optional, whether to return a link or url. Defaults to show link.
 * @param string $link_text Optional, text to show in link.
 */
function mp_orderstatus_link($echo = true, $url = false, $link_text = '') {
	$settings = get_option('mp_settings');
  $link = home_url( $settings['slugs']['store'] . '/' . $settings['slugs']['orderstatus'] . '/' );

  if (!$url) {
    $text = ($link_text) ? $link_text : __('Check Order Status', 'mp');
    $link = '<a href="' . $link . '" class="mp_orderstatus_link">' . $text . '</a>';
  }

  if ($echo)
    echo $link;
  else
    return $link;
}

/**
 * Returns the current shopping cart link with checkout step.
 *
 * @param string $checkout_step
 */
function mp_checkout_step_url($checkout_step) {
  return mp_cart_link(false, true) . trailingslashit($checkout_step);
}
?>