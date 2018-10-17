<?php
if ( !function_exists( 'at_output_table' ) ) {

	function at_output_table($parameter){

		if ( have_rows('table_header_settings', $parameter) ): 
			while( have_rows('table_header_settings', $parameter) ): the_row(); 
		?>

		<div class="bet-table-head">
			<div><?php the_sub_field('column_1_header_title'); ?></div>
			<div><?php the_sub_field('column_2_header_title'); ?></div>
			<div><?php the_sub_field('column_3_header_title'); ?></div>
			<div><?php the_sub_field('column_4_header_title'); ?></div>
		</div>

			<?php endwhile; ?>
		<?php endif;

		if( have_rows('comparison_affiliate_table', $parameter) ): ?>

		<?php $i = 1; ?>

	    <!-- bet-table -->
		<div class="bet-table">

	    <?php while( have_rows('comparison_affiliate_table', $parameter) ): the_row(); ?>

	    	<?php 
	    	// $fields = get_field('comparison_affiliate_table', $parameter);
	    	
	    	//DEBUG FIELDS

	    	// DEBUG 1
	    	//var_dump($fields);
			
			//DEBUG 2
			// foreach( $fields as $field_name => $field )
			// {
			// 	echo '<div>';
			// 		echo '<h3>' . $field['label'] . '</h3>';
			// 		echo $field['value'];
			// 	echo '</div>';
			// }
		
			?>

			<div class="item-holder">
				<div class="item">

					<!-- logo -->
					<div class="col-logo">
						<div class="logo-link-wrapper">

							
							<?php if( get_sub_field('put_a_ribbon_on_this_table_row') == 'yes' ): ?>
								<!-- ribbon -->
								<div class="tag-ribbons" style="color:<?php the_sub_field('ribbon_color'); ?>">
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
										echo wp_get_attachment_image( $image, 'full', "", ["class" => "logo"]  );
									} else{ ?>
										<img class="logo" src="<?php echo AT_URL ?>build/images/placeholder-image.png"/>
									<?php }
									?>

									</picture>
								</div>
							</a>

							<?php if( get_sub_field('include_star_rating') == 'yes' ): ?>

							<!-- Star Rating -->
							<span class="rating-bar">
								<span class="rating">
									<span class="rate" data-rateyo-rating="<?php the_sub_field('star_rating') ?>"></span>
								</span>
		                        <!-- <span class="rating-count">487 reviews</span> -->
		                    </span>
		                    <?php endif; ?>

						</div>
					</div>

					<!-- bonus -->
					<div class="col-bonus">
						<a href="<?php the_sub_field('cta_affiliate_link'); ?>" onclick="" rel="nofollow" target="_blank" class="bonus-link">
							<div class="bonus-main"><b><?php the_sub_field('brand_offer_title'); ?></b>
							</div>
						</a>
						
						<?php if( get_sub_field('include_our_score') == 'yes' ): ?>
						
							<!-- "Our Score" shows on mobile devices -->
							<div class="score-text"><?php the_sub_field('our_score_text'); ?>: <span class="score-value"><?php the_sub_field('our_score'); ?></span></div>

						<?php endif; ?>

						<!-- tooltip -->
						<div class="bonus-extra">
                            <?php the_sub_field('tc_apply'); ?>
							<span class="icon-holder tooltipster-popover tooltipstered" data-tooltip-content="#tooltipster-popover_content-<?php echo $i ?>">
								<svg class="icon icon-question" width="1em" height="1em">
									<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo AT_URL ?>build/images/svg-symbols.svg#question" width="100%" height="100%"></use>
								</svg>
							</span>


							<!-- popover -->
							<div class="tooltipster-popover_templates">
		                        <span id="tooltipster-popover_content-<?php echo $i ?>">
									<button type="button" class="close" aria-label="Close">
										<span aria-hidden="true">×</span>
		                            </button>
		                            <h6 class="title"><b><?php the_sub_field('tc_popup_title'); ?></b></h6>
		                            <p class="content"><?php the_sub_field('tc_popup_content'); ?></p>
		                            <a href="<?php the_sub_field('tc_link'); ?>" onclick="" target="_blank" role="button" class="btn btn-success"><?php the_sub_field('tc_button_text'); ?>
		                                <svg class="icon icon-caret-right" width="1em" height="1em">
		                                	<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo AT_URL ?>build/images/svg-symbols.svg#caret-right" width="100%" height="100%"></use>
		                				</svg>
		            				</a>
		                        </span>
							</div>

						</div>
					</div>

					<!-- ticks -->
					<div class="col-tick">
						<a href="<?php the_sub_field('cta_affiliate_link'); ?>" onclick="" rel="nofollow" target="_blank" class="tick-link">
							<span class="tick-item">
								<svg class="icon" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path d="M23.334 11.96c-.713-.726-.872-1.829-.393-2.727.342-.64.366-1.401.064-2.062-.301-.66-.893-1.142-1.601-1.302-.991-.225-1.722-1.067-1.803-2.081-.059-.723-.451-1.378-1.062-1.77-.609-.393-1.367-.478-2.05-.229-.956.347-2.026.032-2.642-.776-.44-.576-1.124-.915-1.85-.915-.725 0-1.409.339-1.849.915-.613.809-1.683 1.124-2.639.777-.682-.248-1.44-.163-2.05.229-.61.392-1.003 1.047-1.061 1.77-.082 1.014-.812 1.857-1.803 2.081-.708.16-1.3.642-1.601 1.302s-.277 1.422.065 2.061c.479.897.32 2.001-.392 2.727-.509.517-.747 1.242-.644 1.96s.536 1.347 1.17 1.7c.888.495 1.352 1.51 1.144 2.505-.147.71.044 1.448.519 1.996.476.549 1.18.844 1.902.798 1.016-.063 1.953.54 2.317 1.489.259.678.82 1.195 1.517 1.399.695.204 1.447.072 2.031-.357.819-.603 1.936-.603 2.754 0 .584.43 1.336.562 2.031.357.697-.204 1.258-.722 1.518-1.399.363-.949 1.301-1.553 2.316-1.489.724.046 1.427-.249 1.902-.798.475-.548.667-1.286.519-1.996-.207-.995.256-2.01 1.145-2.505.633-.354 1.065-.982 1.169-1.7s-.135-1.443-.643-1.96zm-12.584 5.43l-4.5-4.364 1.857-1.857 2.643 2.506 5.643-5.784 1.857 1.857-7.5 7.642z"/></svg><?php the_sub_field('first_pointer_visible'); ?>
							</span>
							<span class="tick-item">
								<svg class="icon" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path d="M23.334 11.96c-.713-.726-.872-1.829-.393-2.727.342-.64.366-1.401.064-2.062-.301-.66-.893-1.142-1.601-1.302-.991-.225-1.722-1.067-1.803-2.081-.059-.723-.451-1.378-1.062-1.77-.609-.393-1.367-.478-2.05-.229-.956.347-2.026.032-2.642-.776-.44-.576-1.124-.915-1.85-.915-.725 0-1.409.339-1.849.915-.613.809-1.683 1.124-2.639.777-.682-.248-1.44-.163-2.05.229-.61.392-1.003 1.047-1.061 1.77-.082 1.014-.812 1.857-1.803 2.081-.708.16-1.3.642-1.601 1.302s-.277 1.422.065 2.061c.479.897.32 2.001-.392 2.727-.509.517-.747 1.242-.644 1.96s.536 1.347 1.17 1.7c.888.495 1.352 1.51 1.144 2.505-.147.71.044 1.448.519 1.996.476.549 1.18.844 1.902.798 1.016-.063 1.953.54 2.317 1.489.259.678.82 1.195 1.517 1.399.695.204 1.447.072 2.031-.357.819-.603 1.936-.603 2.754 0 .584.43 1.336.562 2.031.357.697-.204 1.258-.722 1.518-1.399.363-.949 1.301-1.553 2.316-1.489.724.046 1.427-.249 1.902-.798.475-.548.667-1.286.519-1.996-.207-.995.256-2.01 1.145-2.505.633-.354 1.065-.982 1.169-1.7s-.135-1.443-.643-1.96zm-12.584 5.43l-4.5-4.364 1.857-1.857 2.643 2.506 5.643-5.784 1.857 1.857-7.5 7.642z"/></svg><?php the_sub_field('second_pointer_visible'); ?>
							</span>
							<span class="tick-item">
								<svg class="icon" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path d="M23.334 11.96c-.713-.726-.872-1.829-.393-2.727.342-.64.366-1.401.064-2.062-.301-.66-.893-1.142-1.601-1.302-.991-.225-1.722-1.067-1.803-2.081-.059-.723-.451-1.378-1.062-1.77-.609-.393-1.367-.478-2.05-.229-.956.347-2.026.032-2.642-.776-.44-.576-1.124-.915-1.85-.915-.725 0-1.409.339-1.849.915-.613.809-1.683 1.124-2.639.777-.682-.248-1.44-.163-2.05.229-.61.392-1.003 1.047-1.061 1.77-.082 1.014-.812 1.857-1.803 2.081-.708.16-1.3.642-1.601 1.302s-.277 1.422.065 2.061c.479.897.32 2.001-.392 2.727-.509.517-.747 1.242-.644 1.96s.536 1.347 1.17 1.7c.888.495 1.352 1.51 1.144 2.505-.147.71.044 1.448.519 1.996.476.549 1.18.844 1.902.798 1.016-.063 1.953.54 2.317 1.489.259.678.82 1.195 1.517 1.399.695.204 1.447.072 2.031-.357.819-.603 1.936-.603 2.754 0 .584.43 1.336.562 2.031.357.697-.204 1.258-.722 1.518-1.399.363-.949 1.301-1.553 2.316-1.489.724.046 1.427-.249 1.902-.798.475-.548.667-1.286.519-1.996-.207-.995.256-2.01 1.145-2.505.633-.354 1.065-.982 1.169-1.7s-.135-1.443-.643-1.96zm-12.584 5.43l-4.5-4.364 1.857-1.857 2.643 2.506 5.643-5.784 1.857 1.857-7.5 7.642z"/></svg><?php the_sub_field('third_pointer_visible'); ?>
							</span>
						</a>
					</div>

					<!-- button -->
					<div class="col-btn">
						<a href="<?php the_sub_field('cta_affiliate_link'); ?>" onclick="" rel="nofollow" target="_blank" role="button" class="btn btn-success">
							<b><span class="hidden-sm-up"><?php the_sub_field('sign_up_text'); ?> + </span><?php the_sub_field('cta_button_text'); ?></b>
							<br class="hidden-sm-up">
							<span class="btn-extra-text hidden-sm-up"><?php the_sub_field('go_to_text'); ?> <?php the_sub_field('brand_operator_name'); ?></span>
							<svg class="icon icon-caret-right" width="1em" height="1em">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo AT_URL ?>build/images/svg-symbols.svg#caret-right" width="100%" height="100%"></use>
							</svg>
						</a>

						<?php if( get_sub_field('include_our_score') == 'yes' ): ?>
							<div class="score-text"><?php the_sub_field('our_score_text'); ?>: 
								<span class="score-value"><?php the_sub_field('our_score'); ?></span>
							</div>
						<?php endif; ?>

						<!-- Popup content that shows on mobile devices -->
						<div class="extra-text">
							<?php the_sub_field('tc_popup_content'); ?>
						</div>
					</div>

				</div>

				<!-- collapse -->
				<div class="collapse" id="bet-expanded-<?php echo $i ?>" aria-expanded="false" style="">
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
								<li>
							        <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg><?php the_sub_field('first_pointer'); ?>
							    </li>

							    <li>
							        <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg><?php the_sub_field('second_pointer'); ?>
							    </li>
							    <li>
							        <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg><?php the_sub_field('third_pointer'); ?>
							    </li>
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
										<h2 class="descr-title"><?php echo $post_object->post_title ?></h2>
									</div>
									<div class="descr-text">
										<p><?php echo wp_trim_words($post_object->post_content, 80, '...'); ?></p>
									</div>
									<div class="links-holder">
										<a href="<?php echo get_permalink($post_object->ID); ?>" onclick="" target="_blank" class="descr-link"><?php the_sub_field('read_the_full_review_text'); ?></a>	
										<a href="<?php the_sub_field('cta_affiliate_link'); ?>" onclick="" target="_blank" class="descr-link"><?php the_sub_field('create_your_account_text'); ?>
										</a>
									</div>
								</div>

							    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
							<?php endif; ?>

						<?php }else { ?>
							<!-- description -->
							<div class="col-descr">
								<div class="headings">
									<h2 class="descr-title"><?php the_sub_field('mini_review_title'); ?></h2>
								</div>
								<div class="descr-text">
									<p><?php the_sub_field('mini_review_content'); ?></p>
								</div>
								<div class="links-holder">
									<!-- <a href="https://www.compare.bet/betting/mansionbet" onclick="" target="_blank" class="descr-link">Read our full review</a> -->	
									<a href="<?php the_sub_field('cta_affiliate_link'); ?>" onclick="" rel="nofollow" target="_blank" class="descr-link"><?php the_sub_field('create_your_account_text'); ?>
									</a>
								</div>
							</div>
						<?php } ?>


						<ul class="list-icons hidden-lg-up">
							<li>
								<svg class="icon icon-tick" width="1em" height="1em">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo AT_URL ?>build/images/svg-symbols.svg#tick" width="100%" height="100%"></use>
								</svg>
								<?php the_sub_field('first_pointer'); ?>
							</li>
							<li>
								<svg class="icon icon-tick" width="1em" height="1em">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo AT_URL ?>build/images/svg-symbols.svg#tick" width="100%" height="100%"></use>
								</svg>
								<?php the_sub_field('second_pointer'); ?>
							</li>
							<li>
								<svg class="icon icon-tick" width="1em" height="1em">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo AT_URL ?>build/images/svg-symbols.svg#tick" width="100%" height="100%"></use>
								</svg>
								<?php the_sub_field('third_pointer'); ?>
							</li>
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
					<a class="btn-collapse" data-toggle="collapse" data-target="#bet-expanded-<?php echo $i ?>" onclick="" aria-expanded="false" aria-controls="bet-expanded-<?php echo $i ?>">
						<span data-target="#bet-expanded-<?php echo $i ?>" class="expanded-false"><?php echo strtoupper(get_sub_field('show_text')); ?> </span><span data-target="#bet-expanded-<?php echo $i ?>" class="expanded-true"><?php echo strtoupper(get_sub_field('hide_text')); ?> </span><?php echo strtoupper(get_sub_field('brand_operator_name')); ?> <?php echo strtoupper(get_sub_field('review_text')); ?>&nbsp;&gt;</a>
				</div>

			</div><!-- /item-holder -->
			<?php $i++; ?>
	    <?php endwhile; ?>

	    </div><!-- /bet-table -->

		<?php endif;

	}
}
?>