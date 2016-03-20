<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport"
	content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>eDukaan :: Admin Console</title>
<!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<?php include_once('jquery.php');?>
<?php include_once('bootstrap.php');?>
<?php include_once('stylesheets.php');?>
<script type="text/javascript" src="functions.js"></script>
</head>

<body>
	<div class="container container-table">
		<div class="row vertical-center-row">
			<div class="text-center col-md-4 col-md-offset-4">
			<?php if (isset($_REQUEST["err"])){?>
				<div class="alert alert-danger">Login Failed. Please use correct
					username/password.</div>
					<?php }?>
			<?php if (isset($_REQUEST["sess"])){?>
				<div class="alert alert-danger">You need to log in first.</div>
					<?php }?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title" style="font-family: 'Bevan', cursive">
							<span style="color: #ff0000">e</span>Dukaan
						</h3>
					</div>
					<div class="panel-body">
						<form id="form0" method="post" action="auth.php">
							<div class="form-group">
								<label for="email">Email address</label> <input type="email"
									name="emailAddress" class="form-control" id="email"
									placeholder="Email">
							</div>
							<div class="form-group">
								<label for="password">Password</label> <input type="password"
									name="password" class="form-control" id="password"
									placeholder="Password">
							</div>
							<button type="submit" class="btn btn-danger" id="loginBtn">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
