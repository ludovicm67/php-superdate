# Superdate

> Some useful functions for working with dates

[![Latest Stable Version](https://poser.pugx.org/ludovicm67/superdate/v/stable)](https://packagist.org/packages/ludovicm67/superdate)
[![Total Downloads](https://poser.pugx.org/ludovicm67/superdate/downloads)](https://packagist.org/packages/ludovicm67/superdate)
[![Build Status](https://travis-ci.org/ludovicm67/php-superdate.svg?branch=master)](https://travis-ci.org/ludovicm67/php-superdate)
[![Coverage Status](https://coveralls.io/repos/github/ludovicm67/php-superdate/badge.svg?branch=master)](https://coveralls.io/github/ludovicm67/php-superdate?branch=master)
[![License](https://poser.pugx.org/ludovicm67/superdate/license)](https://packagist.org/packages/ludovicm67/superdate)

## Installation

Just run the following command: `composer require ludovicm67/superdate`
to add it to your PHP project!

## Getting started

If you installed using composer, you can now create a file with the following code:

```php
<?php

// import here the composer autoloader
require('./vendor/autoload.php');

// use the namespace for this library
use ludovicm67\SuperDate\Date;

// your code below...
```

### Create a Date object

Many ways to initialize the object.

For example:

```php
// value: today
$date = new Date();
$date = new Date(null);

// value: specified date
$date = new Date("2019-03-21");
```

### All days from one date to an other date

Get an array of all days from the current date to an other one.

Example:

```php
$date = new Date("2019-03-21");
$allDaysTo = $date->allDaysTo("2019-04-03");

// $allDaysTo will be an array containing all 14 days
// between 2019-03-21 and 2019-04-03 included
```

### Is it a week day or a weekend day?

```php
$date->isWeekDay(); // true if between monday and friday, false if saturday or sunday
$date->isWeekEnd(); // false if between monday and friday, true if saturday or sunday
```

### Is it a holiday day?

Based on Alsace, France holidays.

Usage:

```php
$date->isHoliday(); // true if holiday, false if not
```

## Want to contribute?

Feel free to fork, commit and open a pull-request.

Or just open an issue here: https://github.com/ludovicm67/php-superdate/issues.
