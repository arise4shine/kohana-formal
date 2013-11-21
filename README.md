#Formal

Kohana module and jQuery plugin to handle form validation at client and server side. It makes use of the Kohana Validation object and adds some useful functionality (eg. adding error messages not specific to fields).

#### What it does

The jQuery plugin and Kohana module work closely together to validate posted (form) data and report back to the user.

Data filled in in the form (or basically any data you want) is sent to the server using Ajax. The server validates the data and either returns error messages or a `data ok` signal. Error messages are displayed by the plugin (or your own display method). If data is validated, the plugin will either send the form using a 'normal' POST request for processing or just stay on page and tell the user his data is processed.

#### What it does not

Build a form. It can be used to validate forms that are built by a form builder though!

## Setup

#### Requirements

- Kohana version 3.3+
- jQuery
- jQuery UI (widget factory)

#### Installation

- Load the jQuery plugin on your html page
- Add the module to your Kohana bootstrap

## Basic usage

#### Attach widget to form

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('#myForm').formal();
        });
    </script>
    
#### Adding rules

Internally Formal uses the [Kohana Validation](http://kohanaframework.org/3.3/guide-api/Validation) object to validate the form. You can use every `Valid` rule, or any [php callback](http://php.net/manual/en/language.types.callable.php) if you'd like.

Add rules to `config/formal/rules.php`. The key of the array element is also the Formal key, an identifier used to distinguish different forms.

    return array(
        'myForm' => array( // The form key
            'fields' => array( // list of fields
                'text_field' => array( // <input name="text_field" ... />
                    'label' => 'Text field',
                    'rules' => array('not_empty', 'max_length' => array(':value', 10)
                ),
                
                ....
            )
        )
    );
    
#### Validate your form

In your controller, you use a Formal object to validate the form and create responses for the jQuery plugin. You should check if the form is validated, _and_ if the current request is an ajax request. If the latter case Formal will just tell the jQuery plugin that everything is fine and it can go on with either submitting the form for real, or confirm the submission of the form on page.

    $formal = Formal::factory('myForm');
    
    if(!$formal->check() || $this->request->is_ajax()) {
        return $this->response->body($formal->json_report());
    }
    
    // do stuff with the validated form
    
    $this->response->body('Thanks for filling in my form!');

## Api

TODO

## Examples

TODO
