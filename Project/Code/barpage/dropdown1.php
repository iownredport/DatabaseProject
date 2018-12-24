<?php
     $sql = ("SELECT distinct barName FROM 2876690_drinker
.bars
order by barName asc;
");
     $result = $conn->query($sql);
     
     while ($row = $result->fetch_assoc()){
     echo "<option value='".$row['barName']."'>" . $row['barName'] . "</option>";

    }
     
?>