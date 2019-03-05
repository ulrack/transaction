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

### Request

The implementation of a `\Ulrack\Transaction\Common\RequestInterface` is provided
in `\Ulrack\Transaction\Transaction\Request`.
Requests expect their arguments in the constructor.

The first argument expects a method. This method can be picked from the
`\Ulrack\Transaction\Common\RequestInterface` and should be one of:
- `RequestInterface::METHOD_GET`
- `RequestInterface::METHOD_POST`
- `RequestInterface::METHOD_PUT`
- `RequestInterface::METHOD_PATCH`
- `RequestInterface::METHOD_DELETE`

The second argument expects a target for the request.
In the case of a HTTP request this would the URI for the request.

The third argument is the payload of the request.
The payload would be the body of a request, in the case of a HTTP POST request, this would be the form data.

The fourth argument is optional and expects an associative array with headers.

The fifth argument is also optional and expects a `SearchCriteriaInterface` object.
In the case of a HTTP GET request this would be cause the GET parameters to be filled.

### Response

The implementation of a `\Ulrack\Transaction\Common\ResponseInterface` is provided
in `\Ulrack\Transaction\Transaction\Response`.

The first parameter of a response object expects a boolean representing whether the request was success.

The second parameter expects the body of the response which was received from the request.

The third parameter expects an integer representing the status code of the response.

The fourth parameter is optional and expects an associative array of response headers.

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
