# Silverstripe Dev Checks

Conditional CMS info boxes.

![Dev Checks](http://f.cl.ly/items/2C0B1J1E02462L3H1d11/Image%202014-07-22%20at%2011.28.36%20am.png)

By Stan Hutcheon - [Bigfork Ltd](http://bigfork.co.uk)

## Installation:

### Composer:

```
composer require "stnvh/silverstripe-devchecks" dev-master
```

### Download:

Clone this repo into a folder called ```devchecks``` in your silverstripe installation folder.

### Usage:

It currently only checks if dev mode is active, or if the default admin login credentials are being used. More checks can be added:

*code/DevChecks.php:*
```php
<?php

class DevChecks extends LeftAndMainExtension {
	***
	$defaults = array(
			'pass' => array(
				'type' => 0,
				'show' => false,
				'message' => 'Default password'
			),
			'dev' => array(
				'type' => 1,
				'show' => false,
				'message' => 'Dev mode'
			)
		);
    ***
}

```
Add your check as an array to the ```$defaults``` array, following the format:
```php
'key' => array(
	'type' => 0, // 0 = serious, 1 = warning, 2 = info	
    'show' => false, // default showing value
    'message' => 'Test message' // The message you wish to display in the CMS
)
```

Then add your conditional code, be sure to set the ```$defaults['key']['show'] = true``` in the statement, e.g:
```php
if(Director::get_environment_type() == 'live') { // if we're in live mode
	$defaults['key']['show'] = true;
}
```