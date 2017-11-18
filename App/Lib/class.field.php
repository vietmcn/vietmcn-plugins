<?php 
class Vietmcn_field
{
    public static function field_checkbox( $att = array() )
    {
        $checked = ( ! empty( $att['options'] ) ) ? 'checked' : '';
        //
        $out  = '<div class="col-left">';
        $out .= '<label class="cntr tooltip" data-variation="tiny" data-position="left center" data-content="'.$att['desc_popup'].'">';
        $out .= '<span class="lbl"><i class="ion-ios-information-outline"></i>Chọn ẩn:</span>';
        $out .= '<input name="vietmcn_add_option_item['.$att['option_key'].']" class="hidden-xs-up" id="cbx" type="checkbox" '.$checked.' value="true">';
        $out .= '<span class="cbx"></span>';
        $out .= '</label>';
        $out .= '</div>';
        return $out;
    }
    public static function field_shortcode( $att = array() )
    {
        $out  = '<div class="ui tooltip col-right" data-variation="tiny" data-position="left center" data-title="Shortcode" data-content="'.$att['options_shortcode_desc'].'">';
        $out .= '<label><i class="ion-gear-a"></i> Shortcode:</label>';
        $out .= '<span class="vietmcn-shortcode">'.$att['options_shortcode'].'</span>';
        $out .= '</div>';
        return $out;
    }
    public static function field_input()
    {
        
    }
    private static function option_dropdown( $att = array() )
    {
        if ( isset( $att['option_field_type'] ) == 'checkbox' ) {

            return self::field_checkbox( $att );

        } 
        if ( isset( $att['option_field_type'] ) == 'textbox' ) {

            return self::field_input( $att );

        }
        if ( isset( $att['option_field_type'] ) == 'textbox' ) {

            return self::field_shortcode( $att );

        }

    }
    public static function get_field( $att = array() )
    {
        $out  = '<div class="vietmcn-wrap">';
        $out .= '<div data-elemt="vietmcn-time" class="vietmcn-option-item">';
        $out .= '<div data-elemt="vietmcn-time-thumbnail" style="background:'.$att['option_bg'].'" class="vietmcn-option-item-thumbnail"><i class="'.$att['option_icon'].'"></i></div>';
        $out .= '<div data-elemt="vietmcn-time-title">';
        $out .= '<h2>'.$att['title'].'- V'.$att['version'].' <a class="tooltip" data-variation="tiny" data-content="Hướng dẫn sử dụng" data-position="right center" target="_blank" href="//'.VIETMCN.'/vietmcn-plugins#time-countdown" title="Hướng dẫn sử dụng"><i class="ion-help-circled"></i></a></h2>';
        $out .= '<div data-elemt="vietmcn-time-desc">'.$att['desc'].'</div>';
        $out .= '</div>';
        $out .= '<div class="vietmcn-option-models-setting"><i class="ion-gear-a"></i></div>';
        $out .= '</div>';
        //
        $out .= '<div class="vietmcn-option-dropdown-item">';
        
        $out .= self::option_dropdown( $att );

        $out .= '</div>';
        $out .= '</div>';
        return $out;
    }
}
//New Object Ố là la
new Vietmcn_field();