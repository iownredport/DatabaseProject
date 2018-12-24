<?php
require_once("connect.php");


    if(isset($_POST['name'])){
        $name = $_POST['name'];
$query = "SELECT *, TIME_FORMAT(time, '%H:%i') as time1 FROM 2876690_drinker.bills3 WHERE name = '$name' 
group by beer ORDER BY barName, transaction_ID";
$result = mysqli_query($conn, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "|Beer: ". $row["beer"]. "|               "."|Bar: " .$row["barName"]. "|           ". "|Timestamp: ". $row["date"]. " at ". $row["time1"]. "|              ". ",";
}
$chart_data = substr($chart_data, 0, -1);


 echo $chart_data;


}
?>