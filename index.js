#!/usr/bin/env node
var program = require('commander');
var chalk = require('chalk');
var exec = require('child_process').exec;

var version = '0.0.5';

program.version(version);

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
 * Test
 */
program
  .command('test [name]')
  .description('Runs PHPUnit tests, runs a single test if test name specified')
  .action(function (name) {
    test(name);
  });


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
 * Start
 */
program
  .command('start <name>')
  .description('Starts new project within specified name')
  .action(function (name) {
    start(name);
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

  console.log(
    chalk.bold.red('\nCronic (' + version + ')\n')
  );

  process.exit(1);
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
