<?php
    require_once("connect.php");

    if(isset($_POST['name'])){
        $name = $_POST['name'];
        

        $sql = ("SELECT transaction_ID, barName, amountorderedbeer, beer, amountorderedfood, food, totalCost, TIME_FORMAT(time, '%H:%i') as time1, date FROM 2876690_drinker
.bills3 WHERE name = '$name' ORDER BY transaction_ID, barname");
        $result = $conn->query($sql);
        
        echo "<p class='lead mt-5'>" . $name . " have the following transactions:</p>";
        echo "<br>";



echo "<style>
.container{
    display: inline-block;
   
     max-width: 100%;


}


table {
  border-collapse: separate;
  border-spacing: 60px 0;
}

td {
  padding: 10px 0;
}
</style>
";



         
        echo '<table class="container">'; 
echo "<tr><th>TransactionID</th><th>Bar Name</th><th>Beer Name</th><th>Food</th><th>Total Cost</th><th>Date, Time</th></tr>";
        while ($row = mysqli_fetch_array($result)){
            echo "<tr><td>"; 
           echo $row['transaction_ID'] ;
            echo "</td><td>";
            echo $row['barName'] ;
            echo "</td><td>";
            echo $row['amountorderedbeer'];
            echo "X     ";
            echo $row['beer'];
            echo "</td><td>";
            echo $row['amountorderedfood'];
            echo "X     ";
            echo $row['food'] ;
            echo "</td><td>";
            echo "$";
            echo $row['totalCost']; 
            echo "</td><td>";
            echo $row['date'] ;
            echo "   At   ";
            echo $row['time1'];
            echo "</td></tr>";

        }
        echo "</table>";    
    }
?>