@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-10">
        <h3>Parroquia - {{ $Parroquia->x_nombre }} - Historia - Nuevo</h3>
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


    <form method="POST" action="{{ route('capilla.guardar', $codigo) }}">
                                    @csrf

        <div>
            <div class="card">
                <div class="card-header">
                    <button type="submit" class="btn btn-outline-primary">Guardar</button>
                </div>
                <div class="card-body" >

                    {{-- Nombre --}}
                    <div class="form-group row">
                        <label for="Nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
                        <div class="col-md-8">
                        <input id="Nombre" type="text"
                            class="form-control @error('Nombre') is-invalid @enderror"
                            name="Nombre"
                            value="{{ old('Nombre') }}" required autocomplete="off" autofocus
                            placeholder="Nombre">

                            @error('Nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    {{-- Direccion --}}
                    <div class="form-group row">
                        <label for="Direccion" class="col-md-4 col-form-label text-md-right">Dirección</label>
                        <div class="col-md-8">
                        <input id="Direccion" type="text"
                            class="form-control @error('Direccion') is-invalid @enderror"
                            name="Direccion"
                            value="{{ old('Direccion') }}" required autocomplete="off" autofocus
                            placeholder="Direccion">

                            @error('Direccion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    {{-- Distrito --}}
                    <div class="form-group row">
                        <label for="Distritos" class="col-md-4 col-form-label text-md-right">Distrito</label>
                        <div class="col-md-8">
                            <select id="Distritos" name="Distritos" class="form-select" aria-label="Distritos">
                            <option value="">--- Escoger Distrito ---</option>
                            @foreach ($Distritos as $d)
                                <option value="{{ $d->c_codigo }}" />{{ $d->x_nombre }}</option>
                            @endforeach
                            </select>

                            @error('Distritos')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>            

                    {{-- Telefono --}}
                    <div class="form-group row">
                        <label for="Telefono" class="col-md-4 col-form-label text-md-right">Telefono</label>
                        <div class="col-md-8">
                        <input id="Telefono" type="text"
                            class="form-control @error('Telefono') is-invalid @enderror"
                            name="Telefono"
                            value="{{ old('Telefono') }}" required autocomplete="off" autofocus
                            placeholder="Telefono">

                            @error('Telefono')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    {{-- Fax Celular Wsp --}}
                    <div class="form-group row">
                        <label for="Fax" class="col-md-4 col-form-label text-md-right">Celular/Whatsapp</label>
                        <div class="col-md-8">
                        <input id="Fax" type="text"
                            class="form-control @error('Fax') is-invalid @enderror"
                            name="Fax"
                            value="{{ old('Fax') }}" autocomplete="off" autofocus
                            placeholder="Celular/Whatsapp">

                            @error('Fax')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div> 

                    {{-- Responsable --}}
                    <div class="form-group row">
                        <label for="Responsable" class="col-md-4 col-form-label text-md-right">Responsable</label>
                        <div class="col-md-8">
                        <input id="Responsable" type="text"
                            class="form-control @error('Responsable') is-invalid @enderror"
                            name="Responsable"
                            value="{{ old('Responsable') }}" autocomplete="off" autofocus
                            placeholder="Responsable">

                            @error('Responsable')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    {{-- Sacramentos --}}
                    <div class="form-group row">
                        <label for="Sacramentos" class="col-md-4 col-form-label text-md-right">Sacramentos</label>
                        <div class="col-md-8">
                            <select id="Sacramentos" name="Sacramentos" class="form-select" aria-label="Sacramentos">
                            <option value="S">Si</option>
                            <option value="N">No</option>
                            </select>
                        </div>
                    </div>  

                    {{-- Estado --}}
                    <div class="form-group row">
                        <label for="Estado" class="col-md-4 col-form-label text-md-right">Estado</label>
                        <div class="col-md-8">
                        <input id="Estado" type="text"
                            class="form-control @error('Estado') is-invalid @enderror"
                            name="Estado"
                            value="{{ old('Estado') }}" autocomplete="off" autofocus
                            placeholder="Estado">

                            @error('Estado')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    {{-- Fecha de Ereccion --}}
                    <div class="form-group row">
                        <label for="FechaEreccion"
                                class="col-md-4 col-form-label text-md-right">Fecha de Ereccion</label>

                        <div class="col-md-8">
                            <input id="FechaEreccion" type="date"
                                    class="form-control @error('FechaEreccion') is-invalid @enderror"
                                    name="FechaEreccion"
                                    value="{{ old('FechaEreccion') }}" required autocomplete="off" autofocus>

                            @error('FechaEreccion')
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