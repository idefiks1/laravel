@include('layouts.header')
<div class="container-fluid">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Status</th>
                <th>Version</th>
                <th>Date</th>
            </tr>
        </thead>
            @foreach ($saves as $save)
                <tr>
                    <save>
                        <td>{{$save->user}}</td>
                       <td>{{$save->status}}</td>
                       <td>{{$save->version}}</td>
                       <td>{{$save->created_at}}</td>
                    </save>
                </tr>

            @endforeach
    </table>
</div>
@include('layouts.footer')
