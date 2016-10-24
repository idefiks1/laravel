<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="/css/header.css" type="text/css">
	<link rel="stylesheet" href="/css/graph.css" type="text/css">
	<link rel="stylesheet" href="/css/jquery-ui-1.9.2.custom.css" type="text/css">
	<link rel="stylesheet" href="/css/jquery-ui-1.9.2.custom.min.css" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
 	<link rel="stylesheet" type="text/css" href="/css/jquery.dataTables.css">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 	<script type="text/javascript" src="/js/graph.js"></script>
 	<script src='/js/pickDate.js'></script>
 	<script type="text/javascript" src="/js/jquery-ui-1.9.2.custom.js"></script>
 	<script type="text/javascript" src="/js/jquery-ui-1.9.2.custom.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="//code.jquery.com/jquery-1.12.3.js"></script>
	<script type="text/javascript" charset="utf8" src="/js/jquery.dataTables.js"></script>
	<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
</head>
<body>
<div class="container-fluid"" >
	<div class="row">
		<header class="navbar navbar-static-top bs-docs-nav" id="top">
			<div class="col-xs-6 col-md-4">
			</div>
			<div class="col-xs-6 col-md-4">
			<a href="/"><h3><font>Comments</font></h3></a>
			</div>
			<div class="col-xs-6 col-md-4">
				<div>
					<h6>{{{ isset(Auth::user()->name) ? Auth::user()->name : 'You are not logged in!'}}}</h6>
					<div><a href = "/"><img src="" id="image" class="img-circle"></a></div>
					<a href="/auth/logout"><h6><font>Logout</font></h6></a>
				</div>
			</div>
		</header>
	</div>
</div>
