@include('layouts.header')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
        <h3 style="text-align: center;">Timeline's status</h3>  
    </div>
  </div>
  <hr>
  <div class="row">



    <div class="col-md-12">
    <form method="post" id = "add">
      <input type="text" id="datepicker" />
      <button type="submit" class="btn btn-primary" id="submit" >Apply</button>
      </form>
    </div>
<script type="text/javascript">
        $(function(){
            $("#datepicker").datepicker();
       });
    </script>
    
    <div class="col-md-12">
        <div class="box">
          <canvas id="myChart"></canvas>
        </div>
        <div id="js-legend" class="chart-legend"></div>
    </div>
    <div class="col-md-6">
        
    </div>
    <div class="col-md-6">
        
    </div>
  </div>
</div>
@include('layouts.footer')

