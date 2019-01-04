<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( !function_exists( 'at_output_boxes' ) ) {

	function at_output_boxes($id){

		$boxes = get_field_objects($id);

		if( $boxes ): ?>
			<div class="offer-boxes">
			<?php
			foreach ( $boxes as $box ) {
				if ( $box['value'] !== '' ) {
					$value       = explode( '.', $box['value'] );
					$id          = $value[0];
					$rowPosition = $value[1] - 1;

					$rows = get_field('comparison_affiliate_table', $id);
					$specific_row = $rows[$rowPosition];

			?>
					<div class="offer-box">
						<div class="offer-box-header">
							<?php if( $specific_row['put_a_ribbon_on_this_table_row'] == 'yes' ): ?>
								<!-- ribbon -->
								<div class="tag-ribbons" style="color:<?php echo $specific_row['ribbon_color']; ?>">
									<div class="inner"><?php echo $specific_row['ribbon_text']; ?></div>
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

							<strong><?php echo $specific_row['brand_offer_title']; ?></strong>
<!--							<p>$0.01/month</p>-->
						</div>
						<div class="offer-box-details">
							<ul>
								<?php if( !$specific_row['first_pointer_visible'] == '' ): ?>
									<li><?php echo $specific_row['first_pointer_visible']; ?></li>
								<?php endif; ?>
								<?php if( !$specific_row['second_pointer_visible'] == '' ): ?>
									<li><?php echo $specific_row['second_pointer_visible']; ?></li>
								<?php endif; ?>
								<?php if( !$specific_row['third_pointer_visible'] == '' ): ?>
									<li><?php echo $specific_row['third_pointer_visible']; ?></li>
								<?php endif; ?>
							</ul>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec pellentesque ex. Morbi metus ante, congue non suscipit a, accumsan eget odio. Mauris consectetur blandit ante convallis ornare. </p>
							<a class="at-btn at-btn-success">Start Your Free Trial for 25 Years <i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
			<?php

				}
			}
			?></div>
		<?php endif;
	}
}
?>