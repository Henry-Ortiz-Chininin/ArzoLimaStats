@extends('layouts.app')

@section('content')

<h3>Parroquias</h3>
<div class="container">
<div class="row">
  <div class="col-10">
    <form action="{{ route('parroquias.search') }}" method="GET">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Parroquia o direcci&oacute;n" 
        aria-label="Parroquia o direcci&oacute;n" aria-describedby="button-addon2" name="search" id="search">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
      </div>
    </form>    
  </div>
  <div class="col-2">
    <button class="btn btn-outline-primary" type="button"  onclick="window.location='{{ route("parroquia.nuevo") }}'">Agregar</button>
  </div>
</div>

  <div class="container text-center">
    <div class="row header">
      <div class="col text-start">Codigo</div>
      <div class="col-4 text-start">Nombre Parroquia</div>
      <div class="col-4 text-start">Direcci&oacute;n</div>
      <div class="col-3 text-start">Correo</div>
    </div>

    @if($parroquias->isNotEmpty())
      @foreach ($parroquias as $p)
        <div class="row gridRow" onclick="window.location='{{ route("parroquia.editar",$p->c_codigo) }}'">
          <div class="col text-start border">{{$p->c_codigo}}</div>
          <div class="col-4 text-start border">{{$p->x_nombre}}</div>
          <div class="col-4 text-start border">{{$p->x_direcc}}</div>
          <div class="col-3 text-start border">{{$p->email}}</div>
        </div>
      @endforeach
    @else 
        <div>
            <h2>No hay parroquias a mostrar, intente realizar una busqueda</h2>
        </div>
    @endif


  </div>

</div>

@endsection