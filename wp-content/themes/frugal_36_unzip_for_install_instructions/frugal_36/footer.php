<!-- begin footer -->
<?php $content_design = get_option('frugal_content_design'); ?>

<div style="clear:both;"></div>

<?php
if ($content_design['fr_head_foot_fluid'] == "Footer Only" || $content_design['fr_head_foot_fluid'] == "Header & Footer Only" || $content_design['fr_head_foot_fluid'] == "Navbar & Footer Only" || $content_design['fr_head_foot_fluid'] == "All")
{
echo '</div> <!-- Closes Wrap -->' . "\n";
}
?>

<?php frugal_hook_before_footer(); ?>

<div id="footer_wrap">
	<div id="footer">

<?php frugal_hook_footer(); ?>

	</div>
</div>

<?php frugal_hook_after_footer(); ?>

<div style="clear:both;"></div>

<?php
if ($content_design['fr_head_foot_fluid'] == "None" || $content_design['fr_head_foot_fluid'] == "Header Only" || $content_design['fr_head_foot_fluid'] == "Navbar Only" || $content_design['fr_head_foot_fluid'] == "Header & Navbar Only")
{
echo '</div> <!-- Closes Wrap -->' . "\n";
}
?>

<?php wp_footer(); ?>

<?php frugal_hook_after_html(); ?>

</body>

</html>