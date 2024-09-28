<html>
<head>
    <title>Page Title</title>
</head>
<body>
    <?php
    
        $file = fopen("testr.txt","r");
        // echo $file;
        // echo fread($file,"100");
        // echo "<br>";
        echo fread($file,filesize("testr.txt"));
        $file = fopen("testw.txt","a");
        fwrite($file,"Hello World. Testing!");
        echo fgets($file);
        while(!feof($file))
        {
            echo fgets($file). "<br />";
        }
        print_r(file("testw.txt"));

        //echo file_get_contents("testr.txt");
        //echo "<br>";
        //echo file_put_contents("test.txt","Hello World. Testing!");
        //echo "<br>";
        //echo ftell($file);
        //echo "<br>";
        //fseek($file,10,SEEK_CUR);
        //echo ftell($file);



        fclose($file);
        
    ?>
</body>
</html>



<!-- 
<!DOCTYPE html>
<html>

<body>
<?php
	// 	if(isset($_POST["signup"])) {
		
	// 	if(isset($_POST["name"]) && isset($_POST["pw"]) && isset($_POST["email"]))
	// 	{
	// 		$file = fopen("user.txt","a");
	// 		fwrite($file,"\n".$_POST["name"].",".$_POST["pw"].",".$_POST["email"]);
	// 	}
	// }
	// if(isset($_POST["login"])) {
	// 	if(isset($_POST["loginname"]) && isset($_POST["loginpw"]))
	// 	{
	// 		$flag=FALSE;
	// 		$file = fopen("user.txt","r");
	// 		while(!feof($file))
    //     	{
    //         	$string=fgets($file);
	// 			$array = explode(",", $string);
	// 			//print_r($array);
	// 			if(isset($array[1])){
	// 			if($array[0]==$_POST["loginname"] && $array[1]==$_POST["loginpw"]){
	// 				$flag=TRUE;
	// 			}
							
	// 			}
				
    //     	}
	// 		if($flag){
	// 			echo"Login Successful";
	// 		} else {
	// 			echo "User Not Found";
	// 		}
			
	// 	}
	// }
	?>
<div class="login-page">
  <div class="form">
    <form class="login-form" name="loginfrm" method="post">
      <input type="text" placeholder="username" name="loginname"/>
      <input type="password" placeholder="password" name="loginpw"/>
      
	  <input type="submit" name="login" Value="Login">
      <p class="message">Not registered? <a href="signup.php">Create an account</a></p>
    </form>
  </div>
  <div class="login-page">
  <div class="form">
    <form class="register-form" name="signupfrm" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
      <input type="text" placeholder="name" name="name"/>
      <input type="password" placeholder="password" name="pw"/>
      <input type="text" placeholder="email address" name="email"/>
      <input type="submit" name="signup" Value="Sign Up">
      <p class="message">Already registered? <a href="login.php">Sign In</a></p>
    </form>
  </div>
</div>

</div>
</body>
</html> -->