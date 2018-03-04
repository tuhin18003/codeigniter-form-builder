# Codeigniter Form Builder

This is under heavy construction and in early alpha stages. It is an easy way to create form in Codeigniter developement.


## Installation

#### Bleeding Edge
During your development, you can keep up with the latest changes on the master branch by setting the version
requirement for form_builder to `dev-master`
```json
{
   "require": {
      "tuhin18003/codeigniter-form-builder": "dev-master"
   }
}
```

#### Via command line:
```shell
composer require tuhin18003/codeigniter-form-builder
```


## How to use:
You can use it very easily on your code and easily create bootstrap from without typing html into view file.

#### Basic Form Example:
```code
public function index()
{
  $this->load->helper('form');
            
  $form = new \Cs_form\Cs_form();
  $bootstrap = $form->Bootstrap();
            
  $inputs = $bootstrap->generate_basic_form(array(
  	'action' => 'test',
        'attributes' => array( 'class' => 'formclass', 'id' => 'myform' ),
        'fields' => array(
        	array(
                	'type'          => 'text',
                        'label'         => array( 'text' => 'What is your Name', 'id' => 'username', 'attribute' => array( 'class' => '')),
                        'input'          => array(
                            'name'          => 'username',
                            'id'            => 'username',
                            'value'         => 'johndoe',
                            'class'         => 'form-control'
                        )
                    )
                )
            ));
            
   $this->load->view( 'welcome_message', array( 'inputs' => $inputs ) );
}
```

#### Inline Form Example:
```code
 $inputs = $bootstrap->generate_inline_form(array(
  	'action' => 'test',
        'attributes' => array( 'id' => 'myform' ),
        'fields' => array(
        	array(
                	'type'          => 'text',
                        'label'         => array( 'text' => 'What is your Name', 'id' => 'username', 'attribute' => array( 'class' => '')),
                        'input'          => array(
                            'name'          => 'username',
                            'id'            => 'username',
                            'value'         => 'johndoe',
                            'class'         => 'form-control'
                        )
                    )
                )
            ));
```

#### Horizontal Form Example:
```code
$inputs = $bootstrap->generate_horizontal_form(array(
  	'action' => 'test',
        'attributes' => array( 'id' => 'myform' ),
        'fields' => array(
        	array(
                	'type'          => 'text',
                        'label'         => array( 'text' => 'What is your Name', 'id' => 'username', 'attribute' => array( 'class' => 'col-sm-2 control-label')),
                        'input'          => array(
                            'name'          => 'username',
                            'id'            => 'username',
                            'value'         => 'johndoe',
                            'class'         => 'form-control',
                            'input_wrap_class' => 'col-sm-10'
         )
      )
   )
));
  
```

