<?php
session_start();
    require_once("connect.php");

    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $sql = ("show columns from $name");
        $result = $conn->query($sql);

$x=0;
        echo "<style> 
.lead.mt-5{
  font-size:16px;
}

input{
  border-radius: 7px;
  padding:0.23%;
}

label {
  display:inline-block;
  min-width:220px;
 
}


#yeet:hover {
    opacity:0.4;
   
}
input:hover {
    opacity:0.4;
}
form {
  font-size:20px;
}


        </style>";

        echo "<p class='lead mt-5'>" ."You are inserting into the ". $name . " table". "<br>"."<br>";
        $_SESSION['legs'] = $name;
       
$_SESSION['a']='';       

 echo   "<form action='' method = 'post' id ='bongo'  >";
        while ($row = $result->fetch_assoc()){
            
            $d= $row['Field'];
            $_SESSION['a'] = $_SESSION['a'] . ','. $d;
            
            echo  '<label>'. $row['Field']. '</label>'. "<input type='text' name='berp' value='' id = 'bongo$x' >". "<br> " ;
  echo "<script>  
  var stwing;
  var led;
$('#yeet1').hide()
     $('#yeet').click(function () {
     
     	    $('input').each(function() {
        if(!$(this).val()){
            alert('All fields must contain a value/Only one form must be open at once');
           reload();
        }
    });

$('#yeet1').show()


   led = document.getElementById('bongo$x').value;

   stwing +=','+'\"'+led + '\"';
   stwing = stwing.replace('undefined,', '')
   if($x==0){
   stwing = stwing.substring(1);
   }
   
   //console.log(stwing);
   event.preventDefault();
   bongo.yeet.disabled = true;
   bongo.yeet.style.opacity = '0.4';
   bongo$x.disabled = true;
   bongo$x.style.opacity = '0.4';



});

stwing='';


 </script>";



$x++;

           
        }




        echo '<input type="submit" name = "submit" value="Inject"  id = "yeet"  >';
        echo '<input type="button" name = "submit1" value="Insert"  id = "yeet1" onclick="post()" >';
echo '<div id="result1">';
echo '<div id="result"></div>';
  echo "<script>  

  function post(){
  	bongo.yeet1.style.opacity = '0.4';
    bongo.yeet1.disabled = true;
    

var array = stwing.split(',');
stwetch = array.toString();
//console.log(stwetch);
document.getElementById('outputDiv').innerHTML = '<h6>Please wait until output text appears above. Please refresh the page.<h6>';

    $.post('bogus.php',{berp:stwing},
    function(data){

        $('#result').html(data);

        event.preventDefault();

   
  

   

    });
  }
event.preventDefault();

  </script>";
echo '</form>';

}
echo '</div>';

// include "bogus.php"
?>