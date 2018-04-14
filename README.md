[![Total Downloads](https://img.shields.io/packagist/dt/chiron/chiron-skeleton.svg?style=flat-square)](https://packagist.org/packages/chiron/chiron-skeleton/stats)
[![Monthly Downloads](https://img.shields.io/packagist/dm/chiron/chiron-skeleton.svg?style=flat-square)](https://packagist.org/packages/chiron/chiron-skeleton/stats)

#Chiron-Skeleton

Skeleton for Chiron microframework.

## Getting Started

Start your new Chiron project with composer:

```bash
$ composer create-project chiron/chiron-skeleton <project-path>
```

After choosing and installing the packages you want, go to the
`<project-path>` and start PHP's built-in web server to verify installation:

```bash
$ composer start --timeout=0 serve
```

You can then browse to http://localhost:8080.

> ### Linux users
>
> On PHP versions prior to 7.1.14 and 7.2.2, this command might not work as
> expected due to a bug in PHP that only affects linux environments. In such
> scenarios, you will need to start the [built-in web
> server](http://php.net/manual/en/features.commandline.webserver.php) yourself,
> using the following command:
>
> ```bash
> $ php -S 0.0.0.0:8080 -t public/ public/index.php
> ```

> ### Setting a timeout
>
> Composer commands time out after 300 seconds (5 minutes). On Linux-based
> systems, the `php -S` command that `composer serve` spawns continues running
> as a background process, but on other systems halts when the timeout occurs.
>
> As such, we recommend running the `serve` script using a timeout. This can
> be done by using `composer run` to execute the `serve` script, with a
> `--timeout` option. When set to `0`, as in the previous example, no timeout
> will be used, and it will run until you cancel the process (usually via
> `Ctrl-C`). Alternately, you can specify a finite timeout; as an example,
> the following will extend the timeout to a full day:
>
> ```bash
> $ composer run --timeout=86400 serve
> ```

### Setup environment variables
The root directory of your application contain a `.env.example` file used to store the environment variables (password, cache driver...etc).
If you install Chiron via Composer, this file will automatically be renamed to .env. Otherwise, you should rename the file manually.
This file is ignored by Git so all developers working on the project can have their own configuration.

> The .env file should only be used in development/testing/staging environments. For production environments, use "real" environment variables. 
> But to avoid accident there is a `.htaccess` file in the 'app' directory, this should at least give you protection from exposing passwords and other sensitive info in your .env files
