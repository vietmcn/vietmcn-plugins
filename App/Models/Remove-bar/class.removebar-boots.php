<?php 
class Vietmcn_removebar_boots extends Vietmcn_boots
{
    public function __construct( $option = null )
    {
        add_action( 'vietmcn_option_hook', array( $this, 'get_option' ), 25 );
        if ( isset( $options['remove_bar'] ) == true ) {
             //remove Bar Admin
            add_filter('show_admin_bar',  '__return_false' );
        } else {
            //not think
        }
        self::$options = $option;
    }
    public function get_option( $options )
    {
        $checked = ( isset( self::$options['remove_bar'] ) ) ? self::$options['remove_bar'] : '';

        $out = Vietmcn_field::get_field( array(
            'title' => 'Ẩn thanh Adminbar',
            'desc' => 'Models khi bật lên sẽ ẩn thanh Adminbar của Wordpress.',
            'version' => '0.1',
            'option' => array(
                'key' => 'remove_bar',
                'color' => 'rgb(197, 69, 58)',
                'icon' => 'ion-minus',
                'desc_popup' => 'Mặc định là không',
                'field' => array(
                    'title' => 'Tùy chọn hiển thị',
                    'checkbox' => true,
                ),
                'checked' => $checked,
            ),
        ) );
        echo $out;
    }
}
