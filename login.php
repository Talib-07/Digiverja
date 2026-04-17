<?php
session_start();
include 'db.php';

if(isset($_POST['login'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  $res = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
  $user = mysqli_fetch_assoc($res);

  if($user && $password == $user['password']){
    $_SESSION['user'] = $user['name'];
    header("Location: index.html");
  } else {
    $error = "Invalid Email or Password!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Digivera</title>

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

.login-box{
  width:360px;
  padding:40px;
  border-radius:20px;
  background: rgba(255,255,255,0.85);
  backdrop-filter: blur(15px);
  box-shadow:0 20px 60px rgba(0,0,0,0.15);
  text-align:center;
  animation:fadeUp 0.8s ease;
}

.login-box h2{
  margin-bottom:20px;
  font-size:28px;
  font-weight:700;
  color:#0f172a;
}

.input-box input{
  width:100%;
  padding:12px;
  margin:12px 0;
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

.login-btn{
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

.login-btn:hover{
  transform:translateY(-2px);
  box-shadow:0 10px 25px rgba(37, 100, 235, 0.6);
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

<div class="login-box">
  <h2>Welcome Back 👋</h2>

  <?php if(isset($error)) echo "<div class='error'>$error</div>"; ?>

  <form method="POST">
    <div class="input-box">
      <input type="email" name="email" placeholder="Enter Email" required>
    </div>

    <div class="input-box">
      <input type="password" name="password" placeholder="Enter Password" required>
    </div>

    <button type="submit" name="login" class="login-btn">Login</button>
  </form>

  <div class="extra">
    Don't have an account? <a href="register.php">Register</a>
  </div>
</div>

</body>
</html>