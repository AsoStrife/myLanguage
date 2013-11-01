<?
/**
 * @author	Corriga Andrea <andreacorriga@gmail.com>
 * @copyright 2013 Corriga Andrea (http://webenterprises.it)
 * @license   http://www.opensource.org/licenses/bsd-license.php New BSD Licence
 * @version   Release: myLanguage 2013-11-01 1.0.0
 * @link	  http://webenterprises.it/
**/
class myLanguage {
	
/**** Start Customize Variable ****/
	
	// getcwd() -> PHP function to get automatic base_path . Add language path folder
	private $LANGUAGE_PATH    	= 'basepath/of/your/site/language/';
	
	// This array contain all language supported in your site
    private $AVAIABLE_LANGUAGE   = array 
										(
											'it',
											'en',
										);
	// Set your default language 									
	private $DEFAULT_LANG		= 'en';
	
/**** END Customize Variable ****/


	/**
	 * This method return your browser language
	 * If the language is not supported, return the default language
	 * @return string
	**/
	private function get_language()
	{	
		// Retrieve the languages ​​supported by your browser
		$http_lang = explode(',',$_SERVER['HTTP_ACCEPT_LANGUAGE']);
		// Choose your default language
		$http_lang = strtolower(substr(chop($http_lang[0]),0,2));
	
		
		if(in_array($http_lang, $this->AVAIABLE_LANGUAGE)) 	return $http_lang;	
		
		else 												return $this->DEFAULT_LANG;	
		
	}

	/**
	 * Return your session language
	 * @return string
	**/
	public function current_language()
	{	
		return $_SESSION['lang'];	
		
	}

	/**
	 * Load all your file language in your request language
	 * @return string
	**/
	private function load()
	{
		$directory 	= $this->LANGUAGE_PATH.$this->current_language().'/';
		
		if ( is_dir( $directory ) ) 
		{

			if ($directory_handle = opendir($directory)) 
			{
				while ( ($file = readdir($directory_handle)) !== false )
				 {
					if( (!is_dir($file)) & ($file!=".") & ($file!="..") )
					include ($directory.$file);
				}


				closedir($directory_handle);
			}
		}

		return $lang;
	}
	
	/**
	* It is used if load() doesn't work. Load your default language file 
	* @return string
	*/
	public function load_emergency()
	{
		$directory 	= $this->LANGUAGE_PATH.$this->DEFAULT_LANG.'/';
		
		if ( is_dir( $directory ) ) 
		{

			if ($directory_handle = opendir($directory)) 
			{
				while ( ($file = readdir($directory_handle)) !== false )
				 {
					
					//Se l'elemento trovato è diverso da una directory o dagli elementi . e .. lo visualizzo a schermo
					if( (!is_dir($file)) & ($file!=".") & ($file!="..") )
					include ($directory.$file);
				}


				closedir($directory_handle);
			}
		}

		return $lang;
	}
	
	/**
	* Print your request variable. If load doesn't work, this method load the default language.
	* If default language doens't work print a empty line
	* @return string
	*/
	public function print_line($input)
	{
		$this->line		= $input;
		$lang			= $this->load();
		
		if(!isset($lang[$this->line]))
		{
			$lang		= $this->load_emergency();
			
			if(!isset($lang[$this->line]))
			{
				$lang[$this->line] = '';
			}
			
			return $lang[$this->line];
		}
		else
		{
			return $lang[$this->line];
		}
	}

	/**
	* It is used to set new language. Control if the language is avaiable.
	* If the new language is not avaiable return default language
	* @return string
	*/
	public function set_lang($newlang)
	{
		if(in_array($newlang, $this->AVAIABLE_LANGUAGE))
		{
			return $newlang;
		}
		else
		{
			return $this->DEFAULT_LANG;
		}
	}
}

?> 