<?php 
class Vietmcn_bootstrap
{
    public function __construct()
    {
        //@import Models
        $this->vietmcn_models();
    }
    public function vietmcn_models()
    {
        //Get Option
        $vietmcn_option = get_option( 'vietmcn_add_option_item' );

        //import models Count Down Time
        if ( ! class_exists( 'Vietmcn_time_models' ) ) {
            require_once VIETMCN_PATH .'/App/Models/Time-countdown/class.time-boot.php';
            new Vietmcn_time_boots();
        }
        //import models Count Down Time
        if ( ! class_exists( 'Vietmcn_removebar_boots' ) ) {
            require_once VIETMCN_PATH .'/App/Models/Remove-bar/class.removebar-boots.php';
            new Vietmcn_removebar_boots( $vietmcn_option );
        }
    }
}
//Return Object
return new Vietmcn_bootstrap();