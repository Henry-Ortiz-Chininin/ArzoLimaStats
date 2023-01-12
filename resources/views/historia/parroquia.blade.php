@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-10">
        <h3>Parroquia - {{ $Parroquia->x_nombre }} - Historia</h3>
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
        <a class="nav-link" id="tabObras" data-mdb-toggle="tab" 
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
        <a class="nav-link active" id="tabHistoria" data-mdb-toggle="tab" 
        href="{{ route('historia.parroquia',$Parroquia->c_codigo) }}" role="tab" aria-controls="tabHistoria" aria-selected="true">Historia</a>
        </li>
    </ul>

    <!-- Tabs navs -->


    @csrf
    <div class="row">
        <div class="card">
            <div class="card-header float-end">

            </div>
            <div class="card-body" >
                <div class="container text-center">
                    <div class="row header">
                        <div class="col-1 text-start">Codigo</div>
                        <div class="col-3 text-start">Miembros</div>
                        <div class="col-3 text-start">Cargos</div>
                        <div class="col-2 text-start">Desde</div>
                        <div class="col-2 text-start">Hasta</div>
                    </div>
                    @if($Historia)
                        @foreach($Historia as $hito)                        
                            <div class="row gridRow">
                                <div class="col-1 text-start border">{{ $hito->c_miembro }}</div>
                                <div class="col-3 text-start border">{{ $hito->x_miembro }}</div>
                                <div class="col-3 text-start border">
                                    @foreach($Cargos->where('c_codigo',$hito->c_cargo)->all() as $cargo)
                                        {{ $cargo->x_nombre }}
                                    @endforeach 
                                </div>
                                <div class="col-2 text-end border">{{ date('Y-m-d', strtotime($hito->d_desde)) }}</div>
                                <div class="col-2 text-end border">{{ date('Y-m-d', strtotime($hito->d_hasta)) }}</div>
                            </div>
                        @endforeach
                    @endif                

                </div>

            </div>
        </div>
    </div>

</div>


@endsection