<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="logstyle.css">
    <title>Document</title>
</head>
<body>

<?php
include 'dbconnection.php';
if(isset($_POST['vd-submit'])){
    $email = mysqli_real_escape_string($conn,$_POST['vd-email']);
$emailquery = "SELECT * FROM registrations where email = '$email'";
$query = mysqli_query($conn,$emailquery);
$emailcount = mysqli_num_rows($query);
echo $emailcount;
if($emailcount){
    $userdata = mysqli_fetch_array($query);
    $username = $userdata['username'];    
    $subject = "Password Reset";
    $body = "Hi, $username. Click here to activate your account 
    http://localhost/ops/email_valid.php";
    $sender_email = "From: abc12@gmail.com";
    if(mail($email,$subject,$body,$sender_email)){
        $_SESSION['msg'] = "check you mail to reset your password $email" ;
        header('location:log.php');
    }else{
        echo "email sending failed";
    }
}else{
    echo "no email found";
}
}else{
    echo "";
}
?>
 <div class="block-div">
 <h1>Recover Your Account</h1>
  <h4>Please fill email id properly</h4>
<form action="" method="POST">
  <table align="center" width="80%" >
      <tr>
          <td>
              <input require type="email" name="vd-email" placeholder="Email address" onblur="myfun(event)" name="valid_ems" class="vd_email">
          </td>
      </tr>
      <tr>
          <td>
              <input type="submit" value="Send Mail" name="vd-submit" class="vd_sub"><br>
             <div>
                 Have an account? <a href="log.php">Log in</a>
             </div>

          </td>
      </tr>
  </table>
  </form>
 </div>
<script>
    var emailVal = document.querySelector(".vd_email");
var reg3 = /^([\.\_a-zA-Z0-9]+)@([a-zA-Z]+)\.([a-zA-Z]){2,8}$/;
    var reg4 = /^([\.\_a-zA-Z0-9]+)@([a-zA-Z]+)\.([a-zA-Z]){2,3}\.[a-zA-Z]{1,3}$/;
function myfun(e){
   console.log("change");
     if(!reg3.test(emailVal.value) || reg4.test(emailVal.value)){
        emailVal.style.border = "2px solid red";
        emailVal.value = "";
    }

}
</script>

</body>

</html>