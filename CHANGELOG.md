# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## 3.0.0 - 2019-05-16
### Added
- MethodEnum to make a more strict definition of the available methods.

### Changed
- Order of parameters for the Request object constructor.

### Deprecated
- Nothing

### Removed
- RequestInterface method definitions.

### Fixed
- Nothing

### Security
- Nothing

## 2.0.0 - 2019-03-22
### Added
- Added parameters to the Request interface and implementation.

### Changed
- Order of constructor parameters
- Default value of the request method.

### Deprecated
- Nothing

### Removed
- SearchCriteria dependency by expecting GET parameters as an associative array.

### Fixed
- Nothing

### Security
- Nothing

## 1.0.0 - 2019-03-05
### Added
- Initial implementation of ulrack/transaction
- `Ulrack\Transaction\Common\RequestInterface`
- `Ulrack\Transaction\Common\ResponseInterface`
- `Ulrack\Transaction\Transaction\Request`
- `Ulrack\Transaction\Transaction\Response`
- `Ulrack\Transaction\Exception\HeaderNotFoundException`
- Unit Tests

### Changed
- Nothing

### Deprecated
- Nothing

### Removed
- Nothing

### Fixed
- Nothing

### Security
- Nothing

[Unreleased]: https://github.com/ulrack/transaction/compare/3.0.0...HEAD
[3.0.0]: https://github.com/ulrack/transaction/compare/2.0.0...3.0.0
[2.0.0]: https://github.com/ulrack/transaction/compare/1.0.0...2.0.0
