<?php
require_once("connect.php");


    if(isset($_POST['beer'])){
        $beer = $_POST['beer'];
$query = "SELECT *, sum(amountorderedbeer), TIME_FORMAT(time, '%H:00') as time1
FROM 2876690_drinker
.bills3
where beer = '$beer'
GROUP BY HOUR(time), beer
order by sum(amountorderedbeer) desc, time1
";
$result = mysqli_query($conn, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
  $chart_data .= $row["time1"]. "," ;
}

 echo $chart_data;




$query1 = "SELECT *, sum(amountorderedbeer), TIME_FORMAT(time, '%H:00') as time1
FROM 2876690_drinker
.bills3
where beer = '$beer'
GROUP BY HOUR(time), beer
order by sum(amountorderedbeer) desc, time1 ";
$result1 = mysqli_query($conn, $query1);
$chart_data1 = '';
while($row1 = mysqli_fetch_array($result1))
{
  $chart_data1 .= $row1["sum(amountorderedbeer)"]. "," ;
}
$chart_data1 = substr($chart_data1, 0, -1);

 echo $chart_data1;

}
?>