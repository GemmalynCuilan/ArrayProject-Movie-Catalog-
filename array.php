<?php 
$dir = 'movies1';
$files = scandir($dir);

//pre_r($files);

function pre_r($array){
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}

$files = array_diff($files, array('..','.'));

//pre_r($files);

$files = array_values($files);

//pre_r($files);

$movies1 = array();

for($i = 0; $i < count($files); $i++){
	 preg_match("!(.*?)\((.*?)\)!", $files[$i],$results);
	 $movie_name = str_replace('_', ' ',$results[1]);
	 $movie_name = ucwords($movie_name);

	 $movies1[$movie_name]['image'] = $files[$i];
	 $movies1[$movie_name]['year'] = $results[2];
}

echo "<table id = 'movies1' cellpadding =50>";
echo "<tr class = 'odd'>";

foreach ($movies1 as $movie_name => $info){
	$content = "<td><span class = 'name'>$movie_name</span><br />"
	. "<img src = 'movies1/$info[image]'><br />"
	. "<span class = 'year'>( $info[year] )</span></td>";
	echo $content;
}

echo "</tr></table>";
?>

<style>
	#movies1 {
		background-color: #000;
		color: #fff;
		font: 11pt Calibri;
	}
	tr.header {
		background-color: #111f4e;
		color: #fff;
		font:  bold 11pt Calibri;
	}
	tr.odd {
		background-color: #18182b;
	}
	tr.even{
		background-color:  #141423;
	}
	img {
		padding:  10px;
	}
	td{
		text-allign: center;
	}
	span.year{
		color:  #ccc;
	}
	span.name{
		font-size: 18px;
	}
	body{
		margin: 0;
		padding: 0
	}
</style>
