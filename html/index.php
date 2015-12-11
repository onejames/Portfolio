<!DOCTYPE html>

<html>

	<head>

		<meta charset="UTF-8">
		
		<title>[@title]</title>

		<!-- css -->
		<link rel="stylesheet" type="text/css" href="<?php echo NODE_MODULE_PATH ?>surge-css/build/css/surge.css">
		[@css]

		<!-- js bootstrap -->
		<?php include('app/bootstrapJs.php'); ?>
		<!-- js includes -->
		[@javascript]


	</head>

	<body>
		<div id="outer" class="surge-grid outer">

			<div class="surge-column-1 surge-column-desktop-1/24">&nbsp;</div>
			<div id="header" onclick="window.location.href = '<?php echo DOMAIN ?>'; " class="surge-column-2/2 surge-column-tablet-4/4 surge-column-desktop-22/24">
				Infinite&nbsp;Borders &nbsp;-&nbsp;&nbsp;The&nbsp;Tao&nbsp;Of&nbsp;James &nbsp;-&nbsp;&nbsp;onejames
			</div>

			<div class="surge-column-desktop-2/24">&nbsp;</div>
			<div id="mainContent" class="surge-column-2/2 surge-column-tablet-4/4 surge-column-desktop-20/24">

				[@subtemplateBody]

			</div>

			<?php include('html/footer.php'); ?>

		</div>
	</body>

</html>