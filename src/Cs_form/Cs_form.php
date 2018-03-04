<?php namespace Cs_form;
/**
 * Cs Form
 * 
 * @package Form Generator
 * @since 1.0.0
 * @author CodeSolz <customer-service@codesolz.com>
 */

class Cs_form{
    
    protected $apis = [ ];
    
    function __construct() {
        //load CI form helper
    }

    /**
     * Call api
     * 
     * @param type $method
     * @param type $arguments
     * @return type
     */
    public function __call( $method, $arguments ) {
        return $this->getApi( ucwords( $method ) );
    }

    /**
     * Returns the requested class name, optionally using a cached array so no
     * object is instantiated more than once during a request.
     *
     * @param string $class
     *
     * @return mixed
     */
    private function getApi( $class ) {
        $class = '\Cs_form\\Shapers\\' . $class;

        if ( ! array_key_exists( $class, $this->apis ) ) {
            $this->apis[ $class ] = new $class( $this );
        }

        return $this->apis[ $class ];
    }
    
    /**
     * Generate Codeigniter form
     * 
     * @param type $argc
     * @return type
     */
    public function generate_form( $argc ){
        $form = '';
        $hidden_fields = isset($argc->fields['hidden_fields']) ? $argc->fields['hidden_fields'] : '';
        if (isset($argc->fields['file_upload']) && TRUE === $argc->fields['file_upload'])
        {
            $form = form_open_multipart( $argc->action, $argc->attributes, $hidden_fields );
            unset($argc->fields['file_upload']);
        }else{
            $form = form_open( $argc->action, $argc->attributes, $hidden_fields );
        }
        $form .= $argc->fields . form_close();
        return $form;
    }
    
}