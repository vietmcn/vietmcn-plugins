<?php 
class Vietmcn_customer_ordercount extends Vietmcn_models
{
    public function __construct()
    {
        $hook = apply_filters( 'vietmcn_order_count_namehook', $type = 'woocommerce_single_product_summary' );
        $number = apply_filters( 'vietmcn_order_count_namehook_position', $type= '11' );
        add_action( $hook, 'vietmcn_product_sold_count', $number ); 
    }
    public function vietmcn_product_sold_count()
    {
        global $product;
        $vietmcn_out = get_post_meta( $product->id, 'total_sales', true );
        echo '' . sprintf( __( 'Số người đã mua: %s', 'woocommerce' ), $vietmcn_out ) . '';
    }
}
