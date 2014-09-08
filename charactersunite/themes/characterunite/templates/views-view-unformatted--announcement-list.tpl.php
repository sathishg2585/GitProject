<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */

?>
	
			<div class="initiatives">
				<!-- <div class="initiativesHeader layoutWide bio-list">
					<div class="initTitle">Announcement</div>
				</div> -->
				<div class="showcaseMain">			
                    <div id="colMain">
						<?php
							foreach ($rows as $id => $row) {
								//if ($id == 'field_announcement_title') {
						?>
							<article class="announcement_list_article">
								<?php print $row; ?>
							</article>
						<?php
							}
						?>
                    </div>
                    <!-- initiativesLeft end -->
                    <div id="colSide">
                    </div>
                    <!-- initiativesRight end -->
                </div>
			</div>