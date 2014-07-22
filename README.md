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

It currently has 2 built in checks; one to check if in dev mode and the other to check if the default admin is in use.

To add a check, create a file in */mysite/code* called ```DevCheck_[your_check_name].php``` with the following functions:

example:
```php
<?php

class DevCheck_example implements DevChecks_interface {

	public function showMessage() {
        return Director::isLive(); // Our conditional code, this can be anything as long as it returns true or false
	}

	public function getMessage() {
		return 'Live Mode'; // Message to be displayed
	}

	public function getSeverity() {
		return 2; // 0 = severe, 1 = warning, 2 = info
	}
    
}

```
Then *dev/build*