<?php 
session_start();
require_once("connect.php");







$variable = $_POST['berp'];
$lemon;
$myPhpVar= '<script>stwing</script>';
$_SESSIO['a'] = $_SESSION['a'] = substr($_SESSION['a'], 1);
$c = $_SESSION['a'];
$d = $_SESSION['legs'];
$myPhpVar= '<script>stwing</script>';
 $sql1 = ("insert into $d ($c) values ($variable)");
 

if ($conn->query($sql1) === TRUE) {
	$pattern1 = ("select not exists (SELECT bars.openHours, bars.closeHours, bills3.time from bars, bills3
where bills3.barName = bars.barName and (time_to_sec(bars.closeHours)) < (time_to_sec(bars.openHours)) and (((time_to_sec(bars.closeHours) > time_to_sec(bills3.time)) and (time_to_sec(bars.openHours) < time_to_sec(bills3.time))) or ((time_to_sec(bars.closeHours) < time_to_sec(bills3.time)) and (time_to_sec(bars.openHours) > time_to_sec(bills3.time))))
union all
SELECT bars.openHours, bars.closeHours, bills3.time from bars, bills3
where bills3.barName = bars.barName and (time_to_sec(bars.closeHours)) >= (time_to_sec(bars.openHours)) and ((time_to_sec(bars.closeHours) < time_to_sec(bills3.time)) or (time_to_sec(bars.openHours) > time_to_sec(bills3.time))))
 as ver
");
	$result1 = $conn->query($pattern1);
	while ($row1 = $result1->fetch_assoc()) {
			if($row1['ver'] == 0){
		$delete1 = ("delete from $d where ($c)=($variable)");
		$conn->query($delete1);
		die ("Query not accepted due to violation of assertion 1. Transactions/bills  cannot be issued  at times when the given bar is closed."); 
	}
    
}


$pattern2 = ("select not exists (select drinker.name, drinker.state, frequents.name, frequents.barName, bars.barName, bars.state,
  case when (drinker.state = (bars.state)) 
    then 'TRUE'
    else 'FALSE'
  end as peep
from drinker, bars, frequents
where frequents.barName = bars.barName and frequents.name = drinker.name
having peep = 'false') as per
");



$result2 = $conn->query($pattern2);
	while ($row2 = $result2->fetch_assoc()) {
			if($row2['per'] == 0){
		$delete2 = ("delete from $d where ($c)=($variable)");
		$conn->query($delete2);
		die ("Query not accepted due to violation of assertion 2. Drinkers cannot frequent bars in different state"); 
	}
		
}



$pattern3 = ("select not exists (select count(*),d,j from(
select a.item as d, b.item as j
from sells a, sells b, beers
where a.item != b.item and a.barname = b.barname and (a.price > b.price) and beers.beer = a.item 
group by a.item, b.item
union all
select  a.item as d, b.item as j
from sells a, sells b, beers
where a.item != b.item and a.barname = b.barname and (a.price < b.price) and beers.beer = b.item  
group by a.item, b.item) 
as p
group by d,j
having count(*) >1)as jep");

$result3 = $conn->query($pattern3);
	while ($row3 = $result3->fetch_assoc()) {
			if($row3['jep'] == 0){
		$delete3 = ("delete from $d where ($c)=($variable)");
		$conn->query($delete3);
		die ("Query not accepted due to violation of assertion 3. For every two beers, b1 and b2, different bars may charge differently for b1 and b2 but b1 should either be less expensive than b2 in ALL bars or more expensive than b2 in ALL bars.  "); 
	}
    
}




$crazyeight1 = ("select not exists 
(select * from sells where item not in (select food from items) and item not in (select beer from items)) as tickle");

	$result5 = $conn->query($crazyeight1);
	while ($row5 = $result5->fetch_assoc()) {
		if($row5['tickle'] == 0){
		$delete4 = ("delete from $d where ($c)=($variable)");
		$conn->query($delete4);
		die ("Error: Cannot add or update a child row: a foreign key constraint fails. Please insert an item into the sells table that is already contained in the items table."); 
	}
    
}


$crazyeight2 = ("select not exists (select * from bills3, sells
where sells.price != bills3.beerprice and sells.barname = bills3.barname and sells.item = bills3.beer
union all
select * from bills3, sells
where sells.price != bills3.foodprice and sells.barname = bills3.barname and sells.item = bills3.food) as lemon");

	$result6 = $conn->query($crazyeight2);
	while ($row6 = $result6->fetch_assoc()) {
		if($row6['lemon'] == 0){
		$delete6 = ("delete from $d where ($c)=($variable)");
		$conn->query($delete6);
		die ("Error: Please make sure you are inputting the correct food/beer price."); 
	}
    
}


$crazyeight3 = ("select not exists (select *, ROUND( ((((amountorderedbeer*beerprice)+(amountorderedfood*foodprice))*0.07)),2 )as tax1 from bills3
having tax1 != tax+0.01 xor tax != tax-0.01 xor tax1 != tax) as pipe");

	$result7 = $conn->query($crazyeight3);
	while ($row7 = $result7->fetch_assoc()) {
		if($row7['pipe'] == 0){
		$delete7 = ("delete from $d where ($c)=($variable)");
		$conn->query($delete7);
		die ("Error: Please enter the correct 7% sales tax."); 
	}
    
}

$crazyeight4 = ("select not exists (select *, ROUND( ((((amountorderedbeer*beerprice)+(amountorderedfood*foodprice))*1.07))+tip,2 )as total from bills3
having total != totalcost+0.01 xor total != totalcost-0.01 xor total != totalcost) as jaden");

	$result8 = $conn->query($crazyeight4);
	while ($row8 = $result8->fetch_assoc()) {
		if($row8['jaden'] == 0){
		$delete8 = ("delete from $d where ($c)=($variable)");
		$conn->query($delete8);
		die ("Error: Please enter the correct total cost"); 
	}
    
}


$gdax = ("select not exists (select * from bills3
where beer not in (select beer from sells, bills3 where sells.barname = bills3.barname and sells.item =bills3.beer)
union all
select * from bills3
where food not in (select food from sells, bills3 where sells.barname = bills3.barname and sells.item =bills3.food)) as thot

");



$result23 = $conn->query($gdax);
	while ($row23 = $result23->fetch_assoc()) {
			if($row23['thot'] == 0){
		$delete23 = ("delete from $d where ($c)=($variable)");
		$conn->query($delete23);
		die ("You shall not enter a query that has a transaction in the bills table but not in the sells table."); 
	}
		
}



    echo "New record created successfully";
} else {

	if (mysqli_errno($conn) == 1062) {
    die ('Violates Key Constraint');
}
    echo "Error: " . $error =$conn->error;
    }
 ?>