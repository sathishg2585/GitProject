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
  /** Video Section **/
  $field_video_section_value = $content['field_video_section']['#items'][0]['value'];
  $field_video_section = $content['field_video_section'][0]['entity']['field_collection_item'][$field_video_section_value];
  $field_video_id = $field_video_section['field_video_id']['#items'][0]['value'];

  $field_transcript_title = (isset($field_video_section['field_transcript_title'])?$field_video_section['field_transcript_title']['#items'][0]['value']:'');

  $field_transcript_description = (isset($field_video_section['field_transcript_description'])?$field_video_section['field_transcript_description']['#items'][0]['value']:'');

  $field_transcript_more_link = $field_video_section['field_transcript_more_link']['#items'][0]['value'];

  $field_video_description = (isset($field_video_section['field_video_description'])?$field_video_section['field_video_description']['#items'][0]['value']:'');

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
						<a class="uppercase" href="'.$field_related_videos_link_url.'" target="'.$field_related_videos_link_target.'">
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
					<div class="relatedVideosFrame">
						<div class="relatedVideosHeader">
							<h2 class="blackhead">'.$field_related_videos_title_1.' <strong>'.$field_related_videos_title_2.'</strong></h2>
						</div>
						<div class="copy">
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
							  <img alt="'.$field_rvi_video_title.'" src="'.file_create_url($field_rvi_video_thumbnail).'">
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
						   <div class="relatedVideos clearfix '.$class.'">
							<a href="'.$field_rvi_video_link_url.'" class="relatedVideosImage" target="'.$field_rvi_video_link_target.'">
							  <img alt="'.$field_rvi_video_title.'" src="'.file_create_url($field_rvi_video_thumbnail).'">
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

  /** Related Images Section **/
  $related_images_left = $related_images_right = '';  
  if (isset($node->field_related_image_section[LANGUAGE_NONE])) {
    $field_related_image_section_count = count($content['field_related_image_section']['#items']);
	for ($related_image_section = 0; $related_image_section < $field_related_image_section_count; $related_image_section++) {
		$field_related_image_section_value = $content['field_related_image_section']['#items'][$related_image_section]['value'];
		$field_related_image_section = $content['field_related_image_section'][$related_image_section]['entity']['field_collection_item'][$field_related_image_section_value];

		$field_related_image_title_1 = (isset($field_related_image_section['field_related_image_title_1'])?$field_related_image_section['field_related_image_title_1']['#items'][0]['value']:'');

		$field_related_image_title_2 = (isset($field_related_image_section['field_related_image_title_2'])?$field_related_image_section['field_related_image_title_2']['#items'][0]['value']:'');

		$field_related_image_description = (isset($field_related_image_section['field_related_image_description'])?$field_related_image_section['field_related_image_description']['#items'][0]['value']:'');

		$field_related_image_link_url = (isset($field_related_image_section['field_related_image_link'])?$field_related_image_section['field_related_image_link']['#items'][0]['url']:'');

		$field_related_image_link_label = (isset($field_related_image_section['field_related_image_link'])?$field_related_image_section['field_related_image_link']['#items'][0]['title']:'');

		$field_related_image_link_target = (isset($field_related_image_section['field_related_image_link']['#items'][0]['attributes']['target'])?$field_related_image_section['field_related_image_link']['#items'][0]['attributes']['target']:'_self');
		
		$field_related_image_position = (isset($field_related_image_section['field_related_image_position'])?$field_related_image_section['field_related_image_position']['#items'][0]['taxonomy_term']->name:'');

		if ($field_related_image_title_1 != '' || $field_related_image_title_2 != '') {
			if (strtolower($field_related_image_position) != 'right') {
				$related_images_left .= '
				<!-- Sponsors -->
				<div class="mod full clearfix mod">
					<div class="mainstageHeader">
						<h2 class="blackhead blackheadsmall">'.$field_related_image_title_1.' <strong>'.$field_related_image_title_2.'</strong></h2>
					</div>
					<div id="sponsors" class="initiativeRightBody copy">
						<div>
							'.$field_related_image_description.'
						</div>
						<section class="copy clearfix">		
				';		
			}
			else {
				$related_images_right .= '
				<div class="mod">
					<div class="mainstageHeader">
						<h2 class="blackhead blackheadsmall">'.$field_related_image_title_1.' <strong>'.$field_related_image_title_2.'</strong></h2>
					</div>
					<div class="initiativeRightBody copy">
						<div>
							'.$field_related_image_description.'
						</div>				
						<section class="copy">
				';		
			}

			if (isset($field_related_image_section['field_related_image_iteration'])) {
				$field_related_image_iteration_count = count($field_related_image_section['field_related_image_iteration']['#items']);

				for ($related_image=0;$related_image<$field_related_image_iteration_count;$related_image++) {
				  $field_related_image_iteration_value = $field_related_image_section['field_related_image_iteration']['#items'][$related_image]['value'];
				  $field_related_image_iteration = $field_related_image_section['field_related_image_iteration'][$related_image]['entity']['field_collection_item'][$field_related_image_iteration_value];

				  $field_rii_image = (isset($field_related_image_iteration['field_rii_image'])?$field_related_image_iteration['field_rii_image']['#items'][0]['uri']:'');

				  $field_rii_image_link_url = (isset($field_related_image_iteration['field_rii_image_link'])?$field_related_image_iteration['field_rii_image_link']['#items'][0]['url']:'');

				  $field_rii_image_link_label = (isset($field_related_image_iteration['field_rii_image_link'])?$field_related_image_iteration['field_rii_image_link']['#items'][0]['title']:'');

				  $field_rii_image_link_target = (isset($field_related_image_iteration['field_rii_image_link']['#items'][0]['attributes']['target'])?$field_related_image_iteration['field_rii_image_link']['#items'][0]['attributes']['target']:'_self');

				  $class = ((($related_image+1)%2 == 0)?'even':'odd');
				  if (strtolower($field_related_image_position) != 'right') {
					  $related_images_left .='
							<a target="'.$field_rii_image_link_target.'" href="'.$field_rii_image_link_url.'">
								<img src="'.file_create_url($field_rii_image).'" title="'.$field_rii_image_link_label.'" alt="'.$field_rii_image_link_label.'">
							</a>
					  ';
				  }
				  else {
					  $related_images_right .='
							<a href="'.$field_rii_image_link_url.'" target="'.$field_rii_image_link_target.'">
								<img class="featured" src="'.file_create_url($field_rii_image).'" alt="'.$field_rii_image_link_label.'" border="0" width="180" style="margin-bottom: 30px;">
							</a>
					  ';
				  }
				}
			}
			$related_image_link_tag = '';
			if ($field_related_image_link_url != '') {
				$related_image_link_tag = '<p><a href="'.$field_related_image_link_url.'" class="cta uppercase" target="'.$field_related_image_link_target.'">'.$field_related_image_link_label.'</a></p>';
			}
			if (strtolower($field_related_image_position) != 'right') {
				$related_images_left .='
						</section>
						'.$related_image_link_tag.'
					</div>
				</div>';
			}
			else {
				$related_images_right .='
						</section>
						'.$related_image_link_tag.'
					</div>
				</div>
				';		
			}
		}
	}
  }

  /** Black Box Section **/
  $field_black_box_section_value = $content['field_black_box_section']['#items'][0]['value'];
  $field_black_box_section = $content['field_black_box_section'][0]['entity']['field_collection_item'][$field_black_box_section_value];

  $field_black_box_title = (isset($field_black_box_section['field_black_box_title'])?$field_black_box_section['field_black_box_title']['#items'][0]['value']:'');
  $field_black_box_title_2 = (isset($field_black_box_section['field_black_box_title_2'])?$field_black_box_section['field_black_box_title_2']['#items'][0]['value']:'');

  $field_black_box_description = (isset($field_black_box_section['field_black_box_description'])?$field_black_box_section['field_black_box_description']['#items'][0]['value']:'');

  $field_black_box_more_link = (isset($field_black_box_section['field_black_box_more_link'])?$field_black_box_section['field_black_box_more_link']['#items'][0]['value']:'');

  $field_add_spread_the_word_block = (isset($field_black_box_section['field_add_spread_the_word_block'])?$field_black_box_section['field_add_spread_the_word_block']['#items'][0]['value']:'');
  
