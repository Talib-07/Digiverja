<?php
include 'db.php';

if(isset($_POST['register'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // check duplicate email
  $check = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");

  if(mysqli_num_rows($check) > 0){
    $error = "Email already registered!";
  } else {

    mysqli_query($conn,"INSERT INTO users(name,email,password)
    VALUES('$name','$email','$password')");

    header("Location: login.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register - Digivera</title>

<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700&display=swap" rel="stylesheet">

<style>
*{
  margin:0;
  padding:0;
  box-sizing:border-box;
  font-family:'Outfit',sans-serif;
}

body{
  height:100vh;
  display:flex;
  justify-content:center;
  align-items:center;
  background: linear-gradient(135deg,#e0f2fe,#bae6fd,#7dd3fc);
  overflow:hidden;
}

.blur{
  position:absolute;
  width:300px;
  height:300px;
  border-radius:50%;
  filter:blur(120px);
  opacity:0.4;
  animation:float 8s infinite ease-in-out;
}

.blur.one{ background:#38bdf8; top:10%; left:10%; }
.blur.two{ background:#6366f1; bottom:10%; right:10%; }

@keyframes float{
  0%,100%{transform:translateY(0);}
  50%{transform:translateY(-30px);}
}

.register-box{
  width:370px;
  padding:40px;
  border-radius:20px;
  background: rgba(255,255,255,0.9);
  backdrop-filter: blur(15px);
  box-shadow:0 20px 60px rgba(0,0,0,0.15);
  text-align:center;
  animation:fadeUp 0.8s ease;
}

.register-box h2{
  margin-bottom:20px;
  font-size:28px;
  font-weight:700;
  color:#0f172a;
}

.input-box input{
  width:100%;
  padding:12px;
  margin:10px 0;
  border-radius:10px;
  border:1px solid #e2e8f0;
  background:#f8fafc;
  color:#0f172a;
  outline:none;
}

.input-box input:focus{
  border-color:#0ea5e9;
  box-shadow:0 0 0 3px rgba(14,165,233,0.2);
}

.register-btn{
  width:100%;
  padding:12px;
  margin-top:10px;
  border:none;
  border-radius:30px;
  background:linear-gradient(90deg,#0ea5e9,#2563eb);
  color:white;
  font-weight:600;
  cursor:pointer;
}

.register-btn:hover{
  transform:translateY(-2px);
  box-shadow:0 10px 25px rgba(37,99,235,0.4);
}

.extra{
  margin-top:15px;
  font-size:14px;
  color:#64748b;
}

.extra a{
  color:#0ea5e9;
  text-decoration:none;
}

.error{
  color:red;
  margin-bottom:10px;
}

@keyframes fadeUp{
  from{
    opacity:0;
    transform:translateY(30px);
  }
  to{
    opacity:1;
    transform:translateY(0);
  }
}
</style>
</head>

<body>

<div class="blur one"></div>
<div class="blur two"></div>

<div class="register-box">
  <h2>Create Account 🚀</h2>

  <?php if(isset($error)) echo "<div class='error'>$error</div>"; ?>

  <form method="POST">

    <div class="input-box">
      <input type="text" name="name" placeholder="Full Name" required>
    </div>

    <div class="input-box">
      <input type="email" name="email" placeholder="Email Address" required>
    </div>

    <div class="input-box">
      <input type="password" name="password" placeholder="Password" required>
    </div>

    <button type="submit" name="register" class="register-btn">Register</button>

  </form>

  <div class="extra">
    Already have an account? <a href="login.php">Login</a>
  </div>
</div>

</body>
</html>