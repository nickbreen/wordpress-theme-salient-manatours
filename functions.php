 <?php

/*********START GRAVITY FORMS CUSTOM CHANGES*****************/
/* WRITTEN BY MICHAEL RYAN 11/05/2015 TORICAN@GMAIL.COM     */
/* SPECIFICALLY FOR MANATOURS/ORAHQ                         */
/************************************************************/
add_filter( 'gform_pre_render_2', 'populate_form' );
add_filter( 'gform_pre_validation_2', 'populate_form' );
add_filter( 'gform_pre_submission_filter_2', 'populate_form' );
add_filter( 'gform_admin_pre_render_2', 'populate_form' );
function populate_form( $form ) {
	foreach ( $form['fields'] as &$field ) {
		if (  $field->cssClass == 'populate_student_tours'  ) {
			$choices = array();
			$args = array(
				'post_type' => 'product',
				'posts_per_page' => -1,
				'meta_query' => array(
					array(
						'key' => '_stock_status',
						'value' => 'instock',
						'compare' => '='
					)
				),
				'tax_query' => array(
					'relation' => 'OR',
					array(
						'taxonomy'      => 'product_cat',
						'field'					=> 'term_id',
						'terms'         => '21',
						'operator'      => 'IN'
					),
					array(
						'taxonomy'      => 'product_cat',
						'field'					=> 'term_id',
						'terms'         => '22',
						'operator'      => 'IN'
					),
					array(
						'taxonomy'      => 'product_cat',
						'field'					=> 'term_id',
						'terms'         => '23',
						'operator'      => 'IN'
					)
				)
			);
			$loop = new WP_Query( $args );
			if ( $loop->have_posts() ) {
				while ( $loop->have_posts() ) : $loop->the_post();
					$product = new WC_Product( get_the_ID() );
					$choices[] = array( 'text' => $product->get_title(), 'price' => $product->price );
				endwhile;
			}
			wp_reset_postdata();
			$field->placeholder = '- SELECT PACKAGE -';
			$field->choices = $choices;
		}	elseif ( $field->cssClass == 'populate-private-tours'  ) {
			$choices = array();
			$args = array(
				'post_type' => 'product',
				'posts_per_page' => -1,
				'meta_query' => array(
					array(
						'key' => '_stock_status',
						'value' => 'instock',
						'compare' => '='
					)
				),
				'tax_query' => array(
					array(
						'taxonomy'      => 'product_cat',
						'field' 				=> 'tag_id',
						'terms'         => '28',
						'operator'      => 'IN'
					)
				)
			);
			$loop = new WP_Query( $args );
			if ( $loop->have_posts() ) {
				while ( $loop->have_posts() ) : $loop->the_post();
					$product = new WC_Product( get_the_ID() );
					$choices[] = array( 'text' => $product->get_title(), 'price' => $product->price );
				endwhile;
			}
			wp_reset_postdata();
			$field->placeholder = '- SELECT PACKAGE -';
			$field->choices = $choices;
		} elseif ( $field->cssClass == 'populate_regular_tours'  ) {
			$choices = array();
			$args = array(
				'post_type' => 'product',
				'posts_per_page' => -1,
				'meta_query' => array(
					array(
						'key' => '_stock_status',
						'value' => 'instock',
						'compare' => '='
					)
				),
				'tax_query' => array(
					array(
						'taxonomy'      => 'product_cat',
						'field'				  => 'term_id',
						'terms'         => '26',
						'operator'      => 'IN'
					)
				)
			);
			$loop = new WP_Query( $args );
			if ( $loop->have_posts() ) {
				while ( $loop->have_posts() ) : $loop->the_post();
					$product = new WC_Product( get_the_ID() );
					$choices[] = array( 'text' => $product->get_title(), 'price' => $product->price );
				endwhile;
			}
			wp_reset_postdata();
			$field->placeholder = '- SELECT PACKAGE -';
			$field->choices = $choices;
		}
	}
	return $form;
}
/********END GRAVITY FORMS ***********/

// change "Add to Cart" button to "Add to Itinerary"
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );    // 2.1 +

