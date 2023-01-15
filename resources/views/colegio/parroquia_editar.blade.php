@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-10">
        <h3>Parroquia - {{ $Parroquia->x_nombre }} - Colegio - Editar</h3>
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
        <a class="nav-link active" id="tabColegios" data-mdb-toggle="tab" 
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


    <form method="POST" action="{{ route('colegio.guardar', $codigo) }}">
                                    @csrf

        <div>
            <div class="card">
                <div class="card-header">
                    <button type="submit" class="btn btn-outline-primary">Guardar</button>
                    <input type="hidden" name="codigo" value="{{ $Colegio->codigo }}"/>
                </div>
                <div class="card-body" >

                    {{-- Nombre --}}
                    <div class="form-group row">
                        <label for="Nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
                        <div class="col-md-8">
                        <input id="Nombre" type="text"
                            class="form-control @error('Nombre') is-invalid @enderror"
                            name="Nombre"
                            value="{{ old('Nombre')?old('Nombre'):$Colegio->nombre }}" required autocomplete="off" autofocus
                            placeholder="Nombre">

                            @error('Nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    {{-- Tipo Colegio --}}
                    <div class="form-group row">
                        <label for="Tipo" class="col-md-4 col-form-label text-md-right">Tipo</label>
                        <div class="col-md-8">
                        <input id="Tipo" type="text"
                            class="form-control @error('Direccion') is-invalid @enderror"
                            name="Tipo"
                            value="{{ old('Tipo')?old('Tipo'):$Colegio->tipcol }}" required autocomplete="off" autofocus
                            placeholder="Tipo">

                            @error('Tipo')
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
                            value="{{ old('Direccion')?old('Direccion'):$Colegio->direcc }}" required autocomplete="off" autofocus
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
                                <option value="{{ $d->c_codigo }}" {{ $Colegio->distri==$d->c_codigo?'selected':' ' }} >{{ $d->x_nombre }}</option>
                            @endforeach
                            </select>

                            @error('Distritos')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>            
                    {{-- Director --}}
                    <div class="form-group row">
                        <label for="Director" class="col-md-4 col-form-label text-md-right">Director</label>
                        <div class="col-md-8">
                        <input id="Director" type="text"
                            class="form-control @error('Director') is-invalid @enderror"
                            name="Director"
                            value="{{ old('Director')?old('Director'):$Colegio->direct }}" required autocomplete="off" autofocus
                            placeholder="Director">

                            @error('Director')
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
                            value="{{ old('Telefono')?old('Telefono'):$Colegio->telef1 }}" required autocomplete="off" autofocus
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
                            value="{{ old('Fax')?old('Fax'):$Colegio->telfax }}" autocomplete="off" autofocus
                            placeholder="Celular/Whatsapp">

                            @error('Fax')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div> 
                    {{-- Email --}}
                    <div class="form-group row">
                        <label for="Email" class="col-md-4 col-form-label text-md-right">Email</label>
                        <div class="col-md-8">
                        <input id="Email" type="email"
                            class="form-control @error('Email') is-invalid @enderror"
                            name="Email"
                            value="{{ old('Email')?old('Email'):$Colegio->emal }}" autocomplete="off" autofocus
                            placeholder="Email">

                            @error('Email')
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
                                <option value="1" {{ $Colegio->i_desactivada==1?'Selected':'' }}>Si</option>
                                <option value="0" {{ $Colegio->i_desactivada==0?'Selected':'' }}>No</option>
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
                                    value="{{ old('FechaDesactivacion')?old('FechaDesactivacion'):date('Y-m-d', strtotime($Colegio->d_desactivada)) }}" required autocomplete="off" autofocus>

                            @error('FechaDesactivacion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <hr />
                    {{-- Colegio --}}
                    <div class="row">
                        <div class="col-2">
                            <div class="form-group row">
                                <label for="Guarderia" class="col-form-label text-md-right">Guarderia</label>
                                <input id="Guarderia" type="text" class="form-control" name="Guarderia"
                                    value="{{ old('Guarderia')?old('Guarderia'):$Colegio->guarde }}" autocomplete="off" autofocus>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group row">
                                <label for="Inicial" class="col-form-label text-md-right">Inicial</label>
                                <input id="Inicial" type="text" class="form-control" name="Inicial"
                                    value="{{ old('Inicial')?old('Inicial'):$Colegio->inicia }}" autocomplete="off" autofocus>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group row">
                                <label for="Jardin" class="col-form-label text-md-right">Jardin</label>
                                <input id="Jardin" type="text" class="form-control" name="Jardin"
                                    value="{{ old('Jardin')?old('Jardin'):$Colegio->jardin }}" autocomplete="off" autofocus>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group row">
                                <label for="Primaria" class="col-form-label text-md-right">Primaria</label>
                                <input id="Primaria" type="text" class="form-control" name="Primaria"
                                    value="{{ old('Primaria')?old('Primaria'):$Colegio->primar }}" autocomplete="off" autofocus>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group row">
                                <label for="Secundaria" class="col-form-label text-md-right">Secundaria</label>
                                <input id="Secundaria" type="text" class="form-control" name="Secundaria"
                                    value="{{ old('Secundaria')?old('Secundaria'):$Colegio->secund }}" autocomplete="off" autofocus>
                            </div>
                        </div>
                    </div>

                    {{-- Adicional Colegio --}}
                    <div class="row">
                        <div class="col-2">
                            <div class="form-group row">
                                <label for="Tecnico" class="col-form-label text-md-right">Tecnico</label>
                                <input id="Tecnico" type="text" class="form-control" name="Tecnico"
                                    value="{{ old('Tecnico')?old('Tecnico'):$Colegio->tecnic }}" autocomplete="off" autofocus>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group row">
                                <label for="Ocupacional" class="col-form-label text-md-right">Ocupacional</label>
                                <input id="Ocupacional" type="text" class="form-control" name="Ocupacional"
                                    value="{{ old('Ocupacional')?old('Ocupacional'):$Colegio->ocupac }}" autocomplete="off" autofocus>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group row">
                                <label for="Especial" class="col-form-label text-md-right">Especial</label>
                                <input id="Especial" type="text" class="form-control" name="Especial"
                                    value="{{ old('Especial')?old('Especial'):$Colegio->especi }}" autocomplete="off" autofocus>
                            </div>
                        </div>
                    </div>
                    <hr />

                    {{-- Observacion --}}
                    <div class="form-group row">
                        <label for="Observacion" class="col-form-label text-md-right">Observaci&oacute;n</label>
                        <input id="Observacion" type="text" class="form-control" name="Observacion"
                            value="{{ old('Observacion')?old('Observacion'):$Colegio->observac }}" autocomplete="off" autofocus>
                    </div>





                </div>
            <div class="card-header"></div>

            </div>
        </div>
    
    </form>  

</div>


@endsection