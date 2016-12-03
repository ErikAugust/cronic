#!/usr/bin/env node
var program = require('commander');
var chalk = require('chalk');
var exec = require('child_process').exec;
var childProcess = require('child_process');
var figlet = require('figlet');


var version = '0.1.0';

program.version(version);

/**
 * About
 */
program
  .command('about')
  .description('About the Cronic Framework')
  .action(function () {
    about();
  });

/**
 * Generate
 */
program
  .command('generate <type>')
  .description('Generate a new file from template - types: controller, script')
  .action(function (type) {
    generate(type);
  });

/**
 * Migrate (Phinx)
 */
program
  .command('migrate')
  .description('Runs Phinx database migration')
  .action(function (name) {
    migrate(name);
  });

/**
 * Run (Script)
 */
program
  .command('run <name> [arguments...]')
  .description('Runs a script from the scripts directory')
  .action(function (name, arguments) {
    run(name, arguments);
  });

/**
 * Setup
 */
program
  .command('setup')
  .description('Setup new project - set app config and default database connection')
  .action(function () {
    setup();
  });


/**
 * Start
 */
program
  .command('start <name>')
  .description('Starts new project within specified name')
  .action(function (name) {
    start(name);
  });

/**
 * Test
 */
program
  .command('test [name]')
  .description('Runs PHPUnit tests, runs a single test if test name specified')
  .action(function (name) {
    test(name);
  });


program.parse(process.argv);

if (!process.argv.slice(2).length) {
  program.outputHelp();
}

/**
 * Methods
 */

/**
 * @name about
 * @description
 */
function about() {

  figlet('Cronic!!!', function(err, data) {
    if (err) {
      console.log(
        chalk.bold.red('\nCronic (' + version + ')\n')
      );
      process.exit(1);
    }
    console.log(data);
    console.log(
      chalk.bold.red('\nCronic (' + version + ')\n')
    );

    process.exit(1);
  });

}

/**
 * @name generate
 * @description
 */
function generate(type) {
  if (type == 'controller') {
    childProcess.spawn('yo', ['cronic:controller'], { stdio: 'inherit' });
  }

  if (type == 'script') {
    childProcess.spawn('yo', ['cronic:script'], { stdio: 'inherit' });
  }
}

/**
 * @name migrate
 * @description Runs Phinx database migration command
 */
function migrate() {
  exec('php php/vendor/bin/phinx migrate -c php/config/phinx.php', function(error, stdout, stderr) {
    if (error) {
      console.log(stdout);
      console.log(stderr);
      process.exit(1);
    }
    console.log(stdout);
    process.exit(1);
  });
}
/**
 * @name run
 * @descriptions Runs script by path/name that is located in the php/scripts directory
 * @param name
 */
function run(name, arguments ) {
  var combinedArgs = ['php/scripts/'+name+'.php'].concat(arguments);
  childProcess.spawn('php', combinedArgs, { stdio: 'inherit' });
}

/**
 * @name setup
 * @description Setup project - application config, and default database
 */
function setup() {
  childProcess.spawn('yo', ['cronic'], { stdio: 'inherit' });
}

/**
 * @name start
 * @description Starts new project
 */
function start(envValue) {
  var projectName = typeof envValue !== 'undefined' ? envValue : 'project';

  exec('git clone https://github.com/ErikAugust/cronic.git ' + projectName, function(error, stdout, stderr) {
    if (error) {
      console.log(stdout);
      console.log(stderr);
      process.exit(1);
    }
    console.log(stdout);
    process.exit(1);
  });
}

/**
 * @name test
 * @description Run all PHPUnit tests, or a single test, if specified
 */
function test(envValue) {

  var singleTest = typeof envValue !== 'undefined' ? '--filter {'+envValue+'}' : '';

  exec('php/vendor/bin/phpunit ' + singleTest, function(error, stdout, stderr) {
    if (error) {
      console.log(stdout);
      console.log(stderr);
      process.exit(1);
    }

    console.log(stdout);
    process.exit(1);
  });
}
