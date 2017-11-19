<?php 
class Vietmcn_customer_order_boots extends Vietmcn_boots
{
    public function __construct( $option = null )
    {
        self::$options = $option;
        add_action( 'vietmcn_option_hook', array( $this, 'get_option' ) );
    }
    public function get_option()
    {
        $product_count_order = ( isset( self::$options['product_count_order'] ) ) ? self::$options['product_count_order'] : '';

        $out = Vietmcn_field::get_field( array(
            'title' => 'Product Order Count',
            'desc' => 'Models Hiển thị tổng số người đã mua trên từng sản phẩm.',
            'version' => '0.1',
            'option' => array(
                'key' => 'product_count_order',
                'icon' => 'ion-ios-timer-outline',
                'checked' => $product_count_order,
                'desc_popup' => 'Tick vào để chọn không hiển thị ở trang danh mục sản phẩm.',
                'color' => 'rgb(236, 193, 78)',
                'field' => array(
                    'title' => 'Tùy chọn hiển thị',
                    'checkbox' => true,
                ),
            ),
        ) );
        echo $out;
    }
}