<?php 
class Vietmcn_customer_order_boots extends Vietmcn_boots
{
    public function __construct( $options = null )
    {
        $hook = apply_filters( 'vietmcn_order_count_namehook', $type = 'woocommerce_single_product_summary' );
        $number = apply_filters( 'vietmcn_order_count_namehook_position', $type= '11' );
        add_action( $hook, 'vietmcn_product_sold_count', $number );        
    }
    public static function get_option( $options )
    {
        $product_count_order = ( isset( $options['product_count_order'] ) ) ? $options['product_count_order'] : '';

        return Vietmcn_field::get_field( array(
            'option_checked' => $product_count_order,
            'option_key' => 'product_count_order',
            'option_bg' => 'rgb(197, 69, 58)',
            'option_icon' => 'ion-minus',
            'option_field_type' => array( 
                'checkbox' => true,
            ),
            'option_field_title' => 'Tùy chọn hiển thị',
            'title' => 'Ẩn thanh Adminbar',
            'desc' => 'Models khi bật lên sẽ ẩn thanh Adminbar của Wordpress.',
            'desc_popup' => 'Mặc định là không',
            'version' => '0.1',
        ) );
    }
}
