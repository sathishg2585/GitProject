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
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
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

$video = $video_title = $video_info = $section_title = $section_title_2 = $section_body = $section_link_label = $section_link_url = $section_background_color = $section_file = $section_image_file = $section_image_title = $section_image_desc = $section_image_href_label = $section_image_href = $section_video_thumbnail = $section_video_title = $section_video_desc = $section_video_href_label = $section_video_href = $section_place = $left_pane = $right_pane = "";

if (isset($content['field_media_sections'])) {
	$sec_count = count($content['field_media_sections']['#items']);

	if ($sec_count != 0) {
		for($i=0;$i<$sec_count;$i++) {

			$sec_value = $section_place = $section_place_id = $section_background_color = $section_background_color_id = $section_title = $section_title_2 = $section_body = $section_link_label = $section_link_url = $section_file = $img_count = $img_value = $section_image_file = $section_image_title = $section_image_desc = $section_image_href_label = $section_image_href = $video_count = $video_value = $section_video_thumbnail = $section_video_title = $section_video_desc = $section_video_href_label = $section_video_href = $left_pane_title = "";

			$sec_value = $content['field_media_sections']['#items'][$i]['value'];

			if (isset($content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_section_place']['#items']) && count($content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_section_place']['#items']) != 0) {
				$section_place = $content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_section_place']['#items'][0]['taxonomy_term']->name;
				$section_place_id = $content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_section_place']['#items'][0]['taxonomy_term']->vid;
			}
			if (isset($content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_section_color']['#items']) && count($content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_section_color']['#items']) > 0) {
				$section_background_color = $content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_section_color']['#items'][0]['taxonomy_term']->name;
				$section_background_color_id = $content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_section_color']['#items'][0]['taxonomy_term']->vid;
			}
			
			if ($section_place == 'Left' || $section_place == '') {
				$left_pane .= '
								<div class="mod full iswfv clear clear">		
				';
				if ( (isset($content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_section_title']['#items']) && count($content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_section_title']['#items']) > 0) || (isset($content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_section_title_2']['#items']) && count($content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_section_title_2']['#items']) > 0) ) {
					$left_pane_title = '
									<div class="mainstageHeader">
										<h2 class="blackhead blackheadsmall">		
					';
				}
			} else {
				if ($section_background_color == 'Grey') {
					$right_pane .= ' <div class="mod solid">';
				
				} else {
					$right_pane .= ' <div class="mod">';
				}
			}
			if (isset($content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_section_title']['#items']) && count($content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_section_title']['#items']) > 0) {
				$section_title = $content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_section_title']['#items'][0]['value'];
				if ($section_place == 'Left' || $section_place == '') {
					if ($section_title != '')
						$left_pane_title .= $section_title;
				} else {
					if ($section_background_color == 'Grey') {
						$right_pane .= '<h2 class="title">'.$section_title.'</h2>';
					
					} else {
						$right_pane .= '<div class="mainstageHeader">
											<h2 class="blackhead blackheadsmall"><strong>'.$section_title.'</strong></h2>
										</div>';
					}
				}
			}
			if (isset($content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_section_title_2']['#items']) && count($content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_section_title_2']['#items']) > 0) {
				$section_title_2 = $content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_section_title_2']['#items'][0]['value'];
				if ($section_place == 'Left' || $section_place == '') {
					if ($section_title_2 != '')
						$left_pane_title .= '<strong>'.$section_title_2.'</strong>';
				} else {
					if ($section_background_color == 'Grey') {
						$right_pane .= '<h2 class="title">'.$section_title_2.'</h2>';
					
					} else {
						$right_pane .= '<div class="mainstageHeader">
											<h2 class="blackhead blackheadsmall"><strong>'.$section_title_2.'</strong></h2>
										</div>';
					}
				}
			}

			if ($section_place == 'Left' || $section_place == '') {
				if ($section_title != '' || $section_title_2 != '') {
					$left_pane_title .= '		</h2>
							</div>';
				}
				$left_pane .= '<section class="copy clearfix">';		
			}

			if (isset($content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_section_body']['#items']) && count($content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_section_body']['#items']) > 0) {
				$section_body = $content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_section_body']['#items'][0]['value'];
				
				if ($section_place == 'Left' || $section_place == '') {
					$left_pane .= '<div style="float:left;width:100%">'.$section_body.'</div>';
				} else {
					if ($section_background_color == 'Grey') {
						$right_pane .= '<div style="float:left;width:100%"><p>'.$section_body.'</p></div>';
					
					} else {
						$right_pane .= '<div class="initiativeRightBody copy"><div style="float:left;width:100%">'.$section_body.'</div>';
					}
				}			
			}

			if (isset($content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_section_file']['#items']) && count($content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_section_file']['#items']) > 0) {
				$section_file = $content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_section_file']['#items'][0]['filename'];

				if ($section_place == 'Left' || $section_place == '') {
					$left_pane .= '<div style="float:left;width:100%"><p>
									<a href="'.$section_file.'" target="_blank" class="cta uppercase">DOWNLOAD &raquo;</a>
								</p></div>';
				} else {
					$right_pane .= '<div style="float:left;width:100%"><p>
									<a href="'.$section_file.'" target="_blank" class="cta uppercase">DOWNLOAD &raquo;</a>
								</p></div>';
				}							
			}
			if (isset($content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_image_section']['#items']) && count($content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_image_section']['#items']) > 0) {
				$img_count = count($content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_image_section']['#items']);
				if ($section_place != 'Left' || $section_place != '') {
					//$right_pane .= '<div class="initiativeRightBody copy">';
				}
				for($j = 0; $j < $img_count; $j++)
				{
					$img_value = $content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_image_section']['#items'][$j]['value'];
					$section_image_file = $content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_image_section'][$j]['entity']['field_collection_item'][$img_value]['field_media_image_thumbnail']['#items'][0]['filename'];
					$section_image_title = $content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_image_section'][$j]['entity']['field_collection_item'][$img_value]['field_media_image_title']['#items'][0]['value'];
					$section_image_desc = $content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_image_section'][$j]['entity']['field_collection_item'][$img_value]['field_media_image_desc']['#items'][0]['value'];
					$section_image_href_label = $content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_image_section'][$j]['entity']['field_collection_item'][$img_value]['field_media_image_href']['#items'][0]['title'];
					$section_image_href = $content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_image_section'][$j]['entity']['field_collection_item'][$img_value]['field_media_image_href']['#items'][0]['display_url'];
					
					if ($section_place == 'Left' || $section_place == '') {
						$left_pane .= '<div class="relatedVideos clearfix ">
										<a href="'.$section_image_href.'" class="relatedVideosImage ">
											<img alt="'.$section_image_title.'" src="/sites/default/files/'.$section_image_file.'">
										</a>
										<div class="relatedVideosText ">
											<h2>'.$section_image_title.'</h2>
											<p>'.$section_image_desc.'</p>
											<a href="'.$section_image_href.'">'.$section_image_href_label.' &raquo;</a>
										</div>
									</div>';
					}
					if ($section_place == 'Right') {
						$right_pane .= '
									<section class="copy">
										<a id="'.$section_image_title.'" href="'.$section_image_href.'">
											<img class="featured" src="/sites/default/files/'.$section_image_file.'" alt="'.$section_image_title.'" border="0" />
										</a>
									</section>					
						';
					}
				}
				if ($section_place != 'Left' || $section_place != '') {
					//$right_pane .= '</div>';
				}
			}
			if (isset($content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_video_section']['#items']) && count($content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_video_section']['#items']) != 0) {

				$video_count = count($content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_video_section']['#items']);
				if ($section_place != 'Left' || $section_place != '') {
					$right_pane .= '<div class="mainstageVideos clearfix">';
				}
				for($j = 0; $j < $video_count; $j++)
				{
					
					$video_value = $content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_video_section']['#items'][$j]['value'];
					$section_video_thumbnail = $content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_video_section'][$j]['entity']['field_collection_item'][$video_value]['field_media_video_thumbnail']['#items'][0]['filename'];
					$section_video_title = $content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_video_section'][$j]['entity']['field_collection_item'][$video_value]['field_media_video_title']['#items'][0]['value'];
					$section_video_desc = $content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_video_section'][$j]['entity']['field_collection_item'][$video_value]['field_media_video_desc']['#items'][0]['value'];
					$section_video_href_label = $content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_video_section'][$j]['entity']['field_collection_item'][$video_value]['field_media_video_href']['#items'][0]['title'];
					$section_video_href = $content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_video_section'][$j]['entity']['field_collection_item'][$video_value]['field_media_video_href']['#items'][0]['display_url'];

					if ($section_place == 'Left' || $section_place == '') {
						$left_pane .= '<div class="relatedVideos clearfix ">
										<a href="'.$section_video_href.'" class="relatedVideosImage ">
											<img alt="'.$section_video_title.'" src="/sites/default/files/'.$section_video_thumbnail.'">
											<div class="playButton25 "></div>
										</a>
										<div class="relatedVideosText ">
											<h2>'.$section_video_title.'</h2>
											<p>'.$section_video_desc.'</p>
											<a href="'.$section_video_href.'">'.$section_video_href_label.' &raquo;</a>
										</div>
									</div>';
					} else {
						$right_pane .= '<a class="mainstageShowcasesPhotos" href="'.$section_video_href.'">
											<img class="photoThumb" src="'.$section_video_thumbnail.'" alt="Title">
										</a>';
					}
				}
				if ($section_place != 'Left' || $section_place != '') {
					$right_pane .= '</div>';
				}			
			}
			if (isset($content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_section_link']['#items']) && count($content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_section_link']['#items']) > 0) {
				$section_link_label = $content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_section_link']['#items'][0]['title'];
				$section_link_url = $content['field_media_sections'][$i]['entity']['field_collection_item'][$sec_value]['field_media_section_link']['#items'][0]['url'];

				if ($section_place == 'Left' || $section_place == '') {
					$left_pane .= '<div style="float:left;width:100%"><p>
										<a href="'.$section_link_url.'" class="uppercase ">'.$section_link_label.' &raquo;</a>
									</p>
									</div>';
				} else {
					$right_pane .= '<div style="float:left;width:100%"><p>
										<a href="'.$section_link_url.'" class="cta uppercase">'.$section_link_label.' &raquo;</a>
									</p></div>';
				}							
			}
			if ($section_place == 'Left' || $section_place == '') {
				$left_pane .= '
								</section>
							</div>			
				';
			} else {
				if ($section_background_color == 'Grey') {
					$right_pane .= ' </div>';
				
				} else {
					$right_pane .= ' </div>';
				}
			}		
		}
	}//$left_pane = "";
}
?>	
			<div class="initiatives">
				<div class="initiativesHeader">
					<?php if ($title): ?>
						<div class="initTitle"><?php print $title; ?></div>
					<?php endif; ?>		
					<div class="wrapper clearfix" id="subnav-container">
						<div class="subnav">
							<?php /* if ($tabs): ?>
								<div class="tabs">
									<?php print render($tabs); ?>
								</div>
							<?php endif; */ ?>
							<?php /*print render($page['content_tab']); */ ?>
						</div>
					</div>
				</div>
				<div class="initiativeMain layoutWide">
					<div id="colMain">
						<?php 
						if (isset($node->field_media_video[LANGUAGE_NONE][0]['value'])) {
						?>					
						<div class="videoFrame">
							<?php
								//echo '<iframe src="http://player.theplatform.com/p/OyMl-B/oIChOKSBFJ6b/select/'.$node->field_media_video[LANGUAGE_NONE][0]['value'].'#playerurl=http%3A%2F%2Fstage.charactersunite.com%2Finitiatives%2Fi-wont-stand-for%2Foverview" width="688" height="387" frameborder="0" scrolling="no"></iframe>';
							?>
						</div>
						<?php 
						}
						if (isset($node->field_media_video_info[LANGUAGE_NONE][0]['value'])) {
						?>
						<div class="mod full caption clearfix">
							<h1><?php echo $node->field_media_video_info_title[LANGUAGE_NONE][0]['value'];?></h1>
							<span class="more"><p><?php echo $node->field_media_video_info[LANGUAGE_NONE][0]['value'];?></p>
							</span>
						</div>
						<?php
						}
						?>
						<!-- <div class="mod full iswfv clear clear">
							<div class="mainstageHeader">
								<h2 class="blackhead blackheadsmall">“I Won’t Stand For&hellip;” <strong>Videos</strong></h2>
							</div>
							<section class="copy clearfix">
								Top musicians, movie and television stars, athletes, political leaders and others across the country have joined the movement to combat hate and discrimination.																
								<p><a href="initiatives/i-wont-stand-for/videos"" class="uppercase">Watch Videos &raquo;</a></p>
								<div class="relatedVideos clearfix">
									<a href="initiatives/i-wont-stand-for/videos/dule-hill" class="relatedVideosImage">
										<img alt="Dule Hill" src="img/video_Dule_Hill-tn.jpg">
										<div class="playButton25"></div>
									</a>
									<div class="relatedVideosText">
										<h2>Dule Hill</h2>
										<p>Psych</p>
										<a href="initiatives/i-wont-stand-for/videos/dule-hill">Watch now &raquo;</a>
									</div>
								</div>
								<div class="relatedVideos clearfix">
									<a href="initiatives/i-wont-stand-for/videos/big-show" class="relatedVideosImage">
										<img alt="Big Show" src="img/video_Big_Show-tn.jpg">
										<div class="playButton25"></div>
									</a>
									<div class="relatedVideosText">
										<h2>Big Show</h2>
										<p>WWE</p>
										<a href="initiatives/i-wont-stand-for/videos/big-show">Watch now &raquo;</a>
									</div>
								</div>
								<div class="relatedVideos clearfix">
									<a href="initiatives/i-wont-stand-for/videos/ariel-winter" class="relatedVideosImage">
										<img alt="Ariel Winter" src="img/video_Ariel_Winter-tn.jpg">
										<div class="playButton25"></div>
									</a>
									<div class="relatedVideosText">
										<h2>Ariel Winter</h2>
										<p>Modern Family</p>
										<a href="initiatives/i-wont-stand-for/videos/ariel-winter">Watch now &raquo;</a>
									</div>
								</div>
							</section>
						</div> -->
						<?php echo $left_pane; ?>
					</div>
					<div id="colSide">
						<!-- <div class="mod solid">
							<h2 class="title">I Won&rsquo;t Stand For&hellip;</h2>
							<p>Each of us, whoever we are, wherever we live, can do something to fight intolerance and hate. All we have to do is say, simply, I won't stand for it!</p>
							<p>The "I Won't Stand For&hellip;" movement is about sending a message to the world that no one should stand idly by in the face of racism, bullying, religious intolerance, sexism, homophobia, ableism, or any other form of discrimination.</p>
							<span class="more">
								<p>The PSA campaign features top musicians, movie and television stars, athletes, political leaders and people from across the country, from all walks of life, sending the message that they won't stand idly by in the face of hate & discrimination.</p>
								<p>Join the movement! Share what you won't stand for by customizing your own "I Won't Stand For&hellip;" photo at join.charactersunite.com and spread the message to your family and friends.</p>
							</span>
							<aside class="share">
								<h1>Spread the word</h1>
								<ul>
									<li><a href="mailto:?Subject=Characters Unite%20-%20I Won&rsquo;t Stand For&hellip;&Body=http://stage.charactersunite.com/initiatives/i-wont-stand-for/overview" class="share email">Email</a></li>
									<li><a href="http://facebook.com/sharer.php?u=http://stage.charactersunite.com/initiatives/i-wont-stand-for/overview" class="share fb">Facebook</a></li>
									<li><a href="http://twitter.com/intent/tweet?text=Characters Unite%20-%20I Won&rsquo;t Stand For&hellip;&url=http://stage.charactersunite.com/initiatives/i-wont-stand-for/overview" class="share tw">Twitter</a></li>
								</ul>
							</aside>
						</div>
						<div class="mod">
						   <div class="mainstageHeader">
							  <h2 class="blackhead blackheadsmall"><strong>Photos</strong></h2>
						   </div>
						   <div class="initiativeRightBody copy">
							  <section class="copy"><a id="kiosk-photos" href="http://join.charactersunite.com"><img class="featured" src="img/kiosk.jpg" alt="Kiosk Photos" border="0" /></a></section>
							  </p>
							  <p><a href="http://join.charactersunite.com" class="cta uppercase">Click here to see the faces of the movement &raquo;</a></p>
						   </div>
						</div> -->
						<?php echo $right_pane; ?>
					</div>
				</div>
			</div>