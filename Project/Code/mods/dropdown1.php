<?php
     $sql = ("show tables;");
     $result = $conn->query($sql);

     
     while ($row = $result->fetch_assoc()){
     echo "<option value='".$row['Tables_in_2876690_drinker']."'>" . $row['Tables_in_2876690_drinker'] . "</option>";

    }
     
?>