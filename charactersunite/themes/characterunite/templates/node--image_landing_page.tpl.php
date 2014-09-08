<?php

/**
 * @file
 * Bartik's theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *   "Blog entry" it would result in "node-blog". Note that the machine
 *   name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *   listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 */

?>

<?php

  /** Related Videos Section **/
  $related_videos_left = $related_videos_right = '';  
  if (isset($node->field_related_videos_section[LANGUAGE_NONE])) {
    $field_related_videos_section_count = count($content['field_related_videos_section']['#items']);
	for ($related_videos =0; $related_videos < $field_related_videos_section_count; $related_videos++) {
		$field_related_videos_section_value = $content['field_related_videos_section']['#items'][$related_videos]['value'];
		$field_related_videos_section = $content['field_related_videos_section'][$related_videos]['entity']['field_collection_item'][$field_related_videos_section_value];

		$field_related_videos_title_1 = (isset($field_related_videos_section['field_related_videos_title_1'])?$field_related_videos_section['field_related_videos_title_1']['#items'][0]['value']:'');
		$field_related_videos_title_2 = (isset($field_related_videos_section['field_related_videos_title_2'])?$field_related_videos_section['field_related_videos_title_2']['#items'][0]['value']:'');

		$field_related_videos_description = (isset($field_related_videos_section['field_related_videos_description'])?$field_related_videos_section['field_related_videos_description']['#items'][0]['value']:'');

		$field_related_videos_link_url = (isset($field_related_videos_section['field_related_videos_link'])?$field_related_videos_section['field_related_videos_link']['#items'][0]['url']:'');

		$field_related_videos_link_label = (isset($field_related_videos_section['field_related_videos_link'])?$field_related_videos_section['field_related_videos_link']['#items'][0]['title']:'');

		$field_related_videos_link_target = (isset($field_related_videos_section['field_related_videos_link']['#items'][0]['attributes']['target'])?$field_related_videos_section['field_related_videos_link']['#items'][0]['attributes']['target']:'_self');

		$field_related_videos_position = (isset($field_related_videos_section['field_related_videos_position'])?$field_related_videos_section['field_related_videos_position']['#items'][0]['taxonomy_term']->name:'');
		
		if ($field_related_videos_title_1 != '' || $field_related_videos_title_2 != '') {
			$related_videos_link_tag = '';
			if ($field_related_videos_link_url != '') {
				$related_videos_link_tag = '<p>
						<a class="cta uppercase" href="'.$field_related_videos_link_url.'" target="'.$field_related_videos_link_target.'">
							'.$field_related_videos_link_label.'
						</a>
					</p>';
			}
			if (strtolower($field_related_videos_position) != 'right') {
				$related_videos_left .= '
				<div class="mod full clearfix mod top-space">
					<div class="mainstageHeader">
						<h2 class="blackhead blackheadsmall">'.$field_related_videos_title_1.' <strong>'.$field_related_videos_title_2.'</strong></h2>
					</div>
					<section class="copy clearfix">
					'.$field_related_videos_description.'
					'.$related_videos_link_tag;
			}
			else {
				$related_videos_right .= '
					<div class="mod">
						<div class="mainstageHeader">
							<h2 class="blackhead blackheadsmall">'.$field_related_videos_title_1.' <strong>'.$field_related_videos_title_2.'</strong></h2>
						</div>
						<div class="initiativeRightBody copy">
							'.$field_related_videos_description.'
							'.$related_videos_link_tag.'						
							<div class="mainstageVideos clearfix">	
				';
			}
			if (isset($field_related_videos_section['field_related_videos_iteration'])) {
				$field_related_videos_iteration_count = count($field_related_videos_section['field_related_videos_iteration']['#items']);
				for ($a=0;$a<$field_related_videos_iteration_count;$a++) {
				  $field_related_videos_iteration_value = $field_related_videos_section['field_related_videos_iteration']['#items'][$a]['value'];
				  $field_related_videos_iteration = $field_related_videos_section['field_related_videos_iteration'][$a]['entity']['field_collection_item'][$field_related_videos_iteration_value];

				  $field_rvi_video_title = (isset($field_related_videos_iteration['field_rvi_video_title'])?$field_related_videos_iteration['field_rvi_video_title']['#items'][0]['value']:'');

				  $field_rvi_video_info = (isset($field_related_videos_iteration['field_rvi_video_info'])?$field_related_videos_iteration['field_rvi_video_info']['#items'][0]['value']:'');

				  $field_rvi_video_thumbnail = (isset($field_related_videos_iteration['field_rvi_video_thumbnail'])?$field_related_videos_iteration['field_rvi_video_thumbnail']['#items'][0]['uri']:'');

				  $field_rvi_video_link_url = (isset($field_related_videos_iteration['field_rvi_video_link'])?$field_related_videos_iteration['field_rvi_video_link']['#items'][0]['url']:'');

				  $field_rvi_video_link_label = (isset($field_related_videos_iteration['field_rvi_video_link'])?$field_related_videos_iteration['field_rvi_video_link']['#items'][0]['title']:'');

				  $field_rvi_video_link_target = (isset($field_related_videos_iteration['field_rvi_video_link']['#items'][0]['attributes']['target'])?$field_related_videos_iteration['field_rvi_video_link']['#items'][0]['attributes']['target']:'_self');

				  $class = ((($a+1)%2 == 0)?'even':'odd');
				  if (strtolower($field_related_videos_position) != 'right') {
					  $related_videos_left .='
						   <div class="relatedVideos clearfix">
							<a href="'.$field_rvi_video_link_url.'" class="relatedVideosImage" target="'.$field_rvi_video_link_target.'">
							  <img alt="'.$field_rvi_video_title.'" src="'.file_create_url($field_rvi_video_thumbnail).'" class="relatedVideosImage">
							  <div class="playButton25"></div>
							</a>
							<div class="relatedVideosText">
							  <h2>'.substr($field_rvi_video_title,0, 45).'</h2>
							  <p>'.$field_rvi_video_info.'</p>
							  <a href="'.$field_rvi_video_link_url.'" target="'.$field_rvi_video_link_target.'">'.$field_rvi_video_link_label.'</a>
							</div>
						  </div>
					  ';
				  }
				  else {
					  $related_videos_right .='
							<a class="mainstageShowcasesVideo" href="'.$field_rvi_video_link_url.'" target="'.$field_rvi_video_link_target.'">
							  <img class="videoThumb" alt="'.$field_rvi_video_title.'" src="'.file_create_url($field_rvi_video_thumbnail).'">
							  <div class="playButton25"></div>
							  <p>'.$field_rvi_video_title.'</p>
							  <p class="watchNow">'.$field_rvi_video_link_label.'</p>
							</a>
					  ';			  
				  }
				}
			}
			if (strtolower($field_related_videos_position) != 'right') {
				$related_videos_left .= '
					</section>
				</div>';
			}
			else {
				$related_videos_right .= '</div>
						</div>
					</div>';	
			}
		}
	}
  }

  
  /** Half Module Section **/
  $field_half_module_left = $field_half_module_right = '';
  if (isset($content['field_half_module_section'])) {
	  $field_half_module_section_count = count($content['field_half_module_section']['#items']);
	  for ($half_module=0;$half_module<$field_half_module_section_count;$half_module++) {
		$field_half_module_section_value = $content['field_half_module_section']['#items'][$half_module]['value'];
		$field_half_module_section = $content['field_half_module_section'][$half_module]['entity']['field_collection_item'][$field_half_module_section_value];
		$field_half_module_title_1 = (isset($field_half_module_section['field_half_module_title_1'])?$field_half_module_section['field_half_module_title_1']['#items'][0]['value']:'');
		$field_half_module_title_2 = (isset($field_half_module_section['field_half_module_title_2'])?$field_half_module_section['field_half_module_title_2']['#items'][0]['value']:'');
		$field_half_module_description = (isset($field_half_module_section['field_half_module_description'])?$field_half_module_section['field_half_module_description']['#items'][0]['value']:'');
		$field_half_module_link_url = (isset($field_half_module_section['field_half_module_link'])?$field_half_module_section['field_half_module_link']['#items'][0]['url']:'');
		$field_half_module_link_label = (isset($field_half_module_section['field_half_module_link'])?$field_half_module_section['field_half_module_link']['#items'][0]['title']:'');
		$field_half_module_link_target = (isset($field_half_module_section['field_half_module_link']['#items'][0]['attributes']['target'])?$field_half_module_section['field_half_module_link']['#items'][0]['attributes']['target']:'_self');
		$field_ds_position = (isset($field_half_module_section['field_ds_position'])?$field_half_module_section['field_ds_position']['#items'][0]['taxonomy_term']->name:'');
		$half_module_link_tag = '';
		if ($field_half_module_link_url != '') {
			$half_module_link_tag = '<p><a href="'.$field_half_module_link_url.'" class="uppercase" target="'.$field_half_module_link_target.'">'.$field_half_module_link_label.'</a>';
		}
		if ($field_half_module_title_1 != '' || $field_half_module_title_2 != '' || $field_half_module_description != '' || $field_half_module_link_url != '') {
		  if (strtolower($field_ds_position) != 'right') {
			$class = (($half_module%2 == 0)?'clear':'');
			$field_half_module_left .= '
				<div class="'.$class.' mod half">
					<div class="mainstageHeader">
						<h2 class="blackhead blackheadsmall">'.$field_half_module_title_1.' <strong>'.$field_half_module_title_2.'</strong></h2>
					</div>
					<section class="copy clearfix">
						'.$field_half_module_description.'
						'.$half_module_link_tag.'
						</p>
					</section>
				</div>		
			';
		  }
		  else {
			$field_half_module_right .= '
				<div class="mod">
					<div class="mainstageHeader">
						<h2 class="blackhead blackheadsmall">'.$field_half_module_title_1.' <strong>'.$field_half_module_title_2.'</strong></h2>
					</div>
					<div class="initiativeRightBody copy">
						'.$field_half_module_description.'
						'.$half_module_link_tag.'
						</p>
					</div>
				</div>		
			';	  
		  }
		}
	  }
  }
  /** Download File Section **/
  $field_file_download_left = $field_file_download_right = $file_download_tag = '';
  if (isset($content['field_file_download_section'])) {
	  $field_file_download_section_count = count($content['field_file_download_section']['#items']);
	  for ($file_download=0;$file_download<$field_file_download_section_count;$file_download++) {
		$field_file_download_section_value = $content['field_file_download_section']['#items'][$file_download]['value'];
		$field_file_download_section = $content['field_file_download_section'][$file_download]['entity']['field_collection_item'][$field_file_download_section_value];
		$field_file_download_title_1 = (isset($field_file_download_section['field_file_download_title_1'])?$field_file_download_section['field_file_download_title_1']['#items'][0]['value']:'');
		$field_file_download_title_2 = (isset($field_file_download_section['field_file_download_title_2'])?$field_file_download_section['field_file_download_title_2']['#items'][0]['value']:'');
		$field_file_download_description = (isset($field_file_download_section['field_file_download_description'])?$field_file_download_section['field_file_download_description']['#items'][0]['value']:'');
		$field_file_download_label = (isset($field_file_download_section['field_file_download_label'])?$field_file_download_section['field_file_download_label']['#items'][0]['value']:'');
		$field_file_download_file = (isset($field_file_download_section['field_file_download_file'])?$field_file_download_section['field_file_download_file']['#items'][0]['uri']:'');
		$field_ds_position = (isset($field_file_download_section['field_ds_position'])?$field_file_download_section['field_ds_position']['#items'][0]['taxonomy_term']->name:'');

		if ($field_file_download_file != '') {
			$file_download_tag .= '<p><a href="'.file_create_url($field_file_download_file).'" target="_blank" class="cta uppercase">'.$field_file_download_label.'</a></p>';
		}
		
		if ($field_file_download_title_1 != '' || $field_file_download_title_2 != '' || $field_file_download_description != '' || $field_file_download_file != '') {
		  $class = (($half_module%2 == 0)?'clear':'');
		  if (strtolower($field_ds_position) != 'right') {
			$field_file_download_left .= '
				<div class="'.$class.' download mod half">
					<div class="mainstageHeader">
						<h2 class="blackhead blackheadsmall">'.$field_file_download_title_1.' <strong>'.$field_file_download_title_2.'</strong></h2>
					</div>
					<section class="copy clearfix">
						'.$field_file_download_description.'
						'.$file_download_tag.'
					</section>
				</div>		
			';
		  }
		  else {
			$field_file_download_right .= '
				<div class="mod download">
					<div class="mainstageHeader">
						<h2 class="blackhead blackheadsmall">'.$field_file_download_title_1.' <strong>'.$field_file_download_title_2.'</strong></h2>
					</div>
					<div class="initiativeRightBody copy">
						'.$field_file_download_description.'
						'.$file_download_tag.'
					</div>
				</div>	
			';	  
		  }
		}
	  }
  }
  

  /** Black Box Section **/
  if (isset($content['field_black_box_section'])) {
	  $field_black_box_section_value = $content['field_black_box_section']['#items'][0]['value'];
	  $field_black_box_section = $content['field_black_box_section'][0]['entity']['field_collection_item'][$field_black_box_section_value];

	  $field_black_box_title = (isset($field_black_box_section['field_black_box_title'])?$field_black_box_section['field_black_box_title']['#items'][0]['value']:'');
	  $field_black_box_title_2 = (isset($field_black_box_section['field_black_box_title_2'])?$field_black_box_section['field_black_box_title_2']['#items'][0]['value']:'');

	  $field_black_box_description = (isset($field_black_box_section['field_black_box_description'])?$field_black_box_section['field_black_box_description']['#items'][0]['value']:'');

	  $field_black_box_more_link = (isset($field_black_box_section['field_black_box_more_link'])?$field_black_box_section['field_black_box_more_link']['#items'][0]['value']:'');

	  $field_add_spread_the_word_block = (isset($field_black_box_section['field_add_spread_the_word_block'])?$field_black_box_section['field_add_spread_the_word_block']['#items'][0]['value']:'');
  }

  /** Gallery **/
  $gallery = '';
  if (isset($node->field_ilp_photo_gallery_title[LANGUAGE_NONE]) || isset($node->field_ilp_photo_gallery_images[LANGUAGE_NONE])) {
	$gallery = '<div class="mod">';
	if (isset($node->field_ilp_photo_gallery_title[LANGUAGE_NONE])) {
		$gallery .= '
			<div class="mainstageHeader">
                <h2 class="blackhead blackheadsmall"><strong>Photo Gallery</strong></h2>
            </div>		
		';
	}
	if (isset($node->field_ilp_photo_gallery_images[LANGUAGE_NONE])) {
		$gallery .= '<div class="initiativeRightBody copy"><div class="mainstageVideos clearfix">';
		$field_ilp_photo_gallery_images_count = count($node->field_ilp_photo_gallery_images[LANGUAGE_NONE]);
		for ($ilp_photo_gallery = 0; $ilp_photo_gallery<$field_ilp_photo_gallery_images_count; $ilp_photo_gallery++) {
			$gallery .= '<a class="mainstageShowcasesPhotos" href="'.$node->field_ilp_photo_gallery_link[LANGUAGE_NONE][0]['url'].'">
							<img class="photoThumb" src="'.file_create_url($node->field_ilp_photo_gallery_images[LANGUAGE_NONE][$ilp_photo_gallery]['uri']).'" alt="Title">
						</a>';
		}
		$gallery .= '</div>';
		$gallery .= '<p><a href="'.$node->field_ilp_photo_gallery_link[LANGUAGE_NONE][0]['url'].'" class="cta uppercase">'.$node->field_ilp_photo_gallery_link[LANGUAGE_NONE][0]['title'].'</a></p>';
		$gallery .= '</div></div>';
	}
  }

