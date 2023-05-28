@extends('layouts.app')

@section('content')

<h3>Congregaciones</h3>
<div class="container">
<div class="row">
  <div class="col-10">
    <form action="{{ route('congregaciones.search') }}" method="GET">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Nombres o siglas" 
        aria-label="Nombre de Congregaci&oacute;n" aria-describedby="button-addon2" name="search" id="search">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
      </div>
    </form>    
  </div>
  <div class="col-2">
    <button class="btn btn-outline-primary" type="button"  onclick="window.location='{{ route("congregacion.nuevo") }}'">Agregar</button>
  </div>
</div>

  <div class="container text-center">
    <div class="row header">
      <div class="col-1 text-start">Codigo</div>
      <div class="col-4 text-start">Nombre</div>
      <div class="col-3 text-start">Direcci&oacute;n</div>
      <div class="col-2 text-start">Telefono</div>
      <div class="col-2 text-start">Correo</div>
    </div>

    @if($Congregaciones)
      @foreach ($Congregaciones as $congregacion)
        <div class="row gridRow" onclick="window.location='{{ route("congregacion.editar",$congregacion->c_codigo) }}'">
          <div class="col-1 text-start border">{{$congregacion->c_codigo}}</div>
          <div class="col-4 text-start border">{{$congregacion->x_nombre}}</div>
          <div class="col-3 text-start border">{{$congregacion->dirnac}}</div>
          <div class="col-2 text-start border">{{$congregacion->telnac}} 
          @if($congregacion->faxnac)
          -
          @endif  
          {{$congregacion->faxnac}}</div>
          <div class="col-2 text-start border">{{$congregacion->emailnac}}</div>
        </div>
      @endforeach
    @else 
        <div>
            <h2>No hay congregaciones a mostrar, intente realizar una busqueda</h2>
        </div>
    @endif


  </div>

</div>

@endsection