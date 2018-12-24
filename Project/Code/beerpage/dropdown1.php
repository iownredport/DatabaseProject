<?php
     $sql = ("SELECT distinct beer FROM 2876690_drinker
.beers
order by beer asc;
");
     $result = $conn->query($sql);
     
     while ($row = $result->fetch_assoc()){
     echo "<option value='".$row['beer']."'>" . $row['beer'] . "</option>";

    }
     
?>