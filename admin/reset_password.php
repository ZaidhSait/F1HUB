<?php ob_start(); ?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href=" " type="image/x-icon">
    <title>Forgot Password</title>
    <style>
        *{
    margin:0;
    padding:0;
    box-sizing: border-box;
}

/* Desktop Styles for Forgot Password*/

body{
    background-color: rgb(255, 255, 255);
    
}


.forgot{
    margin: auto;
    text-align: center;
    width: 50%;
    margin-top: 5%;  
    margin-bottom: 5%;
    padding: 20px;
    background-color: white;
    border-radius: 5px;
    
    
}

.forgot img{
   float: right;
   margin-bottom: 10px;
   padding: 5px;
}

.top{
    font-family: 'Lato';
font-style: normal;
font-weight: 400;
font-size: 32px;
line-height: 53px;

letter-spacing: 0.1em;
    padding-bottom: 20px;
    color: #E50914;
}

.text {
font-family: 'Lato';
font-style: normal;
font-weight: 500;
font-size: 16px;
line-height: 24px;
text-align: center;
letter-spacing: 0.15px;
color: #141212;
padding: 20px;
margin-top: 10%;
}
/*
.text{
    color: black;
    
    padding: 20px;
    font-size: 15px;
    margin-top: 10%;
}
*/

.label{
  
    margin-left: -27%;
    
}
input{
    width: 50%;
    border-radius: 5px;
    border: solid rgb(229, 228, 228) 1px;
    padding: 10px;
    margin: 10px;
}

button{
    background-color:#E50914;
    border: 0px;
    color: white;
    width: 50%;
    padding: 10px;
    margin-top: 40px;
    border-radius: 5px;
    cursor: pointer;
}

input :placeholder-shown{
    color: black;
    font-size: 8px;
}

/*Desktop Style for reset password */

.reset{
    margin: auto;
    text-align: center;
    width: 50%;
    margin-top: 2%;  
    margin-bottom: 5%;
    padding: 10px;
    background-color: white;
    border-radius: 5px;
    
}

.reset img{
   float: right;
   margin-bottom: 5px;
   padding: 5px;
}
.top{
    font-family: 'Lato';
font-style: normal;
font-weight: 400;
font-size: 32px;
line-height: 53px;

letter-spacing: 0.1em;
    padding-bottom: 20px;
    color: #E50914;
}

.pre {
font-family: 'Lato';
font-style: normal;
font-weight: 500;
font-size: 16px;
line-height: 24px;
text-align: center;
letter-spacing: 0.15px;
color: #141212;
padding: 20px;
margin-top: 10%;
}

.resetform{
    padding: 20px;
    background-color: white;
    border-radius: 5px;
    margin-top: 10px;
    padding: 10px;
    
    
}
.resetlabel1{
  
    margin-left: -35%;
    
}
.resetlabel2{
  
    margin-left: -30%;
    
}
input{
    width: 50%;
    border-radius: 5px;
    border: solid rgb(229, 228, 228) 1px;
    padding: 10px;
    margin: 10px;
}

button{
    background-color:#E50914;
    border: 0px;
    color: white;
    width: 50%;
    padding: 10px;
    margin-top: 40px;
    border-radius: 5px;
    cursor: pointer;
}

input :placeholder-shown{
    color: black;
    font-size: 8px;
}



/*Desktop Style for OTP password */

.otp{
    margin: auto;
    text-align: center;
    width: 50%;
    margin-top: 5%;  
    margin-bottom: 5%;
    padding: 20px;
    background-color: white;
    border-radius: 5px;
    
}

.otp img{
   float: right;
   margin-bottom: 2px;
   padding: 5px;
}

.top{
    font-family: 'Lato';
font-style: normal;
font-weight: 400;
font-size: 32px;
line-height: 53px;

letter-spacing: 0.1em;
    padding-bottom: 20px;
    color: #E50914;
}

.otptext {
font-family: 'Lato';
font-style: normal;
font-weight: 500;
font-size: 16px;
line-height: 24px;
text-align: center;
letter-spacing: 0.15px;
color: #141212;
padding: 20px;
margin-top: 10%;
}


.otpform{
    padding: 20px;
    background-color: white;
    border-radius: 5px;
    margin-top: 10px;
    padding: 10px;
    
    
}

.otpform input{
    width: 5%;
    border-radius: 5px;
    border: solid rgb(229, 228, 228) 1px;
    padding: 10px;
    margin: 10px;
    background-color: #D9D2D2;
}

button{
    background-color:#E50914;
    border: 0px;
    color: white;
    width: 50%;
    padding: 10px;
    margin-top: 40px;
    border-radius: 5px;
    cursor: pointer;
}

input :placeholder-shown{
    color: black;
    font-size: 8px;
}
        </style>
</head>
<body>
<form method="post">
            <div class="forgot">
                <img src="close-square.svg" alt="">
            <div class="text">
                <p class="top">RESET PASSWORD</p>
                <p>Please enter a New Password<br/> to update your account</p>
            </div>
            <div class="form">
                
                <label class="label"><b> New Password:</b></label> <br/>
                <input type="Password" name="pass1" placeholder="New Password" required >
                <br>
                <br>
                <label class="label"><b> Confirm Password:</b></label> <br/>
                <input type="password" name="pass2" placeholder="Confirm Password" required >
                <Button type="submit">SUBMIT</Button>
                </div>
           </div>
            </form>
            
        
   
<?php

if($_POST){
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fishykart";

$conn = mysqli_connect($servername, $username, $password, $dbname);
$username=$_GET['username'];
$pass=$_POST['pass1'];
$pass1=$_POST['pass2']; 

if ( empty($pass) || empty($pass1)) {
    echo "Please fill in all fields.";
    exit();
}
if ($pass != $pass1) {
    echo "Passwords do not match.";
    exit();
}
$encrypted_password = md5($pass);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "UPDATE users SET password = '$encrypted_password' WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

// Check if password was successfully updated
if ($result) {
    echo "Password updated successfully.";
} else {
    echo "Error updating password.";
}

// Close database connection
mysqli_close($conn);
}
?>

</body>
</html>


<?php ob_end_flush(); ?>