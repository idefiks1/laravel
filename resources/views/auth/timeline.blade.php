@include('layouts.header')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10">
            <button id="submit">View</button>
            <button id="clear">Clear</button></p>


            <table id="example" class="table table-striped">
            <thead>
                <tr>
                        <th>
                            <select class="form-control" id="name" style="width: 200px">
                                @foreach ($categories as $category)
                                    <option value="{{$category->idUser}}">{{$category->user}}</option>
                                @endforeach
                            </select>
                        </th>
                        <th> 
                            <input type="text" class="form-control" id="datepicker" value="10/19/2016" style="width: 150px">
                            <script type="text/javascript">
                                $(function(){
                                    $("#datepicker").datepicker();
                                });
                            </script>  
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            <select class="form-control" id="version" style="width: 150px">
                                <option value="desktop">desktop</option>
                                <option value="mobile">mobile</option>   
                            </select>
                        </th>
                        
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Version</th>
                    
                </tr>
            </tfoot>
                </table>   
        </div>
        <div class="col-md-2">
            <h4><a href="timeline">Timeline data</a></h4>
            <h4><a href="graphic">Graphic</a></h4>
            <h4><a href="/auth/login">Login</a></h4>
            <h4><a href="/auth/register">Registration</a></h4>
        </div>
    </div>    
</div>
<script type="text/javascript" src="/js/data.js"></script>
@include('layouts.footer')





