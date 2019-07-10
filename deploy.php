<?php

namespace Deployer;

require 'recipe/laravel.php';

// Configuration

set('repository', 'git@github.com:CarlosSorto/uca.padf.git');
set('branch', 'develop');
set('http_user', 'www');
set('git_tty', true); // [Optional] Allocate tty for git on first deployment
set('shared_files', ['.env']);
set('shared_dirs', [
    'storage/app',
    'storage/framework/cache',
    'storage/framework/sessions',
    'storage/framework/views',
    'storage/streams',
    'storage/logs',
    'vendor',
]);
set('writable_dirs', ['bootstrap/cache', 'storage']);

// Hosts

host('www@104.131.130.10')
    ->stage('staging')
    ->set('deploy_path', '/home/www/public/website.uca.iw.sv');


// Tasks

desc('Restart PHP-FPM service');
task('php-fpm:restart', function () {
    // The user must have rights for restart service
    // /etc/sudoers: username ALL=NOPASSWD:/bin/systemctl restart php-fpm.service
    run('sudo systemctl restart php-fpm.service');
});
// after('deploy:symlink', 'php-fpm:restart');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');
