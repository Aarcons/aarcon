<?php
// session_start();
// $semail = $_SESSION['email'];
// require 'connection.php';
// $sql = "SELECT * FROM can_basic_info WHERE user_id = '$semail'";
// $result = $connection->query($sql);
// $row = $result->fetch_assoc();
// $dgender =  $row['gender'];

// $sql1 = "SELECT distinct(Gender) FROM select_input";
// $result1 = $connection->query($sql1);
// $row1 = $result1->fetch_assoc();
// print_r($row1);
// while ( $row1 = $result1->fetch_assoc()) {
// 	$row1['Gender'];
// }

// foreach ($row1 as $item) {
	
// 	echo $item;

// }

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<!-- <select name="DateDropDown">
		<option value='' disabled selected>Please Select Value</option>; -->
<!-- 		<?php
			foreach ($result1 as $row1) {
			$item = $row1['Gender'];
			if ($item == $dgender) {
				$s = "selected";
			}
			else
			{	
				$s="";

			}
			echo "<option value='$item' $s>$item</option>";	
			}
				
		?> -->
	<!-- </select> -->
	<form action="" method="post">
        <select name="state" class="Destination">
            <option value="GOA">1. GOA</option>
            <option value="Gujarat">2. Gujarat</option>
            <option value="Rajasthan">3. Rajasthan</option>
        </select> 
        <input type="submit" value="Submit">
        <div class='ShowSelectedValueDiv'>
               //Add This Div
               <?php echo $a;  ?>
        </div>
        
    </form>
<?php $chatid ="<div id='chatid'></div>"; 
echo $chatid; 
 ?>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
  
  $('.Destination').change(function(){
    var Destination=$('.Destination').val();
    $.ajax({url:"some.php?Destination="+Destination,cache:false,success:function(result){
        $(".ShowSelectedValueDiv").html(result);
    }});
});
</script>


</body>
</html>