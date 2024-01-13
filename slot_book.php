<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/logstyle.css">
    <title>Document</title>
    <style>
    .bga2{
            
            position:absolute;
            top:-20px;
            left:-20px;
            right:-20px;
            bottom:-20px;
            filter:blur(18px);
            background-position: 100% 100%;
            background: url('./images/mg3.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        
        }
        .bk-slotheading{
            background-color: rgb(46, 46, 45);
        }
    .allInone{
        
        font-size:20px;
        color: rgb(224, 214, 214);
    }
    .slot-bg{
        background-color: rgb(46, 46, 45);
    }
    .slotHidden{
        display:none;
        
    }
    .hiddenslot{
        display:none; 
    }
    </style>
</head>
<body>
<div class="bga2"></div>
<div class="allInone">
<h1 class="head-bk"><a href="parks.php">
    <img src="icon/icons8-back-64.png" onclick="changePos(event)" width="100px" height="50px" alt="" srcset=""></a></h1>
    <table align="center" class="tb-bk"  border="3"> 
        <form class="fm-sb"  action="parks.php " onsubmit="return validationForm(event)" method="POST">
             <tr>
                
        <th class="bk-slotheading" colspan="2" >
                Book Slot
        </th>    
    </tr>
        <tr >
            <td colspan="2">
             <label for=""><b>Select Date: </b>
                 <input  type="date" name="date" require  class="input-bk date-picker" >
             </label>
            </td>
        </tr>
        <tr>
            <td>
                <label ><b>Start Time:</b>
                    <input  type="time" require class="input-bk st-time"  name="time" >
                </label>
                
            </td>
      
            <td>
                <label><b>End Time:</b>
                    <input require type="time" require name="time2"  class="input-bk ed-time" >                    
                </label>
            </td>
        </tr>
        <tr class="sloteHidden">
         <td>
          <input type="text" value= "" class="hiddenslot" name="slotNumber">
         </td>
        </tr>
            <tr class="slot-bg">
            <td colspan="2">
                <input type="submit" value="Select Slot" name="submitbk" class="btn-bk">
            </td>

        </tr>
        
    </form>
    </table>
    </div>
<script>
    var dd = document.querySelector(".date-picker");   
    var startTime = document.querySelector(".st-time"); 
    var endTime = document.querySelector(".ed-time");
    var submitForm = document.querySelector(".fm-sb");
    var hiddnest = document.querySelector(".hiddenslot");
    var sb = document.querySelector(".btn-bk");
    var d = new Date();
    var y = d.getFullYear();
    var m = d.getMonth() + 1;
    var dat = d.getDate();
    var storeVariable;
  dd.setAttribute("min", y + "-0"+ m +"-"+ dat);
  var h = d.getHours();
  var m = d.getMinutes();
  startTime.setAttribute("min",h +":"+m);

 function validationForm(e){
    if(dd.value.length == ""){
        dd.style.border = "2px solid red";
        e.preventDefault();    
       
    }else{
        dd.style.border = "2px solid green";
    } if(startTime.value.length == ""){        
        startTime.style.border = "2px solid red";       
        e.preventDefault();
    }else {
        startTime.style.border = "2px solid green";
    }
    if(endTime.value.length == ""){
        endTime.style.border ="2px solid red";
        e.preventDefault();
    }else{    
       
        endTime.style.border ="2px solid green";
      
    }
    var i = 0;
        // localStorage.setItem("show",t); 
    if(dd.value.length != "" && (startTime.value.length != "" && endTime.value.length != "")){
        alert("SLOT selected!");
         
           var d =  localStorage.getItem('numbers'); 
           localStorage.setItem("passedText",d);
           hiddnest.value = d;
           alert(d);
                 
          
    
    
       
        // localStorage.setItem("show",t); 
        
}else{
    var t = localStorage.getItem("slots_number");
    localStorage.clear();
localStorage.removeItem("ts");
}

}
function changePos(e){
var t = localStorage.getItem("slots_number");
localStorage.removeItem(t);
}

</script>


</body>
</html>