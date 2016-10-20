<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="/css/header.css" type="text/css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> 
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
                        <div>
                            <a href = "/"><img src="" id="image" class="img-circle"></a>
                        </div>
                        <a href="/auth/logout"><h6><font>Logout</font></h6></a>
                </div>
            </div>
        </header>
    </div>
</div>
<div class="container-fluid"">
            <div class="row">
                <div class="col-md-3 col-md-offset-3">        
                </div>
                <div class="col-md-3 col-md-offset-3">
                </div>
                <div class="col-md-3 col-md-offset-3">
                </div>
                <div class="col-md-3 col-md-offset-3">
                    <h4><a href="timeline">Timeline</a></h4>
                    <h4><a href="graphic">Graphic</a></h4>
                    <h4><a href="/auth/login">Login</a></h4>
                    <h4><a href="/auth/register">Registration</a></h4>
                </div>
            </div>
        </div>
<div class="container-fluid">   
    <div class="row">
        <footer>
            <h4><p id="foot">Denis Kostaev</p></h4>
        </footer>
    </div>
</div>
</body>
</html>


