<?php 
class Vietmcn_customer_order_boots extends Vietmcn_models
{
    public function __construct( $options = null )
    {
        $hook = apply_filters( 'vietmcn_order_count_namehook', $type = 'woocommerce_single_product_summary' );
        $number = apply_filters( 'vietmcn_order_count_namehook_position', $type= '11' );
        add_action( $hook, 'vietmcn_product_sold_count', $number );        
    }
    public static function get_bar_option( $options )
    {
        $remove_bar = ( isset( $options['remove_bar'] ) ) ? $options['remove_bar'] : '';

        return Vietmcn_field::get_field( array(
            'option_checked' => $remove_bar,
            'option_key' => 'remove_bar',
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
