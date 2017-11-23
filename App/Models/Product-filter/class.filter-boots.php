<?php 
class Vietmcn_product_filter_boots extends Vietmcn_boots
{
    public function __construct( $option )
    {
        self::$options = $option;
        $this->import( array(
            'require' => 'Product-filter/class.filter-price',
            'Class' => 'Vietmcn_filter_price_models',
        ) );
    }
    public function script()
    {
        
    }
}