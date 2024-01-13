<?php
session_start();
if(!isset($_SESSION['usernames'])){       
    header('location:log.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="css/logstyle.css"">
    <title>Document</title>
    <?php
    //  session_start();
     $conn =mysqli_connect("localhost","root","","onlineparking");
    if(isset($_POST['submitbk'])){
       $dates = $_POST['date'];
       $tm = $_POST['time'];
       $endtm = $_POST['time2'];
       $hide = $_POST['slotNumber'];
       $_SESSION['temperary'] = $hide;
       $sql = "INSERT INTO booking_slot (in_date,start_time,end_time) VALUES('$dates','$tm','$endtm')";
      $sql_storeVl = "INSERT INTO storing_value(temp_value) VALUES('$hide')";

       $run = mysqli_query($conn,$sql);
       $run_vr =  mysqli_query($conn,$sql_storeVl);
      
      $_SESSION['st_time'] = $tm;
      $_SESSION['en_time'] = $endtm;
       $_SESSION['names'] = true;     
  
      
      
?>
<script>
 var ims = document.querySelectorAll(".pk-size");
    </script>
<?php
       echo "";
     }else{
         echo "";
     }
     if(isset($_POST['booking_cancel'])){
      
?>
<script>
 localStorage.removeItem('numbers');
 </script>
 <?php
     }
     ?>
</head>
<body>
    <div class="pk">

    <div class="pk-one"><a href="#">View Pakring</a></div>
    <div class ="pk-two"><a href="book_details.php">Booking Details</a></div>
    <div class ="pk-three"><a href="cancel_booking.php">Cancel Booking</a></div>
    <div class ="pk-four">
    <a href="logout.php">LogOut</a>
    </div>
    </div>    
  
    <div class="park-symbol">
    <H1>
        MG Hector Showroom Parking Areas
    </H1>
      <div class="pk-symbol">
        <p>Parking Space Available</p>
        <img src="icon/green.png" class="signal-parks" alt="">
      </div>
      <div class="pk-symbol2">
      <p>Parking Space Occupied</p>
      <img src="icon/red.png" class="signal-parks" alt="">
      </div>
    </div><br>
    
    <div class="slot-number">
    <h2>SELECT SLOTING NO</h2>
    <h4>PLEASE SELECT SLOTING NUMBER WHERE YOU PARK YOUR CAR.</h4>
</div>
<div class="parent-slot">
<div class="add-slot">

</div>
</div>
<script>
    
    var slot = document.querySelector(".add-slot");
    for(let i=0;i<20;i++){
        var num= i+1;
    var cr = document.createElement("div");
    var im = document.createElement("img");
    im.setAttribute("class","pk-size");
    im.classList.add("img-"+i);
    cr.setAttribute("class","divSlot-number"); 
    var sp = document.createElement("span");
    sp.setAttribute("class","sp-number");
    im.src = "icon/green.png";
    sp.textContent = "SLOT NO: " + num;
        cr.appendChild(sp);  
    cr.appendChild(im);
    slot.appendChild(cr);
  
}

var num =0;
var dsd;
var abc;
var d = document.querySelectorAll(".divSlot-number");
// var ims = document.querySelectorAll(".pk-size");
for(let j =0;j<d.length;j++){
    d[j].addEventListener("click",(e)=>{
        
        var s = d[j].firstElementChild.textContent;                   
      localStorage.setItem("numbers",j);
      localStorage.setItem("savedText",s);
      window.location="slot_book.php";
      
    });
}


</script>
<?php
 if(isset($_POST['submitbk'])){
    $tm = $_POST['time'];
    $endtm = $_POST['time2'];
    $d  = $_POST['date'];
    $hider = $_POST['slotNumber'];
    $_SESSION['tmpvl'] = $hider;
    $tm_quy = mysqli_query($conn,"SELECT * FROM booking_slot WHERE start_time = '$tm'");
    $end_quy = mysqli_query($conn,"SELECT * FROM booking_slot WHERE end_time= '$endtm'");
    $storeid = mysqli_query($conn,"SELECT * FROM storing_value WHERE temp_value = '$hider'");
    $row_d = mysqli_fetch_assoc($storeid);
    $tm_row = mysqli_fetch_assoc($tm_quy);
    $endtm_row = mysqli_fetch_assoc($end_quy);
    
    $_SESSION['storeId'] = $row_d['incr_id'];    
    $_SESSION['varaible_storage'] = $row_d['temp_value'];
 echo  $_SESSION['varaible_storage'];

   
    if($tm_row > 0 && $endtm_row > 0){
        
        $_SESSION['dates'] = $endtm_row['in_date'];
        $_SESSION['times_start'] = $tm_row['start_time']; 
        $_SESSION['times_end'] = $tm_row['end_time']; 
       
    }
    

 }
?>

<script>
 var dts = new Date();
  var hours = dts.getHours();
  var minut = dts.getMinutes(); 
  var fulltm = hours+":"+minut;

  var Tstart = "<?php 
  if(isset($_POST['submitbk'])){
    echo $_SESSION['st_time']; 
  }else{
      echo '';
  }
  ?>";
  var TEnd = "<?php 
  if(isset($_POST['submitbk'])){
    echo $_SESSION['en_time']; 
  }else{
      echo '';
  }
  ?>";
  
   var storeVar = [];
  var increment =-1;
  <?php if(isset($_POST['submitbk'])){     ?>      
  
    
     var ims = document.querySelectorAll(".pk-size");
    var lt = localStorage.getItem('numbers');
    var d = document.querySelectorAll(".divSlot-number");

   
    var dn =<?php echo  $_SESSION['varaible_storage']; ?>;
   var storeVar = [];
   storeVar.push(dn);
  if(Tstart != ''){  
         
           for(let x in storeVar)
           {
               ims[storeVar[x]].src = "icon/red.png";
           }      
      

  }
 var stopInterval = setInterval(startIteration, 1000);
  function startIteration(){
      var i = 0;
      i++;
      var dte = new Date();
      var hours = dte.getHours();
  var minut = dte.getMinutes(); 
  var fulltm = hours+":"+minut;
   if(TEnd === fulltm){
    for(let x in storeVar)
           {
           
               var stdfe = '<?php echo  $_SESSION['varaible_storage']; ?>';
               var cnt = parseInt(stdfe); 
               console.log("delete parking system "+cnt );
            ims[cnt].src = "icon/green.png";
               <?php 
               $valuesId =  $_SESSION['storeId'];
               
                $sql_row =  "DELETE FROM storing_value WHERE incr_id = '$valuesId'";
                $run = mysqli_query($conn,$sql_row);
                $_SESSION['varaible_storage'] = " ";
                ?>
            //    ims[storeVar[x]].src = "icon/green.png"; 
               if(i==1){
                   var ops =   localStorage.getItem('passedText'); 
                   alert(ops + " free now");
               }   
               clearInterval(stopInterval);  
              
           }
   }else{
      
   }
  }
   
  var dsf = localStorage.getItem('tr');
  console.log(dsf);
  console.log(Tstart+ "not show");
  <?php } ?>
  </script>
  <?php
  if(isset($_POST['booking_ok'])){
?>

<?php
 $strone =    $_SESSION['storeId']; 
 echo $_SESSION['tmpvl'];
 echo $_SESSION['storeId'];
 $str = $_SESSION['tmpvl'];
 if($_SESSION['tmpvl'] != ""){
  ?>
<script>
  var timeEnd = "<?php 
  if($_SESSION['en_time'] != ""){
    echo $_SESSION['en_time']; 
  }else{
      echo '';
  }
  ?>";
var stopInterval = setInterval(startIteration, 1000);
  function startIteration(){
      var i = 0;
      i++;
      var dte = new Date();
      var hours = dte.getHours();
  var minut = dte.getMinutes(); 
  var fulltm = hours+":"+minut;  
  var ims = document.querySelectorAll(".pk-size");
  console.log(fulltm +" : "+timeEnd);
   if(timeEnd === fulltm){
           
               var stdfe = '<?php echo  $_SESSION['tmpvl']; ?>';
               var cnt = parseInt(stdfe); 
            ims[cnt].src = "icon/green.png";
               <?php 
               $valuesId =  $_SESSION['storeId'];
               
                $sql_row =  "DELETE FROM storing_value WHERE incr_id = '$valuesId'";
                $run = mysqli_query($conn,$sql_row);
                $_SESSION['varaible_storage'] = " ";
                ?>
            //    ims[storeVar[x]].src = "icon/green.png"; 
               if(i==1){
                   var ops =   localStorage.getItem('passedText'); 
                   alert(ops + " free now");
               }   
               clearInterval(stopInterval);  
              
           
   }else{
      
   }
  }

     var ims = document.querySelectorAll(".pk-size");
     var strd = "<?php echo $str; ?>";
     console.log("here booking slot "+ strd); 
   var storeint = parseInt(strd);
   ims[storeint].src = "icon/red.png";

</script>
  <?php
 }else{
     ?>
     <script>
     var ims = document.querySelectorAll(".pk-size");
     var strd = "<?php echo $str; ?>"; 
     console.log("not working id"+ $_SESSION['varaible_storage'] ); 
   var storeint = parseInt(strd);
   console.log(storeint);
   ims[storeint].src = "icon/green.png";
 
</script>

     <?php
 }
  }
  ?>


</body>
</html>