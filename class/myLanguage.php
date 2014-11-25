<?php 
/**
 * @author Corrriga Andrea <me@andreacorriga.com>
 * @copyright 2014 Corriga Andrea (http://andreacorriga.com)
 * @license Free
 * @version 1.3.0.0
 * @link http://andreacorriga.com
**/
class myLanguage {
	
	public function __construct()
	{
		$this->config 	= require_once('config/lang.php');

		$this->baseUrl	= 'http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

		$this->page 	= basename($_SERVER['PHP_SELF']);

		// Initialize class
		$this->initializeLang();
	}

	/**
	 * This method return your browser language
	 * If the language is not supported, return the default language
	 * @return string
	**/
	private function getLanguage()
	{	
		// Retrieve the languages ​​supported by your browser
		$http_lang = explode(',',$_SERVER['HTTP_ACCEPT_LANGUAGE']);
		// Choose your default language
		$http_lang = strtolower(substr(chop($http_lang[0]),0,2));
	
		
		if( in_array($http_lang, $this->config['available']) ) 
		{
			return $http_lang;	
		}
		else
		{
			return $this->config['default'];	
		}
	}

	/**
	 * Return your session language
	 * @return string
	**/
	public function currentLanguage()
	{	
		return $_GET['language'];	
		
	}


	/**
	 * Load all your file language in your request language
	 * @return string
	**/
	private function load()
	{
		$directory 	= $this->config['path'].$this->currentLanguage().'/';
		
		if ( is_dir( $directory ) ) 
		{
			if ($directory_handle = opendir($directory)) 
			{
				while ( ($file = readdir($directory_handle)) !== false )
				 {
				 	// Include all language file
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
	private function loadEmergency()
	{
		$directory 	= $this->config['path'].$this->config['default'].'/';
		
		if ( is_dir( $directory ) ) 
		{

			if ($directory_handle = opendir($directory)) 
			{
				while ( ($file = readdir($directory_handle)) !== false )
				 {
					
					// Include all language file 
					if( (!is_dir($file)) & ($file!=".") & ($file!="..") )
						include ($directory.$file);
				}


				closedir($directory_handle);
			}
		}

		return $lang;
	}
	
	/**
	* If you replace is TRUE change special characters in a corresponding html code
	* @return string
	*/
	private function replaceString($input)
	{
		$this->line		= $input;

		if($this->config['replace']) 
			return str_replace($this->config['oldCharacters'], $this->config['newCharacters'], $this->line);
		else
			return $this->line;
	}

	/**
	* Print your request variable. If load doesn't work, this method load the default language.
	* If default language doens't work print a empty line
	* @return string
	*/
	public function tr($input)
	{
		$this->line		= $input;
		$lang			= $this->load();
		
		if(!isset($lang[$this->line]))
		{
			$lang		= $this->loadEmergency();
			
			if(!isset($lang[$this->line]))
			{
				$lang[$this->line] = '';
			}
			
			return $this->replaceString($lang[$this->line]);
		}
		else
		{
			return $this->replaceString($lang[$this->line]);
		}
	}


	/**
	* It is used to generate a url to change language language. Control if the language is avaiable.
	* If the new language is not avaiable return default language
	* @return string
	*/
	public function changetLang($l)
	{
		if(in_array($l, $this->config['available']))
			return '/'.$l.'/'.basename($_SERVER['PHP_SELF']);
		else
			return '/'.$this->config['default'].'/'.basename($_SERVER['PHP_SELF']);
	}

	/**
	* Initialize the multi language site
	* If there no GET param, refresh the site. 
	* If GET param is not correct, refresh with default language
	*/
	public function initializeLang()
	{	
		if(!isset($_GET['language']))
			header("Location: ".$this->getLanguage().'/' .$this->page);

		if(!in_array($_GET['language'], $this->config['available']))
			header("Location: ".'/'.$this->config['default'].'/'.basename($_SERVER['PHP_SELF']));
	}
}

