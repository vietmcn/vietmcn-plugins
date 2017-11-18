<?php 
class Vietmcn_time_boots extends Vietmcn_models
{
    public function __construct()
    {
        add_action( 'wp_enqueue_scripts', array( $this, 'time_script' ) );
        add_action( 'wp_footer', array( $this, 'time_script_print' ) );
        self::get_time_wc();
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
        //import
        if ( !class_exists( 'Vietmcn_time_field_models' ) ) {
            // Load the Vietmcn Plugins
            require_once dirname( VIETMCN_FILE ) . '/App/Models/Time-countdown/class.time-field.php';
            return Vietmcn_time_field_models::time_option_field( $options, self::time_version() );
        }
    }
    public static function get_time_wc()
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
            new Vietmcn_time_wc_models();
        }
    }
    public static function time_version()
    {
        return '0.1';
    }
}