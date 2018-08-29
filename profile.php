<?php
include("includes/header.php");


if(isset($_GET['profile_username'])){

	$username=$_GET['profile_username'];
	$user_details_query=mysqli_query($con,"SELECT * FROM users WHERE username='$username'");
	$user_array=mysqli_fetch_array($user_details_query);
	$num_friends=(substr_count($user_array['friend_array'],","))-1;
}

 if(isset($_POST['remove_friend'])){

 	$user=new User($con,$userLoggedIn);
 	$user->removeFriend($username);

 }

 if(isset($_POST['add_friend'])){

 	$user=new User($con,$userLoggedIn);
 	$user->sendRequest($username);

 }

  if(isset($_POST['respond_request'])){

 	header("Location:requests.php");
 }



?>
<body>
	<style type="text/css">

	.wrapper{

		margin: 0px;
		padding: 0px;
	}

	</style>

	<div class="profile_left">
		<img src="<?php echo $user_array['profile_pic'];?>">
		<div class="profile_info">
			<p><?php echo "Posts".$user_array['num_posts'];?></p><br>
			<p><?php echo "Likes".$user_array['num_likes'];?></p><br>
			<p><?php echo "Friends". $num_friends;?></p>
		</div>

		<form action="<?php echo $username;?>" method="POST">
			<?php

			 $profile_user_obj=new User($con,$username);


			if($profile_user_obj->isClosed()){

				header("Location:user_closed.php");
			}

			$logged_in_user_obj=new User($con,$userLoggedIn);
			if($userLoggedIn!=$username){

				if($logged_in_user_obj->isFriend($username)){

					echo'<input type="submit" name="remove_friend" class="danger" value="Remove Friend"><br>';
				}

				else if($logged_in_user_obj->didReceiveRequest($username)){

					echo '<input type="submit" name="respond_request" class="warning" value="Respond to Request"> <br>';
				}

				else if($logged_in_user_obj->didSendRequest($username)){

					echo '<input type="submit" name="" class="default" value="Request Sent"> <br>';
				}

				else{

					echo '<input type="submit" name="add_friend" class="success" value="Add Friend"> <br>';
			}
		
			}  
  			?>
  			</form>

  			<input type="submit" class="deep_blue" data-toggle="modal" data-target="#post_form" value="Post Something" >
	
	</div>


	<div class="main_column">

		 <?php echo $username;?>

	  

	</div> 

	<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="post_form" tabindex="-1" role="dialog" aria-labelledby="PostModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">


      <div class="modal-header">
        <h5 class="modal-title" id="PostModalLabel">Post Something</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <div class="modal-body">
        <p>This will apear on the user profile page and newsfeed</p>

        <form class="profile_post" action="" method="POST">
        	<div class="form-group">
        		<textarea class="form-control" name="post_body"></textarea>
        		<iput type="hidden" name="user_from" value="<?php echo $userLoggedIn;?>">
        		<iput type="hidden" name="user_from" value="<?php echo $username;?>">

        	</div>
        </form>
      </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="submit_profile_post">Post</button>
      </div>
    </div>
  </div>
</div>






</div>

</body>
