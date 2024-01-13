
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
    .allIn{
        position:absolute;
            top:-20px;
            left:-20px;
            right:-20px;
            bottom:-20px;
            filter:blur(14px);
            background-position: 100% 100%;
            background: url('./images/mgthree.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            z-index: -4;
    }
    .b-text{
        font-size:16px;
        color:white;
      text-shadow:2px 2px 4px black;
    }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
     <link rel="stylesheet" href="css/logstyle.css" > 
     <?php
$conn =mysqli_connect("localhost","root","","onlineparking");


 
      if(isset($_POST['submited'])){
        $fullname = $_POST['fullname'];
        $user = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['number'];
        $pass = $_POST['passwords'];
        $sql = "INSERT INTO registrations (fullname,username,email,phone_no,pass_word) VALUES('$fullname','$user',
        '$email','$phone','$pass')";
        $run = mysqli_query($conn,$sql);
        echo "";
      }else{
          echo "";
      }
  

?>
</head>
<body>
    <div class="allIn"></div>
    <div class="first-div first-div1">
        <div class="first-I"><a href="index.html">Home</a></div>
        <div class="first-II"><a href="about.html" onclick="myfun(event)">About Us</a></div>
       
    </div>
    <div class="second-div">
    <table id="first-table"  border="0" align="center" cellpadding="5" width="50%" cellspacing="5">
            <form action="" method="POST">
        <tr>
            <td class="cp">Log in </td>
        </tr> 
        <th>
         <input type="text" require title="please enter valid email"  
         placeholder="  enter email.." id="tret"  name="names" class="user-name flname">
        </th>
     <tr>
        <th>
             <input type="password" title="please enter valid password" require
              placeholder="     enter password.." name="passwrd" class="pass-word flname" >
             <span class="fa-eye" onclick="myfun(event)">
          <i class="fa-one "></i>
      </span>
        </th>
     </tr>

     <tr>
         <th>
              <input type="submit" value="Submit" name="login" class="btn-primary login">&nbsp;
               <h6>Note have an account <a href="newuser.html" class="b-text">Sign Up</a> here</h6>
               <h6>forget password to <a href="email_valid.php" class="b-text">Click here</a></h6>
         </th>
     </tr>
    
    </form>
        </table>
   
</div>
<script>
    var x = document.querySelector(".fa-eye");
    var user_valid = document.querySelector(".user-name");
    var pass_valid = document.querySelector(".pass-word");
    var log = document.querySelector(".btn-primary");
    function myfun(e){
    if(x.firstElementChild.className == "fa-one" && pass_valid.value.length != 0){
        x.firstElementChild.classList.remove("fa-one");
        x.firstElementChild.classList.add("fa-two");     
            pass_valid.type = "text";        
    }else{
        x.firstElementChild.classList.remove("fa-two");
        x.firstElementChild.classList.add("fa-one");
        pass_valid.type = "password";
    } 
}
    log.addEventListener("click",(e)=>{
       
      if(user_valid.value.length == 0){
          user_valid.style.border = "2px solid red";

      }else if(pass_valid.value.length == 0){
          pass_valid.style.border = "2px solid red";
      }
    });
      
   
</script>
  <?php

          if(isset($_POST['login'])){
              
             $usname = $_POST['names'];    
             $passWord = $_POST['passwrd'];
             $user_quy = mysqli_query($conn,"SELECT * FROM registrations WHERE email = '$usname' ");
             $pas_quy = mysqli_query($conn,"SELECT * FROM registrations WHERE pass_word = '$passWord'");
             $user_row = mysqli_fetch_assoc($user_quy);
             $pass_row = mysqli_fetch_assoc($pas_quy);
             if($user_row > 0 && $pass_row > 0){
                 $_SESSION['usernames'] = $user_row['username'];
                 $_SESSION['fname'] = $user_row['fullname'];
                 $_SESSION['ems'] = $user_row['email'];
                 $_SESSION['id'] = $user_row['id'];
                 ?>
                 <script>
                 location.replace("parks.php");
                 </script>
                 <?php
             }else{                
                 if($user_row['username'] != $usname){
                   
                $sc= '<script>             
                var usr = document.querySelector(".user-name");
                  usr.style.border = "2px solid red";
                  usr.title ="please fill the correctly";
                  usr.value = "";
                </script>';
                  echo $sc;
                 }else if($pass_row['pass_word'] != $passWord){
                   $pas = '<script>             
                   var psr = document.querySelector(".pass-word");
                     psr.style.border = "2px solid red";
                     psr.title = "please fill the correctly";
                     psr.value = "";
                   </script>'; 
                   echo $pas;
                 }
                
                }
           
            }

     ?>
           
   

       
</body>
</html>