# ★ Laravel Command Banner: Prevents Commands from Running in Defined Environments

[![Latest Version on Packagist](https://img.shields.io/packagist/v/halilcosdu/laravel-command-banner.svg?style=flat-square)](https://packagist.org/packages/halilcosdu/laravel-command-banner)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/halilcosdu/laravel-command-banner/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/halilcosdu/laravel-command-banner/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/halilcosdu/laravel-command-banner/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/halilcosdu/laravel-command-banner/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/halilcosdu/laravel-command-banner.svg?style=flat-square)](https://packagist.org/packages/halilcosdu/laravel-command-banner)


The "Laravel Command Banner" is a package designed to provide control over the execution of artisan commands in different environments. It allows developers to define which commands should be prevented from running in specific environments, enhancing the security and stability of the application.  The package works by listening to the CommandStarting event in Laravel. When a command is about to start, it checks the package's configuration to see if the command is allowed to run in the current environment. If the command is not allowed, it outputs an error message and stops the execution of the command.  This package is particularly useful in scenarios where certain commands can have destructive effects if run in the wrong environment, such as a production environment. By using this package, developers can ensure that such commands are only run in safe environments, such as local or staging environments.
## Installation

You can install the package via composer:

```bash
composer require halilcosdu/laravel-command-banner
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="command-banner-config"
```

This is the contents of the published config file:

You can add as many environments and different commands to the configuration file as you need.

The package will prevent the commands listed in the configuration file from running in the specified environments.

```php
<?php

return [
    'enabled' => env('COMMAND_BANNER_ENABLED', true),
    'environments' => [
        'production' => [
            //  'db:wipe'
        ],
        'staging' => [
            //   'db:show'
        ]
    ],
];

```

### Example Screen

<a href="https://i.ibb.co/NNXVWSr/Screenshot-2024-05-11-at-22-01-46.png">
<img src="https://i.ibb.co/NNXVWSr/Screenshot-2024-05-11-at-22-01-46.png" alt="Screenshot" style="width:100%;">
</a>

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Halil Cosdu](https://github.com/halilcosdu)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
