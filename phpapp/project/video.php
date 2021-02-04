<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Video</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h1>Загрузите файлы</h1>
	<div class="container">
		<div class="video-container"></div>
		<form onsubmit="return false" method="post" action="script.php" id="file-upload" enctype="multipart/form-data">
			<input type="file" name="video" class="choose">
			<button type="submit" class="button" id="upload-btn">Upload</button>
		</form>
		<div id="progress">
			<div class="progress">
				
			</div>
			<span></span>
		</div>
	</div>

<div class="containerForAudio">
	<form action="upload1.php" method="POST" enctype="multipart/form-data">
    	<input type="file" name="audioFile" class="choose">
    	<input type="submit" class="button" value="Upload" name="save_audio">
	</form>
</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha512-YUkaLm+KJ5lQXDBdqBqk7EVhJAdxRnVdT2vtCzwPHSweCzyMgYV/tgGF4/dCyqtCC2eCphz0lRQgatGVdfR0ww==" crossorigin="anonymous"></script>
	<script src="project/jquery.form.min.js"></script>

	<script>
		$(document).ready(function(){
			$("#upload-btn").on('click', function(){
				$("#file-upload").ajaxSubmit({
					beforeSubmit: function(formData, formObject, formOptions){
						
					},
					beforeSend: function(){
						
					},
					uploadProgress: function(event, position, total, percentComplete){
						$(".progress").css('width', percentComplete + '%');
						$('#progress').children("span").html(percentComplete+' %');
					},
					success: function(response){
						console.log(response);
						var resp = $.parseJSON(response);
						var htmlVideoTag = '<video width="490" height="350" controls>' + 
  								'<source src="./uploads/'+ resp.message +'" type="video/mp4">'+
  							'<source src="movie.ogg" type="video/ogg">'+
							'</video>';

					    $(".video-container").html(htmlVideoTag);
							
					}
				});
			});
		});
	</script>
</body>
</html>