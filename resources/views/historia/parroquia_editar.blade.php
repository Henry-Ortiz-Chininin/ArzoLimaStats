@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-10">
        <h3>Parroquia - {{ $Parroquia->x_nombre }} - Historia - Editar</h3>
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


    <form method="POST" action="{{ route('historia.parroquia.guardar', [$codigo,$historiaID]) }}">
                                    @csrf

        <div>
            <div class="card">
                <div class="card-header">
                    <button type="submit" class="btn btn-outline-primary">Guardar</button>
                </div>
                <div class="card-body" >
                {{-- Miembro --}}
                    <div class="form-group row">
                        <label for="Miembro" class="col-md-4 col-form-label text-md-right">Miembro</label>
                        <div class="col-md-8">
                            {{ $Historia->x_miembro }}

                        </div>
                    </div>

                    {{-- Cargo --}}
                    <div class="form-group row">
                        <label for="Cargo" class="col-md-4 col-form-label text-md-right">Cargo</label>
                        <div class="col-md-8">
                            <select id="Cargo" name="Cargo" class="form-select" aria-label="Cargo">
                            <option value="">--- Escoger Cargo ---</option>
                            @foreach ($Cargos as $d)
                                <option value="{{ $d->c_codigo }}" {{ $Historia->c_cargo==$d->c_codigo?' selected ':'' }}>{{ $d->x_nombre }}</option>
                            @endforeach
                            </select>

                            @error('Cargo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>            


                    {{-- Fecha de Desde --}}
                    <div class="form-group row">
                        <label for="FechaDesde"
                                class="col-md-4 col-form-label text-md-right">Fecha de Inicio</label>

                        <div class="col-md-8">
                            <input id="FechaDesde" type="date"
                                    class="form-control @error('FechaDesde') is-invalid @enderror"
                                    name="FechaDesde"
                                    value="{{ date('Y-m-d', strtotime($Historia->d_desde))  }}" required autocomplete="off" autofocus>

                            @error('FechaDesde')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    {{-- Fecha de Hasta --}}
                    <div class="form-group row">
                        <label for="FechaHasta"
                                class="col-md-4 col-form-label text-md-right">Fecha Hasta</label>

                        <div class="col-md-8">
                            <input id="FechaHasta" type="date"
                                    class="form-control @error('FechaHasta') is-invalid @enderror"
                                    name="FechaHasta"
                                    value="{{ date('Y-m-d', strtotime($Historia->d_hasta))  }}" required autocomplete="off" autofocus>

                            @error('FechaHasta')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>
        </div>
    
    </form>   
</div>


@endsection