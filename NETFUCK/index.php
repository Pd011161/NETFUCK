<?php
  $conn = mysqli_connect("localhost","root","","movie_silver");
  if($conn){
    //   echo "SUCCESS";
  } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homepage</title>
    <link rel="stylesheet" href="./css/style-index.css">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
</head>
<body>
    <!-- NAVBAR -->
    <header>
        <a href="#" class="logo">
            <i class='bx bxs-movie-play'></i>
            <h3 class='NF'>NETFUCK</h3>
        </a>
        <div class="bx bx-menu" id="menu-icon"></div>
        <!-- MENU -->
        <ul class="navbar">
            <li><a href="#home" class="home-action">HOME</a></li>
            <li><a href="#silver">SILVER</a></li>
            <li><a href="#gold">GOLD</a></li>
            <li><a href="#diamond">DIAMOND</a></li>
            <li><a href="aboutme.php">ABOUT ME</a></li>
        </ul>
        <a href="login.php" class="btn">SIGN IN</a>
    </header>

    <!-- HOME -->
   
    <section class="home swiper" id="home">

        <div class="swiper-wrapper">
            <!-- BOX1 -->
            <div class="swiper-slide container">
                <img src="https://assets.beartai.com/uploads/2019/04/avengers-endgame-poster-top-half.jpg" alt="">
                <div class="home-text">
                    <span>Marvel Universe</span>
                    <h1>Avenger <br> Infinity War </h1>
                    <a href="signup.php" class="btn">Diamond Now</a>
                    <a href="https://www.youtube.com/watch?v=6ZfuNTqbHE8" class="play">
                        <i class='bx bx-play' ></i>
                    </a>
                </div>
            </div>
            <!-- BOX2 -->
            <div class="swiper-slide container">
                <img src="https://cdn.pocket-lint.com/r/s/1200x630/assets/images/159181-homepage-news-venom-let-there-be-carnage-is-now-available-to-stream-on-prime-video-image1-ny4wdrdsuz.jpg" alt="">
                <div class="home-text">
                    <span>Marvel Universe</span>
                    <h1>Venom Let There <br> Be Carnage </h1>
                    <a href="signup.php" class="btn">Gold Now</a>
                    <a href="https://www.youtube.com/watch?v=dzxFdtWmjto" class="play">
                        <i class='bx bx-play' ></i>
                    </a>
                </div>
            </div>
            <!-- BOX3 -->
            <div class="swiper-slide container">
                <img src="https://www.khaama.com/wp-content/uploads/2021/12/Spider-Man-No-Way-Home-Trailer-Turned-Into-Epic-Multiverse-Poster-Art.jpg" alt="">
                <div class="home-text">
                    <span>Marvel Universe</span>
                    <h1>Spiderman <br> Far from Home </h1>
                    <a href="signup.php" class="btn">Silver Now</a>
                    <a href="https://www.youtube.com/watch?v=DYYtuKyMtY8" class="play">
                        <i class='bx bx-play' ></i>
                    </a>
                </div>
            </div>

        </div>  
       
          <div class="swiper-pagination"></div>
       
    </section>
    
    
    <!-- MOVIESILVER -->
    <section class="movie" id="silver">
        <h2 class="heading">Silver : 200฿ per month</h2>

        <!-- MOVIES COLECTION -->
        <div class="movie-container">
        <?php 
            $spl = "SELECT * FROM all_movies WHERE rank = 'silver' and promote ='y'";
            $result=$conn->query($spl);
            if(mysqli_num_rows($result)>0){
                $i=1;
                while($row=mysqli_fetch_array($result)){
        ?>
          <!-- BOX1 -->
          <div class="box">
            <div class="box-img">
                <img src="<?=$row['picture']?>" alt="">
            </div>
            <h3><?=$row['name']?></h3>
            <span><?=$row['dect']?></span>
          </div>
        <?php
            }
        }
        ?>

        </div>
          
    </section>
    
    <!-- MOVIEGOLD -->
    <section class="movie" id="gold">
        <h2 class="heading">Gold : 250฿ per month</h2>

        <!-- MOVIES COLECTION -->
        <div class="movie-container">

        <?php
        $spl = "SELECT * FROM all_movies WHERE rank = 'gold' and promote ='y'";
        $result=$conn->query($spl);
        if(mysqli_num_rows($result)>0){
            $i=1;
            while($row=mysqli_fetch_array($result)){
        ?>
          <!-- BOX1 -->
          <div class="box">
            <div class="box-img">
                <img src="<?=$row['picture']?>" alt="">
            </div>
            <h3><?=$row['name']?></h3>
            <span><?=$row['dect']?></span>
          </div>
        <?php
            }
        }
        ?>

        </div>
        
    </section>
   
    <!-- MOVIEDIAMOND -->
    <section class="movie" id="diamond">
        <h2 class="heading">Diamond : 300฿ per month</h2>

        <!-- MOVIES COLECTION -->
        <div class="movie-container">

        <?php 
            $spl = "SELECT * FROM all_movies WHERE rank = 'diamond' and promote ='y'";
            $result=$conn->query($spl);
            if(mysqli_num_rows($result)>0){
                $i=1;
                while($row=mysqli_fetch_array($result)){
        ?>
          <!-- BOX1 -->
          <div class="box">
            <div class="box-img">
                <img src="<?=$row['picture']?>" alt="">
            </div>
            <h3><?=$row['name']?></h3>
            <span><?=$row['dect']?></span>
          </div>
        <?php
            }
        }
        ?>
        </div>
          
    </section>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <!-- Link to Custom JS -->
    <script src="main.js"></script>
</body>
</html>