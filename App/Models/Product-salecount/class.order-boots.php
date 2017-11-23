<?php 
class Vietmcn_customer_order_boots extends Vietmcn_boots
{
    public function __construct( $option = null )
    {
        self::$options = $option;

        add_action( 'vietmcn_option_hook', array( $this, 'get_option' ) );
        
        $this->import( array(
            'Class' => 'Vietmcn_product_ordercount',
            'require' => 'Product-salecount/class.order-count',
            'option' => array(
                'name' => self::$options['product_count_order']['text'],
                'icon' => true,
                'icon_name' => '',
                'hidden' => ( isset( self::$options['product_count_order']['checked'] ) ) ? true : '',
            ),
        ) );
    }
    public function get_option()
    {
        $out = Vietmcn_field::get_field( array(
            'title' => 'Product Order Count',
            'desc' => 'Models Hiển thị tổng số người đã mua trên từng sản phẩm.',
            'version' => '0.1',
            'option' => array(
                'key' => 'product_count_order',
                'icon' => 'ion-android-contacts',
                'checked' => ( isset( self::$options['product_count_order']['checked'] ) ) ? true : '',
                'text_value' => ( isset( self::$options['product_count_order']['text'] ) ) ? self::$options['product_count_order']['text'] : '',
                'desc_popup' => 'Tick vào để chọn không hiển thị ở trang danh mục sản phẩm.',
                'color' => 'rgb(236, 193, 78)',
                'field' => array(
                    'title' => 'Tùy chọn hiển thị',
                    'textbox' => true,
                    'checkbox' => true,
                    'multi_input' => array(
                        'multi' => true,
                        'check' => 'checked',
                        'input' => 'text'
                    ),
                    'desc' => 'Thay đổi tên của thuộc tính, tổng số sản phẩm đã đc bán.'
                ),
            ),
        ) );
        echo $out;
    }
}