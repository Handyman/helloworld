<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="bootstrap/docs/favicon.ico">

    <title>Register</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="registration.css" rel="stylesheet" type="text/css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="container">

      <form class="form-register" method="post">
        <h2 class="form-register-heading">Register</h2>
		<?php
		if (!empty($Errors)) {
			?><p>Please resolve the following errors:</p> <?php
			foreach ($Errors as $field => $error) {
				echo "<h5>{$User->lang[$field]}: $error</h5>";
			}
		}
		?>

		<div class="form-group <?= (!empty($Errors['firstName'])) ? 'has-error' : '';?>">
			<label for="inputFirstName" class="sr-only">First name</label>
			<input type="text" id="inputFirstName" name="firstName" class="form-control" value="<?= (!empty($_POST['firstName'])) ? $_POST['firstName'] : ''?>" title="Allowed format: letters, ', ., -" placeholder="First name" pattern="[\w\s\'\-\.]+" required autofocus>
		</div>

		<div class="form-group <?= (!empty($Errors['lastName'])) ? 'has-error' : '';?>">
			<label for="inputLastName" class="sr-only">Last name</label>
			<input type="text" id="inputLastName" name="lastName" class="form-control" value="<?= (!empty($_POST['lastName'])) ? $_POST['lastName'] : ''?>" title="Allowed format: letters, ', ., -" placeholder="Last name" pattern="[\w\s\'\-\.]+" required>
		</div>

		<div class="form-group <?= (!empty($Errors['address1'])) ? 'has-error' : '';?>">
			<label for="inputAddress1" class="sr-only">Address 1</label>
			<input type="text" id="inputAddress1" name="address1" class="form-control" value="<?= (!empty($_POST['address1'])) ? $_POST['address1'] : ''?>" title="Allowed format: alphanumeric, ', ., -" placeholder="Address 1" pattern="[\w\d\s\'\-\.]+" required>
		</div>

		<div class="form-group <?= (!empty($Errors['address2'])) ? 'has-error' : '';?>">
			<label for="inputAddress2" class="sr-only">Address 2</label>
			<input type="text" id="inputAddress2" name="address2" class="form-control" value="<?= (!empty($_POST['address2'])) ? $_POST['address2'] : ''?>" title="Allowed format: alphanumeric, #, ." placeholder="Address 2" pattern="[\w\d\s\#\.]*">
		</div>

		<div class="row">
			<div class="form-group col-sm-7 city <?= (!empty($Errors['city'])) ? 'has-error' : '';?>">
				<label for="inputCity" class="sr-only">City</label>
				<input type="text" id="inputCity" name="city" class="form-control" value="<?= (!empty($_POST['city'])) ? $_POST['city'] : ''?>" title="Allowed format: alphanumeric, -, ', ." placeholder="City" pattern="[\w\s\-\'\.]+" required>
			</div>

			<div class="form-group col-sm-2 state <?= (!empty($Errors['state'])) ? 'has-error' : '';?>">
				<label for="inputState" class="sr-only">State</label>
				<input type="text" id="inputState" name="state" class="form-control" value="<?= (!empty($_POST['state'])) ? $_POST['state'] : ''?>" title="2 character state code" placeholder="State" pattern="[\w]{2}" required>
			</div>

			<div class="form-group col-sm-3 zip <?= (!empty($Errors['zip'])) ? 'has-error' : '';?>">
				<label for="inputZip" class="sr-only">Zip</label>
				<input type="text" id="inputZip" name="zip" class="form-control" value="<?= (!empty($_POST['zip'])) ? $_POST['zip'] : ''?>" title="5 or 9 digit postal code" placeholder="Zip" pattern="([\d]{5})(\-)?([\d]{4})?" title="5 or 9 digit zip code" required>
			</div>
		</div>

		<div class="form-group <?= (!empty($Errors['country'])) ? 'has-error' : '';?>">
			<label for="inputCountry" class="sr-only">Country</label>
			<input type="text" id="inputCountry" name="country" class="form-control" value="<?= (!empty($_POST['country'])) ? $_POST['country'] : ''?>" title="2 character country code" placeholder="Country" pattern="[\w]{2}" required>
		</div>
		<input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Do it!">
      </form>

    </div> <!-- /container -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
