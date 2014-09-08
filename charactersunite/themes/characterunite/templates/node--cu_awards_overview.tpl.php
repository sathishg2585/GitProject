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

$media_file_path = variable_get('media_file_path', NULL);

?>
                <!-- initiativesHeader end -->
                <div class="initiativeMain layoutWide">
                    <!--<div class="initiativeLeft">-->
                    <div id="colMain">

                        <div class="videoFrame">
                            <iframe src="http://player.theplatform.com/p/OyMl-B/oIChOKSBFJ6b/select/<?php echo $node->field_awards_overview_video[LANGUAGE_NONE][0]['value']; ?>" width="688" height="387" frameborder="0" scrolling="no"></iframe>
                        </div>
                        <div class="mod full caption clearfix">
                            <h1><?php echo $node->field_ao_video_info_title[LANGUAGE_NONE][0]['value']; ?></h1>						
								<?php 
									if ( isset($node->field_ao_video_info_desc[LANGUAGE_NONE]) ) { 
										if ( isset($node->field_ao_video_info_desc_more[LANGUAGE_NONE]) && $node->field_ao_video_info_desc_more[LANGUAGE_NONE][0]['value'] == 1 ) {
											$string = strip_tags($node->field_ao_video_info_desc[LANGUAGE_NONE][0]['safe_value']);
											if (strlen($string) > 100) {
												$string1 = '<h2 class="infomoreh2">'. $node->field_ao_video_info_desc[LANGUAGE_NONE][0]['safe_value'] .' </h2><span style="display: none;" class="infomore"></span>';
												
											}
											echo $string1;
										}
										else {
											echo ($node->field_ao_video_info_desc[LANGUAGE_NONE][0]['value']);
										}
									} 
								?>
                        </div>
                        <div class="mod-article">
                            <?php echo $node->body[LANGUAGE_NONE][0]['value']; ?>
                            <?php echo render($region['spread_the_word']); ?>
                        </div>
						<?php print render($region['facebook_discussion']); ?>
                    </div>

                    <div id="colSide">
                        <div class="mod">
                            <div class="mainstageHeader">
                                <h2 class="blackhead blackheadsmall">
									<?php echo $node->field_ao_right_grey_title_1[LANGUAGE_NONE][0]['value']; ?> 
									<strong><?php echo $node->field_ao_right_grey_title_2[LANGUAGE_NONE][0]['value']; ?></strong>
								</h2>
                            </div>
                            <div class="initiativeRightBody copy">
                                <p><?php echo $node->field_ao_right_desc[LANGUAGE_NONE][0]['value']; ?></p>
                            </div>
                        </div>

                    </div>
                    <!-- initiativeRight end -->
                </div>
                <!-- initiativeMain end -->