<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "root";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $sql = "INSERT INTO `shopping_system`.`user` (`name`, `age`, `gender`, `email`, `phone`, `address`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$address', current_timestamp());";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content=
		"width=device-width, initial-scale=1.0">
	<title>
		Sign in
	</title>

	<style>

		/* Styling the Body element i.e. Color,
		Font, Alignment */
		body {
			background-color: white;
			font-family: Verdana;
			text-align: center;
		}

		/* Styling the Form (Color, Padding, Shadow) */
		form {
			background-color: white;
			max-width: 500px;
			margin: 50px auto;
			padding: 30px 20px;
			box-shadow: 2px 5px 10px rgba(0, 0, 0, 0.5);
		}

		/* Styling form-control Class */
		.form-control {
			text-align: left;
			margin-bottom: 25px;
		}

		/* Styling form-control Label */
		.form-control label {
			display: block;
			margin-bottom: 10px;
		}

		/* Styling form-control input,
		select, textarea */
		.form-control input,
		.form-control select,
		.form-control textarea {
			border: 1px solid #777;
			border-radius: 2px;
			font-family: inherit;
			padding: 10px;
			display: block;
			width: 95%;
		}

		/* Styling form-control Radio
		button and Checkbox */
		.form-control input[type="radio"],
		.form-control input[type="checkbox"] {
			display: inline-block;
			width: auto;
		}

		/* Styling Button */
		button {
			background-color: lightskyblue;
			border: 1px solid #777;
			border-radius: 2px;
			font-family: inherit;
			font-size: 21px;
			display: block;
			width: 100%;
			margin-top: 50px;
			margin-bottom: 20px;
		}

	</style>
</head>

<body>
<h1>Enter Details</h1>
<?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form.</p>";
        }
    ?>

	<form id="form">

		<div class="form-control">
			<label for="name" id="label-name">
				Name
			</label>

			<input type="text" name="name"
				id="name"
				placeholder="Enter your name" />
		</div>

		<div class="form-control">
			<label for="email" id="label-email">
				Email
			</label>

			<input type="email" name="email"
				id="email"
				placeholder="Enter your email" />
		</div>

		<div class="form-control">
			<label for="age" id="label-age">
				Age
			</label>

			<input type="text" name="age"
				id="age"
				placeholder="Enter your age" />
		</div>
		<div class="form-control">
			<label for="tel" id="label-tel">
				Phone_Number
			</label>

			<input type="phone" name="phone"
				id="tel"
				placeholder="Enter your Phone number" />
		</div>
		<div class="form-control">
			<label for="address" id="label-name">
				Address
			</label>

			<input type="text" name="address"
				id="address"
				placeholder="Enter your address" />
		</div>

		<button type="submit" value="submit">
			Sign in
</button>

</form>
<h2>Account Deactivation</h2>
<form id="form">
	<div class="form-control">
		
	<input type="checkbox" id="deactivate" name="deactivate" value="account">
	<label for="Deactivate">Yes,I want to deactivate my account</label><br>
		</div>
		<button type="deactivate" value="submit">
			Deactivate account
</button>


	</form>

</body>

</html>
