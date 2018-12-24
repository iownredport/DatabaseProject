<?php
     $sql = ("SELECT distinct drinker.name FROM  2876690_drinker
.drinker
");
     $result = $conn->query($sql);
     
     while ($row = $result->fetch_assoc()){
     echo "<option value='".$row['name']."'>" . $row['name'] . "</option>";

    }
     
?>