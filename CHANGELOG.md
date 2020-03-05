# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## 5.0.1 - 2020-03-05
### Changed
- Changed company name references.

## 5.0.0 - 2019-11-10
### Changed
- Unified namespace conventions used across packages

## 4.0.0 - 2019-10-10
### Added
- Command interface and implementation.
- Factories for Requests and Commands.

### Changed
- Request and response methods return types to simplify implementing the
objects in applications.
- Simplified the README for easier maintenance.

## 3.0.0 - 2019-05-16
### Added
- MethodEnum to make a more strict definition of the available methods.

### Changed
- Order of parameters for the Request object constructor.

### Removed
- RequestInterface method definitions.

## 2.0.0 - 2019-03-22
### Added
- Added parameters to the Request interface and implementation.

### Changed
- Order of constructor parameters
- Default value of the request method.

### Removed
- SearchCriteria dependency by expecting GET parameters as an associative array.

## 1.0.0 - 2019-03-05
### Added
- Initial implementation of ulrack/transaction
- `Ulrack\Transaction\Common\RequestInterface`
- `Ulrack\Transaction\Common\ResponseInterface`
- `Ulrack\Transaction\Transaction\Request`
- `Ulrack\Transaction\Transaction\Response`
- `Ulrack\Transaction\Exception\HeaderNotFoundException`
- Unit Tests

[Unreleased]: https://github.com/ulrack/transaction/compare/5.0.1...HEAD
[5.0.1]: https://github.com/ulrack/transaction/compare/5.0.0...5.0.1
[5.0.0]: https://github.com/ulrack/transaction/compare/4.0.0...5.0.0
[4.0.0]: https://github.com/ulrack/transaction/compare/3.0.0...4.0.0
[3.0.0]: https://github.com/ulrack/transaction/compare/2.0.0...3.0.0
[2.0.0]: https://github.com/ulrack/transaction/compare/1.0.0...2.0.0
