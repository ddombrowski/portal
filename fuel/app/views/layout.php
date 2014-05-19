<html>
<head>
<title><?php echo $breadCrumb; ?></title>
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Playfair+Display' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Asul:700' rel='stylesheet' type='text/css'>
<?php echo Asset::render('css'); ?>
<script src="http://yui.yahooapis.com/3.10.3/build/yui/yui-min.js"></script>
</head>

<body>
<?php echo $header; ?>

<div id='content-container'>
	<div class='wrapper-1000px'>
		<?php echo $contentHeader; ?>
    	<?php echo $navigation; ?>
    	<?php echo $content; ?>
    </div>
</div>

<?php echo $footer; ?>
</body>
</html>