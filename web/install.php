<?php

if (!file_exists('build/composer.phar')) {
    echo "# Downloading Composer installer..." . PHP_EOL;
    @mkdir('build');
    file_put_contents("build/install_composer.php", file_get_contents('http://getcomposer.org/installer'));

    echo "# Installing Composer" . PHP_EOL;
    echo shell_exec("php build/install_composer.php --install-dir build");
}

if (!file_exists('.htaccess')) {
    echo "# Copying .htaccess" . PHP_EOL;
    copy('.htaccess.dist', '.htaccess');
}

if (!file_exists('usr/configuration.php')) {
    echo "# Copying user configuration" . PHP_EOL;
    copy('usr/configuration.php.dist', 'usr/configuration.php');
}

echo "# Installing dependencies" . PHP_EOL;
echo shell_exec("php build/composer.phar install --dev");

echo "# Done" . PHP_EOL;