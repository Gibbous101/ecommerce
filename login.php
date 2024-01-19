<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,400;0,600;1,400;1,700&display=swap" rel="stylesheet">
    <title>Login - Your Shopping Website</title>
    <style>
      *{ 
    margin: 0; 
    padding: 0;
    font-family: 'Poppins', sans-serif;
}
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
h2,p{color:#ffffff;}
        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            text-transform: uppercase;
        }


        .login-form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-group button:hover {
            background-color: #f72a2a;
        }
        body, html {
  height: 100%;
}
* {
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

.bg-img {
  background-repeat:no-repeat;
  background-size: 100% 100%;
}
.container {
  position: center;
  right: 0;
  top: 200px;
  margin: 100px;
  width: 400px;
  padding: 16px;
  background-color: rgb(0, 0, 0);
}
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: white;
  background: #ffffff;
}
.txt
{
  color:whitesmoke
}
input[type=text]:focus, input[type=password]:focus {
  background-color: #434343;
  outline: none;
}
.btn {
  background-color: #ff00008f;
  color: black;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 1;
}
.udu{color: #ffffff;
    cursor: pointer;}
.btn:hover {
  opacity: 1;
}
.message{
    text-align: center;
    background: #767676;
    padding: 15px 0px;
    border:3px solid #f72a2a;
    border-radius: 5px;
    margin-bottom: 10px;
    color: red;
}
    </style>
</head>
<body background="bg.jpg" class="bg-img">

    <div class="container">
    <?php 
             
             include("php/insert.php");
             if(isset($_POST['submit'])){
               $email = mysqli_real_escape_string($con,$_POST['email']);
               $password = mysqli_real_escape_string($con,$_POST['password']);

               $result = mysqli_query($con,"SELECT * FROM user WHERE Email='$email' AND Password='$password' ") or die("Select Error");
               $row = mysqli_fetch_assoc($result);

               if(is_array($row) && !empty($row)){
                   $_SESSION['valid'] = $row['email'];
                   $_SESSION['username'] = $row['username'];
                   $_SESSION['id'] = $row['id'];
               }else{
                   echo "<div class='message'>
                     <p>Wrong Username or Password</p>
                      </div> <br>";
                  echo "<a href='login.php'><button class='btn'>Go Back</button>";
        
               }
               if(isset($_SESSION['valid'])){
                   header("Location: main.php");
               }
             }else{

           
           ?>
        <h2>Login</h2>
        <form class="login-form" action="" method="POST">
            
            <div class="form-group">
                <label for="password">E-mail:</label>
                <input type="email" placeholder="Enter Email" id="e-mail" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" placeholder="Enter Password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button onclick="myFunction()" name="submit" class="btn">Login</button>
            </div>
            <p>Don't have an account?</p><a class="udu" href="signup.php">Sign up</a>
        </form>
    </div>
    <?php } ?>
</body>
</html>
<!-- <script>
      function myFunction() {
        location.replace("main.php")
      } 
 </script> -->
