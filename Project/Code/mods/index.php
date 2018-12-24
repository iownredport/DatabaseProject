<?php
include "connect.php";
?>

<!DOCTYPE html>

<head>	
	<link rel="stylesheet" href="styl.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<ul>
<li><a  href="../index.php" target="_self"">Drinker Data</a></li>
<li><a href="../beerpage/index.php" target="_self">Beer Data</a></li>
<div class="right">
<li><a href="../barpage/index.php" target="_self">Bar Data</a></li>
<li><a class ="active" href="" target="">Modifications/Sql Interface</a></li>
</ul>
</div>



</head>

<body>









<div class="collect">
<div class="collect1">
    <div class="select">
 		

    	<p class="lead mb-2">Choose A Table You'd Like To Insert Into</p>
  		<select id="drinkerDropdown" class="form-control">

			<option value=""
            hidden
    		>Select A Table
			</option>
		<?php
		include "dropdown1.php";
		?>
		</select>
		<div id="drinkerResults"></div>
                <div id="outputDiv"></div>
                
	</div>
        </div>

<div class="collect2">
    <div class="select">
 		

    	<p class="lead mb-2">Choose A Table You'd Like To Delete From</p>
  		<select id="drinkerDropdown1" class="form-control">

			<option value="ye"
            hidden
    		>Select A Table
			</option>
		<?php
		include "dropdown2.php";
		?>
		</select>
		<div id="drinkerResults1"></div>
                
	</div>
<div id="outputDivv"></div>
</div>
</div>





<div id="container">


</div>

<form action="runq.php" method="get" target = "_blank">
  <p>Enter a query:</p>
  <p class="easy"> For ease of use, it is reccomended to insert/delete using the insert/delete forms above.<br> However you may perform all operations here as well. You must use this to run update queries </p>
  <div class="meep">
  <textarea rows="7" cols="50" name="keyword" value=""></textarea><br>

  <input class ="se" type="submit" value="Submit" ID="submitID">
</div>
<?php include "runq.php"; ?>



</form>




</body>



<script src="main.js?newversion"></script>
<script src="main2.js?newversion"></script>
</html>



   