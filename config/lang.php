<?
	/**
	 * path 		=> getcwd() : PHP function to get automatic base_path . Add language path folder
	 * available 	=> This array contain all language supported in your site
	 * default 		=> Set your default language
	 * getUrl		=> If you want create a special url with GET parameter like: index.php?language=en set this value TRUE else FALSE
	**/
	return  array(
					'path' 			=> 'C:\xampp\htdocs\myLanguage/language/',

					'available'		=> array(
												'it',
												'en'
											),

					'default'		=> 'en',
					'getUrl'		=> TRUE,
				);	