<?php 
class Vietmcn_filter_price_models extends Vietmcn_models 
{
    public function __construct()
    {
        add_action( 'wp_footer', array( $this, 'price_min' ) );
    }
    public function price_min() 
    {
        echo $_GET['price_min'];
    }
}