<?
	session_start();
	
	include ('class/myLanguage.php'); 

	$thispage	= basename($_SERVER['PHP_SELF']);
	
	if(!isset($_SESSION['lang']))
	{
		$_SESSION['lang'] = get_language();	
	}
	
	// Optional to generate a dynamic URL like : htttp://yoursite.com?language=en
	// If you delete this IF all script work!
	if(!isset($_GET['language']))
	{
		header("Location: $thispage?language=".$_SESSION['lang']);
	}
	
	$language	= new Language();

?>
<!doctype html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<title> <?=$language->print_line('index_meta_title');?> </title>
	
	<meta name="author" content="Corriga Andrea">
    <meta name="generator" content="Webenterprises" />
    <meta name="robots" content="index,follow" />
    <meta name="language" content="<?=$language->current_language();?>" /> 
    <meta name="distribution" content="global" />
    
</head>

<body>

	<h1> <?=$language->print_line('index_body_h1');?> </h1>
    
	<p> <a href="_set_lang.php?newlanguage=it"> <?=$language->print_line('index_body_tr_it');?> </a> </p>
	<p> <a href="_set_lang.php?newlanguage=en"> <?=$language->print_line('index_body_tr_en');?> </a> </p>
    
</body>
</html>