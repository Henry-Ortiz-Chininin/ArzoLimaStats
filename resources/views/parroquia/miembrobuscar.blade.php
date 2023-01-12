@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-10">
        <h3>Parroquia - {{ $Parroquia->x_nombre }} - Agregar Miembro</h3>
        </div>
        <div class="col-2 align-middle">
        <span class="badge bg-secondary">{{ date('Y-m-d', strtotime($Parroquia->d_suscri)) }}</span>
        </div> 
    </div>


    <!-- Tabs navs -->
    <ul class="nav nav-tabs nav-fill mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
        <a class="nav-link active" id="tabParroquia" data-mdb-toggle="tab" 
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
        <a class="nav-link" id="tabHistoria" data-mdb-toggle="tab" 
        href="{{ route('historia.parroquia',$Parroquia->c_codigo) }}" role="tab" aria-controls="tabHistoria" aria-selected="true">Historia</a>
        </li>
    </ul>

    <!-- Tabs navs -->


    <div class="row">
        <div class="card">
            <div class="card-header float-end">
                <form action="{{ route('parroquia.miembros.search',$codigo) }}" method="get">
                @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Nombres o apellidos" 
                        aria-label="Nombres o apellidos" aria-describedby="button-addon2" name="search" id="search">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                    </div>
                </form>
            </div>
            <div class="card-body" >
                <div class="container text-center">
                    <div class="row header">
                        <div class="col-4 text-start">Nombre</div>
                        <div class="col-4 text-start">Apellido Paterno</div>
                        <div class="col-4 text-start">Apellido Materno</div>
                    </div>
                    @if($Miembros)
                        @foreach ($Miembros as $miembro)
                            <div class="row gridRow" onclick="window.location='{{ route("parroquia.miembros.nuevo",[$codigo,$miembro->ID]) }}'">
                                <div class="col-4 text-start border">{{ $miembro->nombre }}</div>
                                <div class="col-4 text-start border">{{ $miembro->patern }}</div>
                                <div class="col-4 text-start border">{{ $miembro->matern }}</div>
                            </div>
                        @endforeach
                    @endif                

                </div>

            </div>
        </div>
    </div>


</div>                              

@endsection