function woo_custom_cart_button_text() {

        return __( 'Add to Itinerary', 'woocommerce' );

}

// Change View Cart to View Itinerary
function my_text_strings( $translated_text, $text, $domain ) {
    switch ( $translated_text ) {
        case 'View Cart' :
            $translated_text = __( 'PROCEED TO PAYMENT', 'woocommerce' );
            break;
    }

    switch ( $translated_text ) {
        case 'Update Cart' :
            $translated_text = __( 'Update Itinerary', 'woocommerce' );
            break;
    }

    switch ( $translated_text ) {
        case 'Additional Information' :
            $translated_text = __( 'Please Add Each Passengers Full Name', 'woocommerce' );
            break;
    }
    switch ( $translated_text ) {
        case 'Order Notes' :
            $translated_text = __( 'Add Each Passenger on a new line', 'woocommerce' );
            break;
    }
    switch ( $translated_text ) {
        case 'Product Description' :
            $translated_text = __( 'Tour Details', 'woocommerce' );
            break;
    }
    return $translated_text;
}
add_filter( 'gettext', 'my_text_strings', 20, 3 );

add_action( 'template_redirect', 'wc_custom_redirect_after_purchase' );
function wc_custom_redirect_after_purchase() {
    global $wp;

    if ( is_checkout() && ! empty( $wp->query_vars['order-received'] ) ) {
        $order_id  = absint( $wp->query_vars['order-received'] );
        $order_key = wc_clean( $_GET['key'] );

        /**
         * Replace {PAGE_ID} with the ID of your page
         */
        $redirect  = get_permalink( 995 );
        $redirect .= get_option( 'permalink_structure' ) === '' ? '&' : '?';
        $redirect .= 'order=' . $order_id . '&key=' . $order_key;

        wp_redirect( $redirect );
        exit;
    }
}

add_filter( 'the_content', 'wc_custom_thankyou' );
function wc_custom_thankyou( $content ) {
	// Check if is the correct page
	if ( ! is_page( get_permalink( 995 ) ) ) {
		return $content;
	}

	// check if the order ID exists
	if ( ! isset( $_GET['order'] ) ) {
		return $content;
	}

	// intval() ensures that we use an integer value for the order ID
	$order = wc_get_order( intval( $_GET['order'] ) );

	ob_start();

	// Check that the order is valid
	if ( ! $order ) {
		// The order can't be returned by WooCommerce - Just say thank you
		?><p><?php  echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?></p><?php
	} else {
		if ( $order->has_status( 'failed' ) ) {
			// Order failed - Print error messages and ask to pay again
			/**
			 * @hooked wc_custom_thankyou_failed - 10
			 */
			do_action( 'wc_custom_thankyou_failed', $order );
		} else {
			// The order is successfull - print the complete order review
			/**
			 * @hooked wc_custom_thankyou_header - 10
			 * @hooked wc_custom_thankyou_table - 20
			 * @hooked wc_custom_thankyou_customer_details - 30
			 */
			do_action( 'wc_custom_thankyou_successful', $order );
		}
	}
	$content .= ob_get_contents();
	ob_end_clean();
	return $content;
}

add_action( 'wc_custom_thankyou_failed', 'wc_custom_thankyou_failed', 10 );
function wc_custom_thankyou_failed( $order ) {
	wc_get_template( 'custom-thankyou/failed.php', array( 'order' => $order ) );
}

add_action( 'wc_custom_thankyou_successful', 'wc_custom_thankyou_header', 10 );
function wc_custom_thankyou_header( $order ) {
	wc_get_template( 'custom-thankyou/header.php',           array( 'order' => $order ) );
}

add_action( 'wc_custom_thankyou_successful', 'wc_custom_thankyou_table', 20 );
function wc_custom_thankyou_table( $order ) {
	wc_get_template( 'custom-thankyou/table.php',           array( 'order' => $order ) );
}

add_action( 'wc_custom_thankyou_successful', 'wc_custom_thankyou_customer_details', 30 );
function wc_custom_thankyou_customer_details( $order ) {
	wc_get_template( 'custom-thankyou/customer-details.php',           array( 'order' => $order ) );
}
