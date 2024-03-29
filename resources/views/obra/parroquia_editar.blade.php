@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-10">
        <h3>Parroquia - {{ $Parroquia->x_nombre }} - Obras - Editar</h3>
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


    <form method="POST" action="{{ route('obra.parroquia.guardar', $codigo) }}">
                                    @csrf

        <div>
            <div class="card">
                <div class="card-header">
                    <button type="submit" class="btn btn-outline-primary">Guardar</button>
                    <input type="hidden" name="codigo" value="{{ $Obra->codigo }}"/>
                    
                </div>
                <div class="card-body" >

                    {{-- Obras Sociales --}}
                    <div class="form-group row">
                        <label for="ObraSocial" class="col-md-4 col-form-label text-md-right">Obra Social</label>
                        <div class="col-md-8">
                            <select id="ObrasSociales" name="ObraSocial" class="form-select" aria-label="ObraSocial">
                            <option value="">--- Escoger Obra Social ---</option>
                            @foreach ($ObraSocial as $obra)
                                <option value="{{ $obra->c_codigo }}" {{ $obra->c_codigo==$Obra->c_obra?'selected':'' }}/>{{ $obra->x_nombre }}</option>
                            @endforeach
                            </select>

                            @error('ObraSocial')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>  

                    {{-- Tipo Obra --}}
                    <div class="form-group row">
                        <label for="TipoObra" class="col-md-4 col-form-label text-md-right">Tipo Obra</label>
                        <div class="col-md-8">
                        <input id="TipoObra" type="text"
                            class="form-control @error('TipoObra') is-invalid @enderror"
                            name="TipoObra"
                            value="{{ old('TipoObra')?old('TipoObra'):$Obra->tipobr }}" required autocomplete="off" autofocus
                            placeholder="TipoObra">

                            @error('TipoObra')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    {{-- Nombre --}}
                    <div class="form-group row">
                        <label for="Nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
                        <div class="col-md-8">
                        <input id="Nombre" type="text"
                            class="form-control @error('Nombre') is-invalid @enderror"
                            name="Nombre"
                            value="{{ old('Nombre')?old('Nombre'):$Obra->nombre }}" required autocomplete="off" autofocus
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
                            value="{{ old('Direccion')?old('Direccion'):$Obra->direcc }}" required autocomplete="off" autofocus
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
                                <option value="{{ $d->c_codigo }}" {{ $d->c_codigo==$Obra->distri?'selected':'' }} >{{ $d->x_nombre }}</option>
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
                            value="{{ old('Telefono')?old('Telefono'):$Obra->telef1 }}" required autocomplete="off" autofocus
                            placeholder="Telefono">

                            @error('Telefono')
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
                            value="{{ old('Responsable')?old('Responsable'):$Obra->respon }}" autocomplete="off" autofocus
                            placeholder="Responsable">

                            @error('Responsable')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    {{-- Atendido --}}
                    <div class="form-group row">
                        <label for="Atendido" class="col-md-4 col-form-label text-md-right">Atendido</label>
                        <div class="col-md-8">
                        <input id="Atendido" type="text"
                            class="form-control @error('Atendido') is-invalid @enderror"
                            name="Atendido"
                            value="{{ old('Atendido')?old('Atendido'):$Obra->atendi }}" autocomplete="off" autofocus
                            placeholder="Atendido">

                            @error('Atendido')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    {{-- Desactivado --}}
                    <div class="form-group row">
                        <label for="Desactivado" class="col-md-4 col-form-label text-md-right">Desactivado</label>
                        <div class="col-md-8">
                            <select id="Desactivado" name="Desactivado" class="form-select" aria-label="Desactivado">
                                <option value="1" {{ $Obra->i_desactivada==1?'Selected':'' }}>Si</option>
                                <option value="0" {{ $Obra->i_desactivada==0?'Selected':'' }}>No</option>
                            </select>
                        </div>
                    </div>  

                    {{-- Fecha de Desactivacion --}}
                    <div class="form-group row">
                        <label for="FechaDesactivacion"
                                class="col-md-4 col-form-label text-md-right">Fecha de Desactivaci&oacute;n</label>
                        <div class="col-md-8">
                            <input id="FechaDesactivacion" type="date"
                                    class="form-control @error('FechaDesactivacion') is-invalid @enderror"
                                    name="FechaDesactivacion"
                                    value="{{ old('FechaDesactivacion')?old('FechaDesactivacion'):date('Y-m-d', strtotime($Obra->d_desactivada)) }}" required autocomplete="off" autofocus>

                            @error('FechaDesactivacion')
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