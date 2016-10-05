<!--
<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Laravel 5</div>
            </div>
        </div>
    </body>
</html>
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="/css/header.css" type="text/css">
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
                        <div><a href = "/"><img src="" id="image" class="img-circle"></a></div>
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


