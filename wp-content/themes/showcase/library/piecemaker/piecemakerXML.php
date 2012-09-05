<?php
require_once( '../../../../../wp-load.php' );
$width = get_option('wd_width');
$height = get_option('wd_height');
$segments = get_option('wd_segments');
$tweentime = get_option('wd_tween_time');
$tweendelay = get_option('wd_tween_delay');
$tweentype = get_option('wd_tween_type');
$zdistance = get_option('wd_z_distance');
$expand = get_option('wd_expand');
$innercolor = get_option('wd_inner_color');
$textbackground = get_option('wd_text_background');
$textdistance = get_option('wd_text_distance');
$shadow = get_option('wd_shadow_darkness');
$autoplay = get_option('wd_autoplay');
global $wpdb;
$images = array(
get_option('wd_image1'), get_option('wd_image2'), get_option('wd_image3'), get_option('wd_image4'), get_option('wd_image5'), get_option('wd_image6'),
);
$images_titles = array(
get_option('wd_t_image1'), get_option('wd_t_image2'), get_option('wd_t_image3'), get_option('wd_t_image4'), get_option('wd_t_image5'), get_option('wd_t_image6'),
);
$images_p = array(
get_option('wd_d_image1'), get_option('wd_d_image2'), get_option('wd_d_image3'), get_option('wd_d_image4'), get_option('wd_d_image5'), get_option('wd_d_image6'),
);
?><?php header("Content-type: text/xml");
echo '<?xml version="1.0" encoding="utf-8" ?>
<Piecemaker>
  <Settings>
	<imageWidth>'. $width .'</imageWidth>
	<imageHeight>'. $height .'</imageHeight>';



echo '<segments>'. $segments . '</segments>';
echo '<tweenTime>'. $tweentime . '</tweenTime>';
echo '<tweenDelay>'. $tweendelay . '</tweenDelay>';
echo '<tweenType>'. $tweentype . '</tweenType>';
echo '<zDistance>'. $zdistance . '</zDistance>';
echo '<expand>'. $expand . '</expand>';
echo '<innerColor>'. $innercolor . '</innerColor>';
echo '<textBackground>'. $textbackground . '</textBackground>';
echo '<textDistance>'. $textdistance . '</textDistance>';
echo '<shadowDarknent>' . $shadow . '</shadowDarknent>';
echo '<autoplay>' . $autoplay .  '</autoplay>'; 
echo '
</Settings>';


foreach( $images as $k => $v )
{
$v = ( $v == "" ) ? ' ' : stripslashes($v);
$images_p[ $k ] = ( $images_p[ $k ] == "" ) ? 'Empty' : stripslashes($images_p[ $k ]);
$images_titles[ $k ] = ( $images_titles[ $k ] == "" ) ? 'Empty Description' : stripslashes($images_titles[ $k ]);
echo '
<Image Filename="' . $v .'">
    <Text>
      <headline>' . $images_titles[ $k ] .'</headline>
      <break>Ӂ</break>
      <paragraph>' . $images_p[ $k ] .'</paragraph>
    </Text>
  </Image>
';
}
echo '
</Piecemaker>';
?>