@include('layouts.header')


<div class="container-fluid">
    <div class="row">
        <div class="col-md-10">
            <h3 style="text-align: center;">Timeline's status</h3>  
        
            <form method="post" id = "add">
                <input type="text" id="datepicker" value="10/19/2016" />
                <button id="btn">View</button>
            </form>
           
            <script type="text/javascript">
                $(function(){
                    $("#datepicker").datepicker();
                });
            </script>  
            
            <div class="box">
                <canvas id="myChart"></canvas>
            </div>   
            <div id="js-legend" class="chart-legend">
            </div>
        </div>
        <div class="col-md-2">
            <h4><a href="timeline">Timeline data</a></h4>
            <h4><a href="graphic">Graphic</a></h4>
            <h4><a href="/auth/login">Login</a></h4>
            <h4><a href="/auth/register">Registration</a></h4>
        </div>
    </div>    
</div>

@include('layouts.footer')

