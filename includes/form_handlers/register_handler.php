	<?php 
	$fname="";
	$lname="";
	$em="";
	$em2="";
	$Password="";
	$Password2="";
	$date="";
	$error_array=[];
	$error_message="";
	// $username="";
	// $profile_pic="";

	if(isset($_POST['register_button'])){
		

		// Registering form Values

		// For the first Name
		$fname=strip_tags($_POST['reg_fname']);//Remove html tags
		$fname=str_replace(' ','',$fname);//Remove Spaces
		$fname=ucfirst(strtolower($fname));//Uppercase first Letter
		$_SESSION['reg_fname']=$fname;//stores first name into session variable

			//For the last Name
		$lname=strip_tags($_POST['reg_lname']);//Remove html tags
		$lname=str_replace(' ','',$lname);//Remove Spaces
		$lname=ucfirst(strtolower($lname));//Uppercase first Letter
		$_SESSION['reg_lname']=$lname;//stores first name into session variable

			//For the Email  
		$em=strip_tags($_POST['reg_email']);//Remove html tags
		$_SESSION['reg_email']=$em;//stores email into session variable


		//Confirm the Email
		$em2=strip_tags($_POST['reg_email2']);//Remove html tags
		$_SESSION['reg_email2']=$em2;//stores email into session variable


		//Password
		$Password=strip_tags($_POST['reg_password']);//Remove html tags


		//Password confirm
		$Password2=strip_tags($_POST['reg_password2']);//Remove html tags

		$date=date("Y-m-d"); 



	if($em==$em2){ 

		//check if emails are in valid format
	 	
	 	if(filter_var($em,FILTER_VALIDATE_EMAIL)){

	 		$em=filter_var($em,FILTER_VALIDATE_EMAIL);

	 	//check whether email already exits
	 		$e_check=mysqli_query($con,"SELECT email FROM users WHERE email='$em'");

	 		//count the number of rows returned

	 		$num_rows=mysqli_num_rows($e_check);

	 		if($num_rows>0){
	 			array_push($error_array,"Email is already in use");
	 			
	 		}



	 	}

	 	else{
	 		array_push($error_array,"invalid Email format");
	 		
	 	}


	}

	else{
		array_push($error_array,"mails don't match");

	}


	//checking for the length of the fname

	if(strlen($fname)>25 || strlen($fname)<2){


			array_push($error_array,"first name must between 2 and 25 characters");

	}

	if(strlen($lname)>25 || strlen($lname)<2){

				array_push($error_array,"last name must between 2 and 25 characters");


	}



	if($Password==$Password2){


		
	}
	else{

				array_push($error_array,"passwords do not match");
	}


	if (preg_match('/[^A-Za-z0-9]/',$Password)) {
		
					array_push($error_array,"You password can only contain english characters or numbers");

		}



	if(strlen($Password>30 || strlen($Password)<5)){

		array_push($error_array,"you password must be between 5 and 30 characters");


	}

	if(empty($error_array)){

		$Password=md5($Password);//encrypt the password before sending to the database

		$username=strtolower($fname."_". $lname); //

		$check_username_query=mysqli_query($con,"SELECT username FROM users WHERE username='$username'");
		$i=0;//If  username exists add number to username

		while (mysqli_num_rows($check_username_query)!=0) {

			$i++;
			$username=$username .$i;
			$check_username_query=mysqli_query($con,"SELECT username FROM users WHERE username='$username'");
			# code...
		}

		$rand=rand(1,2);//Random number between 1 and 2
		if($rand==1)
			$profile_pic="assets/images/profile_pics/defaults/head_deep_blue.png";
		if($rand==2)
			$profile_pic="assets/images/profile_pics/defaults/head_emerald.png";

			$query=mysqli_query($con,"INSERT INTO users VALUES('','$fname','$lname','$username','$em','$Password','$date','$profile_pic','0','0','no',',')");
			$query=mysqli_query($con,"INSERT INTO test VALUES('6')");
			array_push($error_array,"<span style='color:#14C800'>You're all set to go</span></br>");
			//clear session variables
			$_SESSION['reg_fname']="";
			$_SESSION['reg_lname']="";
			$_SESSION['reg_email']="";
			$_SESSION['reg_email2']="";


	} 
			


	}


	?>