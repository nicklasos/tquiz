<?php

namespace Deployer;

require 'recipe/laravel.php';
require 'contrib/npm.php';

// Config

set('repository', 'git@github.com:nicklasos/tquiz.git');

add('shared_files', ['public/sitemap.xml']);
add('shared_dirs', []);
add('writable_dirs', []);

// Tasks

task('deploy', [
    'deploy:prepare',
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:optimize:clear',
    'artisan:migrate',
    'deploy:php:reload',
    'npm:install',
    'npm:build',
    'deploy:publish',
]);

desc('Build assets');
task('npm:build', function () {
    run("cd {{release_path}} && {{bin/npm}} run build");
});

desc('Restart php-fpm service');
task('deploy:php:reload', function () {
    run('for s in $( service --status-all | grep -o "\bphp.*fpm\b" ); do sudo service $s reload; done');
});

desc('Terminate horizon');
task('artisan:horizon:terminate', artisan('horizon:terminate'));

desc('Terminate horizon');
task('horizon:terminate', function () {
    run('cd {{release_or_current_path}} && sudo {{bin/php}} artisan horizon:terminate');
});

try {
    $env = explode("\n", file_get_contents(__DIR__.'/.env'));
    $ipLine = array_values(array_filter($env, fn(string $line) => str_contains($line, 'DEPLOY_IP')))[0];
    $ip = explode('=', str_replace(['"', "'"], '', $ipLine))[1];
} catch (\Exception) {
    echo "Add DEPLOY_IP=0.0.0.0 to .env file\n";
    exit(1);
}


// Hosts

host('prod')
    ->setHostname($ip)
    ->setLabels([
        'env' => 'prod',
    ])
    ->setIdentityFile('~/.ssh/id_rsa')
    ->set('branch', 'main')
    ->set('remote_user', 'root')
    ->set('deploy_path', '/var/www/untrivial');

// Hooks

after('deploy:failed', 'deploy:unlock');
