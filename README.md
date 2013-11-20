#Formal

Kohana module and jQuery plugin to handle form validation at client and server side. It makes use of the Kohana Validation object and adds some useful functionality (eg. adding error messages not specific to fields).

#### What it does

The jQuery plugin and Kohana module work closely together to validate posted (form) data and report back to the user.

#### What it does not

It is not a form builder. It can be used to validate forms build by a form builder though!

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

Add rules to `config/formal/rules.php`.

## Examples

TODO
