<?php
session_start();
    require_once("connect.php");

    if(isset($_POST['name2'])){
        $name = $_POST['name2'];
        $sql = ("show columns from $name");
        $result = $conn->query($sql);

$z=0;
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


#yeet11:hover {
    opacity:0.4;
}
input:hover {
    opacity:0.4;
}
form {
  font-size:20px;
}


        </style>";

        echo "<p class='lead mt-5'>" ."You are deleting from the ". $name . " table". "<br>"."<br>";
        $_SESSION['legs'] = $name;
       
$_SESSION['a']='';       

 echo   "<form action='' method = 'post' id ='bongo'  >";
        while ($row = $result->fetch_assoc()){
            
            $d= $row['Field'];
            $_SESSION['a'] = $_SESSION['a'] . ','. $d;
            
            echo  '<label>'. $row['Field']. '</label>'. "<input type='text' name='berp1' value='' id = 'bongo$z' >". "<br> " ;
  echo "<script>  
  var stwing;
  var led;
$('#yeet22').hide()
     $('#yeet11').click(function () {
     	    $('input').each(function() {
        if(!$(this).val()){
            alert('All fields must contain a value');
           reload();
        }
    });

$('#yeet22').show()


   led = document.getElementById('bongo$z').value;
   stwing +=','+'\"'+led + '\"';
   stwing = stwing.replace('undefined,', '')
      if($z==0){
   stwing = stwing.substring(1);
   }
   //console.log(stwing);
   event.preventDefault();
   bongo.yeet11.disabled = true;
   bongo.yeet11.style.opacity = '0.4';
   bongo$z.disabled = true;
   bongo$z.style.opacity = '0.4';



});

stwing='';
 </script>";



$z++;

           
        }




        echo '<input type="submit" name = "submit2" value="Eradicate"  id = "yeet11"  >';
        echo '<input type="button" name = "submit3" value="Confirm"  id = "yeet22" onclick="post()" >';
echo '<div id="result1">';
echo '<div id="result"></div>';
  echo "<script>  

  function post(){
  	bongo.yeet22.style.opacity = '0.4';
    bongo.yeet22.disabled = true;

var array = stwing.split(',');
stwetch = array.toString();
console.log(stwetch);
document.getElementById('outputDivv').innerHTML = '<h6>Please wait until output text appears above. Please refresh the page.</h6>';

    $.post('bogus1.php',{berp1:stwing},
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

?>