<?php 
class Vietmcn_customer_order_boots extends Vietmcn_boots
{
    public function __construct()
    {
        add_action( 'vietmcn_option_field', array( $this, 'get_option' ) );
    }
    public function get_option()
    {
        $options = $this->options();

        $product_count_order = ( isset( $options['product_count_order'] ) ) ? $options['product_count_order'] : '';

        echo Vietmcn_field::get_field( array(
            'title' => 'Time CountDown',
            'desc' => 'Models gọi thời gian kết thúc giảm ra ngoài trang chú hoặc trang xem chi tiết sản phẩm.',
            'version' => '0.1',
            'option' => array(
                'key' => 'time_countdown',
                'icon' => 'ion-ios-timer-outline',
                'checked' => $product_count_order,
                'desc_popup' => 'Tick vào để chọn không hiển thị ở trang danh mục sản phẩm.',
                'field' => array(
                    'title' => 'Tùy chọn hiển thị',
                    'checkbox' => true,
                    'shortcode' => true,
                ),
                'shortcode' => array(
                    'content' => '[time_down date="YY/MM/DD"/]',
                    'desc' => 'Sử dụng shortcode này để hiển thị ở một trang bất kỳ mà bạn muốn.<br/> <b>Kiểu Năm/Tháng/Ngày</b>.',
                ),
            ),
        ) );
    }
}