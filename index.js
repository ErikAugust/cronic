#!/usr/bin/env node
var program = require('commander');
var chalk = require('chalk');
var exec = require('child_process').exec;

var version = '0.0.3';

program
  .version(version)
  .arguments('<cmd> [env]')
  .action(function (cmd, env) {
    cmdValue = cmd;
    envValue = env;
  });


program.parse(process.argv);

/**
 * Default - no command
 */
if (typeof cmdValue === 'undefined') {
  about();
  process.exit(1);
}


/**
 * Test command
 */
if (cmdValue == 'test') {
  test(envValue);
}

/**
 * About command
 */
if (cmdValue == 'about') {
  about();
}

/**
 * Start command
 */
if (cmdValue == 'start') {
  start(envValue);
} else {
  notFound();
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
    chalk.bold.red('Cronic (' + version + ')')
  );

  process.exit(1);
}

/**
 * @name notFound
 * @description If command is not found - display error
 */
function notFound() {
  console.log(
    chalk.bold.red('Command not found!')
  );
  process.exit(1);
}

function start(envValue) {
  var projectName = typeof envValue !== 'undefined' ? envValue : 'project';

  exec('git clone https://github.com/ErikAugust/cronic.git ' + projectName, function(error, stdout, stderr) {
    if (error) {
      console.log(error);
      process.exit(1);
    }
    console.log(stdout);
    console.log(stderr);
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
      console.error(error);
      process.exit(1);
    }
    console.log(stdout);
    console.log(stderr);
    process.exit(1);
  });
}
