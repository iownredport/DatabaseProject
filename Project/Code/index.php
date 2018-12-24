<?php
include "connect.php";
include "arraychart1.php";
include "arraychart2.php";
?>

<!DOCTYPE html>

<head>	

<ul>
<li><a class ="active" href="" target="">Drinker Data</a></li>
<li><a href="beerpage/index.php" target="_self">Beer Data</a></li>
<div class="right">
<li><a href="barpage/index.php" target="_self">Bar Data</a></li>
<li><a href="mods/index.php" target="_self">Modifications/Sql Interface</a></li>
</ul>
</div>


<link rel="stylesheet" href="styl.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

</head>

<body>



  

    <div class="select">
    	<p class="lead mb-2">Select a drinker to see data</p>
  		<select id="drinkerDropdown" class="form-control">

			<option value="" hidden>
            Select A Drinker
    		<?php include "dropdown1.php";?>
			</option>

		</select>
		<div id="drinkerResults"></div>
	</div>

<br>
<br>
<br>
<div class="contain">
  <div id="container"></div>
  <div id="container2"></div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='one.js?newversion'></script>
<script src='two.js?newversion'></script>
  <script src="main.js?newversion"></script>





 

</body>
</html>



   