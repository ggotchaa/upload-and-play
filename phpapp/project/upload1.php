<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Audio</title>
</head>
<body>
  
<?php

if (isset($_POST['save_audio']) && $_POST['save_audio'] == "Upload") {

  $dir = 'uploads/';
  $audio_path = $dir.basename($_FILES['audioFile']['name']);

  if (move_uploaded_file($_FILES['audioFile']['tmp_name'], $audio_path)) {

    saveAudio($audio_path);

    displayAudios();  
  } else {
    echo "У вас есть ошибка в файле.";
  }
}

function displayAudios(){
  $conn = mysqli_connect('localhost','root','root','audiodb');
  if(!$conn){
    die('Сервер не подключен.');
  }

  $query = "select * from audios";

  $r = mysqli_query($conn,$query);

  while ($row = mysqli_fetch_array($r)){
    echo '<a href="play.php?name='.$row['filename'].'">'.$row['filename'].'</a>';
    echo "</br>";
  }

  mysqli_close($conn);
}

function saveAudio($fileName){
  $conn = mysqli_connect('localhost','root','root','audiodb');
  if(!$conn){
    die('Сервер не подключен.');
  }

  $query = "insert into audios(filename)values('{$fileName}')";

  mysqli_query($conn, $query);  

  if (mysqli_affected_rows($conn) > 0) {
    echo '<h1>Ваш файл был успешно загружен.</h1>';
    echo '<h3>Список загруженных файлов: </h3>';
  } else {
    echo "Файл не загрузился.";
  }

  mysqli_close($conn);
}

?>

</body>
</html>