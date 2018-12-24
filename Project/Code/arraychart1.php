<?php
require_once("connect.php");


    if(isset($_POST['name'])){
        $name = $_POST['name'];
$query = "select barname,sum(totalcost) from 2876690_drinker.bills3
where name = '$name'
group by barname
order by sum(totalcost) desc";
$result = mysqli_query($conn, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= $row["barname"]. ",";
}

 echo $chart_data;
 
 
 
 
 
 $query2 = "select sum(totalcost) from 2876690_drinker.bills3
where name = '$name'
group by barname
order by sum(totalcost) desc";
$result2 = mysqli_query($conn, $query2);
$chart_data2 = '';
while($row2 = mysqli_fetch_array($result2))
{
 $chart_data2 .= $row2["sum(totalcost)"]. ",";
}
$chart_data2 = substr($chart_data2, 0, -1);

 echo $chart_data2;

}
?>