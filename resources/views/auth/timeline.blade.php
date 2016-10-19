@include('layouts.header')
<div class="container-fluid">
    @foreach ($saves as $save)
        <save>
            <div class="row">
                <div class="col-md-3"><h5>{{$save->user}}</h5></div>
                <div class="col-md-3"><h5>{{$save->status}}</h5></div>
                <div class="col-md-3"><h5>{{$save->created_at}}</h5></div>
                <div class="col-md-3"><h5>{{$save->version}}</h5></div>
            </div>
        </save>
    @endforeach
</div>
@include('layouts.footer')
