<?php

	//use API to set the colour hexes
	$c1="#83b3e3";
	$c2="#00beb9";
	$c3="#9796bb";
	$c4="#a2ccc0";
	$c5="#aad2e0";

	//db connection

	$con = mysqli_connect("localhost", "root", "", "test");
		if(!$con){
			die('Could not connect: '.mysql_error());
		}

	//checking if all 5 colours are present. if not set error message	

	if (!empty($c1) && !empty($c2) && !empty($c3) && !empty($c4) && !empty($c5)){

		//use function to set the array with each colour associated palette_id

		$array1 = colourcheck($con,$c1);
		$array2 = colourcheck($con,$c2);
		$array3 = colourcheck($con,$c3);
		$array4 = colourcheck($con,$c4);
		$array5 = colourcheck($con,$c5);

		//checking if all 5 arrays are present. if not set error message

		if(!empty($array1) && !empty($array2) && !empty($array3) && !empty($array4) && !empty($array5)){

			//get intersection

			$result = array_intersect($array1, $array2, $array3, $array4, $array5);
			$a = implode($result);

			//check if there is an intersection. if not set error message

			if (!empty($a)) {

				//check with the affect induced by the palette and display it.

				$affect =  checkaffect ($con,$a);
				echo $affect;

			}
			else{
				//error message if there isnt an intersection
				echo "Cannot Predict";

			}


		}

		else{
			//error message if any of the arrays are missing palette ids
			echo "Cannot Predict";

		}
		

	}

	else{
		//error message if the 5 colours are not set.
		echo "Cannot Predict";

	}



	//function to return the array of associated palette_id s for each colour.

	function colourcheck ($con,$c){

		$sql = "SELECT palette_id FROM colour_affect_data WHERE hex='$c'";
		$result = mysqli_query($con,$sql);

		while ($row = mysqli_fetch_assoc($result)) {
			$arr[]=$row;
		}

		// foreach ($arr as $user) {
		//     echo "Id: {$user[palette_id]}<br />";
		// }

		$arr2 = array_column($arr, 'palette_id');
		return $arr2;

	}
	
	function checkaffect($con,$pid){

		$sql = "SELECT affect FROM colour_affect_data WHERE palette_id ='$pid' ";
		$result = mysqli_query($con,$sql);

		while ($row = mysqli_fetch_assoc($result)) {
			$arr[]=$row;
		}

		$arr2 = array_column($arr, 'affect');
		return $arr2[0];
	}


?>