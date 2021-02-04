<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Play Music</title>
</head>
<body>
	<audio controls>
		<source src="<?php echo $_GET['name']; ?>" type="audio/mpeg"></source>
	</audio>
</body>
</html>