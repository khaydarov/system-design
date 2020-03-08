<?php
namespace Deployer;

require 'recipe/common.php';

// Project name
set('application', 'project');

// Project repository
set('repository', 'git@github.com:khaydarov/sari-chashma.tmp.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys 
set('shared_files', []);
set('shared_dirs', []);

// Writable dirs by web server 
set('writable_dirs', []);

set('slack_text', '{{user}} deploying {{branch}} to {{hostname}}');


// Hosts

host('beta')
    ->hostname('localhost')
    ->set('deploy_path', '~/Development/phprightway/deployment/project');
    

// Tasks
task('test', function () {
    writeln("{{ release_path }}");
});

task('npm:install', function() {
    run('npm install');
});

desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'npm:install',
    'success',
]);

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
