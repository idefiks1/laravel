@include('layouts.header')


<div class="container-fluid">
    <div class="row">
        <div class="col-md-10">

            @foreach ($images as $image)
                <p><a href="{{$url}}""><img src="/js/casperjs/{{$image}}"/></a></p>
                @foreach ( $new as $key => $value )
                   <p> {{ $key }} {{$value}}</p>
                @endforeach
                <br>
                

            @endforeach
           
        </div>
        <div class="col-md-2">
            <h4><a href="car">Car scraping</a></h4>
            <h4><a href="timeline">Timeline data</a></h4>
            <h4><a href="graphic">Graphic</a></h4>
            <h4><a href="/auth/login">Login</a></h4>
            <h4><a href="/auth/register">Registration</a></h4>
        </div>
    </div>    
</div>

@include('layouts.footer')
