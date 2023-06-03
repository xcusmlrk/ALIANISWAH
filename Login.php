<?php
session_start();

class userlogin {
    protected $email;   
    protected $password; 
    protected $dataUser; 
    protected $getRole;  

    public function __construct($email, $password) 
    {
        $this->_dataUser = [
            (object) [
                'email'     => "alianswh2215@gmail.com",
                'password'  => "12345",
            ],
            (object) [
                'email'     => "email@gmail.com",
                'password'  => "67890",
            ]
        ];
       $this->email = $email;
       $this->password = $password;
    }

    public function login()
    {
        $user = $this->checkCredentials();
        if($user) {
            $this->getRole = $user->role;
			$get_data = $user->email;
			$_SESSION["username"] = true;
            return true;
        } else {
            return false;
        }
    }

    protected function checkCredentials()
    {
        foreach($this->_dataUser as $key => $value) {
            if($value->email == $this->email && $value->password == $this->password) {
                return $value;
            }
        }
        return false;
    }

    public function getRole()
    {
        return $this->getRole;
    }
}

if (isset($_POST["submit"])) {
	$email = $_POST["email"];
    $password = $_POST["password"];

    $userlogin = new userlogin($email, $password);
    $loggedIn = $userlogin->login();

	if($loggedIn) {
    	echo "<script>alert('Login berhasil! Selamat berbelanja.')</script>";
    	echo "<script>location='shop.php';</script>";
	} else {
    	echo "<script>alert('Invalid Login! Silahkan coba lagi.')</script>";
    	echo "<script>location='index.php';</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width, initial-scale=1.0">
    <title>Hindasy User Log In</title>
	<link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>
<body>

	<div class="container">
		<form action="" method="post" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Log In</p>
			<div class="input-group">
				<input type="email" placeholder="email" name="email">
			</div>
			<div class="input-group">
				<input type="password" placeholder="password" name="password">
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<!-- <p class="login-register-text">Don't have an account? <a href="register.php">Register</a>.</p> -->
		</form>
	</div>

</body>
</html>