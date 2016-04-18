<?php include 'user.php'; ?>
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

    <title>User Registration Report</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/docs/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="registration.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap/docs/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
	<div class="container-fluid">
	  <div class="row">
		<div class="col-sm-10 col-sm-offset-1 main">
		  <h2 class="sub-header">Registered Users</h2>
		  <div class="table-responsive">
			<table class="table table-striped" id="users">
			  <thead>
				<tr>
				  <th>First Name</th>
				  <th>Last Name</th>
				  <th>Address 1</th>
				  <th>Address 2</th>
				  <th>City</th>
				  <th>State</th>
				  <th>Zip</th>
				  <th>Country</th>
				  <th>Date</th>
				</tr>
			  </thead>
			  <tbody>
			  	<?php $User = new User;
				$Users = $User->getUsers();

				if (!empty($Users)) {
					foreach ($Users as $Row) { ?>
						<tr>
							<td><?= $Row->firstName?></td>
							<td><?= $Row->lastName?></td>
							<td><?= $Row->address1?></td>
							<td><?= $Row->address2?></td>
							<td><?= $Row->city?></td>
							<td><?= $Row->state?></td>
							<td><?= $Row->zip?></td>
							<td><?= $Row->country?></td>
							<td><?= $Row->time?></td>
						</tr>
				<?php }
				} else { ?>
					<tr>
						<td colspan="9">No users registered</td>
					</tr>
				<?php } ?>
			  </tbody>
			</table>
		  </div>
		</div>
	  </div>
	</div>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="bootstrap/docs/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="bootstrap/docs/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="bootstrap/docs/assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
	<script src="jquery.jeditable.min.js"></script>
</body>
</html>
