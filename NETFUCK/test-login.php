<?php
  $conn = mysqli_connect("localhost","root","","movie_silver");
  if($conn){
    //   echo "SUCCESS";
  }
?>


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
        
                <form action ="finit-login.php" class="mt-4"  method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label text-white">Name</label>
                        <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
                    </div>
                    <label for="exampleInputPassword1" class="form-label text-white">Password</label>
                    <div class="inputBox mb-3">
                        <input type="password" id="txtPassword" name="password"  class="form-control"/>
                        <div id="toggle" onclick="showHide();"></div>
                    </div>
                    <!-- <a href="./finit-login.php" class="btn btn-danger text-white" name="signin" style="width: 100%; ">Submit</a> -->
                    <button type="submit" class="btn btn-danger mt-3" name="signin" style="width: 100%;" >Submit</button>
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

