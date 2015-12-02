<!DOCTYPE html>

<html>

	<head>

		<meta charset="UTF-8">
		<title>[@title]</title>

		<!-- css -->
		[@css]

		<!-- js bootstrap -->
		<?php include('app/bootstrapJs.php'); ?>
		<!-- js includes -->
		[@javascript]


	</head>

	<body>
		<div id="outer">

			<div id="header">
				
			</div>

			<div id="mainContent">

				[@subtemplateBody]

			</div>

			<?php include('html/footer.php'); ?>

		</div>
	</body>

</html>