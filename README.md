# Sparkline Bundle

`SparklineBundle` eases the use of the excellent/handy
[Davaxi/Sparkline php library](https://github.com/davaxi/Sparkline)
in your Symfony application by providing a Twig extension to do the work.

## Documentation

## License

SparklineBundle is released under the MIT License. See the bundled [LICENSE](LICENSE) file for details.

## Installation

Applications that use Symfony Flex
----------------------------------

Open a command console, enter your project directory and execute:

```console
composer require oncology-support/sparkline-bundle
```

Applications that don't use Symfony Flex
----------------------------------------

### Step 1: Download the Bundle

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```console
composer require oncology-support/sparkline-bundle
```

### Step 2: Enable the Bundle

Then, enable the bundle by adding it to the list of registered bundles
in the `config/bundles.php` file of your project:

```php
// config/bundles.php

return [
    // ...
    OncologySupport\Sparkline\OncologySupportSparklineBundle::class => ['all' => true],
];
```

### Step 3: Use it!

This bundle allows you to insert a sparkline graph directly into your twig templates by
passing an array of values that will be inserted into a sparkline graph. Note the use of
the `|raw` pipe function! This is important.

```php
// your twig template

{{ sparkline(<array of data>)|raw }}
```

For example, for dataset `[2,3,10,8,23,14,9,12,0,0,14]` the twig line:, 
```php
// your twig template

{{ sparkline([2,3,10,8,23,14,9,12,0,0,14])|raw }}
```

will insert a sparkline image like so:
<img src="assets/testimage.png" alt="sparkline" width=80>

In the future I may add the ability to pass options to modify the appearance of the graph.

Enjoy!
