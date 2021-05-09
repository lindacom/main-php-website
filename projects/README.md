NPM for PHP projects
=====================

Create a node project
===========================

1. Open visual studio code. Open a terminal and navigate to the required directory (e.g desktop)
2. Make a new directory using the command mkdir <directoryname>

On your computer:
4. download node js from nodejs.org
5. install PHP (if you haven’t already).Just follow the standard instructions on http://php.net/manual/en/install.php.

In the commandline:
4. navigate into the directory you just created and enter the command npm init. When prompted you can enter package name, description entery point - index.js or press
enter to accept the default.  When prompted is it ok click yes.

In visual studio code: 
7. go to file > open folder and open the directory you have created. N.b. you will see a node modules directory has been created and a package.json file has been created

Add dependencies
=================

express - a framework for node.js. Express router is used for registering different routes and endpoints.

In visual studio code open a terminal and install express - enter the command npm install --save express

Create files
=============
1. ebserver.js - web server. requires “execphp.js” which is where we will do the PHP parsing. 
defining a route that recieves all *.php requests, and runs them through the execPHP class.

2. execphp.js - this file contains a class, ExecPHP, with a single method, parseFile. This method basically takes a file, 
executes the command line PHP and calls the passed callback with the result.

3. php file

Run the application
=====================

run the application - node --use_strict webserver.js
open the browser to localhost port 3000 - http://localhost:3000/
N.b. whenever you make a change to files you need to restart the server. server.js

