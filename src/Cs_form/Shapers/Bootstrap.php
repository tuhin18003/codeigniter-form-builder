<?php namespace Cs_form\Shapers;
/**
 * Bootstrap
 * 
 * @package Shapers
 * @since 1.0.0
 * @author CodeSolz <customer-service@codesolz.com>
 */
use Cs_form\Cs_form;

class Bootstrap extends AbstractCiForm{
    /**
     * Hold form
     *
     * @var type 
     */
    private $form; 

    /**
     * Construct
     * 
     * @param Cs_form $form
     */
    function __construct( Cs_form $form) {
        $this->form = $form;
    }

    /**
     * Generate Default Form
     * 
     * @version 1.0.0
     * @return string
     */
    public function generate_basic_form($argc){
        $form_class = new \stdClass();
        $form_class->action = isset($argc['action']) ? $argc['action'] : '';
        $form_class->attributes = isset($argc['attributes']) ? $argc['attributes'] : '';
        $form_class->fields = $this->generate_fields( $argc['fields'], 'bootstrap_basic');
        return $this->form->generate_form($form_class);
    }
    
    /**
     * Generate Inline Form
     * 
     * @version 1.0.0
     * @return string
     */
    public function generate_inline_form($argc){
        $form_class = new \stdClass();
        $form_class->action = isset($argc['action']) ? $argc['action'] : '';
        if (isset($argc['attributes']))
        {
            if(is_array($argc['attributes']))
            {
                $attributes = $argc['attributes'];
                $attributes['class'] = 'form-inline';
            }
        }
        else
        {
            $attributes = array(
                'class' => 'form-inline'
            );
        }
        $form_class->attributes = $attributes;
        $form_class->fields = $this->generate_fields( $argc['fields'], 'bootstrap_inline');
        return $this->form->generate_form($form_class);
    }
    
    /**
     * Generate Horizontal Form
     * 
     * @version 1.0.0
     * @return string
     */
    public function generate_horizontal_form($argc){
        $form_class = new \stdClass();
        $form_class->action = isset($argc['action']) ? $argc['action'] : '';
        if (isset($argc['attributes']))
        {
            if(is_array($argc['attributes']))
            {
                $attributes = $argc['attributes'];
                $attributes['class'] = 'form-horizontal';
            }
        }
        else
        {
            $attributes = array(
                'class' => 'form-horizontal'
            );
        }
        $form_class->attributes = $attributes;
        $form_class->fields = $this->generate_fields( $argc['fields'], 'bootstrap_horizontal');
        return $this->form->generate_form($form_class);
    }
    
}