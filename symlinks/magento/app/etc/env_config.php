<?php

if (strtoupper(getenv('CONFIG_ENV_MODE')) == 'LOCAL') {
    $_ENV['CONFIG__DEFAULT__WEB__UNSECURE__BASE_URL'] = "http://luma-shop.lo/";
    $_ENV['CONFIG__DEFAULT__WEB__SECURE__BASE_URL'] = "http://luma-shop.lo/";

    $_ENV['CONFIG__DEFAULT__DEV__JS__MINIFY_FILES'] = 0;
    $_ENV['CONFIG__DEFAULT__DEV__CSS__MINIFY_FILES'] = 0;
    $_ENV['CONFIG__DEFAULT__DEV__STATIC__SIGN'] = 0;
}