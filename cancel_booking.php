<!DOCTYPE html>
<html lang="en">
<head>
<?php
        session_start();      
        $_SESSION['cancel_bk'] = "yes";  
        ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
          .bgall{
            content:'';
            position:absolute;
            top:-20px;
            left:-20px;
            right:-20px;
            bottom:-20px;
            filter:blur(8px);
            background-position: 100% 100%;
            background: url('./images/mg6.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        
        }
        .cn-booking{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
           width:500px;
           height: 500px;
           font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
          
        }
     .booking-head{
      text-align: center;
      font-family: Tahoma, Geneva, Verdana, sans-serif;
      font-size: 3em;
     background:gray;
     text-shadow: 2px 2px 4px rgb(3, 3, 3);
     }
     .booking-tables{
        box-shadow: 5px 5px 10px rgb(0, 0, 0);
         width: 500px;
         height:350px;
         text-align: center;
         border: 1px solid gray;
         padding: 10px;
         margin: 10px;
     }
     .booking-tables tr td{       
        padding: 10px;
         margin: 10px;
     }
     .btn-colors{
        
         width: 200px;
         height: 50px;
         color: aliceblue;
         font-size: 20px;
         text-align: center;
         border-radius: 10px;
         background-color: rgb(30, 158, 30);
         box-shadow: 4px 4px 6px rgb(0, 0, 0);
     }
     .background-s{
         background: gray;
     }
     .booking-body{
         text-align: left;
     }
     .normal-text{
        font-size: 18px;
  font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
     }
    </style>
</head>
<body>
    <div class="bgall"></div>
  <div class="cn-booking">
      <form action="parks.php" method="POST" onsubmit="bookingEmpty(event)">
      <table class="booking-tables" border="5">
          <tr>
              <th class="booking-head" colspan="2">
                Cancel Booking
              </th>
          </tr> 
          <tr>
              <td class="booking-body " colspan="2">
               ID:  <span class="normal-text">&nbsp;  <?php 
               if(isset($_SESSION['id'])){
                echo $_SESSION['id'];
          }else{
              echo "Not Shown";
          } 
          ?></span>
              </td>
          </tr>
          <tr>
              <td class="booking-body" colspan="2">
                Name:<span class="normal-text"> &nbsp; <?php 
               if(isset($_SESSION['fname'])){
                echo $_SESSION['fname'];
          }else{
              echo "Not Shown";
          } 
          ?> </span>
              </td>
          </tr>
          <tr>
              <td class="booking-body" colspan="2">
                 Date: <span class="normal-text">&nbsp; <?php    
               if(isset(  $_SESSION['dates'])){
                echo   $_SESSION['dates'];
          }else{
              echo "Not Shown";
          }  ?>
          </span> 
              </td>
          </tr>
          <tr>
              <td class="booking-body">
                  Entry Time:<span class="normal-text"> &nbsp; <?php 
               if(isset( $_SESSION['st_time'])){
                echo  $_SESSION['st_time'];
          }else{
              echo "Not Shown";
          } 
          ?> </span>
              </td>
              <td class="booking-body">
                  Exit Time:<span class="normal-text"> &nbsp; <?php 
               if(isset($_SESSION['en_time'])){
                echo $_SESSION['en_time'];
          }else{
              echo "Not Shown";
          } 
          ?> </span>
              </td>
          </tr>
          <tr class="background-s">
    <td colspan="2">
        <input type="submit" value="Cancel" class="btn-colors" name="booking_cancel">
    </td>
          </tr>
      </table>
    </form>
  </div>
  <script>
  function bookingEmpty(e){
      <?php
      $_SESSION['st_time'] = "";
      $_SESSION['en_time'] = "";
      $_SESSION['dates'] = "";
      $_SESSION['tmpvl'] = "";
      ?>
  }
  </script>
</body>
</html>