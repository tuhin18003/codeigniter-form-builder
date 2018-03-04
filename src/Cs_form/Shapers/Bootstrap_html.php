<?php namespace Cs_form\Shapers;
/**
 * Bootstrap Interface Class
 * 
 * @package Bootstrap
 * @since 1.0.0
 * @author CodeSolz <customer-service@codesolz.com>
 */

class Bootstrap_html{
    
    /**
     * Generate basic field
     * 
     * @param type $label
     * @param type $input
     * @return type
     */
    public function bootstrap_basic_field_wrap( $label, $input, $input_wrap_class = FALSE ){
        return '<div class="form-group">'. $label . $input .'</div>';
    }
    
    /**
     * Generate Inline field
     * 
     * @param type $label
     * @param type $input
     * @return type
     */
    public function bootstrap_inline_field_wrap( $label, $input, $input_wrap_class = FALSE ){
        return '<div class="form-group">'. $label .'&nbsp;'. $input .'</div>';
    }
    
    /**
     * Generate Horizontal field
     * 
     * @param type $label
     * @param type $input
     * @return type
     */
    public function bootstrap_horizontal_field_wrap( $label, $input, $input_wrap_class = FALSE ){
        $field = '<div class="form-group">'. $label;
        $field .= '<div class="'.$input_wrap_class.'">'. $input . '</div></div>';
        return $field;
    }
}
