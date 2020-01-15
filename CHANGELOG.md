# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]
### Added
- Support for automatic package discovery in Laravel 5.5+.
- New changelog.

### Changed
- Support Laravel 6.x by converting string helpers to use support classes.
- Sort packages in composer.json file.
- Update tests to work with all supported Laravel and PHP versions.
- Update CI configs for increased test coverage.
- Update readme with new version information.

## [1.0.1] - 2017-02-23
### Added
- Feature detection to help support multiple Laravel versions.
- PHP code sniffer for code formatting.

### Changed
- Update database connection registration to support Laravel 5.4+.
- Update travis and scrutinizer to use vendor phpunit.
- Update phpunit to whitelist php files in src.
- Update readme with supported versions.

### Fixed
- Fix code style violations found by new code sniffer.
- Fix phpunit testcase parent to support PHP <= 5.6.

## 1.0.0 - 2016-01-15
### Added
- Initial release!

[Unreleased]: https://github.com/shiftonelabs/laravel-nomad/compare/1.0.1...HEAD
[1.0.1]: https://github.com/shiftonelabs/laravel-nomad/compare/1.0.0...1.0.1
