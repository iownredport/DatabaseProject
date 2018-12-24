<?php
require_once("connect.php");


    if(isset($_POST['beer'])){
        $beer = $_POST['beer'];
$query = "SELECT *, sum(amountorderedbeer) FROM 2876690_drinker
.bills3
WHERE beer = '$beer' 
group by beer, name
order by sum(amountorderedbeer) desc, name asc ";
$result = mysqli_query($conn, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
  $chart_data .= $row["sum(amountorderedbeer)"]. "," ;
}

 echo $chart_data;




$query1 = "SELECT *, sum(amountorderedbeer) FROM 2876690_drinker
.bills3
WHERE beer = '$beer' 
group by beer, name
order by sum(amountorderedbeer) desc, name asc";
$result1 = mysqli_query($conn, $query1);
$chart_data1 = '';
while($row1 = mysqli_fetch_array($result1))
{
  $chart_data1 .= $row1["name"]. "," ;
}
$chart_data1 = substr($chart_data1, 0, -1);

 echo $chart_data1;

}
?>