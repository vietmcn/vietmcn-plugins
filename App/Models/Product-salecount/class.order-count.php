<?php 
class Vietmcn_product_ordercount extends Vietmcn_models
{
    public function __construct( $option = array() )
    {
        self::$options = $option;

        $hook = apply_filters( 'vietmcn_order_count_namehook', $type = 'woocommerce_single_product_summary' );
        $hook_sort = apply_filters( 'vietmcn_order_count_namehook_position', $type= '15' );
        add_action( $hook, array( $this, 'vietmcn_product_sold_count' ), $hook_sort );
        add_action( 'woocommerce_shop_loop_item_title', array( $this, 'vietmcn_product_sold_count' ) );
    }
    public function vietmcn_product_sold_count()
    {
        global $product, $post;
        
        if ( isset( self::$options['hidden'] ) != true ) {

            $vietmcn_out = get_post_meta( $product->get_id(), 'total_sales', true );

            $name = ( ! empty( self::$options['name'] ) ) ? self::$options['name'] : 'Số người đã mua';

            if ( isset( $vietmcn_out ) ) {

                $out = sprintf( __( $name.': %s', 'woocommerce' ), $vietmcn_out ) . '';

            } else {

                $out = sprintf( __( $name.': %s', 'woocommerce' ), '0' ) . '';
                
            }
            
            echo $out;

        } else {
            ///
        }
    }
}
