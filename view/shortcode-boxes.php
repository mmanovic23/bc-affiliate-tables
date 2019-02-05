<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( !function_exists( 'at_output_boxes' ) ) {

	function at_output_boxes($id){

		$i = 1;
		if( have_rows('offer_box_1', $id) || have_rows('offer_box_2', $id) || have_rows('offer_box_3', $id) ): ?>
            <div class="offer-boxes">
				<?php
				while( have_rows('offer_box_1', $id) || have_rows('offer_box_2', $id) || have_rows('offer_box_3', $id) ): the_row();

					$selectValue        = get_sub_field('offer_box_select_'.$i, $id);

					?>
					<?php if(!$selectValue == ''):

						$overRibbonText     = get_sub_field('override_tag_ribbon_text_box_'.$i, $id);
						$ribbonText         = get_sub_field('tag_ribbon_text_box_'.$i, $id);
						$addSubText         = get_sub_field('add_subtext_'.$i, $id);
						$subText            = get_sub_field('sub_text_'.$i, $id);
						$enlargeBox         = get_sub_field('enlarge_this_box_'.$i, $id);
						$enlargeRange       = get_sub_field('enlarge_range_'.$i, $id);
						$addBoxShadow       = get_sub_field('add_box_shadow_'.$i, $id);
						$bonusimage         = get_sub_field('bonus_image_'.$i, $id);
						$addbonusimage      = get_sub_field('add_bonus_image_'.$i, $id);

						$value              = explode( '_', $selectValue );
						$b                  = $value[0]; //Post ID. Used to fetch the sub fields of that post ID.
						$rowPosition        = $value[1] - 1; //Row Count. Used to fetch the Row sub fields.

						$rows               = get_field('comparison_affiliate_table', $b); //Get All rows from the Affiliate Table post type.
						$specific_row       = $rows[$rowPosition]; //Get the specific row. Used to access the sub fields data for that row.
						$translations       = get_field('table_settings', $b); //Get All the subfields of table settings.

						?>
                        <div class="offer-box box-<?php echo $i?>" style="<?php if($enlargeBox == 'yes'){echo 'flex-basis: '.$enlargeRange.'%;';} if($addBoxShadow == 'yes'){echo 'box-shadow: 0px 0px 8px 1px #929292;';} ?>">
                            <div class="offer-box-header">
								<?php if( $specific_row['put_a_ribbon_on_this_table_row'] == 'yes' ): ?>
                                    <!-- ribbon -->
                                    <div class="tag-ribbon" style="color:<?php echo $specific_row['ribbon_color']; ?>">
                                        <div class="inner">
											<?php if( $overRibbonText == 'yes' ){
												echo $ribbonText;
											} else {
												echo $specific_row['ribbon_text'];
											} ?>
                                        </div>
                                        <svg class="corner-right" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 5.5 25" preserveAspectRatio="none">
                                            <polygon fill="currentColor" points="5.5,25 0.1,25 0,0 5.5,0 0.5,12.5 "></polygon>
                                        </svg>
                                    </div>
								<?php endif; ?>

                                <a href="<?php echo $specific_row['cta_affiliate_link']; ?>" rel="nofollow" target="_blank">
                                    <div style="background-color:<?php echo $specific_row['brand_logo_background']; ?>">

										<?php $image = $specific_row['brand_logo_image']; ?>

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

								<?php if( $specific_row['include_star_rating'] == 'yes' ): ?>
                                <!-- Star Rating -->
                                <span class="rating-bar">
                                    <span class="rating">
                                        <span class="rate" data-rateyo-rating="<?php echo $specific_row['star_rating']; ?>"></span>
                                    </span>
                                <!-- <span class="rating-count">487 reviews</span> -->
                                </span>
								<?php endif; ?>

                                <strong class="offer-box-title"><?php echo $specific_row['brand_offer_title']; ?></strong>

								<?php if( $addSubText == 'yes' ): ?>
                                    <p><?php echo $subText; ?></p>
								<?php endif; ?>

	                            <?php if( $addbonusimage == 'yes' ): ?>
                                    <picture>
			                            <?php if( $bonusimage ) {
				                            echo wp_get_attachment_image( $bonusimage, 'medium', "", ["class" => "bonusimage"]  );
			                            } else{ ?>
                                            <img class="bonusimage" src="<?php echo AT_URL ?>build/images/placeholder-image.png"/>
			                            <?php }
			                            ?>
                                    </picture>
	                            <?php endif; ?>

                            </div>



                            <div class="offer-box-details">

                                <ul>
                                <?php if( !empty($specific_row['first_pointer_visible']) ): ?>
                                    <li>
                                    <span class="tick-item">
                                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path d="M23.334 11.96c-.713-.726-.872-1.829-.393-2.727.342-.64.366-1.401.064-2.062-.301-.66-.893-1.142-1.601-1.302-.991-.225-1.722-1.067-1.803-2.081-.059-.723-.451-1.378-1.062-1.77-.609-.393-1.367-.478-2.05-.229-.956.347-2.026.032-2.642-.776-.44-.576-1.124-.915-1.85-.915-.725 0-1.409.339-1.849.915-.613.809-1.683 1.124-2.639.777-.682-.248-1.44-.163-2.05.229-.61.392-1.003 1.047-1.061 1.77-.082 1.014-.812 1.857-1.803 2.081-.708.16-1.3.642-1.601 1.302s-.277 1.422.065 2.061c.479.897.32 2.001-.392 2.727-.509.517-.747 1.242-.644 1.96s.536 1.347 1.17 1.7c.888.495 1.352 1.51 1.144 2.505-.147.71.044 1.448.519 1.996.476.549 1.18.844 1.902.798 1.016-.063 1.953.54 2.317 1.489.259.678.82 1.195 1.517 1.399.695.204 1.447.072 2.031-.357.819-.603 1.936-.603 2.754 0 .584.43 1.336.562 2.031.357.697-.204 1.258-.722 1.518-1.399.363-.949 1.301-1.553 2.316-1.489.724.046 1.427-.249 1.902-.798.475-.548.667-1.286.519-1.996-.207-.995.256-2.01 1.145-2.505.633-.354 1.065-.982 1.169-1.7s-.135-1.443-.643-1.96zm-12.584 5.43l-4.5-4.364 1.857-1.857 2.643 2.506 5.643-5.784 1.857 1.857-7.5 7.642z"/></svg>
                                        <?php echo $specific_row['first_pointer_visible']; ?>
                                    </span>
                                    </li>
                                <?php endif; ?>
                                <?php if( !empty(['second_pointer_visible']) ): ?>
                                    <li>
                                    <span class="tick-item">
                                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path d="M23.334 11.96c-.713-.726-.872-1.829-.393-2.727.342-.64.366-1.401.064-2.062-.301-.66-.893-1.142-1.601-1.302-.991-.225-1.722-1.067-1.803-2.081-.059-.723-.451-1.378-1.062-1.77-.609-.393-1.367-.478-2.05-.229-.956.347-2.026.032-2.642-.776-.44-.576-1.124-.915-1.85-.915-.725 0-1.409.339-1.849.915-.613.809-1.683 1.124-2.639.777-.682-.248-1.44-.163-2.05.229-.61.392-1.003 1.047-1.061 1.77-.082 1.014-.812 1.857-1.803 2.081-.708.16-1.3.642-1.601 1.302s-.277 1.422.065 2.061c.479.897.32 2.001-.392 2.727-.509.517-.747 1.242-.644 1.96s.536 1.347 1.17 1.7c.888.495 1.352 1.51 1.144 2.505-.147.71.044 1.448.519 1.996.476.549 1.18.844 1.902.798 1.016-.063 1.953.54 2.317 1.489.259.678.82 1.195 1.517 1.399.695.204 1.447.072 2.031-.357.819-.603 1.936-.603 2.754 0 .584.43 1.336.562 2.031.357.697-.204 1.258-.722 1.518-1.399.363-.949 1.301-1.553 2.316-1.489.724.046 1.427-.249 1.902-.798.475-.548.667-1.286.519-1.996-.207-.995.256-2.01 1.145-2.505.633-.354 1.065-.982 1.169-1.7s-.135-1.443-.643-1.96zm-12.584 5.43l-4.5-4.364 1.857-1.857 2.643 2.506 5.643-5.784 1.857 1.857-7.5 7.642z"/></svg>
                                        <?php echo $specific_row['second_pointer_visible']; ?>
                                    </span>
                                    </li>
                                <?php endif; ?>
                                <?php if( !empty(['third_pointer_visible']) ): ?>
                                    <li>
                                    <span class="tick-item">
                                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path d="M23.334 11.96c-.713-.726-.872-1.829-.393-2.727.342-.64.366-1.401.064-2.062-.301-.66-.893-1.142-1.601-1.302-.991-.225-1.722-1.067-1.803-2.081-.059-.723-.451-1.378-1.062-1.77-.609-.393-1.367-.478-2.05-.229-.956.347-2.026.032-2.642-.776-.44-.576-1.124-.915-1.85-.915-.725 0-1.409.339-1.849.915-.613.809-1.683 1.124-2.639.777-.682-.248-1.44-.163-2.05.229-.61.392-1.003 1.047-1.061 1.77-.082 1.014-.812 1.857-1.803 2.081-.708.16-1.3.642-1.601 1.302s-.277 1.422.065 2.061c.479.897.32 2.001-.392 2.727-.509.517-.747 1.242-.644 1.96s.536 1.347 1.17 1.7c.888.495 1.352 1.51 1.144 2.505-.147.71.044 1.448.519 1.996.476.549 1.18.844 1.902.798 1.016-.063 1.953.54 2.317 1.489.259.678.82 1.195 1.517 1.399.695.204 1.447.072 2.031-.357.819-.603 1.936-.603 2.754 0 .584.43 1.336.562 2.031.357.697-.204 1.258-.722 1.518-1.399.363-.949 1.301-1.553 2.316-1.489.724.046 1.427-.249 1.902-.798.475-.548.667-1.286.519-1.996-.207-.995.256-2.01 1.145-2.505.633-.354 1.065-.982 1.169-1.7s-.135-1.443-.643-1.96zm-12.584 5.43l-4.5-4.364 1.857-1.857 2.643 2.506 5.643-5.784 1.857 1.857-7.5 7.642z"/></svg>
                                        <?php echo $specific_row['third_pointer_visible']; ?>
                                    </span>
                                    </li>
                                <?php endif; ?>
                                </ul>
                                <!--							<p></p>-->

                                <a href="<?php echo $specific_row['cta_affiliate_link']; ?>" onclick="" rel="nofollow" target="_blank" role="button" class="at-btn at-btn-success"><strong><?php echo $specific_row['cta_button_text']; ?></strong>
                                    <svg class="icon icon-caret-right" width="1em" height="1em">
                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo AT_URL ?>build/images/svg-symbols.svg#caret-right" width="100%" height="100%"></use>
                                    </svg>
                                </a>

								<?php if( $specific_row['include_a_tc_popup_box_on_hover'] == 'yes' ): ?>
                                    <!-- tooltip -->
                                    <div class="bonus-extra">
										<?php echo $translations['tc_apply']; ?>
                                        <span class="icon-holder tooltipster-popover tooltipstered" data-tooltip-content="#tooltipster-popover_content-<?php echo $selectValue; ?>">
                                            <svg class="icon icon-question" width="1em" height="1em">
                                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo AT_URL ?>build/images/svg-symbols.svg#question" width="100%" height="100%"></use>
                                            </svg>
                                        </span>

                                        <!-- popover -->
                                        <div class="tooltipster-popover_templates">
                                        <span id="tooltipster-popover_content-<?php echo $selectValue; ?>">
                                            <button type="button" class="close" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <strong class="title"><?php echo $specific_row['tc_popup_title']; ?></strong>
                                            <p class="tp-content"><?php echo $specific_row['tc_popup_content']; ?></p>
                                            <a href="<?php $specific_row['tc_link']; ?>" onclick="" <?php if( $specific_row['tc_link_include_nofollow'] == 'yes' ): ?>rel="nofollow"<?php endif; ?> target="_blank" role="button" class="at-btn at-btn-success"><?php echo $specific_row['tc_button_text']; ?>
                                                <svg class="icon icon-caret-right" width="1em" height="1em">
                                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo AT_URL ?>build/images/svg-symbols.svg#caret-right" width="100%" height="100%"></use>
                                                </svg>
                                            </a>
                                        </span>
                                        </div>
                                    </div>

                                    <!-- Popup text that shows on mobile -->
                                    <div class="extra-text">
                                        <p><?php echo $specific_row['tc_popup_content']; ?></p>
                                    </div>
								<?php endif; ?>

                            </div>
                        </div>
						<?php $i++; endif; ?>
				<?php endwhile; ?>
            </div>
		<?php endif;
	}
}
?>