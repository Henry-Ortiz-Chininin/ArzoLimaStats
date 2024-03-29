@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-10">
        <h3>Parroquia - {{ $Parroquia->x_nombre }} - Obras</h3>
        </div>
        <div class="col-2 align-middle">
        <span class="badge bg-secondary">{{ date('Y-m-d', strtotime($Parroquia->d_suscri)) }}</span>
        </div> 
    </div>


    <!-- Tabs navs -->
    <ul class="nav nav-tabs nav-fill mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
        <a class="nav-link" id="tabParroquia" data-mdb-toggle="tab" 
        href="{{ route('parroquia.editar',$Parroquia->c_codigo) }}" role="tab" aria-controls="tabParroquia" aria-selected="true">Parroquia - Info</a>
        </li>
        <li class="nav-item" role="presentation">
        <a class="nav-link" id="tabCapillas" data-mdb-toggle="tab" 
        href="{{ route('capillas',$Parroquia->c_codigo) }}" role="tab" aria-controls="tabCapillas" aria-selected="true">Capillas</a>
        </li>
        <li class="nav-item" role="presentation">
        <a class="nav-link" id="tabColegios" data-mdb-toggle="tab" 
        href="{{ route('colegios.parroquia',$Parroquia->c_codigo) }}" role="tab" aria-controls="tabColegios" aria-selected="true">Colegios</a>
        </li>
        <li class="nav-item" role="presentation">
        <a class="nav-link active" id="tabObras" data-mdb-toggle="tab" 
        href="{{ route('obras.parroquia',$Parroquia->c_codigo) }}" role="tab" aria-controls="tabObras" aria-selected="true">Obras Parroquias</a>
        </li>
        <li class="nav-item" role="presentation">
        <a class="nav-link" id="tabSacramentos" data-mdb-toggle="tab" 
        href="{{ route('sacramentos',$Parroquia->c_codigo) }}" role="tab" aria-controls="tabSacramentos" aria-selected="true">Sacramentos</a>
        </li>
        <li class="nav-item" role="presentation">
        <a class="nav-link" id="tabCasas" data-mdb-toggle="tab" 
        href="{{ route('casas.parroquia',$Parroquia->c_codigo) }}" role="tab" aria-controls="tabCasas" aria-selected="true">Casas</a>
        </li>
        <li class="nav-item" role="presentation">
        <a class="nav-link" id="tabCatequistas" data-mdb-toggle="tab" 
        href="{{ route('catequistas',$Parroquia->c_codigo) }}" role="tab" aria-controls="tabCatequistas" aria-selected="true">Catequistas</a>
        </li>
        <li class="nav-item" role="presentation">
        <a class="nav-link" id="tabHistoria" data-mdb-toggle="tab" 
        href="{{ route('historia.parroquia',$Parroquia->c_codigo) }}" role="tab" aria-controls="tabHistoria" aria-selected="true">Historia</a>
        </li>
    </ul>

    <!-- Tabs navs -->

    @csrf
    <div>
        <div class="card">
            <div class="card-header float-end">
                <button class="btn btn-outline-primary" 
                    onclick="window.location='{{ route("obra.parroquia.nuevo",$codigo) }}'" type="button">Agregar</button>

            </div>
            <div class="card-body" >
                <div class="container text-center">
                    <div class="row header">
                        <div class="col-2 text-start">Nombre</div>
                        <div class="col-2 text-start">Dirección</div>
                        <div class="col-2 text-start">Distrito</div>
                        <div class="col-2 text-start">Tipo</div>
                        <div class="col-2 text-start">Responsable</div>
                        <div class="col-1 text-start">Telefono</div>
                        <div class="col-1 text-start">Atend</div>
                    </div>
                    @if($Obras)
                        @foreach($Obras as $obra)                        
                            <div class="row gridRow" onclick="window.location='{{ route("obra.parroquia.editar",[$obra->c_parroquia,$obra->codigo]) }}'">
                                <div class="col-2 text-start border">{{ $obra->nombre }}</div>
                                <div class="col-2 text-start border">{{ $obra->direcc }}</div>
                                <div class="col-2 text-start border">
                                    @foreach($Distritos->where('c_codigo',$obra->distri)->all() as $distrito)
                                        {{ $distrito->x_nombre }}
                                    @endforeach
                                </div>
                                <div class="col-2 text-start border">{{ $obra->tipobr }}</div>
                                <div class="col-2 text-start border">{{ $obra->respon }}</div>
                                <div class="col-1 text-start border">{{ $obra->telef1 }}</div>
                                <div class="col-1 text-end border">{{ $obra->atendi }}</div>
                            </div>
                        @endforeach
                    @endif                

                </div>

            </div>
        </div>
    </div>
    

</div>



@endsection