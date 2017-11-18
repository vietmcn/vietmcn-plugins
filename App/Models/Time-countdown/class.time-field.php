<?php 
class Vietmcn_time_field_models extends Vietmcn_models
{
    public static function time_option_field( $options, $ver = null )
    {
        $out  = '<div class="vietmcn-wrap">';
        $out .= '<div data-elemt="vietmcn-time" class="vietmcn-option-item">';
        $out .= '<div data-elemt="vietmcn-time-thumbnail" class="vietmcn-option-item-thumbnail"><i class="ion-ios-timer-outline"></i></div>';
        $out .= '<div data-elemt="vietmcn-time-title">';
        $out .= '<h2>Time CountDown - V'.$ver.' <a class="tooltip" data-variation="tiny" data-content="Hướng dẫn sử dụng" data-position="right center" target="_blank" href="//'.VIETMCN.'/vietmcn-plugins#time-countdown" title="Hướng dẫn sử dụng shortcode"><i class="ion-help-circled"></i></a></h2>';
        $out .= '<div data-elemt="vietmcn-time-desc">Models tạo đếm ngược thời gian kết thúc giảm giá</div>';
        $out .= '</div>';
        $out .= '<div class="vietmcn-option-models-setting tooltip" data-variation="tiny" data-content="Cài đặt" data-position="top center"><i class="ion-gear-a"></i></div>';
        $out .= '</div>';
        $out .= '<div class="vietmcn-option-dropdown-item">';
        $out .= self::vietmcn_time_shortcode();
        $out .= self::vietmcn_time_field( $options );
        $out .= '</div>';
        $out .= '</div>';
        return $out;
    }
    private static function vietmcn_time_shortcode()
    {
        $out = '<div class="ui tooltip col-left" data-variation="tiny" data-position="bottom left" data-title="Shortcode" data-content="Sử dụng Shortcode này để hiển thị ở nơi bạn muốn."><label><i class="ion-gear-a"></i> Shortcode:</label> <span class="vietmcn-shortcode">[time_down date="yy/mm/dd"/]</span></div>';
        return $out;
    }
    private static function vietmcn_time_field( $options )
    {
        $checked = ( isset( $options['time_countdown'] ) ) ? 'checked' : '';

        $out  = '<div class="cntr col-right tooltip" data-variation="tiny" data-position="bottom left" data-content="Tùy chọn này sẽ ẩn việc đếm thời gian ngoài trang sản phẩm, Chọn có nếu muốn ẩn, mặc định là không.">';
        $out .= '<label class="lbl" for="cbx"><i class="ion-ios-information-outline"></i> Chỉ hiện ở trang xem sản phẩm:</label><input name="vietmcn_add_option_item[time_countdown]" class="hidden-xs-up" id="cbx" type="checkbox" '.$checked.' value="true"><label class="cbx" for="cbx" ></label>';
        $out .= '</div>';
        return $out;

    }
}
//New Object Ố là la
new Vietmcn_time_field_models();