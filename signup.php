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
            font-family: Arial, sans-serif
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
  opacity: 0.7;
}
.udu{color: #ffffff;
    cursor: pointer;}
.btn:hover {
  opacity: 1;
  /* background: #000; */
}
.message{
    text-align: center;
    background: #767676;
    padding: 15px 0px;
    border:3px solid #f72a2a;
    border-radius: 5px;
    margin-bottom: 10px;
    color: black;
}
    </style>
</head>
<body background="bg.jpg" class="bg-img">

    <div class="container">
    <?php 
         
         include("php/insert.php");
         if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password']; 



         $verify_query = mysqli_query($con,"SELECT Email FROM user WHERE Email='$email'");

         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                      <p>This email is used, Try another One Please!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
         }
         else{

            mysqli_query($con,"INSERT INTO user(Username,Email,Password) VALUES('$username','$email','$password')") or die("Error Occured");

            echo "<div class='message'>
                      <p>Registration successfully!</p>
                  </div><br>";
            echo "<a href='login.php'><button class='btn'>Login Now</button>";
         

         }

         }else{
         
        ?>
        <h2>Sign Up</h2>
        <form class="login-form" action="" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" placeholder="Enter Username" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Email:</label>
                <input type="email"  placeholder="Enter Email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" placeholder="Enter Password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button name="submit">Sign up</button>

            </div>
            <p>already have a account?</p><a href="login.php" class="udu">Log in</a>
        </form>
        <?php } ?>
    </div>

</body>
</html>