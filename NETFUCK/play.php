<?php

  $conn = mysqli_connect("localhost","root","","movie_silver");
  if($conn){
    //   echo "SUCCESS";
  }
  $id = $_GET['id'];
  $spl = "SELECT * FROM all_movies WHERE id = '$id'";
  $result=$conn->query($spl);
  if(mysqli_num_rows($result)>0){
      $i=1;
      while($row=mysqli_fetch_array($result)){  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style-play.css">
    <title><?=$row['name']?></title>
</head>
<body>

  <!-- <div class="login-bx">
      <section class="login-box">
          <h2 class="text-white"><?=$row['id']?></h2>
      </section>
  </div> -->
  <div class="name-movie">
    <h1><?=$row['name']?></h1>
  </div>
  <div class="watch">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?=$row['video']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>

<?php
      }  
  }
?>

</body>
</html>
