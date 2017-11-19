<?php 
class Vietmcn_product_ordercount extends Vietmcn_models
{
    public function __construct( $option = array() )
    {
        $hook = apply_filters( 'vietmcn_order_count_namehook', $type = 'woocommerce_single_product_summary' );
        $hook_sort = apply_filters( 'vietmcn_order_count_namehook_position', $type= '15' );
        add_action( $hook, array( $this, 'vietmcn_product_sold_count' ), $hook_sort );
        self::$options = $option;
    }
    public function vietmcn_product_sold_count()
    {
        global $product;

        $vietmcn_out = get_post_meta( $product->get_id(), 'total_sales', true );

        if ( isset( $vietmcn_out ) ) {

            $out = sprintf( __( self::$options['name'].': %s', 'woocommerce' ), $vietmcn_out ) . '';

        } else {

            $out = sprintf( __( self::$options['name'].': %s', 'woocommerce' ), '0' ) . '';

        }

        echo $out;
    }
}
