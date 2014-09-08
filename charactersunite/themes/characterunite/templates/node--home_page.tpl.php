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
	<div id="homescroll-container">
		<!-- "previous page" action -->
		<a class="prev browse left"></a>
		<!-- root element for scrollable -->
		<div class="scrollable" id="homescroll">
			<!-- root element for the items -->
			<div class="items">
			<?php
				if (isset($content['field_home_scroll_section'])) {
					$field_home_scroll_section_count = count($content['field_home_scroll_section']['#items']);
					for ($home_scroll=0;$home_scroll<$field_home_scroll_section_count;$home_scroll++) {
						$field_home_scroll_section_value = $content['field_home_scroll_section']['#items'][$home_scroll]['value'];
						$field_home_scroll_section = $content['field_home_scroll_section'][$home_scroll]['entity']['field_collection_item'][$field_home_scroll_section_value];

						$field_home_scroll_image = (isset($field_home_scroll_section['field_home_scroll_image'])?'<img src="'.file_create_url($field_home_scroll_section['field_home_scroll_image']['#items'][0]['uri']).'" />':'');
						$field_home_scroll_title = (isset($field_home_scroll_section['field_home_scroll_title'])?$field_home_scroll_section['field_home_scroll_title']['#items'][0]['value']:'');
						$field_home_scroll_info = (isset($field_home_scroll_section['field_home_scroll_info'])?$field_home_scroll_section['field_home_scroll_info']['#items'][0]['value']:'');
						$field_home_scroll_link_label = (isset($field_home_scroll_section['field_home_scroll_link'])?$field_home_scroll_section['field_home_scroll_link']['#items'][0]['title']:'');
						$field_home_scroll_link = (isset($field_home_scroll_section['field_home_scroll_link'])?'<a href="'.$field_home_scroll_section['field_home_scroll_link']['#items'][0]['url'].'" >'.$field_home_scroll_link_label.'</a>':'');
			?>
						<div class="hsitem">
							<div class="hsfadeimg">
								<div class="hscontent">
									<h2><?php echo $field_home_scroll_title; ?></h2>
									<?php 
										if($field_home_scroll_info != strip_tags($field_home_scroll_info))
											echo trim($field_home_scroll_info);
										else
											echo "<p>".trim($field_home_scroll_info)."</p>";
									?>
									<?php echo $field_home_scroll_link; ?>
								</div>
								<?php echo $field_home_scroll_image; ?>
							</div>
						</div>
			<?php
					}
				}
			?>
			</div>
		</div>
		<!-- "next page" action -->
		<a class="next browse right"></a>
	</div>

	<?php
		if (isset($content['field_home_image_section'])) {
			$field_home_image_section_count = count($content['field_home_image_section']['#items']);
			for ($home_image=0;$home_image<$field_home_image_section_count;$home_image++) {
				$field_home_image_section_value = $content['field_home_image_section']['#items'][$home_image]['value'];
				$field_home_image_section = $content['field_home_image_section'][$home_image]['entity']['field_collection_item'][$field_home_image_section_value];

				$field_home_image_file = (isset($field_home_image_section['field_home_image_file'])?'<img src="'.file_create_url($field_home_image_section['field_home_image_file']['#items'][0]['uri']).'" />':'');
				$field_home_image_title = (isset($field_home_image_section['field_home_image_title'])?$field_home_image_section['field_home_image_title']['#items'][0]['value']:'');
				$field_home_image_info = (isset($field_home_image_section['field_home_image_info'])?$field_home_image_section['field_home_image_info']['#items'][0]['value']:'');
				$field_home_image_link_label = (isset($field_home_image_section['field_home_image_link'])?$field_home_image_section['field_home_image_link']['#items'][0]['title']:'');
				$field_home_image_link = (isset($field_home_image_section['field_home_image_link'])?'<a href="'.$field_home_image_section['field_home_image_link']['#items'][0]['url'].'" >'.$field_home_image_link_label.'</a>':'');
	?>
				<div class="section">
					<div class="sectionText">
						<h2><?php echo $field_home_image_title; ?></h2>
						<span class="home_image_section">
							<?php echo $field_home_image_info; ?>
							<?php echo $field_home_image_link; ?>
						</span>
					</div>
					<?php echo $field_home_image_file; ?>
				</div>
	<?php
			}
		}
	?>			