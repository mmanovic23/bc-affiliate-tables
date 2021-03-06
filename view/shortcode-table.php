<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( !function_exists( 'at_output_table' ) ) {

	function at_output_table($id){


		if ( have_rows('table_settings', $id) ){
			while( have_rows('table_settings', $id) ){

            the_row();

		    $sign_up_text                   = get_sub_field('sign_up_text');
		    $our_score_text                 = get_sub_field('our_score_text');
            $go_to_text                     = get_sub_field('go_to_text');
            $create_your_account_text       = get_sub_field('create_your_account_text');
            $read_the_full_review_text      = get_sub_field('read_the_full_review_text');
            $review_text                    = get_sub_field('review_text');
            $tc_apply                       = get_sub_field('tc_apply');
            $show_text                      = get_sub_field('show_text');
            $hide_text                      = get_sub_field('hide_text');
            $columnOneHeader                = get_sub_field('column_1_header_title');
            $columnTwoHeader                = get_sub_field('column_2_header_title');
            $columnThreeHeader              = get_sub_field('column_3_header_title');
            $columnFourHeader               = get_sub_field('column_4_header_title');
            $tableHeaderBgColor             = get_sub_field('table_header_background_color');
            $tableHeaderTextColor           = get_sub_field('table_header_text_color');
            $sortByText                     = get_sub_field('sort_by_text');
            $starsText                      = get_sub_field('stars_text');
            $scoreText                      = get_sub_field('score_text');

            }
        }


		if( have_rows('comparison_affiliate_table', $id) ): ?>

		<?php
            $i = 1;
            $fields = get_field('comparison_affiliate_table', $id);
            $includeStarSort = false;
            $includeScoreSort = false;
            foreach ($fields as $row){
                if($includeStarSort == false){
	                $includeStarSort = $row['include_star_rating'] == 'yes' ? true : false;
                }
                if($includeScoreSort == false){
		            $includeScoreSort = $row['include_our_score'] == 'yes' ? true : false;
                }
            }
        ?>

        <?php if($includeStarSort == true || $includeScoreSort == true ): ?>
        <!-- sorting-header -->
        <div class="at-table-sorting">
            <strong><?php echo $sortByText; ?>:</strong>
            <?php if($includeStarSort == true): ?>
            <div class="sort-stars" data-sort-value="sort-stars"><?php echo $starsText; ?></div>
            <?php endif; ?>
			<?php if($includeScoreSort == true): ?>
            <div class="sort-score" data-sort-value="sort-score"><?php echo $scoreText; ?></div>
			<?php endif; ?>
        </div>
        <?php endif; ?>

        <!-- bet-table-header -->
        <div class="bet-table-head" style="background-color: <?php echo $tableHeaderBgColor; ?>; color: <?php echo $tableHeaderTextColor; ?>">
            <div class="header-one"><?php echo $columnOneHeader; ?></div>
            <div class="header-two"><?php echo $columnTwoHeader; ?></div>
            <div class="header-three"><?php echo $columnThreeHeader; ?></div>
            <div class="header-four"><?php echo $columnFourHeader ?></div>
        </div>

	    <!-- bet-table -->
		<div class="bet-table">

	    <?php while( have_rows('comparison_affiliate_table', $id) ): the_row(); ?>

            <?php if( get_sub_field('hide_this_row_in_the_table') == 'no' ): ?>
			<div class="item-holder" data-orig="<?php echo $i; ?>">
				<div class="item">

					<!-- logo -->
					<div class="col-logo">
						<div class="logo-link-wrapper">

							<?php if( get_sub_field('put_a_ribbon_on_this_table_row') == 'yes' ): ?>
                            <!-- ribbon -->
                            <div class="tag-ribbon" style="color:<?php the_sub_field('ribbon_color'); ?>">
                            <div class="inner"><?php the_sub_field('ribbon_text'); ?></div>
                                <svg class="corner-right" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 5.5 25" preserveAspectRatio="none">
                                    <polygon fill="currentColor" points="5.5,25 0.1,25 0,0 5.5,0 0.5,12.5 "></polygon>
                                </svg>
                            </div>
							<?php endif; ?>

							<a class="logo-link" href="<?php the_sub_field('cta_affiliate_link'); ?>" rel="nofollow" target="_blank">					
								<div class="logo-box" style="background-color:<?php the_sub_field('brand_logo_background'); ?>">

									<?php $image = get_sub_field('brand_logo_image'); ?>

									<picture>
									<?php if( $image ) {
										echo wp_get_attachment_image( $image, 'medium', "", ["class" => "logo"]  );
									} else{ ?>
										<img class="logo" src="<?php echo AT_URL ?>build/images/placeholder-image.png"/>
									<?php }
									?>
									</picture>

								</div>
							</a>

							<?php if( get_sub_field('include_star_rating') == 'yes' ){ ?>
							<!-- Star Rating -->
							<span class="rating-bar">
								<span class="rating">
									<span class="rate" data-rateyo-rating="<?php the_sub_field('star_rating') ?>"></span>
								</span>
		                        <!-- <span class="rating-count">487 reviews</span> -->
		                    </span>
		                    <?php } else { ?>
                            <span class="rating-bar" style="display: none;">
								<span class="rating">
									<span class="rate" data-rateyo-rating="0"></span>
								</span>
                                    <!-- <span class="rating-count">487 reviews</span> -->
		                    </span>
                            <?php } ?>

						</div>
					</div>

					<!-- bonus -->
					<div class="col-bonus">
						<a href="<?php the_sub_field('cta_affiliate_link'); ?>" onclick="" rel="nofollow" target="_blank" class="bonus-link">
							<div class="bonus-main"><strong><?php the_sub_field('brand_offer_title'); ?></strong>
							</div>
						</a>
						
						<?php if( get_sub_field('include_our_score') == 'yes' ): ?>
							<!-- "Our Score" shows on mobile devices -->
							<div class="score-text"><?php echo $our_score_text; ?>: <span class="score-value"><?php the_sub_field('our_score'); ?></span></div>
						<?php endif; ?>

                        <?php if( get_sub_field('include_a_tc_popup_box_on_hover') == 'yes' ): ?>
						<!-- tooltip -->
						<div class="bonus-extra">
                            <?php echo $tc_apply; ?>
							<span class="icon-holder tooltipster-popover tooltipstered" data-tooltip-content="#tooltipster-popover_content-<?php echo $id . '_' . $i ?>">
								<svg class="icon icon-question" width="1em" height="1em">
									<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo AT_URL ?>build/images/svg-symbols.svg#question" width="100%" height="100%"></use>
								</svg>
							</span>

							<!-- popover -->
							<div class="tooltipster-popover_templates">
		                        <span id="tooltipster-popover_content-<?php echo $id . '_' . $i ?>">
									<button type="button" class="close" aria-label="Close">
										<span aria-hidden="true">×</span>
		                            </button>
		                            <strong class="title"><?php the_sub_field('tc_popup_title'); ?></strong>
		                            <p class="tp-content"><?php the_sub_field('tc_popup_content'); ?></p>
		                            <a href="<?php the_sub_field('tc_link'); ?>" onclick="" <?php if( get_sub_field('tc_link_include_nofollow') == 'yes' ): ?>rel="nofollow"<?php endif; ?> target="_blank" role="button" class="at-btn at-btn-success"><?php the_sub_field('tc_button_text'); ?>
		                                <svg class="icon icon-caret-right" width="1em" height="1em">
		                                	<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo AT_URL ?>build/images/svg-symbols.svg#caret-right" width="100%" height="100%"></use>
		                				</svg>
		            				</a>
		                        </span>
							</div>
						</div>
                        <?php endif; ?>
					</div>

					<!-- ticks -->
					<div class="col-tick">
						<a href="<?php the_sub_field('cta_affiliate_link'); ?>" onclick="" rel="nofollow" target="_blank" class="tick-link">
                            <?php if( !empty(get_sub_field('first_pointer_visible'))): ?>
							<span class="tick-item">
								<svg class="icon" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path d="M23.334 11.96c-.713-.726-.872-1.829-.393-2.727.342-.64.366-1.401.064-2.062-.301-.66-.893-1.142-1.601-1.302-.991-.225-1.722-1.067-1.803-2.081-.059-.723-.451-1.378-1.062-1.77-.609-.393-1.367-.478-2.05-.229-.956.347-2.026.032-2.642-.776-.44-.576-1.124-.915-1.85-.915-.725 0-1.409.339-1.849.915-.613.809-1.683 1.124-2.639.777-.682-.248-1.44-.163-2.05.229-.61.392-1.003 1.047-1.061 1.77-.082 1.014-.812 1.857-1.803 2.081-.708.16-1.3.642-1.601 1.302s-.277 1.422.065 2.061c.479.897.32 2.001-.392 2.727-.509.517-.747 1.242-.644 1.96s.536 1.347 1.17 1.7c.888.495 1.352 1.51 1.144 2.505-.147.71.044 1.448.519 1.996.476.549 1.18.844 1.902.798 1.016-.063 1.953.54 2.317 1.489.259.678.82 1.195 1.517 1.399.695.204 1.447.072 2.031-.357.819-.603 1.936-.603 2.754 0 .584.43 1.336.562 2.031.357.697-.204 1.258-.722 1.518-1.399.363-.949 1.301-1.553 2.316-1.489.724.046 1.427-.249 1.902-.798.475-.548.667-1.286.519-1.996-.207-.995.256-2.01 1.145-2.505.633-.354 1.065-.982 1.169-1.7s-.135-1.443-.643-1.96zm-12.584 5.43l-4.5-4.364 1.857-1.857 2.643 2.506 5.643-5.784 1.857 1.857-7.5 7.642z"/></svg><?php the_sub_field('first_pointer_visible'); ?>
							</span>
                            <?php endif; ?>
                            <?php if( !empty(get_sub_field('second_pointer_visible'))): ?>
							<span class="tick-item">
								<svg class="icon" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path d="M23.334 11.96c-.713-.726-.872-1.829-.393-2.727.342-.64.366-1.401.064-2.062-.301-.66-.893-1.142-1.601-1.302-.991-.225-1.722-1.067-1.803-2.081-.059-.723-.451-1.378-1.062-1.77-.609-.393-1.367-.478-2.05-.229-.956.347-2.026.032-2.642-.776-.44-.576-1.124-.915-1.85-.915-.725 0-1.409.339-1.849.915-.613.809-1.683 1.124-2.639.777-.682-.248-1.44-.163-2.05.229-.61.392-1.003 1.047-1.061 1.77-.082 1.014-.812 1.857-1.803 2.081-.708.16-1.3.642-1.601 1.302s-.277 1.422.065 2.061c.479.897.32 2.001-.392 2.727-.509.517-.747 1.242-.644 1.96s.536 1.347 1.17 1.7c.888.495 1.352 1.51 1.144 2.505-.147.71.044 1.448.519 1.996.476.549 1.18.844 1.902.798 1.016-.063 1.953.54 2.317 1.489.259.678.82 1.195 1.517 1.399.695.204 1.447.072 2.031-.357.819-.603 1.936-.603 2.754 0 .584.43 1.336.562 2.031.357.697-.204 1.258-.722 1.518-1.399.363-.949 1.301-1.553 2.316-1.489.724.046 1.427-.249 1.902-.798.475-.548.667-1.286.519-1.996-.207-.995.256-2.01 1.145-2.505.633-.354 1.065-.982 1.169-1.7s-.135-1.443-.643-1.96zm-12.584 5.43l-4.5-4.364 1.857-1.857 2.643 2.506 5.643-5.784 1.857 1.857-7.5 7.642z"/></svg><?php the_sub_field('second_pointer_visible'); ?>
							</span>
                            <?php endif; ?>
                            <?php if( !empty(get_sub_field('third_pointer_visible'))): ?>
							<span class="tick-item">
								<svg class="icon" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path d="M23.334 11.96c-.713-.726-.872-1.829-.393-2.727.342-.64.366-1.401.064-2.062-.301-.66-.893-1.142-1.601-1.302-.991-.225-1.722-1.067-1.803-2.081-.059-.723-.451-1.378-1.062-1.77-.609-.393-1.367-.478-2.05-.229-.956.347-2.026.032-2.642-.776-.44-.576-1.124-.915-1.85-.915-.725 0-1.409.339-1.849.915-.613.809-1.683 1.124-2.639.777-.682-.248-1.44-.163-2.05.229-.61.392-1.003 1.047-1.061 1.77-.082 1.014-.812 1.857-1.803 2.081-.708.16-1.3.642-1.601 1.302s-.277 1.422.065 2.061c.479.897.32 2.001-.392 2.727-.509.517-.747 1.242-.644 1.96s.536 1.347 1.17 1.7c.888.495 1.352 1.51 1.144 2.505-.147.71.044 1.448.519 1.996.476.549 1.18.844 1.902.798 1.016-.063 1.953.54 2.317 1.489.259.678.82 1.195 1.517 1.399.695.204 1.447.072 2.031-.357.819-.603 1.936-.603 2.754 0 .584.43 1.336.562 2.031.357.697-.204 1.258-.722 1.518-1.399.363-.949 1.301-1.553 2.316-1.489.724.046 1.427-.249 1.902-.798.475-.548.667-1.286.519-1.996-.207-.995.256-2.01 1.145-2.505.633-.354 1.065-.982 1.169-1.7s-.135-1.443-.643-1.96zm-12.584 5.43l-4.5-4.364 1.857-1.857 2.643 2.506 5.643-5.784 1.857 1.857-7.5 7.642z"/></svg><?php the_sub_field('third_pointer_visible'); ?>
							</span>
                            <?php endif; ?>
						</a>
					</div>

					<!-- button -->
					<div class="col-btn">
						<a href="<?php the_sub_field('cta_affiliate_link'); ?>" onclick="" rel="nofollow" target="_blank" role="button" class="at-btn at-btn-success">
							<strong>
				                <?php if( !empty($sign_up_text)): ?>
                                    <span class="hidden-sm-up"><?php echo $sign_up_text; ?> + </span>
				                <?php endif; ?>
                            <?php the_sub_field('cta_button_text'); ?>
                            </strong>
							<br class="hidden-sm-up">
							<span class="btn-extra-text hidden-sm-up"><?php echo $go_to_text; ?> <?php the_sub_field('brand_operator_name'); ?></span>
							<svg class="icon icon-caret-right" width="1em" height="1em">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo AT_URL ?>build/images/svg-symbols.svg#caret-right" width="100%" height="100%"></use>
							</svg>
						</a>

						<?php if( get_sub_field('include_our_score') == 'yes' ){ ?>
							<div class="score-text"><?php echo $our_score_text; ?>:
								<span class="score-value"><?php the_sub_field('our_score'); ?></span>
							</div>
						<?php } else { ?>
                            <div class="score-text" style="display: none;">
                                <span class="score-value">0</span>
                            </div>
                        <?php } ?>

                        <?php if( get_sub_field('include_a_tc_popup_box_on_hover') == 'yes' && !empty(get_sub_field('tc_popup_content'))): ?>
						<!-- Popup content that shows on mobile devices -->
						<div class="extra-text">
							<?php the_sub_field('tc_popup_content'); ?>
						</div>
                        <?php endif; ?>
					</div>

				</div>

                <?php if( get_sub_field('include_a_mini_review_dropdown') == 'yes' ): ?>
				<!-- collapse -->
				<div class="at-collapse" id="bet-expanded-<?php echo $i ?>" aria-expanded="false" style="">
					<div class="item-expand bg-faded">

						<!-- icons TODO: REPLACE ICONS WITH SOMETHING ELSE -->
						<div class="col-icon">
<!-- 							<ul class="list-icon-img">
								<li>																		
									<span class="tooltipster-text tooltipstered">
		                                <svg class="icon icon-flag-uk" width="1em" height="1em">
		                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo AT_URL ?>build/images/svg-symbols.svg#flag-uk" width="100%" height="100%"></use>
		                                </svg>
		                            </span>
								</li>
							</ul> -->
							<ul style="margin-top: 1em;" class="list-icons hidden-md-down">
                                <?php if( !empty(get_sub_field('first_pointer'))): ?>
								<li>
							        <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg><?php the_sub_field('first_pointer'); ?>
							    </li>
                                <?php endif; ?>
                                <?php if( !empty(get_sub_field('second_pointer'))): ?>
							    <li>
							        <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg><?php the_sub_field('second_pointer'); ?>
							    </li>
                                <?php endif; ?>
                                <?php if( !empty(get_sub_field('third_pointer'))): ?>
							    <li>
							        <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg><?php the_sub_field('third_pointer'); ?>
							    </li>
                                <?php endif; ?>
							</ul>
						</div>
						

						<?php if( get_sub_field('review_exist') == 'yes' ){ ?>

							<?php

							$post_object = get_sub_field('mini_review');

							if( $post_object ): 

								setup_postdata( $post_object );
								?>

								<!-- description -->
								<div class="col-descr">
									<div class="headings">
										<b class="descr-title"><?php echo $post_object->post_title ?></b>
									</div>
									<div class="descr-text">
										<p><?php echo strip_shortcodes(wp_trim_words($post_object->post_content, 80, '...')); ?></p>
									</div>
									<div class="links-holder">
										<a href="<?php echo get_permalink($post_object->ID); ?>" onclick="" target="_blank" class="descr-link"><?php echo $read_the_full_review_text; ?></a>
										<a href="<?php the_sub_field('cta_affiliate_link'); ?>" onclick="" target="_blank" class="descr-link"><?php echo $create_your_account_text; ?>
										</a>
									</div>
								</div>

							    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
							<?php endif; ?>

						<?php }else { ?>
							<!-- description -->
							<div class="col-descr">
								<div class="headings">
									<b class="descr-title"><?php the_sub_field('mini_review_title'); ?></b>
								</div>
								<div class="descr-text">
									<p><?php strip_shortcodes(the_sub_field('mini_review_content')); ?></p>
								</div>
								<div class="links-holder">
									<!-- <a href="https://www.compare.bet/betting/mansionbet" onclick="" target="_blank" class="descr-link">Read our full review</a> -->	
									<a href="<?php the_sub_field('cta_affiliate_link'); ?>" onclick="" rel="nofollow" target="_blank" class="descr-link"><?php echo $create_your_account_text; ?>
									</a>
								</div>
							</div>
						<?php } ?>


						<ul class="list-icons hidden-lg-up">
                            <?php if( !empty(get_sub_field('first_pointer'))): ?>
							<li>
								<svg class="icon icon-tick" width="1em" height="1em">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo AT_URL ?>build/images/svg-symbols.svg#tick" width="100%" height="100%"></use>
								</svg>
								<?php the_sub_field('first_pointer'); ?>
							</li>
                            <?php endif; ?>
                            <?php if( !empty(get_sub_field('second_pointer'))): ?>
							<li>
								<svg class="icon icon-tick" width="1em" height="1em">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo AT_URL ?>build/images/svg-symbols.svg#tick" width="100%" height="100%"></use>
								</svg>
								<?php the_sub_field('second_pointer'); ?>
							</li>
                            <?php endif; ?>
                            <?php if( !empty(get_sub_field('third_pointer'))): ?>
							<li>
								<svg class="icon icon-tick" width="1em" height="1em">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo AT_URL ?>build/images/svg-symbols.svg#tick" width="100%" height="100%"></use>
								</svg>
								<?php the_sub_field('third_pointer'); ?>
							</li>
                            <?php endif; ?>
						</ul>

						<!-- screenshot -->
						<div class="col-screen">
							<div class="screen-wrapper">

	                            <?php $image = get_sub_field('operator_screenshot'); ?>
								<?php if( $image ) {
									echo wp_get_attachment_image( $image, 'full', "", array("class" => "tooltipster-screen tooltipstered", "data-tooltip-content" => "#tooltipster-screen_content-".$i)  );
									?>
										<div class="tooltipster-screen_templates">
				                            <span id="tooltipster-screen_content-<?php echo $i ?>">

		                            		<?php echo wp_get_attachment_image( $image, 'full', "", ["class" => "tooltipster-screen-hover"]  ); ?>

											</span>
										</div>
									<?php
								} else{ ?>

										<img class="tooltipster-screen tooltipstered" data-tooltip-content="#tooltipster-screen_content-<?php echo $i ?>" src="<?php echo AT_URL ?>build/images/placeholder-image.png" alt="">
										<div class="tooltipster-screen_templates">
				                            <span id="tooltipster-screen_content-<?php echo $i ?>">
				                            	<img class="tooltipster-screen-hover" src="<?php echo AT_URL ?>build/images/placeholder-image.png"/>
											</span>
										</div>
									
								<?php }
								?>

							</div>
						</div>

					</div>
				</div>

				<div class="btn-collapse-holder">
					<a class="btn-collapse" data-toggle="at-collapse" data-target="#bet-expanded-<?php echo $i ?>" onclick="" aria-expanded="false" aria-controls="bet-expanded-<?php echo $i ?>">
						<span data-target="#bet-expanded-<?php echo $i ?>" class="expanded-false"><?php echo strtoupper($show_text); ?> </span><span data-target="#bet-expanded-<?php echo $i ?>" class="expanded-true"><?php echo strtoupper($hide_text); ?> </span><?php echo strtoupper(get_sub_field('brand_operator_name')); ?> <?php echo strtoupper($review_text); ?>&nbsp;&gt;</a>
				</div>
                <?php endif; ?>

			</div><!-- /item-holder -->
            <?php endif; ?>
			<?php $i++; ?>
	    <?php endwhile; ?>
	    </div><!-- /bet-table -->
		<?php endif;
	}
}
?>