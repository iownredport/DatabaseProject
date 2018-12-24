<?php
require_once("connect.php");


    if(isset($_POST['barName'])){
        $barName = $_POST['barName'];
$query = "SELECT *, count(*), TIME_FORMAT(time, '%H:00') as time1
FROM 2876690_drinker
.bills3
where barName = '$barName'
GROUP BY HOUR(time)
order by count(*) desc;
";
$result = mysqli_query($conn, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
  $chart_data .= $row["count(*)"]. "," ;
}

 echo $chart_data;




$query1 = "SELECT *, count(*), TIME_FORMAT(time, '%H:00') as time1
FROM 2876690_drinker
.bills3
where barName = '$barName'
GROUP BY HOUR(time)
order by count(*) desc;";
$result1 = mysqli_query($conn, $query1);
$chart_data1 = '';
while($row1 = mysqli_fetch_array($result1))
{
  $chart_data1 .= $row1["time1"]. "," ;
}
$chart_data1 = substr($chart_data1, 0, -1);

 echo $chart_data1;

}
?>