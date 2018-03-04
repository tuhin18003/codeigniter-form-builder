<?php namespace Cs_form\Shapers;
/**
 * Abstract Form Class
 * 
 * @package Shapers
 * @since 1.0.0
 * @author CodeSolz <customer-service@codesolz.com>
 */
//use Cs_form\Shapers\Bootstrap_interface;

use Cs_form\Shapers\Bootstrap_html;

class AbstractCiForm extends Bootstrap_html{
    
    /**
     * Generate Input Fields
     * 
     * @param array $argc
     * @return boolean | string
     */
    public function generate_fields($argc, $type = FALSE, $field_wrap = TRUE ){
        if( ! is_array($argc) && empty($argc)) return false;
        $form_fields = '';
        foreach ($argc as $input)
        {
            if (method_exists( $this, ($method = '_form_field_'.$input['type']))) 
            {
                $form_fields .= $this->$method( $input, $type, $field_wrap );
            }
        }
        return $form_fields;
    }
    
    /**
     * Get Form Input Text
     * 
     * @param array $argc
     * @return boolean|string
     */
    public function _form_field_text( $argc, $type, $field_wrap ){
        if ( ! \is_array($argc) OR empty($argc)) 
        {
            return FALSE;
        }
        
        if (isset($argc['label']))
        {
            $text = isset($argc['label']['text']) ? $argc['label']['text'] : '';
            $id = isset($argc['label']['id']) ? $argc['label']['id'] : '';
            $attr = isset($argc['label']['attribute']) ? $argc['label']['attribute'] : '';
            $label = form_label($text, $id, $attr);
        }
        
        $input_wrap_class = '';
        if( isset($argc['input']['input_wrap_class'])){
            $input_wrap_class = $argc['data']['input_wrap_class'];
            unset( $argc['input']['input_wrap_class'] );
        }
        
        $input = form_input( $argc['input'] );
        
        if ( ! empty($type))
        {
            return $this->{$type.'_field_wrap'}( $label, $input, $input_wrap_class );
        }
        elseif ( empty($type ) && TRUE === $field_wrap)
        {
            return '<p>'. $label .'<br>' . $input .'</p>';
        }
        elseif ( empty($type ) && FALSE === $field_wrap)
        {
            return $label .'<br>' . $input;
        }
        
        if($type == 'bootstrap_basic'){
            
        }
        
    }
    
    
}
