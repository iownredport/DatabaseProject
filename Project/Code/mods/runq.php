<?php
require_once("connect.php");


       echo '<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
body{
     background: -webkit-linear-gradient(left, #2b017a, #2b017a);
  background: linear-gradient(to right, #1A004A, #1A004A);
   font-family:"Arial Black", Gadget, sans-serif;
    font-size:24px;
  color: #714BB9;
}
</style>';




     if(isset($_GET['keyword'])){
       $kw = $_GET['keyword'];

       echo '<table style="width:100%" name="keyword">';
       // echo $kw;
$userquery = $_GET["keyword"];




if (strpos($kw, 'alter') !== false && strpos($kw, 'table') !== false) {
    die("You shall not alter this table in any way. Stick to insert,delete,update. You are forbidden from writing evil queries");
}

$first_row = true;
if (empty($userquery)){
    echo "Don't just enter a blank query. Are you kidding me? I'll have you know I graduated top of my class in the Navy Seals, and I've been involved in numerous secret raids on Al-Quaeda, and I have over 300 confirmed kills.
<br>
I am trained in gorilla warfare and I'm the top sniper in the entire US armed forces. You are nothing to me but just another target. I will wipe you out with precision the likes of which has never been seen before on this Earth, mark my words.
<br>
You think you can get away with writing a blank query to me over the Internet? Think again. As we speak I am contacting my secret network of spies across the USA and your IP is being traced right now so you better prepare for the storm. The storm that wipes out the pathetic little thing you call your life. You're dead, kid. I can be anywhere, anytime, and I can kill you in over seven hundred ways, and that's just with my bare hands.
<br>
Not only am I extensively trained in unarmed combat, but I have access to the entire arsenal of the United States Marine Corps and I will use it to its full extent to wipe your miserable life off the face of the continent. If only you could have known what unholy retribution your little 'clever' blank query was about to bring down upon you, maybe you would have chose better.
<br>
But you couldn't, you didn't, and now you're paying the price.
<br>
Don't you DARE write a blank query again.

   
";
    die(mysql_error()); // TODO: better error handling

}
$crazyeight6 = ("set autocommit=0;");
$conn->query($crazyeight6);

$query = "$userquery";
$result = mysqli_query($conn, $query);



  if (mysqli_errno($conn) == 1062) {
    die ('Violates Key Constraint');
}



if($result === FALSE) { 
    echo "Error: " . $conn->error;
    die(mysql_error()); // TODO: better error handling
}

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
    $delete1 = ("rollback; set autocommit=1;");
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
    $delete2 = ("rollback; set autocommit=1;");
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
    $delete3 = ("rollback; set autocommit=1;");
    $conn->query($delete3);
    die ("Query not accepted due to violation of assertion 3. For every two beers, b1 and b2, different bars may charge differently for b1 and b2 but b1 should either be less expensive than b2 in ALL bars or more expensive than b2 in ALL bars.  "); 
  }
    
}




$crazyeight1 = ("select not exists 
(select * from sells where item not in (select food from items) and item not in (select beer from items)) as tickle");

  $result5 = $conn->query($crazyeight1);
  while ($row5 = $result5->fetch_assoc()) {
    if($row5['tickle'] == 0){
    $delete4 = ("rollback; set autocommit=1;");
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
    $delete6 = ("rollback; set autocommit=1;");
    $conn->query($delete6);
    die ("Error: Please make sure you the beer/food prices match between sells and bills3 table."); 
  }
    
}


$crazyeight3 = ("select not exists (select *, ROUND( ((((amountorderedbeer*beerprice)+(amountorderedfood*foodprice))*0.07)),2 )as tax1 from bills3
having tax1 != tax+0.01 xor tax != tax-0.01 xor tax1 != tax) as pipe");

  $result7 = $conn->query($crazyeight3);
  while ($row7 = $result7->fetch_assoc()) {
    if($row7['pipe'] == 0){
    $delete7 = ("rollback; set autocommit=1;");
    $conn->query($delete7);
    die ("Error: Please enter the correct 7% sales tax."); 
  }
    
}

$crazyeight4 = ("select not exists (select *, ROUND( ((((amountorderedbeer*beerprice)+(amountorderedfood*foodprice))*1.07))+tip,2 )as total from bills3
having total != totalcost+0.01 xor total != totalcost-0.01 xor total != totalcost) as jaden");

  $result8 = $conn->query($crazyeight4);
  while ($row8 = $result8->fetch_assoc()) {
    if($row8['jaden'] == 0){
    $delete8 = ("rollback; set autocommit=1;");
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
    $delete23 = ("rollback; set autocommit=1;");
    $conn->query($delete23);
    die ("You shall not enter a query that has a transaction in the bills table but not in the sells table."); 
  }
    
}




$gdax3 = ('select not exists ((select * from bars where barname = "" or state ="" or city ="" or address ="" or openhours ="" or closehours ="" or phonenumber ="")) as beepboop
union all
select not exists (select * from beers where beer = "" or manufacturers ="")as beepboop
union all
select not exists (select * from bills3 where tax ="" or day_of_week ="" or date ="" or amountorderedbeer ="" or amountorderedfood ="" or time ="")as beepboop
union all
select not exists (select * from foods where food ="") as beepboop
union all
select not exists (select * from drinker where name ="" or state ="")as beepboop
union all
select not exists (select * from generates where transaction_id ="") as beepboop
union all
select not exists (select * from yields where transaction_id ="") as beepboop
union all
select not exists (select * from produces where transaction_id ="") as beepboop
union all
select not exists (select * from sells where price ="")as beepboop


 

');



$result233 = $conn->query($gdax3);
  while ($row233 = $result233->fetch_assoc()) {
  
  
      foreach($row233 as $field) {
              if($field == 0){
    $delete233 = ("rollback; set autocommit=1;");
    $conn->query($delete233);
    die ("You shall not enter an empty value."); 
  }
    }
    
}





$crazyeight5 = ("set autocommit=1;");
$conn->query($crazyeight5);

      






       echo '<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
body{
     background: -webkit-linear-gradient(left, #2b017a, #2b017a);
  background: linear-gradient(to right, #1A004A, #1A004A);
  font-family: "Roboto", sans-serif;
}
th{

  padding: 25px;
  text-align: center;
  font-weight: 500;
  font-size: 20px;
  color: #714BB9;
   background-color: #16013E;
   

   
}
    


  

td{
  padding: 25px;
  text-align: center;
  vertical-align:middle;
  font-weight: 300;
  font-size: 15px;
  color: #714BB9;
 border: 1px solid #3C1C78;

       
}

table{
    margin: auto;
    max-width: 85%;
    padding: 10px;
     border-collapse: collapse;


}

tr:hover {opacity:0.6;}


</style>';

if ($result == '1'){
  die ("Success");
}
while($row = mysqli_fetch_assoc($result)){

    if ($first_row) {
        $first_row = false;
        // Output header row from keys.
        echo '<tr>';
        foreach($row as $key => $field) {
            echo '<th>' . htmlspecialchars($key) . '</th>';
        }
        echo '</tr>';
    }
    echo '<tr>';
    foreach($row as $key => $field) {
        echo '<td>' . htmlspecialchars($field) . '</td>';
    }
    echo '</tr>';
}
echo '</table>';
 }


?>