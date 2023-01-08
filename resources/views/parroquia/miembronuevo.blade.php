@extends('layouts.app')

@section('content')
<form action="{{ route('parroquia.miembros.agregar',[$codigo,$Miembro->ID]) }}" method="post">
@csrf


<div class="container">
    <div class="row">
        <div class="col-10">
            <h2>Parroquia - {{ $Parroquia->x_nombre }} - Agregar Miembro</h2>
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
                <button class="btn btn-outline-primary" type="submit">Grabar</button>
                
            </div>
            <div class="card-body" >
                <div class="row">
                    <div class="col-6">
                        {{-- Nombre --}}
                        <div class="form-group row">
                            <label for="Nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
                            <div class="col-md-6">
                                <input type="hidden" id="MiembroId" name="MiembroId" value="{{ $Miembro->c_codigo }}"/>
                                <input type="hidden" id="Congre" name="Congre" value="{{ $Miembro->congre }}"/>
                                <span class="badge bg-secondary">{{ $Miembro->nombre}} {{ $Miembro->patern}} {{ $Miembro->matern}}</span></div>
                        </div>
                    </div>
                    <div class="col-6">
                        {{-- Cargo --}}
                        <div class="form-group row">
                            <label for="Cargos" class="col-md-4 col-form-label text-md-right">Cargos</label>
                            <div class="col-md-6">
                                <select id="Cargos" name="Cargos" class="form-select" aria-label="Cargos">
                                @foreach ($Cargos as $d)
                                    <option value="{{ $d->c_codigo }}"  />{{ $d->x_nombre }}</option>
                                @endforeach
                                </select>

                                @error('Cargos')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


</div>                              
</form>

@endsection