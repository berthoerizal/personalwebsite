<div class="row">
    @foreach ($ports as $port)
    <div class="col-lg-3 col-md-4 col-6">
       <a href="{{asset('images/'.$port->picture)}}" class="d-block mb-3">
         <img class="img-fluid img-thumbnail" src="{{asset('images/'.$port->picture)}}" alt="{{$port->port_title}}" style="width: 100%; height: 200px;">
       </a>
     </div>
    @endforeach
 </div>