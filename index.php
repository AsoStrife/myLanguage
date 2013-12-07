<?php
	session_start();
	
	include ('class/myLanguage.php'); 

	$thispage	= basename($_SERVER['PHP_SELF']);
	
	$language	= new myLanguage();
	
	$language->initializeLang();

?>

<!doctype html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<title> <?=$language->tr('index_meta_title');?> </title>
	
	<meta name="author" content="Corriga Andrea">
    <meta name="generator" content="Webenterprises" />
    <meta name="robots" content="index,follow" />
    <meta name="language" content="<?=$language->currentLanguage();?>" /> 
    <meta name="distribution" content="global" />
    
</head>

<body>

	<h1> <?=$language->tr('index_body_h1');?> </h1>
    
	<p> <a href="_set_lang.php?newlanguage=it"> <?=$language->tr('index_body_tr_it');?> </a> </p>
	<p> <a href="_set_lang.php?newlanguage=en"> <?=$language->tr('index_body_tr_en');?> </a> </p>

	<p> <?=$language->tr('index_accent_test');?> </p>

	<!-- Print line that exist only in Italian file -->
	<p> " <?=$language->tr('index_only_it');?> " </p>
	<!-- Print line that exist only in English file -->
	<p> " <?=$language->tr('index_only_en');?> " </p>
	<!-- Print line that not exist -->
    <p> " <?=$language->tr('index_empty');?> " </p>

</body>
</html>