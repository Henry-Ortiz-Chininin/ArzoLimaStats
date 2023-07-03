@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-10">
        <h3>Congregacion - {{ $Congregacion->x_nombre }} - Colegios</h3>
        </div>
        <div class="col-2 align-middle">
        <span class="badge bg-secondary">{{ date('Y-m-d', strtotime($Congregacion->d_suscrip)) }}</span>
        </div> 
    </div>


   <!-- Tabs navs -->
   <ul class="nav nav-tabs nav-fill mb-3" id="ex1" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="tabParroquia" data-mdb-toggle="tab" 
      href="{{ route('congregacion.editar',$Congregacion->c_codigo) }}" role="tab" aria-controls="tabParroquia" aria-selected="false">Congregacion - Info</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="tabCasas" data-mdb-toggle="tab" 
      href="{{ route('casas.congregacion',$Congregacion->c_codigo) }}" role="tab" aria-controls="tabCasas" aria-selected="false">Casas</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="tabReligion" data-mdb-toggle="tab" 
      href="{{ route('religion.congregacion',$Congregacion->c_codigo) }}" role="tab" aria-controls="tabReligion" aria-selected="false">Religion</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="tabColegios" data-mdb-toggle="tab" 
      href="{{ route('colegios.congregacion',$Congregacion->c_codigo) }}" role="tab" aria-controls="tabColegios" aria-selected="true">Colegios</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="tabObras" data-mdb-toggle="tab" 
      href="{{ route('obras.congregacion',$Congregacion->c_codigo) }}" role="tab" aria-controls="tabObras" aria-selected="false">Obras</a>
    </li>
  </ul>

    <!-- Tabs navs -->

    @csrf
    <div>
        <div class="card">
            <div class="card-header float-end">
            <button class="btn btn-outline-primary" 
                  onclick="window.location='{{ route("colegio.congregacion.nuevo",$codigo) }}'" type="button">Agregar</button>

            </div>
            <div class="card-body" >
                <div class="container text-center">
                    <div class="row header">
                        <div class="col-2 text-start">Nombre</div>
                        <div class="col-1 text-start">Dirección</div>
                        <div class="col-1 text-start">Distrito</div>
                        <div class="col-1 text-start">Teléfono</div>
                        <div class="col-2 text-start">Director</div>
                        <div class="col-4">
                            <div class="row">
                                <div class="col-2 text-end">Jard</div>
                                <div class="col-2 text-end">Prim</div>
                                <div class="col-2 text-end">Secu</div>
                                <div class="col-2 text-end">Tecn</div>
                                <div class="col-2 text-end">Ocup</div>
                                <div class="col-2 text-end">Espe</div>      
                            </div>                   
                        </div>
                        <div class="col-1 text-start">Tipo</div>
                    </div>
                    @if($Colegios)
                        @foreach($Colegios as $colegio)                        
                            <div class="row gridRow" onclick="window.location='{{ route("colegio.congregacion.editar",[$colegio->c_congre,$colegio->codigo]) }}'">
                                <div class="col-2 text-start border">{{ $colegio->nombre }}</div>
                                <div class="col-1 text-start border">{{ $colegio->direcc }}</div>
                                <div class="col-1 text-start border">
                                    @foreach($Distritos->where('c_codigo',$colegio->distri)->all() as $distrito)
                                        {{ $distrito->x_nombre }}
                                    @endforeach 
                                </div>
                                <div class="col-1 text-start border">{{ $colegio->telef1 }} {{ $colegio->telfax }}</div>
                                <div class="col-2 text-start border">{{ $colegio->direct }}</div>
                                <div class="col-4 border">
                                    <div class="row">
                                        <div class="col-2 text-end">{{ $colegio->jardin }}</div>
                                        <div class="col-2 text-end">{{ $colegio->primar }}</div>
                                        <div class="col-2 text-end">{{ $colegio->secund }}</div>
                                        <div class="col-2 text-end">{{ $colegio->tecnic }}</div>
                                        <div class="col-2 text-end">{{ $colegio->ocupac }}</div>
                                        <div class="col-2 text-end">{{ $colegio->especi }}</div>
                                    </div>
                                </div>
                                <div class="col-1 text-start border">{{ $colegio->tipcol }}</div>                                   
                             
                            </div>
                        @endforeach
                    @endif                

                </div>

            </div>
        </div>
    </div>
    

</div>


@endsection