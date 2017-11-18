<?php 
class Vietmcn_time_wc_models extends Vietmcn_models
{
    public function __construct()
    {   
        $single_hook = apply_filters( 'vietmcn_time_single_hook', $type = 'woocommerce_single_product_summary' );
        $position    = apply_filters( 'vietmcn_time_single_hook_position', $type = '40' );
        add_action( 'woocommerce_after_shop_loop_item_title', array( $this, 'time_content' ) );
        //single
        add_action( $single_hook, array( $this, 'time_single'), $position ); 
    }
    public function time_content()
    {
        global $product;
        $times = get_post_meta( $product->get_id(), '_sale_price_dates_to', true );
        if ( ! empty( $times ) ) {
            echo '<div id="vietmcn-timedown" data-countdown="'.date_i18n( 'Y/m/d', $times ).'"></div>';
        } else {

        }
    }
    public function time_single()
    {
        global $product;
        $timeClass = ( is_single() ) ? 'vietmcn-time-single' : '';
        $times = get_post_meta( $product->get_id(), '_sale_price_dates_to', true );
        if ( ! empty( $times ) ) {
            echo '<div id="vietmcn-time-countdown" class="'.$timeClass.'" data-countdown="'.date_i18n( 'Y/m/d', $times ).'"></div>';
        } else {
            //
        }
    }
}