?>
	<div class="showcaseMain layoutWide">
		<div id="colMain">
			<div class="videoFrame">
				<iframe src="http://player.theplatform.com/p/OyMl-B/oIChOKSBFJ6b/select/<?php echo $field_video_id;?>" width="688" height="387" frameborder="0" scrolling="no"></iframe>
			</div>
			<?php if ($field_transcript_title != '' || $field_transcript_description != '') { ?>
			<div class="mod full caption clearfix">
				<h1><?php echo $field_transcript_title; ?></h1>	
				<?php if ($field_transcript_more_link != 0) { ?>
				<h2><span class="Tpane_desc" style="height:50px"><?php echo $field_transcript_description; ?></span></h2><a class="Tpane_desc_more atmore" href="javascript:;" onclick="TDesc('Tpane_desc', 'less', 50, '');">More</a><a class="Tpane_desc_less atmore" href="javascript:;" onclick="TDesc('Tpane_desc', 'more', 50, '');">Less</a>
				<?php 
				}
				else {
				?>
				<h2><?php echo $field_transcript_description; ?></h2>
				<?php } ?>
			</div>
			<?php 
			}
			if (isset($node->field_issues_banner[LANGUAGE_NONE])) {
			?>
			<div class="svu-nomore-im">
				<?php
					if (isset($node->field_issues_banner_link[LANGUAGE_NONE])) {
				?>
				<a href="<?php echo $node->field_issues_banner_link[LANGUAGE_NONE][0]['url']; ?>" target="<?php echo $node->field_issues_banner_link[LANGUAGE_NONE][0]['attributes']['target']; ?>">
					<img src="<?php echo file_create_url($node->field_issues_banner[LANGUAGE_NONE][0]['uri']); ?>">
				</a>
				<?php 
				}
				else {
				?>
					<img src="<?php echo file_create_url($node->field_issues_banner[LANGUAGE_NONE][0]['uri']); ?>">
				<?php } ?>
			</div>
			<?php
			}
			if (isset($node->field_issues_take_action_title_1[LANGUAGE_NONE]) || isset($node->field_issues_take_action_title_2[LANGUAGE_NONE]) || isset($node->field_issues_take_action_list[LANGUAGE_NONE])) {
			?>
			<div class="takeActionFrame">
				<div class="takeActionHeader">
					<h2 class="blackhead small"><?php echo (isset($node->field_issues_take_action_title_1[LANGUAGE_NONE])?$node->field_issues_take_action_title_1[LANGUAGE_NONE][0]['value']:'');?> <strong><?php echo (isset($node->field_issues_take_action_title_2[LANGUAGE_NONE])?$node->field_issues_take_action_title_2[LANGUAGE_NONE][0]['value']:'');?></strong></h2>
				</div>
				<div class="takeActionSection">
					<ul>
						<?php
							$field_issues_take_action_list_count = count($node->field_issues_take_action_list[LANGUAGE_NONE]);
							if ($field_issues_take_action_list_count > 0) {
								for($take_action = 0; $take_action < $field_issues_take_action_list_count; $take_action++) {
						?>
							<li class="takeAction clearfix">
								<header><?php echo $node->field_issues_take_action_list[LANGUAGE_NONE][$take_action]['value']; ?></header>
							</li>
						<?php
								}
							}
						?>
					</ul>
				</div>
			</div>
			<?php
			}
			if (isset($node->field_issues_facts_title_1[LANGUAGE_NONE]) || isset($node->field_issues_facts_title_2[LANGUAGE_NONE]) || isset($node->field_issues_facts_list[LANGUAGE_NONE])) {			
			?>
			<div class="resourcesAndFactsFrame">
				<div class="resourcesAndFactsHeader">
					<h2 class="blackhead small"><?php echo (isset($node->field_issues_facts_title_1[LANGUAGE_NONE])?$node->field_issues_facts_title_1[LANGUAGE_NONE][0]['value']:'');?> <strong><?php echo (isset($node->field_issues_facts_title_2[LANGUAGE_NONE])?$node->field_issues_facts_title_2[LANGUAGE_NONE][0]['value']:'');?></strong></h2>
				</div>
				<div class="theFactsSection">
					<ul>
						<?php
							$field_issues_facts_list_count = count($node->field_issues_facts_list[LANGUAGE_NONE]);
							if ($field_issues_facts_list_count > 0) {
								for($facts_list = 0; $facts_list < $field_issues_facts_list_count; $facts_list++) {
						?>					
						<li>
							<?php echo $node->field_issues_facts_list[LANGUAGE_NONE][$facts_list]['value']; ?>
						</li>
						<?php
								}
							}
						?>
					</ul>
				</div>
			</div>
			<?php
			}
			if ($related_videos_left != '') {
				echo $related_videos_left;
			}
			if ($related_images_left != '') {
				echo $related_images_left;
			}
			?>
			<div class="clear"></div>
			<?php if ($region['facebook_discussion']): ?>
				<div class="social">
					<?php print render($region['facebook_discussion']); ?>
				</div>
			<?php endif; ?>			
		</div>
		<!-- initiativesLeft end -->
		<div id="colSide">
			<?php if ($field_black_box_title != '' || $field_black_box_title_2 != '' || $field_black_box_description != '') { ?>
			<div class="mod solid">
				<?php if ($field_black_box_title != '' || $field_black_box_title_2 != '') { ?>
				<h2 class="title"><?php echo $field_black_box_title; ?> <br/><small><?php echo $field_black_box_title_2; ?></small></h2>
				<?php } ?>
				<?php 
				if ($field_black_box_more_link != 0) {
					echo '<span class="blackpane_desc" style="height:250px">'.$field_black_box_description.'</span><a class="blackpane_desc_more amore" href="javascript:;" onclick="LeftDesc(\'blackpane_desc\', \'less\', 250, \'\');">More</a><a class="blackpane_desc_less amore" href="javascript:;" onclick="LeftDesc(\'blackpane_desc\', \'more\', 250, \'\');">Less</a>';
				}
				else {
					echo $field_black_box_description;
				}
				?>
				<?php if ($region['spread_the_word']): ?>
					<?php print render($region['spread_the_word']); ?>
				<?php endif; ?>					
			</div>
			<?php
			  }
			  if ($related_videos_right != '') {
				echo $related_videos_right;
			  }
			  if ($related_images_right != '') {
				echo $related_images_right;
			  }			  
			?>
		</div>
		<!-- initiativesRight end -->
	</div>
	<!-- showcaseMain end -->