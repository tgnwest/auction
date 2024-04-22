<?php

declare(strict_types=1);

$commonFiles = glob(__DIR__ . '/common/*.php');
$envFiles = glob(__DIR__ . '/' . (getenv('APP_ENV') ?: 'prod') . '/*.php');
$files = array_merge(
    $commonFiles === false ? [] : $commonFiles,
    $envFiles === false ? [] : $envFiles
);

$configs = array_map(
    static function (string $file) {
        /**
         * @var array
         * @noinspection PhpIncludeInspection
         * @psalm-suppress UnresolvableInclude
         */
        return require $file;
    },
    $files
);

return array_replace_recursive(...$configs);
