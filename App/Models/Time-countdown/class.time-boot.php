<?php 
class Vietmcn_time_boots extends Vietmcn_boots
{
    public function __construct( $option = null )
    {
        add_action( 'wp_enqueue_scripts', array( $this, 'time_script' ) );
        add_action( 'wp_footer', array( $this, 'time_script_print' ) );

        $out  = $this->import_models( array(
            'Class' => 'Vietmcn_time_shortcode',
            'require' => 'Time-countdown/class.time-shortcode',
        ) );
        $out .= $this->import_models( array(
            'Class' => 'Vietmcn_time_wc_models',
            'require' => 'Time-countdown/class.time-wc',
            'option' => $option,
        ) );
        // Get field
        return $out;
    }
    public function time_script()
    {
        wp_enqueue_script( 'vietmcn-models-time', VIETMCN_URL . 'App/Models/Time-countdown/time.min.js', array('jquery'), VIETMCN_VERSION, true );
    }
    public function time_script_print()
    {
        ?><script type='text/javascript'>jQuery(document).ready(function(a){a('[data-countdown]').each(function(){var b=a(this),c=a(this).data('countdown');b.countdown(c,function(d){b.html(d.strftime('Còn %D ng\xE0y %H:%M:%S'))})})});</script><?php
    }
    public static function get_option( $options )
    {
        $checked = ( isset( $options['time_countdown'] ) ) ? $options['time_countdown'] : '';

        return Vietmcn_field::get_field( array(
            'title' => 'Time CountDown',
            'desc' => 'Models gọi thời gian kết thúc giảm ra ngoài trang chú hoặc trang xem chi tiết sản phẩm.',
            'version' => '0.1',
            'option' => array(
                'key' => 'time_countdown',
                'icon' => 'ion-ios-timer-outline',
                'checked' => $checked,
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