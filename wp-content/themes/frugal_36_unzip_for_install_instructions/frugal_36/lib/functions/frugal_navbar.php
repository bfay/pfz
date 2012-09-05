<?php

function frugal_navbar_area() {
$main_options = get_option('frugal_main_options');
$header_design = get_option('frugal_header_design');

if($main_options['fr_nofollow_home'] == "Yes")
{
	$nofollow = ' nofollow';
}

frugal_hook_before_navbar(); ?>
<div id="navbar_wrap">
	<div id="navbar">

		<div id="navbar_left">
		<?php
		if ($header_design['fr_main_nav_type'] == "Wordpress")
		{
			wp_nav_menu( array('theme_location' => 'primary', 'sort_column' => 'menu_order') );
		}
		else
		{
			?>
			<ul id="nav">
				<li class="home <?php if (is_home() || is_front_page()): echo "current_page_item"; endif; ?>"><?php if ($main_options['fr_home_tab_text']): ?><a href="<?php echo get_settings('home'); ?>" rel="home<?php echo $nofollow ?>"><?php echo $main_options['fr_home_tab_text'] ?></a><?php endif; ?></li>
					<?php 
					$excludepages = $main_options['fr_exclude_pages'];
					wp_list_pages('title_li=&depth=4&sort_column=menu_order&exclude=' . $excludepages); ?>
			</ul>
			<?php
		}
			?>
		</div>
		
		<?php
		if ($header_design['fr_navbar_right_layout'] == "RSS")
		{
			?>
			<div id="navbar_right">
			<?php echo do_shortcode('[rss]'); ?>
			</div>
			<?php
		}
		elseif ($header_design['fr_navbar_right_layout'] == "RSS & Email")
		{
			?>
			<div id="navbar_right">
			<?php echo do_shortcode('[rss_email]'); ?>
			</div>
			<?php
		}
		elseif ($header_design['fr_navbar_right_layout'] == "Twitter")
		{
			?>
			<div id="navbar_right">
			<?php echo do_shortcode('[twitter]'); ?>
			</div>
			<?php
		}
		elseif ($header_design['fr_navbar_right_layout'] == "Search")
		{
			?>
			<?php $search_box_text = $main_options['fr_search_box_text']; ?>
			<div id="navbar_right">
			<?php echo do_shortcode('[search]'); ?>
			</div>
			<?php
		}
		elseif ($header_design['fr_navbar_right_layout'] == "Text")
		{
			?>
			<div id="navbar_right">
				<?php echo stripslashes($main_options['fr_navbar_right_text']); ?>
			</div>
			<?php
		}
		?>
	
	</div>
</div>
<?php frugal_hook_after_navbar();
}

function frugal_catnav_area() {
$main_options = get_option('frugal_main_options');
$header_design = get_option('frugal_header_design');

	if (is_page_template('cms_page.php') && $header_design['fr_subnav_cms_display'] == "No" || is_page_template('cms_pagewide.php') && $header_design['fr_subnav_cms_display'] == "No" || $header_design['fr_subnav_location'] == "No Category Navbar")
	{
	null;
	}
	else
	{
		echo '<div id="subnavbar_wrap">' . "\n";
			echo '<div id="subnavbar">' . "\n";
			
			echo '<div id="subnavbar_left">' . "\n";
			if ($header_design['fr_subnav_type'] == "Wordpress")
			{
				wp_nav_menu( array( 'theme_location' => 'secondary', 'sort_column' => 'menu_order', 'container_id' => 'subnav' ) );
			}
			else
			{
				echo '<ul id="subnav">' . "\n";
					$excludecats = $main_options['fr_exclude_subnav_pages'];
					wp_list_categories('orderby=name&title_li=&depth=4&exclude=' . $excludecats);
				echo '</ul>' . "\n";
			}
			echo '</div>' . "\n";

			if ($header_design['fr_subnavbar_right_layout'] == "RSS")
			{
				?>
				<div id="subnavbar_right">
				<?php echo do_shortcode('[rss]'); ?>
				</div>
				<?php
			}
			elseif ($header_design['fr_subnavbar_right_layout'] == "RSS & Email")
			{
				?>
				<div id="subnavbar_right">
				<?php echo do_shortcode('[rss_email]'); ?>
				</div>
				<?php
			}
			elseif ($header_design['fr_subnavbar_right_layout'] == "Twitter")
			{
				?>
				<div id="subnavbar_right">
				<?php echo do_shortcode('[twitter]'); ?>
				</div>
				<?php
			}
			elseif ($header_design['fr_subnavbar_right_layout'] == "Search")
			{
			?>
				<?php $search_box_text = $main_options['fr_search_box_text']; ?>
				<div id="subnavbar_right">
				<?php echo do_shortcode('[search]'); ?>
				</div>
				<?php
			}
			elseif ($header_design['fr_subnavbar_right_layout'] == "Text")
			{
				?>
				<div id="subnavbar_right">
					<?php echo stripslashes($main_options['fr_subnavbar_right_text']); ?>
				</div>
				<?php
			}
			echo '</div>' . "\n";
		echo '</div>' . "\n";
	
	}
}