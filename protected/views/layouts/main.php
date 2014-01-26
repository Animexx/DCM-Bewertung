<?php
/**
 * @var $this Controller
 * @var string $content
 */
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" href="/css/jquery.mobile.structure-1.4.0.min.css">
	<link rel="stylesheet" href="/css/jquery.mobile.theme-1.4.0.css">
	<link rel="stylesheet" href="/css/jquery.mobile.inline-svg-1.4.0.min.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<script src="/js/jquery.js"></script>

	<script src="js/jquery.mobile-1.4.0.min.js"></script>
</head>
<body>
<div data-role="page" class="jqm-demos jqm-home">
	<div data-role="header" data-position="fixed" data-id="heade">
		<div data-role="navbar">
			<a href="/" class="ui-btn ui-shadow ui-corner-all ui-icon-back ui-btn-icon-notext">Zurück</a>
		</div>
	</div>

	<div role="main" class="ui-content jqm-content">


		<?php echo $content; ?>

	</div>
	<!-- /page -->

	<div data-role="footer" data-position="fixed" data-id="footer">
		<div data-role="navbar">
			<ul>
				<li><a href="#">One</a></li>
				<li><a href="#">Two</a></li>
				<li><a href="#">Three</a></li>
			</ul>
		</div>
		<!-- /navbar -->
	</div>
	<!-- /header -->

</body>
</html>