<?php	
	include ('class/myLanguage.php'); 
	
	$language	= new myLanguage();
?>

<!doctype html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<title> <?=$language->tr('index_meta_title');?> </title>
	
	<meta name="author" content="Andrea Corriga">
    <meta name="generator" content="Andrea Corriga" />
    <meta name="language" content="<?=$language->currentLanguage();?>" /> 
    <meta name="distribution" content="global" />
    
</head>

<body>

	<h1> <?=$language->tr('index_body_h1');?> </h1>
    
	<p> <a href="<?=$language->changetLang('it');?>"> <?=$language->tr('index_body_tr_it');?> </a> </p>
	<p> <a href="<?=$language->changetLang('en');?>"> <?=$language->tr('index_body_tr_en');?> </a> </p>

	<p> <?=$language->tr('index_accent_test');?> </p>

	<!-- Print line that exist only in Italian file -->
	<p> " <?=$language->tr('index_only_it');?> " </p>
	<!-- Print line that exist only in English file -->
	<p> " <?=$language->tr('index_only_en');?> " </p>

	<p> <a href="README.md"> README.md </a></p>
</body>
</html>