@extends('layouts.app')

@section('content')

<h3>Miembros</h3>
<div class="container">
<div class="row">
  <div class="col-10">
    <form action="{{ route('miembros.search') }}" method="GET">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Nombres o apellidos" 
        aria-label="Nombre del Miembro" aria-describedby="button-addon2" name="search" id="search">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
      </div>
    </form>    
  </div>
  <div class="col-2">
    <button class="btn btn-outline-primary" type="button"  onclick="window.location='{{ route("miembro.nuevo") }}'">Agregar</button>
  </div>
</div>

  <div class="container text-center">
    <div class="row header">
      <div class="col-1 text-start">Codigo</div>
      <div class="col-3 text-start">Nombre</div>
      <div class="col-2 text-start">Direcci&oacute;n</div>
      <div class="col-2 text-start">Distrito</div>
      <div class="col-2 text-start">Telefono</div>
      <div class="col-2 text-start">Correo</div>
    </div>

    @if($Miembros)
      @foreach ($Miembros as $miembro)
        <div class="row gridRow" onclick="window.location='{{ route("miembro.editar",$miembro->c_codigo) }}'">
          <div class="col-1 text-start border">{{$miembro->c_codigo}}</div>
          <div class="col-3 text-start border">{{$miembro->nombre}} {{$miembro->patern}} {{$miembro->matern}}</div>
          <div class="col-2 text-start border">{{$miembro->direcc}}</div>
          <div class="col-2 text-start border"> 
            @if($Distritos)
                @foreach($Distritos->where('c_codigo',$miembro->distri)->all() as $distrito)
                    {{ $distrito->x_nombre }}
                @endforeach            
            @endif
          </div>
          <div class="col-2 text-start border">{{$miembro->telef1}} 
          @if($miembro->telfax)
          -
          @endif  
          {{$miembro->telfax}}</div>
          <div class="col-2 text-start border">{{$miembro->email}}</div>
        </div>
      @endforeach
    @else 
        <div>
            <h2>No hay miembros a mostrar, intente realizar una busqueda</h2>
        </div>
    @endif


  </div>

</div>

@endsection