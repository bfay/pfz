<div class="portlet-header"><em>frugal</em> <?php _e('Settings', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
<form method="post">
		<p>
		<select id="frugal[fr_dynamic_stylesheet_format]" name="frugal[fr_dynamic_stylesheet_format]" size="1" style="width:55px; margin-right:5px;">
			<option value="CSS"<?php if ($options['fr_dynamic_stylesheet_format'] == 'CSS') echo ' selected="selected"'; ?>><?php _e('CSS', 'frugal'); ?></option>
			<option value="PHP"<?php if ($options['fr_dynamic_stylesheet_format'] == 'PHP') echo ' selected="selected"'; ?>><?php _e('PHP', 'frugal'); ?></option>
		</select>
		<?php _e('Stylesheet Format', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('The CSS option requires your ../lib/css/dynamic.css file to be writable on your web server (usually it is by default). The PHP option is there just in case the CSS option gives you any trouble. The PHP option works fine too. :-) NOTE: When going from the PHP format back over to the CSS format be sure to click the \'SAVE\' button twice. This will re-update the CSS dynamic stylesheet by transferring the PHP settings back over to the CSS format.', 'frugal'); ?>">[?]</a><br />
		<select id="frugal[fr_gzip_active]" name="frugal[fr_gzip_active]" size="1" style="width:55px; margin-right:5px;">
			<option value="Yes"<?php if ($options['fr_gzip_active'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
			<option value="No"<?php if ($options['fr_gzip_active'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
		</select>
		<?php _e('Use Gzip', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('This helps speed up your site and reduce server load. Use this option unless you\'re experiencing issues because of it.', 'frugal'); ?>">[?]</a><br />
		<select id="frugal[fr_db_speed_test]" name="frugal[fr_db_speed_test]" size="1" style="width:55px; margin-right:5px;">
			<option value="No"<?php if ($options['fr_db_speed_test'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
			<option value="Yes"<?php if ($options['fr_db_speed_test'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
		</select>
		<?php _e('Speed Test', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Shows (in the footer) the amount and speed of the database queries for every page view. This can be a useful tool for testing the efficiency of your theme, plugins and other site add-ons.  Note: This is only visible if you are logged into Wordpress.', 'frugal'); ?>">[?]</a>
		</p>
		<?php
		global $fr_multisite;
		if( function_exists('memory_get_usage') && ( false == $fr_multisite ) )
		{
		?>
			<p>
			<b><?php _e('Frugal Memory Limit', 'frugal'); ?></b> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Increases the WordPress Memory Limit. This may not be supported by your web host so be sure to confirm that your host\'s PHP Memory Limit allows for an increase to 64M, and only increase from 32M to 64M if you are experiencing memory-related errors.', 'frugal'); ?>">[<?php _e('Read First', 'frugal'); ?>]</a><br />
			<select id="frugal_memory_limit" name="frugal_memory_limit" size="1" style="width:55px;">
				<?php $fr_mem_limit = get_option('frugal_memory_limit'); ?>
				<option value="32M"<?php if ($fr_mem_limit == '32M' || $fr_mem_limit === false) echo ' selected="selected"'; ?>><?php _e('32M', 'frugal'); ?></option>
				<option value="64M"<?php if ($fr_mem_limit == '64M') echo ' selected="selected"'; ?>><?php _e('64M', 'frugal'); ?></option>
			</select>
			<?php
			if ($fr_mem_limit == true)
			{
				$current_mem_usage = size_format(memory_get_usage(), 2);
				if($current_mem_usage < 1)
				{
					$current_mem_usage = '16.00 MB';
				}
				switch($fr_mem_limit)
				{
					case '32M':
						$current_php_limit = '32 MB';
					break;
					case '64M':
						$current_php_limit = '64 MB';
					break;
				}
			}
			else
			{
				$current_php_limit = get_cfg_var('memory_limit');
				if( $current_php_limit < 1 )
				{
					$current_php_limit = '32 MB';
				}
			}
			$co_divide = $current_mem_usage / $current_php_limit;
			$co_multiply = $co_divide * 100;
			$co_pure = number_format($co_multiply, 0);
			$co_percent = $co_pure . '%';
			?>
			<span style="font-size:75%;">
			<?php echo 'Using ' . $current_mem_usage . ' of '. $current_php_limit. ' (' . $co_percent . ')'; ?>
			</span>
			</p>
		<?php
		}
		?>
		<p>
		<b><?php _e('Master Reset', 'frugal'); ?></b> <a class="tooltip" href="#" class="tooltip" title="<?php _e('To completely reset your frugal Theme Option settings just spell \'Reset\' with the dropdown menus and click \'Save\'', 'frugal'); ?>">[?]</a><br />
		<select id="frugal[fr_master_reset_1]" name="frugal[fr_master_reset_1]" size="1" style="width:50px;">
			<option value="off"<?php if ($options['fr_master_reset_1'] == 'off') echo ' selected="selected"'; ?>><?php _e('off', 'frugal'); ?></option>
			<option value="Re"<?php if ($options['fr_master_reset_1'] == 'Re') echo ' selected="selected"'; ?>><?php _e('Re', 'frugal'); ?></option>
		</select>
		<select id="frugal[fr_master_reset_2]" name="frugal[fr_master_reset_2]" size="1" style="width:50px; margin-right:30px;">
			<option value="off"<?php if ($options['fr_master_reset_2'] == 'off') echo ' selected="selected"'; ?>><?php _e('off', 'frugal'); ?></option>
			<option value="set"<?php if ($options['fr_master_reset_2'] == 'set') echo ' selected="selected"'; ?>><?php _e('set', 'frugal'); ?></option>
		</select>
		<input type="submit" value="Save" name="action"/>
		</p>
</form>
</div>