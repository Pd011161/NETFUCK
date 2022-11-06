<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style-login.css">
    <!-- ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <title>Sign in</title>
  </head>
  <body>
   
        <!-- NAVBAR -->
       
        <a href="index.php" class="login-top">
            <h1 class='NF'>NETFUCK</h1>
        </a>

       <!-- FORM -->
        <div class="login-bx">
            <section class="login-box">
                <h2 class="text-white">Sign In</h2>
        
                <form action ="" class="mt-4"  method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label text-white">Name</label>
                        <input type="text" class="form-control" name="username" aria-describedby="emailHelp" required>
                    </div>
                    <label for="exampleInputPassword1" class="form-label text-white">Password</label>
                    <div class="inputBox mb-3">
                        <input type="password" id="txtPassword" name="password"  class="form-control"  required>
                        <div id="toggle" onclick="showHide();"></div>
                    </div>
                    <!-- <a href="./finit-login.php" class="btn btn-danger text-white" name="signin" style="width: 100%; ">Submit</a> -->
                    <button type="submit" class="btn btn-danger mt-3" style="width: 100%;" >LOGIN</button>
                    <div class="mt-2">
                        <a href="signup.php" id="emailHelp" class="form-text">If you haven't registered yet, click here!</a>
                    </div>
                </form>
                
            </section>
        </div>

    <!-- EYEPASS -->
    <script type="text/javascript">
      const password = document.getElementById("txtPassword");
      const toggle = document.getElementById("toggle")
      function showHide(){
        if (password.type === 'password'){
          password.setAttribute("type", "text");
          toggle.classList.add("hide");
        }
        else{
          password.setAttribute("type", "password");
          toggle.classList.remove("hide");
        }
      }
    </script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>

<!-- NEW -->
<?php
 
  print_r($_POST); //ตรวจสอบมี input อะไรบ้าง และส่งอะไรมาบ้าง 
 //ถ้ามีค่าส่งมาจากฟอร์ม
    if(isset($_POST['username']) && isset($_POST['password']) ){
    // sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
 
    //ไฟล์เชื่อมต่อฐานข้อมูล
    require_once 'connect.php';
    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $username = $_POST['username'];
    $password = sha1($_POST['password']); //เก็บรหัสผ่านในรูปแบบ sha1 
 
    //check username  & password
      $stmt = $conn->prepare("SELECT id, name, surname FROM tbl_member WHERE username = :username AND password = :password");
      $stmt->bindParam(':username', $username , PDO::PARAM_STR);
      $stmt->bindParam(':password', $password , PDO::PARAM_STR);
      $stmt->execute();
 
      //กรอก username & password ถูกต้อง
      if($stmt->rowCount() == 1){
        //fetch เพื่อเรียกคอลัมภ์ที่ต้องการไปสร้างตัวแปร session
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        //สร้างตัวแปร session
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['surname'] = $row['surname'];
 
        //เช็คว่ามีตัวแปร session อะไรบ้าง
      //   print_r($_SESSION);
 
      //  exit();
 
          header('Location: main.php'); //login ถูกต้องและกระโดดไปหน้าตามที่ต้องการ
      }else{ //ถ้า username or password ไม่ถูกต้อง
 
         echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "เกิดข้อผิดพลาด",
                             text: "Username หรือ Password ไม่ถูกต้อง ลองใหม่อีกครั้ง",
                            type: "warning"
                        }, function() {
                            window.location = "login.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 100);
                  </script>';
              $conn = null; //close connect db
            } //else
    } //isset 
    //devbanban.com
    ?>
