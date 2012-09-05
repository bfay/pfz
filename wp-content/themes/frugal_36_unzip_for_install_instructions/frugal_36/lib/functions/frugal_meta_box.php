<?php
/*
This is an altered version of code written by Clay Griffiths.  Thanks Clay! :-)
MIT License: http://www.opensource.org/licenses/mit-license.php
*/

class frugal_post_seo {
	var $id;
	var $name;
	var $options;
	var $defaults;
	var $info = NULL;
	var $type = 'both';
	
	function frugal_post_seo($id, $name, $options, $defaults, $info, $type) {
		$this->id = $id;
		$this->name = $name;
	    $this->options = $options;
		$this->defaults = $defaults;
		if(isset($info)) $this->info = $info;
		if(isset($type)) $this->type = $type;
			
		add_action('admin_menu', array(&$this, 'build_post_seo'));
		add_action('save_post', array(&$this, 'save_data'), 10, 2);	
		add_action('publish_post', array(&$this, 'save_data'), 10, 2);	
	}
	
	function build_post_seo(){		
		if($this->type == 'post') add_meta_box( $this->id, $this->name, array($this, 'post_seo'), 'post', 'advanced', 'low' );
		if($this->type == 'page') add_meta_box( $this->id, $this->name, array($this, 'post_seo'), 'page', 'advanced', 'low' );
		
		if($this->type == 'both'):
			add_meta_box( $this->id, $this->name, array($this, 'post_seo'), 'post', 'advanced', 'low' );
			add_meta_box( $this->id, $this->name, array($this, 'post_seo'), 'page', 'advanced', 'low' );
		endif;	
	}
	
	function post_seo(){
		global $post;
		
		echo '<input type="hidden" name="'.$this->id.'_nonce" id="'.$this->id.'_nonce" value="' . wp_create_nonce( base64_encode(md5($this->id)) ) . '" />';
		
		foreach($this->options as $option):
		
			if(get_post_meta($post->ID, '_'.$option['id'], true) || get_post_meta($post->ID, '_'.$option['id'], true) == '0'):
				$value = get_post_meta($post->ID, '_'.$option['id'], true);
			else:
				$value = $this->defaults[$option['id']];
			endif;
			
			if($value == '1') $data[$option['id']] = ' checked="checked" ';
			elseif($value != '1') $data[$option['id']] = $value;
		endforeach;

		if($this->info) echo '<p>'.$this->info.'</p>';

		foreach($this->options as $key => $value):
		
			$input_options['id'] = $value['id'];
			$input_options['name'] = $value['name'];
			$input_options['type'] = $value['type'];
			$input_options['defaults'] = $value['defaults'];
			$input_options['options'] = $value['options'];
			
			$id = $input_options['id'];

			$options .= '<tr class="form-field">';

				if($input_options['type'] == 'text'):

					$options .= '<th valign="top" scope="row" style="font-size: 14px; color:#888; width: 10%; font-weight:bold; font-family:Georgia,serif;"><label for="'.$this->id.'_'.$input_options['id'].'">'.$input_options['name'].'</label></th>
								 <td><input type="text" style="width: 95%;" value="'.$data[$id].'" size="50" id="'.$this->id.'_'.$input_options['id'].'" name="'.$this->id.'['.$input_options['id'].']"/></td>';

				elseif($input_options['type'] == 'textarea'):
				
					$options .= '<th valign="top" scope="row" style="font-size: 14px; color:#888; width: 10%; font-weight:bold; font-family:Georgia,serif;"><label for="'.$this->id.'_'.$input_options['id'].'">'.$input_options['name'].'</label></th>
								<td><textarea style="width: 95%;" rows="3" cols="50" id="'.$this->id.'_'.$input_options['id'].'" name="'.$this->id.'['.$input_options['id'].']">'.$data[$id].'</textarea></td>';
				
				elseif($input_options['type'] == 'checkbox'):
					$value = ($normal_data[$id] == 1) ? 1 : 0;
					
					$options .= '<input type="hidden" name="'.$this->id.'['.$input_options['id'].'_unchecked]" value="0" /> ';
					$options .= '<td colspan="2"><label class="selectit" style="float:left; width:40%; font-size: 14px; color:#888; font-weight:bold; font-family:Georgia,serif;" for="'.$this->id.'_'.$input_options['id'].'"> <input type="checkbox" id="'.$this->id.'_'.$input_options['id'].'" value="1" name="'.$this->id.'['.$input_options['id'].']" class="check" '.$data[$id].'/> '.$input_options['name'].'</label></td>';
	
				endif;
			
			$options .= '</tr>';

		endforeach;

		  echo '<table cellspacing="2" cellpadding="5" style="width: 100%;" class="form-table">
			<tbody>
			'.$options.'
		  </tbody></table>';
	}
	
	function save_data( $post_ID, $post ){
		if ($post->post_type == 'revision') return;
	
		$post_ID = $post->ID;

		$encrypt = base64_encode(md5($this->id));
		if ( !wp_verify_nonce( $_POST[$this->id.'_nonce'], $encrypt )) {
		  return;
		}

		if ( 'page' == $_POST['post_type'] ) {
		  if ( !current_user_can( 'edit_page', $post_ID ))
		    return $post_ID;
		} else {
		  if ( !current_user_can( 'edit_post', $post_ID ))
		    return $post_ID;
		}

		foreach($_POST[$this->id] as $key => $value):		
		
			if($value == '' || $value == '0'){
		
				if(strpos($key, '_unchecked')){
					$key = str_replace('_unchecked', '', $key);
					if(!$_POST[$this->id][$key]) update_post_meta($post_ID, '_'.$key, '0');
				    
				}else{
					delete_post_meta($post_ID, '_'.$key);
				}

			}elseif($value != get_post_meta($post_ID, '_'.$key, true)){
				update_post_meta($post_ID, '_'.$key, $value);  
			}
			elseif(!get_post_meta($post_ID, '_'.$key, true) && $value != NULL){
				add_post_meta($post_ID, '_'.$key, $value);
			}
		endforeach;
	}
}

