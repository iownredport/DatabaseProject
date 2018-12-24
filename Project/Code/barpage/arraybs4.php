<?php
require_once("connect.php");


    if(isset($_POST['barName'])){
        $barName = $_POST['barName'];
$query = "SELECT *, count(*) FROM 2876690_drinker
.bills3 WHERE barName = '$barName'
group by day_of_week
ORDER BY count(*) desc, day_of_week;
";
$result = mysqli_query($conn, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
  $chart_data .= $row["count(*)"]. "," ;
}

 echo $chart_data;




$query1 = "SELECT *, count(*) FROM 2876690_drinker
.bills3 WHERE barName = '$barName'
group by day_of_week
ORDER BY count(*) desc, day_of_week; ";
$result1 = mysqli_query($conn, $query1);
$chart_data1 = '';
while($row1 = mysqli_fetch_array($result1))
{
  $chart_data1 .= $row1["day_of_week"]. "," ;
}
$chart_data1 = substr($chart_data1, 0, -1);

 echo $chart_data1;

}
?>