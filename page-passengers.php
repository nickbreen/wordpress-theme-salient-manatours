<?php
// $myorder = $wpdb->get_results( "select * from orahq_rg_lead_detail ld join orahq_rg_lead l on l.id = ld.lead_id left join orahq_rg_lead_meta lm on lm.lead_id = l.id left join orahq_rg_lead_notes ln on ln.lead_id = l.id where ld.id = 1108 and meta_key = 'gform_product_info__'" );

// var_dump($myorder);


// $items = $order->get_items();
// foreach ( $items as $item ) {
//   $product_id = $item['product_id'];
//   $product_name = $item['name'];
//   $product_variation_id = $item['variation_id'];
//   // etc
// }


/*

1. get user id


*/

// USER SESSION ID
// $user_ID = get_current_user_id();
// $order = $_GET['order'];
?>
<?php get_header(); ?>

<?php nectar_page_header($post->ID); ?>

<div class="container-wrap">
	
	<div class="container main-content">
		
		<div class="row">
			<?php
$orderid = $_GET['order'];
$userid = $_SESSION['id'];
echo $userid;
echo $orderid;
			// global $woocommerce;
			
		 //    if ( $_GET['userid'] == $this->userid ) {
	      		
			//   	$enc_hex 		= $_GET['result'];
		 //    	$PxPay_Url 		= $this->liveurl;
		 //      	$PxPay_Userid 	= $this->userid;
		 //      	$PxPay_Key 		= $this->key;
		 //     	$pxpay 			= new PxPay_Curl($PxPay_Url, $PxPay_Userid, $PxPay_Key);
		 //      	$rsp			= $pxpay->getResponse($enc_hex);
		 //      	$TxnType 		= $rsp->getTxnType();
		 //      	$Success 		= $rsp->getSuccess();
		 //      	$TxnId 			= $rsp->getTxnId();
		 //      	$ResponseText 	= $rsp->getResponseText();
				
			// 	$TxnId = explode('-',$TxnId);
				
			// 	$order = new WC_Order((int)$TxnId[0]);
				
		 //      	if($Success == '1') {
		      		
		 //        	$order->add_order_note( sprintf( __('Payment Express Payment Completed the Transaction Id is %s.', 'woothemes'), strtolower( $rsp->getDpsTxnRef() ) ) );
					
		 //        	$order->payment_complete();
					
			// 		$woocommerce->cart->empty_cart();
					
			// 		// wp_redirect('http://test-webhost.orahq.com/manatours/passengers/'); exit();
			// 		wp_redirect($this->get_return_url($order)); exit();
					
			// 	}else{
					
			// 		$order->add_order_note( sprintf( __('Payment %s via IPN.', 'woothemes'), $ResponseText ) );
					
			// 		if( $this->woo_version >= 2.1 ){
			// 			wc_add_notice( sprintf( __('Transaction %s', 'woocommerce'), $ResponseText ), $notice_type = 'error' );
			// 		}else if( $this->woo_version < 2.1 ){
			// 	  		$woocommerce->add_error( sprintf( __('Transaction %s', 'woocommerce'), $ResponseText ) );
			// 		}else{
			// 	  		$woocommerce->add_error( sprintf( __('Transaction %s', 'woocommerce'), $ResponseText ) );
			// 		}
					
			// 		$get_checkout_url = apply_filters( 'woocommerce_get_checkout_url', $woocommerce->cart->get_checkout_url() );
					
			// 		wp_redirect($get_checkout_url); exit();
					
			// 	}
			// }



			?> 
			<?php 
			 //buddypress
			 global $bp; 
			 if($bp && !bp_is_blog_page()) echo '<h1>' . get_the_title() . '</h1>'; ?>
			
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				
				<?php the_content(); ?>
	
			<?php endwhile; endif; ?>
				
	
		</div><!--/row-->
		
	</div><!--/container-->
	
</div>
<?php get_footer(); ?>

