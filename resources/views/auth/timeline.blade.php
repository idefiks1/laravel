@include('layouts.header')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10">
            <button id="submit">View</button>
            


            <table id="example" class="table table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Extn.</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Extn.</th>
            </tr>
        </tfoot>
            </table>


           
            
        </div>
        <div class="col-md-2">
           <h4><a href="graphic">Graphic</a></h4>
            <h4><a href="/auth/login">Login</a></h4>
            <h4><a href="/auth/register">Registration</a></h4>
        </div>
    </div>    
</div>
<script type="text/javascript" src="/js/data.js"></script>
@include('layouts.footer')





