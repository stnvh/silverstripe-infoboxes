# Silverstripe Info Boxes
[![Build Status](https://travis-ci.org/stnvh/silverstripe-infoboxes.svg?branch=master)](https://travis-ci.org/stnvh/silverstripe-infoboxes) [![Latest Stable Version](https://poser.pugx.org/stnvh/silverstripe-infoboxes/v/stable.svg)](https://packagist.org/packages/stnvh/silverstripe-infoboxes) [![License](https://poser.pugx.org/stnvh/silverstripe-infoboxes/license.svg)](https://packagist.org/packages/stnvh/silverstripe-infoboxes)

Conditional CMS info boxes.

![Info Boxes](http://f.cl.ly/items/2C0B1J1E02462L3H1d11/Image%202014-07-22%20at%2011.28.36%20am.png)

By Stan Hutcheon - [Bigfork Ltd](http://bigfork.co.uk)

## Installation:

### Composer:

```
composer require "stnvh/silverstripe-infoboxes" "1.*"
```

### Download:

Clone this repo into a folder called ```infoboxes``` in your silverstripe installation folder.

### Usage:

It currently has 5 built in checks:

- Dev mode
- Favicon existance
- Google analytics code
- Default password
- if www is used

To add a check, create a file in */mysite/code/* called ```InfoBox_[your_check_name].php``` with the following functions:

example:
```php
<?php

class InfoBox_example implements InfoBox {

	public function show() {
        return Director::isLive(); // Our conditional code, this can be anything as long as it returns true or false
	}

	public function message() {
		return 'Live Mode'; // Message to be displayed
	}

	public function severity() {
		return 2; // 0 = severe, 1 = warning, 2 = info
	}
    
}

```
After installing via composer, or after adding a new InfoBox, you must */dev/build*
