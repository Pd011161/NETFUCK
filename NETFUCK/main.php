<?php
session_start();
echo '
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
//เช็คว่ามีตัวแปร session อะไรบ้าง
// print_r($_SESSION);
// exit();
//สร้างเงื่อนไขตรวจสอบสิทธิ์การเข้าใช้งานจาก session
if(empty($_SESSION['id']) && empty($_SESSION['name']) && empty($_SESSION['surname'])){
            echo '<script>
                setTimeout(function() {
                swal({
                title: "คุณไม่มีสิทธิ์ใช้งานหน้านี้",
                type: "error"
                }, function() {
                window.location = "login.php"; //หน้าที่ต้องการให้กระโดดไป
                });
                }, 1000);
                </script>';
            exit();
}
?>

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
    <link rel="stylesheet" href="./css/style-finit-log.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
    <script src="https://kit.fontawesome.com/8d457a3bc8.js" crossorigin="anonymous"></script>
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
            <li><a href="#Poppular" class="home-action">Poppular</a></li>
            <li><a href="#action">Action</a></li>
            <li><a href="#romanc">Romanc</a></li>
            <li><a href="#commady">Commady</a></li>
            <li><a href="#drama">Drama</a></li>
        </ul>
        <div class="user-icon online" onclick="settingsMenuToggle()">
                <!-- <img src="img/profile-pic.png" style="border-radius: 30%; width: 40px; cursor: pointer;"> -->
                <img src="https://i.pinimg.com/originals/9a/07/ad/9a07ad321c82d6c20697570d970f002a.png" alt="" style="border-radius: 30%; width: 40px; cursor: pointer;">
        </div>
        <!-- SETTING -->
        <div class="setting-menu">
                <div class="settings-menu-inner">

                    <div class="user-profile">
                        <img src="https://i.pinimg.com/originals/9a/07/ad/9a07ad321c82d6c20697570d970f002a.png">

                        <?php
                            // print_r($_SESSION);
                            $name = $_SESSION['name'];
                            $spl = "SELECT * FROM tbl_member WHERE name = '$name'";
                            $result=$conn->query($spl);
                            if(mysqli_num_rows($result)>0){
                                $i=1;                
                                while($row=mysqli_fetch_array($result)){   
                        ?>
                        <div>

                            <div>
                                <p style="color: var(--bg-color);"><?= $row['name'].' '.$row['surname'];?></p>
                            </div>
                            
                            <div style="margin-top:10px;">
                                <a href="#" style=""><?=$row['role']?></a>
                            </div>
                            
                        </div>
                        <?php
                                }  
                            }
                        ?>

                    </div>

                    <hr>

                    <div style="text-align: center; width:100%; padding-top:5px;">
                        <a href="logout.php" class="btn" style="color: var(--bg-color);" onclick="return confirm('ยืนยันการออกจากระบบ');">
                            logout
                        </a>
                        <!-- <a href="logout.php" class="list-group-item list-group-item-danger" onclick="return confirm('ยืนยันการออกจากระบบ');">ออกจากระบบ</a> -->
                    </div>

                </div>

        </div>

    </header>

    <!-- HOME -->
   
    <section class="home swiper" id="Poppular">

        <div class="swiper-wrapper box-contain">

            <!-- BOX1 -->
            <div class="swiper-slide container">
                <img src="https://assets.beartai.com/uploads/2019/04/avengers-endgame-poster-top-half.jpg" alt="">
                <div class="home-text">
                    <span>Marvel Universe</span>
                    <h1>Avenger <br> Infinity War </h1>
                    <a href="./play.php?id=39" class="btn">Watch Now</a>
                </div>
            </div>
            <!-- BOX2 -->
            <div class="swiper-slide container">
                <img src="https://cdn.pocket-lint.com/r/s/1200x630/assets/images/159181-homepage-news-venom-let-there-be-carnage-is-now-available-to-stream-on-prime-video-image1-ny4wdrdsuz.jpg" alt="">
                <div class="home-text">
                    <span>Marvel Universe</span>
                    <h1>Venom Let There <br> Be Carnage </h1>
                    <a href="./play.php?id=40" class="btn">Watch Now</a>
                </div>
            </div>
            <!-- BOX3 -->
            <div class="swiper-slide container">
                <img src="https://www.khaama.com/wp-content/uploads/2021/12/Spider-Man-No-Way-Home-Trailer-Turned-Into-Epic-Multiverse-Poster-Art.jpg" alt="">
                <div class="home-text">
                    <span>Marvel Universe</span>
                    <h1>Spiderman <br> Far from Home </h1>
                    <a href="./play.php?id=41" class="btn">Watch Now</a>
                </div>
            </div>

        </div>  
       
          <div class="swiper-pagination"></div>
       
    </section>
   
    <!-- action -->
    <section class="movie" id="action">
        <h2 class="heading">Action Movies</h2>
        <div class="media-scroller">
            <!-- MOVIES COLECTION -->
            <div class="media-group">
  
                <?php
                // print_r($_POST);
                $name = $_SESSION['name'];                     
                $spl = "SELECT * FROM all_movies WHERE dect = 'action' and rank IN(SELECT role  FROM tbl_member WHERE name = '$name')";
                // $spl = "SELECT * FROM all_movies WHERE dect = 'action' and rank = 'diamond'";
                $result=$conn->query($spl);
                if(mysqli_num_rows($result)>0){
                    $i=1;
                    while($row=mysqli_fetch_array($result)){
                ?>
                <!-- BOX1 -->
                <a href="./play.php?id=<?=$row['id']?>">
                <div class="media-element box">
                    <div class="box-img">
                        <img src="<?=$row['picture']?>" alt="">
                    </div>
                    <h3><?=$row['name']?></h3>
                    <!-- <span><?=$row['rank']?></span> -->
                </div>
                </a>
                <?php
                    }
                }
                ?>

            </div>
        </div>    

    </section>
   
    <!-- romanc -->
    <section class="movie" id="romanc">
        <h2 class="heading">romanc Movies</h2>
        <div class="media-scroller">
            <!-- MOVIES COLECTION -->
            <div class="media-group">
     
                <?php
                $name = $_SESSION['name'];                     
                $spl = "SELECT * FROM all_movies WHERE dect = 'romanc' and rank IN(SELECT role  FROM tbl_member WHERE name = '$name')";
                $result=$conn->query($spl);
                if(mysqli_num_rows($result)>0){
                    $i=1;
                    while($row=mysqli_fetch_array($result)){
                ?>
                <a href="./play.php?id=<?=$row['id']?>">
                <!-- BOX1 -->
                <div class="media-element box">
                    <div class="box-img">
                        <img src="<?=$row['picture']?>" alt="">
                    </div>
                    <h3><?=$row['name']?></h3>
                    <!-- <span><?=$row['rank']?></span> -->
                </div>
                </a>
                <?php
                    }
                }
                ?>

            </div>
        </div>    

    </section>
   
    <!-- commady -->
    <section class="movie" id="commady">
        <h2 class="heading">Commady Movies</h2>
        <div class="media-scroller">
            <!-- MOVIES COLECTION -->
            <div class="media-group">
        
                <?php
                $name = $_SESSION['name'];                     
                $spl = "SELECT * FROM all_movies WHERE dect = 'commady' and rank IN(SELECT role  FROM tbl_member WHERE name = '$name')";          
                $result=$conn->query($spl);
                if(mysqli_num_rows($result)>0){
                    $i=1;
                    while($row=mysqli_fetch_array($result)){
                ?>
                <!-- BOX1 -->
                <a href="./play.php?id=<?=$row['id']?>">
                <div class="media-element box">
                    <div class="box-img">
                        <img src="<?=$row['picture']?>" alt="">
                    </div>
                    <h3><?=$row['name']?></h3>
                    <!-- <span><?=$row['rank']?></span> -->
                </div>
                </a>
                <?php
                    }
                }
                ?>

            </div>
        </div>    

    </section>
    
     <!-- drama -->
     <section class="movie" id="drama">
        <h2 class="heading">Drama Movies</h2>
        <div class="media-scroller">
            <!-- MOVIES COLECTION -->
            <div class="media-group">
       
                <?php
                $name = $_SESSION['name'];                     
                $spl = "SELECT * FROM all_movies WHERE dect = 'drama' and rank IN(SELECT role  FROM tbl_member WHERE name = '$name')";                                                         
                $result=$conn->query($spl);
                if(mysqli_num_rows($result)>0){
                    $i=1;
                    while($row=mysqli_fetch_array($result)){
                ?>
                <!-- BOX1 -->
                <a href="./play.php?id=<?=$row['id']?>">
                <div class="media-element box">
                    <div class="box-img">
                        <img src="<?=$row['picture']?>" alt="">
                    </div>
                    <h3><?=$row['name']?></h3>
                    <!-- <span><?=$row['rank']?></span> -->
                </div>
                </a>
                <?php
                    }
                }
                ?>

            </div>
        </div>    

    </section>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <!-- Link to Custom JS -->
    <script src="main.js"></script>
</body>
</html>