function get_meta_box_value($name, $echo = false, $id = false){
	if(!$id):
	 global $post;
	 $id = $post->ID;
	endif;
	
	if($echo):
		echo get_post_meta($id, '_'.$name, true);
	else:
		return get_post_meta($id, '_'.$name, true);
	endif;
}

$main_options = get_option('frugal_main_options');

if ($main_options['fr_post_seo1_active'] == "Yes"):
$In_Post_SEO_1['id'] = 'seo1';
$In_Post_SEO_1['name'] = 'frugal SEO';
$In_Post_SEO_1['options'] = array(
	array(
		'id' => 'title',
		'name' => __('Title', 'frugal'),
		'type' => 'text'
	),
	array(
		'id' => 'description',
		'name' => __('Description', 'frugal'),
		'type' => 'textarea'
	),
	array(
		'id' => 'keywords',
		'name' => __('Keywords', 'frugal'),
		'type' => 'textarea'
	),
);
$In_Post_SEO_1['defaults'] = array(
);
$In_Post_SEO_1['info'] = __('<strong>Learn how to effectively use these SEO options by heading over to the frugalTheme.com <a href="http://frugaltheme.com/support/tutorials/how-to-use-the-frugal-in-postin-page-seo-options/">Support Page</a></strong>', 'frugal');
$In_Post_SEO_1['type'] = 'post';
$In_Post_SEO_1 = new frugal_post_seo($In_Post_SEO_1['id'], $In_Post_SEO_1['name'], $In_Post_SEO_1['options'], $In_Post_SEO_1['defaults'], $In_Post_SEO_1['info'], $In_Post_SEO_1['type']);

$In_Page_SEO_1['id'] = 'seo1';
$In_Page_SEO_1['name'] = 'frugal SEO';
$In_Page_SEO_1['options'] = array(
	array(
		'id' => 'title',
		'name' => __('Title', 'frugal'),
		'type' => 'text'
	),
	array(
		'id' => 'description',
		'name' => __('Description', 'frugal'),
		'type' => 'textarea'
	),
	array(
		'id' => 'keywords',
		'name' => __('Keywords', 'frugal'),
		'type' => 'textarea'
	),
);
$In_Page_SEO_1['defaults'] = array(
);
$In_Page_SEO_1['info'] = __('<strong>Learn how to effectively use these SEO options by heading over to the frugalTheme.com <a href="http://frugaltheme.com/support/tutorials/how-to-use-the-frugal-in-postin-page-seo-options/">Support Page</a></strong>', 'frugal');
$In_Page_SEO_1['type'] = 'page';
$In_Page_SEO_1 = new frugal_post_seo($In_Page_SEO_1['id'], $In_Page_SEO_1['name'], $In_Page_SEO_1['options'], $In_Page_SEO_1['defaults'], $In_Page_SEO_1['info'], $In_Page_SEO_1['type']);
endif;

if ($main_options['fr_post_seo2_active'] == "Yes"):
$In_Post_SEO_2['id'] = 'seo2';
$In_Post_SEO_2['name'] = 'frugal SEO';
$In_Post_SEO_2['options'] = array(
	array(
		'id' => 'noindex',
		'name' => __('<code>noindex</code> this post.', 'frugal'),
		'type' => 'checkbox'
	),
	array(
		'id' => 'nofollow',
		'name' => __('<code>nofollow</code> links in this post.', 'frugal'),
		'type' => 'checkbox'
	),
);
$In_Post_SEO_2['defaults'] = array(
);
$In_Post_SEO_2['info'] = __('<strong>Learn how to effectively use these SEO options by heading over to the frugalTheme.com <a href="http://frugaltheme.com/support/tutorials/how-to-use-the-frugal-in-postin-page-seo-options/">Support Page</a></strong>', 'frugal');
$In_Post_SEO_2['type'] = 'post';
$In_Post_SEO_2 = new frugal_post_seo($In_Post_SEO_2['id'], $In_Post_SEO_2['name'], $In_Post_SEO_2['options'], $In_Post_SEO_2['defaults'], $In_Post_SEO_2['info'], $In_Post_SEO_2['type']);

$In_Page_SEO_2['id'] = 'seo2';
$In_Page_SEO_2['name'] = 'frugal SEO';
$In_Page_SEO_2['options'] = array(
	array(
		'id' => 'noindex',
		'name' => __('<code>noindex</code> this page.', 'frugal'),
		'type' => 'checkbox'
	),
	array(
		'id' => 'nofollow',
		'name' => __('<code>nofollow</code> links in this page.', 'frugal'),
		'type' => 'checkbox'
	),
);
$In_Page_SEO_2['defaults'] = array(
);
$In_Page_SEO_2['info'] = __('<strong>Learn how to effectively use these SEO options by heading over to the frugalTheme.com <a href="http://frugaltheme.com/support/tutorials/how-to-use-the-frugal-in-postin-page-seo-options/">Support Page</a></strong>', 'frugal');
$In_Page_SEO_2['type'] = 'page';
$In_Page_SEO_2 = new frugal_post_seo($In_Page_SEO_2['id'], $In_Page_SEO_2['name'], $In_Page_SEO_2['options'], $In_Page_SEO_2['defaults'], $In_Page_SEO_2['info'], $In_Page_SEO_2['type']);
endif;