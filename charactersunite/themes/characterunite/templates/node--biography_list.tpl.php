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
  
  /** Bio List Section **/
  $bio_list = '';
  $field_biography_list_section_count = count($content['field_biography_list_section']['#items']);
  for ($biography_list=0;$biography_list<$field_biography_list_section_count;$biography_list++) {
    $field_biography_list_section_value = $content['field_biography_list_section']['#items'][$biography_list]['value'];
	$field_biography_list_section = $content['field_biography_list_section'][$biography_list]['entity']['field_collection_item'][$field_biography_list_section_value];
	$field_bl_category_title = (isset($field_biography_list_section['field_bl_category_title'])?$field_biography_list_section['field_bl_category_title']['#items'][0]['value']:'');
	
	if ($field_bl_category_title != '') {
		$bio_list = '<section><h3>'.$field_bl_category_title.'</h3>';
	}
	if (isset($field_biography_list_section['field_bl_section']['#items'])) {
		$field_bl_section_count = count($field_biography_list_section['field_bl_section']['#items']);
		for ($bl_section=0;$bl_section<$field_bl_section_count;$bl_section++) {
			$link = '';
			$field_bl_section_value = $field_biography_list_section['field_bl_section']['#items'][$bl_section]['value'];
			$field_bl_section = $field_biography_list_section['field_bl_section'][$bl_section]['entity']['field_collection_item'][$field_bl_section_value];

			$field_bl_section_title = (isset($field_bl_section['field_bl_section_title'])?$field_bl_section['field_bl_section_title']['#items'][0]['value']:'');
			$field_bl_section_title_2 = (isset($field_bl_section['field_bl_section_title_2'])?$field_bl_section['field_bl_section_title_2']['#items'][0]['value']:'');
			$field_field_bl_section_info = (isset($field_bl_section['field_field_bl_section_info'])?$field_bl_section['field_field_bl_section_info']['#items'][0]['value']:'');
			$field_bl_section_description = (isset($field_bl_section['field_bl_section_description'])?$field_bl_section['field_bl_section_description']['#items'][0]['value']:'');
			$field_bl_section_thumbnail = (isset($field_bl_section['field_bl_section_thumbnail'])?$field_bl_section['field_bl_section_thumbnail']['#items'][0]['uri']:'');
			$field_bl_section_link_url = (isset($field_bl_section['field_bl_section_link'])?$field_bl_section['field_bl_section_link']['#items'][0]['url']:'');
			$field_bl_section_link_title = (isset($field_bl_section['field_bl_section_link'])?$field_bl_section['field_bl_section_link']['#items'][0]['title']:'');
			$field_bl_section_link_target = (isset($field_bl_section['field_bl_section_link']['#items'][0]['attributes']['target'])?$field_bl_section['field_bl_section_link']['#items'][0]['attributes']['target']:'');
			
			$bio_list .= '<article>';

			if ($field_bl_section_thumbnail != '') {
				$class = (($field_field_bl_section_info == '')?'partners-list':'featured');
				$bio_list .= '<img class="'.$class.'" src="'.file_create_url($field_bl_section_thumbnail).'" alt="'.$field_bl_section_title.'" />';
			}

			$bio_list .= '<section>';

			if ($field_bl_section_link_url != '') {
				$bio_list .= '<h2><a class="uppercase" href="'.$field_bl_section_link_url.'" target="'.$field_bl_section_link_target.'">'.$field_bl_section_title.'</a></h2>';
				$link = '<a class="uppercase" href="'.$field_bl_section_link_url.'" target="'.$field_bl_section_link_target.'">'.$field_bl_section_link_title.'</a>';
			}
			else {
				$bio_list .= '<h2>'.$field_bl_section_title.'</h2>';
			}
			if ($field_bl_section_title_2 != '') {
				$bio_list .= '<p><strong>'.$field_bl_section_title_2.'</strong>';
			}
			if ($field_field_bl_section_info != '') {
				$bio_list .= '<p>'.$field_field_bl_section_info.'</p>';
			}
			if ($field_bl_section_description != '') {
				if (strlen($field_bl_section_description) > 350) {
					$bio_list .= '<span class="'.$bl_section.'leftpane_desc" style="height:0px">'.$field_bl_section_description.'<br/><p>'.$link.'</p></span><a class="'.$bl_section.'leftpane_desc_more amore'.$bl_section.'" href="javascript:;" onclick="LeftDesc(\''.$bl_section.'leftpane_desc\', \'less\', 0, '.$bl_section.');">More</a><a class="'.$bl_section.'leftpane_desc_less amore'.$bl_section.'" href="javascript:;" onclick="LeftDesc(\''.$bl_section.'leftpane_desc\', \'more\', 0, '.$bl_section.');">Less</a>';
				}
				else {
					$bio_list .= $field_bl_section_description.'<br/>';
				}
			}
			$bio_list .= '<p>'.$link.'</p>';
			$bio_list .= '</section></article>';
		}
	}
	if ($field_bl_category_title != '') {
		$bio_list .= '</section>';
	}
  }
  
?>
	<div class="initiativeMain bio-list">
		<div id="colMain">
			<?php echo $bio_list; ?>
		</div>
		<!-- initiativeLeft end -->
		<div id="colSide">
		</div>
		<!-- initiativeRight end -->
	</div>
	<!-- initiativeMain end -->