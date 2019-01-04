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
							<h2>Smallest Company</h2>
							<p>$0.01/month</p>
						</div>
						<div class="offer-box-details">
							<ul>
								<li>Unlimited <span>Coolness</span></li>
								<li>Unlimited <span>Cuteness</span></li>
								<li>Unlimited <span>Freebies</span></li>
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