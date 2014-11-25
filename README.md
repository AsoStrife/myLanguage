
myLanguage 
==========

PHP Class to create multi-language web sites!
Version 1.3.0.0

Changelog
=

V 1.3.0.0
- Fixed seo problem, with .htaccess rewrite. No more Get param like page.php?language=en, now myLanguage use uri segment like /en/page.php
- Add .htaccess file
- Url Bugfix
- Simplified installation

V 1.2.4.2
-

- Add new private method replaceString to manage special characters
- Edit configuration file with with the addition of three new parameters
- Edit structure of language file
- Improved index.php with new examples
- Improved documentation
- Minor bugfix

V.1.1.3.0
-

- Bugfix and spelling correction
- Created the configuration file and implemented within the class
- Changed the name of the method print_line () in tr ()
- Simplified class initialization with another method

What is myLanguage Class
-
This is a simple PHP class to create multi-language site. It's very simple to use and to install.
You can translate your site into as many languages as you want without limitations.

Why I've developed this Class?
-
To help all developers who needs to create a multi-language site quickly and easier in a short time. myLanguage is easily customizable thanks to a few lines of code that manage the translation process.


Install And configuration
-
Download and unzip the .zip archive

Open /congif/lang.php file
- At line 10 you need to set your absolute base path with a language folder 
- At line 1 add your supported language in 2 characters like

	it => italian

	en => english

	de => german

	fr => french

	zh => chinese
 ecc..
 
- At line 17set your default language
- Copy .htaccess on your root 

Now look the index.php file from line 1 to 10:
	
	include ('class/myLanguage.php'); 
	
	$language	= new myLanguage();


This is very important for proper initialization of the class, you need to include that code in all your page.

To print a line use this command  <?=$language->tr('NAME_OF_VARIABLE');?> 

If the language variable doesn't exist in your selected language, the class try to print variable in default language. If default variable language doesn't exist class print a empty variable

Language file
-
Language file need to be all in one main directory like "language" and the single language in a sub-directory like "language/en/"
Look the language folder.

Change language
-
You can use the method: changetLang('language') to generate a link to change language.
For expample if we are on: wwww.expample.com/en/page.php we can generate a link using: "$language->changetLang('it');"
This method only generate url string, so you need to write a code like this: "<a href="<?=$language->changetLang('it');?>"> Set italian lang </a>""

Problem?
-

If you have a problem, send me an email on me@andreacorriga.com

Demo
-
Try demo on: http://mylanguage.andreacorriga.com

