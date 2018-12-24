<?php
include "connect.php";
?>

<!DOCTYPE html>

<head>	


<link rel="stylesheet" href="styl.css?newversion">
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>


<ul>
<li><a  href="../index.php" target="_self">Drinker Data</a></li>
<li><a  href="../beerpage/index.php" target="_self">Beer Data</a></li>
<div class="right">
<li><a class ="active" href="" target="">Bar Data</a></li>
<li><a href="../mods/index.php" target="_self">Modifications/Sql Interface</a></li>
</ul>
</div>
</head>
<body>




    <div class="select">
    	<p class="lead mb-2">Select a bar to see data</p>
  		<select id="drinkerDropdown" class="form-control">

			<option value=""
            hidden
    		>Select A Bar
			</option>
		<?php
		include "dropdown1.php";

		?>
		</select>
		
	</div>

<div class ="wrap">
	<div class ="top">

  <div id="container"></div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='one.js?newversion'></script>
<script src='two.js?newversion'></script>
  <script src="mains.js?newversion"></script>
<div class="first">
<div id="container2"></div>
</div>
</div>

<div class="bottom">
<div id="container3"></div>


<div id="container4"></div>
</div>
<div class="last">
<div id="container5"></div>
</div>
 </div>

</body>
</html>



   