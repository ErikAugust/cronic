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

if (typeof cmdValue === 'undefined') {
  about();
  process.exit(1);
}

if (cmdValue == 'test') {
  test(envValue);
}

if (cmdValue == 'about') {
  about();
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
