<?php

include("includes/header.php");//Header

?>

<div class="main_column column" id="main_column">

	<h4> Friend Requests</h4>

	<?php

	$query=mysqli_query($con,"SELECT * FROM friend_requests WHERE user_to='$userLoggedIN'");
	if(mysqli_num_rows($query)==0)
		echo"You have no friend requests at this time";
	else{
		while($row=mysqli_fetch_array($query)){

			$user_from=$row['user_from'];
			$user_from_obj=new User($con,$user_from);
		}
	}
	?>

</div>