<?php 
class Vietmcn_time_boots extends Vietmcn_models
{
    public function __construct( $option = null )
    {
        add_action( 'wp_enqueue_scripts', array( $this, 'time_script' ) );
        add_action( 'wp_footer', array( $this, 'time_script_print' ) );
        self::get_time_wc( $option );
    }
    public function time_script()
    {
        wp_enqueue_script( 'vietmcn-models-time', VIETMCN_URL . 'App/Models/Time-countdown/time.min.js', array('jquery'), VIETMCN_VERSION, true );
    }
    public function time_script_print()
    {
        ?><script type='text/javascript'>jQuery(document).ready(function(a){a('[data-countdown]').each(function(){var b=a(this),c=a(this).data('countdown');b.countdown(c,function(d){b.html(d.strftime('Còn %D ng\xE0y %H:%M:%S'))})})});</script><?php
    }
    public static function get_time_option( $options )
    {
        $time = ( isset( $options['time_countdown'] ) ) ? $options['time_countdown'] : '';
        return Vietmcn_field::get_field( array(
            'option_checked' => $time,
            'option_key' => 'time_countdown',
            'option_icon' => 'ion-ios-timer-outline',
            'option_field_type' => array(
                'checkbox' => true,
                'shortcode' => true,
            ),
            'option_field_title' => 'Tùy chọn hiển thị',
            'option_shortcode' => array( 
                'content' => '[time_down date="YY/MM/DD"/]',
                'desc' => 'Sử dụng shortcode này để hiển thị ở một trang bất kỳ mà bạn muốn.<br/> <b>Kiểu Năm/Tháng/Ngày</b>.',
            ),
            'title' => 'Time CountDown',
            'desc' => 'Models gọi thời gian kết thúc giảm ra ngoài trang chú hoặc trang xem chi tiết sản phẩm.',
            'desc_popup' => 'Tick vào để chọn không hiển thị ở trang danh mục sản phẩm.',
            'version' => '0.1',
        ) );
    }
    private static function get_time_wc( $option = null )
    {
        //import
        if ( ! class_exists( 'Vietmcn_time_shortcode' ) ) {
            // Load the Vietmcn Plugins
            require_once dirname( VIETMCN_FILE ) . '/App/Models/Time-countdown/class.time-shortcode.php';
            new Vietmcn_time_shortcode();
        }
        //import
        if ( ! class_exists( 'Vietmcn_time_wc_models' ) ) {
            // Load the Vietmcn Plugins
            require_once dirname( VIETMCN_FILE ) . '/App/Models/Time-countdown/class.time-wc.php';
            new Vietmcn_time_wc_models( $option );
        }
    }
}