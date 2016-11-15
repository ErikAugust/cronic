#!/usr/bin/env node
var program = require('commander');
var chalk = require('chalk');

program
  .arguments('about')
  .action(function(file) {
    console.log(
     chalk.bold.red('Cronic (0.0.1)') 
    );
  })
  .parse(process.argv);