?>
<!-- initiativesHeader end -->
	<div class="initiativeMain layoutMedium">
		<div id="colMain">
			<div class="imageFrame">
				<img alt="<?php echo $node->field_ilp_image_title[LANGUAGE_NONE][0]['value']; ?>" src="<?php echo file_create_url($node->field_ilp_image[LANGUAGE_NONE][0]['uri']); ?>">
			</div>
			<div class="mod-article">
				<h1><?php echo $node->field_ilp_image_title[LANGUAGE_NONE][0]['value']; ?></h1>
				<?php
					if (strlen($node->field_ilp_image_description[LANGUAGE_NONE][0]['value']) > 700 ) {
						echo '<span class="leftpane_desc" style="height:200px">'.$node->field_ilp_image_description[LANGUAGE_NONE][0]['value'].'</span><a class="leftpane_desc_more amore" href="javascript:;" onclick="LeftDesc(\'leftpane_desc\', \'less\', 200, \'\');">More</a><a class="leftpane_desc_less amore" href="javascript:;" onclick="LeftDesc(\'leftpane_desc\', \'more\', 200, \'\');">Less</a>';
					}
					else {
						echo $node->field_ilp_image_description[LANGUAGE_NONE][0]['value'];
					}
				?>
			</div>
			<?php echo $field_half_module_left; ?>
			<?php echo $field_file_download_left; ?>
			<?php echo $related_videos_left; ?>
		</div>

		<div id="colSide">
			<?php if ($field_black_box_title != '' || $field_black_box_title_2 != '' || $field_black_box_description != '') { ?>
			<div class="mod solid">
				<h2 class="title"><?php echo $field_black_box_title; ?> <br/><small><?php echo $field_black_box_title_2; ?></small></h2>
				<?php 
				if ($field_black_box_more_link != 0) {
					echo '<span class="blackpane_desc" style="height:250px">'.$field_black_box_description.'</span><a class="blackpane_desc_more amore" href="javascript:;" onclick="LeftDesc(\'blackpane_desc\', \'less\', 250, \'\');">More</a><a class="blackpane_desc_less amore" href="javascript:;" onclick="LeftDesc(\'blackpane_desc\', \'more\', 250, \'\');">Less</a>';
				}
				else {
					echo $field_black_box_description;
				}
				?>
			</div>
			<?php
			  }
			?>
			<?php echo $field_half_module_right; ?>
			<?php echo $related_videos_right; ?>
			<?php echo $gallery; ?>
			<?php echo $field_file_download_right; ?>			
		</div>
		<!-- initiativeRight end -->
	</div>