[![Build Status](https://travis-ci.com/ulrack/transaction.svg?branch=master)](https://travis-ci.com/ulrack/transaction)

# Ulrack Transaction

Ulrack Transaction offers standard objects for requests and responses.
These objects can be used to standardize transactions between systems.
Both the `Request` and `Response` objects are build to be immutable after construction.

## Installation

To install the package run the following command:

```
composer require ulrack/transaction
```

## Usage

### [Request](src/Transaction/Request.php)

A simple data access object for defining incoming web requests.
This instance requires one of the [MethodEnum](src/Common/MethodEnum.php) 
options to be passed.

### [Response](src/Transaction/Response.php)

A simple data access object for defining outgoing web responses. 

### [Command](src/Transaction/Command.php)

A simple data access object for defining incoming CLI instructions. 

### Factories

#### [CommandFactory](src/Factory/CommandFactory.php)

A static factory which creates [Commands](src/Transaction/Command.php) based on
provided arguments. 

The following example will generate a command object.

```php
<?php

use Ulrack\Transaction\Factory\CommandFactory;
use Ulrack\Transaction\Common\CommandInterface;

/** @var CommandInterface $subject */
$subject = CommandFactory::create($_SERVER['argv']);
```

#### [RequestFactory](src/Factory/RequestFactory.php)

A static factory which creates [Requests](src/Transaction/Request.php) based on
provided arguments. 

The following example will generate a request object.

```php
<?php

use Ulrack\Transaction\Factory\RequestFactory;
use Ulrack\Transaction\Common\RequestInterface;

/** @var RequestInterface $subject */
$subject = RequestFactory::create($_SERVER, $_GET, $_POST);
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## MIT License

Copyright (c) 2019 Jyxon

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
