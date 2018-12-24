<?php
    require_once("connect.php");

    if(isset($_POST['barName'])){
        $name = $_POST['barName'];
        $sql = ("SELECT * FROM 2876690_drinker
.bills3 WHERE name = '$name' ORDER BY barName, transaction_ID");
        $result = $conn->query($sql);
        
        echo "<p class='lead mt-5'>" . $name . " have the following transactions:</p>";
        while ($row = $result->fetch_assoc()){
            echo 
            $row['transaction_ID'] 
            ." | " 
            .$row['barName'] 
            ." | " 
            .$row['beer'] 
            ." | $" 
            .$row['totalCost'] 
            ." | " 
            .$row['time'] 
            ." | " 
            .$row['date']
            ."<br>";

        }
    }
?>