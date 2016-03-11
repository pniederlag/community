Extension for basic typo3.com configuration
===========================================


Prerequisites
-------------

You need to have npm installed (https://nodejs.org)


Initial Installation
--------------------

In Folder

`typo3conf/ext/t3theme_typo3com/Resources/Private`

run the following command

    npm install

to install Grunt and Bootstrap.


Grunt
-----
Grunt is a task runner configured in the **Gruntfile.js** in **Resources/Private**. To add more tasks/grunt plugins to Grunt, (e.g. grunt-contrib-compass), you need to add them in the **package.json** first and then configure and load them in the **Gruntfile.js**.

### Using Grunt

Install **grunt-cli** globally to use the `grunt` command in the terminal:

	sudo npm install -g grunt-cli

Run `npm install` in **Resources/Private** to install all configured Node modules.

Finally run the grunt task of your choice, e.g

	grunt build
