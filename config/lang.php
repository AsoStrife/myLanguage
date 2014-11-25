<?php
	/**
	 * path 		=> getcwd() : PHP function to get automatic base_path . Add language path folder
	 * available 	=> This array contain all language supported in your site
	 * default 		=> Set your default language
	 * replace 		=> If you want to change special characters in a corresponding html code
	 * oldCharacters and newCharacters are two array. oldCharacters contains the strings that will be converted in newCharacters
	**/
	return  array(
					'path' 				=> 'C:\xampp\htdocs\language/',

					'available'			=> array(
												'it',
												'en'
											),

					'default'			=> 'en',				
					'replace'			=> TRUE,

					'oldCharacters' 	=> array (
													// German special characters
													"ä",
													'ë',
													'ï',
													"ö",
													"ü",
													// Characters with accents
													'à',
													'è',
													'ì',
													'ò',
													'ù'
												),
				'newCharacters' 		=> array (
													// German special characters
													'&#228;',
													'&#235;',
													'&#239;',
													'&#246;',
													'&#252;',
													// Characters with accents
													'&agrave;',
													'&egrave;',
													'&igrave;',
													'&ograve;',
													'&ugrave;'
												)

				);	