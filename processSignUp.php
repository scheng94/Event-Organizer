<?php
	if(isset($_POST["submit"])){
		require("support.php");
		require("database.php");
		
		$db = new database("users");
		$database = $db->connectToDB();
    
		$firstName = trim($_POST["firstName"]);
		$lastName = trim($_POST["lastName"]);
		$email = trim($_POST["email"]);
		$phone = $_POST["phoneFirstPart"]."-".$_POST["phoneSecondPart"]."-".$_POST["phoneThirdPart"];
		$age = $_POST["age"];
	
		if($_POST["accType"] == "Manager"){
			$accType = 'M';
		} else{
			$accType = 'P';
		}
    
		$sqlQuery = sprintf("insert into {$db->getTable()} (firstName, lastName, email, phone, age, accountType) values ('%s', '%s', '%s', '%s', %s, '%s')",
                        $firstName, $lastName, $email, $phone, $age, $accType);
		$result = mysqli_query($database, $sqlQuery);
		
		if($result){
			$body = "<h1>The following entry has been added to the database.</h1><br>";
			$body .= "<strong>First Name: </strong>$firstName<br>";
			$body .= "<strong>First Name: </strong>$lastName<br>";
			$body .= "<strong>Email: </strong>$email<br>";
			$body .= "<strong>Phone Number: </strong>$phone<br>";
			$body .= "<strong>Age: </strong>$age<br>";
			if($_POST["accType"] == "Manager"){
				$body .= "<strong>Account Type: </strong>Manager<br><br>";
			} else{
				$body .= "<strong>Account Type: </strong>Participant<br><br>";
			}
		} else{
			$body = "<h1>Inserting applicant failed.</h1>";
		}
    
		mysqli_close($database);
    
		$button = <<< EOBODY
		<form action="main.php" method="post">
		    <input type="submit" name="submit" value="Return to main menu"/>
		</form>
EOBODY;

		$page = generatePage($body.$button, "Submit Applicant");
		echo $page;
	} elseif(isset($_POST["return"])){
		header("Location: main.php");
	}
?>