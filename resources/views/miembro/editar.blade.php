@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-10">
    <h3>Miembro - {{ $Miembro->nombre }} - Editar</h3>
    </div>
    <div class="col-2 align-middle">
    <span class="badge bg-secondary">{{ date('Y-m-d', strtotime($Miembro->suscri)) }}</span>
    </div> 
</div>
<div class="container">
  <!-- Tabs navs -->
  <ul class="nav nav-tabs nav-fill mb-3" id="ex1" role="tablist">
    <li class="nav-item" role="presentation">
      <a
        class="nav-link active"
        id="ex2-tab-1"
        data-mdb-toggle="tab"
        href='{{ route("miembro.editar",$codigo) }}'
        role="tab"
        aria-controls="ex2-tabs-1"
        aria-selected="true"
        >Miembro - Info</a
      >
    </li>
    <li class="nav-item" role="presentation">
      <a
        class="nav-link"
        id="ex2-tab-2"
        data-mdb-toggle="tab"
        href='{{ route("historia.miembro",$codigo) }}'
        role="tab"
        aria-controls="ex2-tabs-2"
        aria-selected="false"
        >Historia</a
      >
    </li>
  </ul>
  <!-- Tabs navs -->


  @if($errors->any())
      <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Hubo problemas con la validacion de datos, verificar.</strong>
          @if(env('APP_DEBUG'))
              <strong>{{$errors->first()}}</strong>
          @endif
      </div>
  @endif
  <form method="POST" action="{{ route('miembro.guardar', $codigo) }}">
                              @csrf
    <div class="card">
      <div class="card-header float-end">
      <button class="btn btn-outline-primary" type="submit">Grabar</button>

      </div>
      <div class="card-body">
        <div class="row">
            <div class="col-6">
                {{-- Nombre --}}
                <div class="form-group row">
                    <label for="Nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
                    <div class="col-md-6">
                    <input id="Nombre" type="text"
                        class="form-control @error('Nombre') is-invalid @enderror"
                        name="Nombre"
                        value="{{ old('Nombre')? old('Nombre'):$Miembro->nombre }}" required autocomplete="off" autofocus
                        placeholder="Nombre">

                        @error('Nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>    
            </div>
            <div class="col-6">
                {{-- Siglas --}}
                <div class="form-group row">
                    <label for="Siglas" class="col-md-4 col-form-label text-md-right">Siglas</label>
                    <div class="col-md-6">
                        <input id="Siglas" type="text"
                            class="form-control @error('Siglas') is-invalid @enderror"
                            name="Siglas"
                            value="{{ old('Siglas')?old('Siglas'):$Miembro->siglas }}" required autocomplete="off" autofocus
                            placeholder="Siglas">

                            @error('Siglas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                </div>
        
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                {{-- Apellido paterno --}}
                <div class="form-group row">
                    <label for="Paterno" class="col-md-4 col-form-label text-md-right">Apellido paterno </label>
                    <div class="col-md-6">
                    <input id="Paterno" type="text"
                        class="form-control @error('Paterno') is-invalid @enderror"
                        name="Paterno"
                        value="{{ old('Paterno')?old('Paterno'):$Miembro->patern }}" required autocomplete="off" autofocus
                        placeholder="Paterno">

                        @error('Paterno')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>    
            </div>

            <div class="col-6">
                {{-- Direccion --}}
                <div class="form-group row">
                    <label for="Direccion" class="col-md-4 col-form-label text-md-right">Direccion</label>
                    <div class="col-md-6">
                    <input id="Direccion" type="text"
                        class="form-control @error('Nombre') is-invalid @enderror"
                        name="Direccion"
                        value="{{ old('Direccion')?old('Direccion'):$Miembro->direcc }}" required autocomplete="off" autofocus
                        placeholder="Direccion">

                        @error('Direccion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>    
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                {{-- Apellido Materno --}}
                <div class="form-group row">
                    <label for="Materno" class="col-md-4 col-form-label text-md-right">Apellido materno</label>
                    <div class="col-md-6">
                        <input id="Materno" type="text"
                            class="form-control @error('Materno') is-invalid @enderror"
                            name="Materno"
                            value="{{ old('Materno')?old('Materno'):$Miembro->matern }}" required autocomplete="off" autofocus
                            placeholder="Materno">

                            @error('Materno')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                </div>
        
            </div>

            <div class="col-6">
                {{-- Distrito --}}
                <div class="form-group row">
                    <label for="Distritos" class="col-md-4 col-form-label text-md-right">Distrito {{ $Miembro->distri }}</label>
                    <div class="col-md-6">
                        <select id="Distritos" name="Distritos" class="form-select" aria-label="Distritos">
                        <option value="">--- Escoger Distrito ---</option>
                        @foreach ($Distritos as $d)
                            <option value="{{ $d->c_codigo }}"  {{ $Miembro->distri==$d->c_codigo?'selected':' ' }} >{{ $d->x_nombre }}</option>
                        @endforeach
                        </select>

                        @error('Distritos')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
    
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                {{-- Congregacion --}}
                <div class="form-group row">
                    <label for="Congrecaciones" class="col-md-4 col-form-label text-md-right">Congregacion </label>
                    <div class="col-md-6">
                        <select id="Congregaciones" name="Congregaciones" class="form-select" aria-label="Congregaciones">
                        <option value="">--- Escoger Congregacion ---</option>
                        @foreach ($Congregaciones as $c)
                            <option value="{{ $c->c_codigo }}"  {{ $Miembro->c_congrega==$c->c_codigo?'selected':' ' }}>{{ $c->x_nombre }}</option>
                        @endforeach
                        </select>

                        @error('Congregaciones')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
    
            </div>
            <div class="col-6">
                {{-- Email --}}
                <div class="form-group row">
                    <label for="Email" class="col-md-4 col-form-label text-md-right">Email</label>
                    <div class="col-md-6">
                    <input id="Email" type="text"
                        class="form-control @error('Email') is-invalid @enderror"
                        name="Email"
                        value="{{ old('Email')?old('Email'):$Miembro->email }}"  autocomplete="off" autofocus
                        placeholder="Email">

                        @error('Email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
    
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                {{-- Telefono --}}
                <div class="form-group row">
                    <label for="Telefono" class="col-md-4 col-form-label text-md-right">Telefono</label>
                    <div class="col-md-6">
                    <input id="Telefono" type="text"
                        class="form-control @error('Telefono') is-invalid @enderror"
                        name="Telefono"
                        value="{{ old('Telefono')?old('Telefono'):$Miembro->telef1 }}" required autocomplete="off" autofocus
                        placeholder="Telefono">

                        @error('Telefono')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
    
            </div>
            <div class="col-6">
                {{-- Fax Celular Wsp --}}
                <div class="form-group row">
                    <label for="Fax" class="col-md-4 col-form-label text-md-right">Celular/Whatsapp</label>
                    <div class="col-md-6">
                    <input id="Fax" type="text"
                        class="form-control @error('Fax') is-invalid @enderror"
                        name="Fax"
                        value="{{ old('Fax')?old('Fax'):$Miembro->telfax }}" autocomplete="off" autofocus
                        placeholder="Celular/Whatsapp">

                        @error('Fax')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>    
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                {{-- Apartado --}}
                <div class="form-group row">
                    <label for="Apartado" class="col-md-4 col-form-label text-md-right">Apartado</label>
                    <div class="col-md-6">
                    <input id="Apartado" type="text"
                        class="form-control @error('Apartado') is-invalid @enderror"
                        name="Apartado"
                        value="{{ old('Apartado')?old('Apartado'):$Miembro->aparta }}" autocomplete="off" autofocus
                        placeholder="Apartado">

                        @error('Apartado')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
    
            </div>
            <div class="col-6">
                {{-- Sexo --}}
                <div class="form-group row">
                    <label for="Sexo" class="col-md-4 col-form-label text-md-right">Sexo</label>
                    <div class="col-md-6">
                        <select id="Sexo" name="Sexo" class="form-select" aria-label="Sexo">
                            <option value="">--- Escoger Sexo ---</option>
                            <option value="M"  {{ $Miembro->sexomf=='M'?'selected':' ' }}>Masculino</option>
                            <option value="F"  {{ $Miembro->sexomf=='F'?'selected':' ' }}>Femenino</option>
                        </select>

                        @error('Sexo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
    
            </div>
        </div>
        <div class="row">
             <div class="col-6">
                {{-- Fecha de Nacimiento --}}
                <div class="form-group row">
                    <label for="FechaNacimiento"
                            class="col-md-4 col-form-label text-md-right">F. Nacimiento </label>

                    <div class="col-md-6">
                        <input id="FechaNacimiento" type="date"
                                class="form-control @error('FechaNacimiento') is-invalid @enderror"
                                name="FechaNacimiento"
                                value="{{ date('Y-m-d', strtotime($Miembro->nacimi)) }}" required autocomplete="off" autofocus>

                        @error('FechaNacimiento')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
    
            </div>      
             <div class="col-6">
                {{-- Fecha de Ordenacion/Profession --}}
                <div class="form-group row">
                    <label for="FechaOrdenacion"
                            class="col-md-4 col-form-label text-md-right">F. Ordenacion</label>

                    <div class="col-md-6">
                        <input id="FechaOrdenacion" type="date"
                                class="form-control @error('FechaOrdenacion') is-invalid @enderror"
                                name="FechaOrdenacion"
                                value="{{ date('Y-m-d', strtotime($Miembro->forden)) }}"  autocomplete="off" autofocus>

                        @error('FechaOrdenacion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>    
            </div>  
        </div>
        <div class="row">
            <div class="col-6">
                {{-- Lugar Nacimiento --}}
                <div class="form-group row">
                    <label for="LugarNacimiento" class="col-md-4 col-form-label text-md-right">Lugar Nacimiento </label>
                    <div class="col-md-6">
                    <input id="LugarNacimiento" type="text"
                        class="form-control @error('LugarNacimiento') is-invalid @enderror"
                        name="LugarNacimiento"
                        value="{{ old('LugarNacimiento')?old('LugarNacimiento'):$Miembro->lugarn }}" autocomplete="off" autofocus
                        placeholder="Lugar Nacimiento">

                        @error('LugarNacimiento')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>    
            </div>

            <div class="col-6">
                {{-- Lugar Ordenacion/Profession --}}
                <div class="form-group row">
                    <label for="LugarOrdenacion" class="col-md-4 col-form-label text-md-right">Lugar Ordenacion </label>
                    <div class="col-md-6">
                    <input id="LugarOrdenacion" type="text"
                        class="form-control @error('LugarOrdenacion') is-invalid @enderror"
                        name="LugarOrdenacion"
                        value="{{ old('LugarOrdenacion')?old('LugarOrdenacion'):$Miembro->lugaro }}" autocomplete="off" autofocus
                        placeholder="Lugar Ordenacion">

                        @error('LugarOrdenacion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>    
            </div>

        </div>
        <div class="row">
            <div class="col-6">
                {{-- Clase --}}
                <div class="form-group row">
                    <label for="Clase" class="col-md-4 col-form-label text-md-right">Clase</label>
                    <div class="col-md-6">
                        <select id="Clase" name="Clase" class="form-select" aria-label="Clase">
                        <option value="">--- Escoger Clase ---</option>
                        @foreach ($Clases as $clase)
                            <option value="{{ $clase->c_codigo }}"  {{ $Miembro->c_clase==$clase->c_codigo?'selected':' ' }}>{{ $clase->x_nombre }}</option>
                        @endforeach
                        </select>

                        @error('Clase')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
    
            </div>
            <div class="col-6">
                {{-- Cargo --}}
                <div class="form-group row">
                    <label for="Cargo" class="col-md-4 col-form-label text-md-right">Cargo</label>
                    <div class="col-md-6">
                        <select id="Cargo" name="Cargo" class="form-select" aria-label="Cargo">
                        <option value="">--- Escoger Cargo ---</option>
                        @foreach ($Cargos as $cargo)
                            <option value="{{ $cargo->c_codigo }}" {{ $Miembro->c_cargo==$cargo->c_codigo?'selected':' ' }}>{{ $cargo->x_nombre }}</option>
                        @endforeach
                        </select>

                        @error('Cargo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
    
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                {{-- Centro Laboral --}}
                <div class="form-group row">
                    <label for="CentroLaboral" class="col-md-4 col-form-label text-md-right">Centro Laboral </label>
                    <div class="col-md-6">
                    <input id="CentroLaboral" type="text"
                        class="form-control @error('CentroLaboral') is-invalid @enderror"
                        name="CentroLaboral"
                        value="{{ old('CentroLaboral')?old('CentroLaboral'):$Miembro->cenlab }}" autocomplete="off" autofocus
                        placeholder="CentroLaboral">

                        @error('CentroLaboral')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>    
    
            </div>
            <div class="col-6">
                {{-- Estudios --}}
                <div class="form-group row">
                    <label for="LugarOrdenacion" class="col-md-4 col-form-label text-md-right">Estudios </label>
                    <div class="col-md-6">
                    <input id="Estudios" type="text"
                        class="form-control @error('Estudios') is-invalid @enderror"
                        name="Estudios"
                        value="{{ old('Estudios')?old('Estudios'):$Miembro->estudi }}" autocomplete="off" autofocus
                        placeholder="Estudios">

                        @error('Estudios')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>    
    
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                {{-- Vicaria --}}
                <div class="form-group row">
                    <label for="Vicarias" class="col-md-4 col-form-label text-md-right">Vicaria</label>
                    <div class="col-md-6">
                        <select id="Vicarias" name="Vicarias" class="form-select" aria-label="Vicarias">
                        <option value="">--- Escoger Vicaria ---</option>
                        @foreach ($Vicarias as $v)
                            <option value="{{ $v->c_codigo }}" {{ $Miembro->c_vicaria==$v->c_codigo?'selected':' ' }}>{{ $v->nvicar }}</option>
                        @endforeach
                        </select>

                        @error('Vicarias')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
    
            </div>
            <div class="col-6">
                {{-- Decanato --}}
                <div class="form-group row">
                    <label for="Decanatos" class="col-md-4 col-form-label text-md-right">Decanato</label>
                    <div class="col-md-6">
                        <select id="Decanatos" name="Decanatos" class="form-select" aria-label="Decanatos">
                        <option value="">--- Escoger Decanato ---</option>
                        @foreach ($Decanatos as $d)
                            <option value="{{ $d->c_codigo }}"  {{ $Miembro->c_decanato==$d->c_codigo?'selected':' ' }}>{{ $d->x_nombre }}: {{ $d->decano }}</option>
                        @endforeach
                        </select>

                        @error('Decanatos')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
    
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                {{-- Observacion --}}
                <div class="form-group row">
                    <label for="Observacion" class="col-md-4 col-form-label text-md-right">Observacion</label>
                    <div class="col-md-6">
                    <textarea id="Observacion" cols=50 rows=5
                        class="form-control @error('Observacion') is-invalid @enderror"
                        name="Observacion" autocomplete="off" autofocus
                        placeholder="Observacion" >{{ old('Observacion')?old('Observacion'):$Miembro->observ }}</textarea>

                        @error('Observacion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>  
    
            </div>
            <div class="col-6">
                {{-- Archivo --}}
                <div class="form-group row">
                    <label for="Archivo" class="col-md-4 col-form-label text-md-right">Archivo</label>
                    <div class="col-md-6">
                    <textarea id="Archivo" cols=50 rows=5
                        class="form-control @error('Archivo') is-invalid @enderror"
                        name="Archivo"  autocomplete="off" autofocus
                        placeholder="Archivo">{{ old('Archivo')?old('Archivo'):$Miembro->archiv }}</textarea>

                        @error('Archivo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>  
    
            </div>
        </div>


        <div class="row">
            <div class="col-6">
                {{-- Desactivado --}}
                <div class="form-group row">
                    <label for="Desactivado" class="col-md-4 col-form-label text-md-right">Desactivado</label>
                    <div class="col-md-8">
                        <select id="Desactivado" name="Desactivado" class="form-select" aria-label="Desactivado">
                            <option value="1" {{ $Miembro->i_desactivada==1?'Selected':'' }}>Si</option>
                            <option value="0" {{ $Miembro->i_desactivada==0?'Selected':'' }}>No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-6">
                {{-- Fecha de Desactivacion --}}
                <div class="form-group row">
                    <label for="FechaDesactivacion"
                            class="col-md-4 col-form-label text-md-right">Fecha de Desactivaci&oacute;n</label>
                    <div class="col-md-8">
                        <input id="FechaDesactivacion" type="date"
                                class="form-control @error('FechaDesactivacion') is-invalid @enderror"
                                name="FechaDesactivacion"
                                value="{{ old('FechaDesactivacion')?old('FechaDesactivacion'):date('Y-m-d', strtotime($Miembro->d_desactivada)) }}" required autocomplete="off" autofocus>

                        @error('FechaDesactivacion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
    
            </div>
        </div>
 
        <div class="row">
            <div class="col-6">
                {{-- Ausente --}}
                <div class="form-group row">
                    <label for="Ausente" class="col-md-4 col-form-label text-md-right">Ausente</label>
                    <div class="col-md-8">
                        <select id="Ausente" name="Ausente" class="form-select" aria-label="Ausente">
                            <option value="1" {{ $Miembro->i_ausente==1?'Selected':'' }}>Si</option>
                            <option value="0" {{ $Miembro->i_ausente==0?'Selected':'' }}>No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-6">
                {{-- Fecha de Ausente --}}
                <div class="form-group row">
                    <label for="FechaAusente"
                            class="col-md-4 col-form-label text-md-right">Fecha de Ausente</label>
                    <div class="col-md-8">
                        <input id="FechaAusente" type="date"
                                class="form-control @error('FechaAusente') is-invalid @enderror"
                                name="FechaAusente"
                                value="{{ old('FechaAusente')?old('FechaAusente'):date('Y-m-d', strtotime($Miembro->d_ausente)) }}" required autocomplete="off" autofocus>

                        @error('FechaAusente')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
    
            </div>
        </div>
         
        <div class="row">
            <div class="col-6">
                {{-- Fallecido --}}
                <div class="form-group row">
                    <label for="Fallecido" class="col-md-4 col-form-label text-md-right">Fallecido</label>
                    <div class="col-md-8">
                        <select id="Fallecido" name="Fallecido" class="form-select" aria-label="Fallecido">
                            <option value="1" {{ $Miembro->i_fallecido==1?'Selected':'' }}>Si</option>
                            <option value="0" {{ $Miembro->i_fallecido==0?'Selected':'' }}>No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-6">
                {{-- Fecha de Fallecido --}}
                <div class="form-group row">
                    <label for="FechaFallecido"
                            class="col-md-4 col-form-label text-md-right">Fecha de Fallecido</label>
                    <div class="col-md-8">
                        <input id="FechaFallecido" type="date"
                                class="form-control @error('FechaFallecido') is-invalid @enderror"
                                name="FechaFallecido"
                                value="{{ old('FechaFallecido')?old('FechaFallecido'):date('Y-m-d', strtotime($Miembro->d_fallecido)) }}" required autocomplete="off" autofocus>

                        @error('FechaFallecido')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
    
            </div>
        </div>
         
        <div class="row">
            <div class="col-6">
                {{-- Retirado --}}
                <div class="form-group row">
                    <label for="Retirado" class="col-md-4 col-form-label text-md-right">Retirado</label>
                    <div class="col-md-8">
                        <select id="Retirado" name="Retirado" class="form-select" aria-label="Retirado">
                            <option value="1" {{ $Miembro->i_retirado==1?'Selected':'' }}>Si</option>
                            <option value="0" {{ $Miembro->i_retirado==0?'Selected':'' }}>No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-6">
                {{-- Fecha de Retirado --}}
                <div class="form-group row">
                    <label for="FechaRetirado"
                            class="col-md-4 col-form-label text-md-right">Fecha de Retirado</label>
                    <div class="col-md-8">
                        <input id="FechaRetirado" type="date"
                                class="form-control @error('FechaRetirado') is-invalid @enderror"
                                name="FechaRetirado"
                                value="{{ old('FechaRetirado')?old('FechaRetirado'):date('Y-m-d', strtotime($Miembro->d_retirado)) }}" required autocomplete="off" autofocus>

                        @error('FechaRetirado')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
    
            </div>
        </div>
         
        <div class="row">
            <div class="col-6">
                {{-- Incardi --}}
                <div class="form-group row">
                    <label for="Incardi" class="col-md-4 col-form-label text-md-right">Incardinado</label>
                    <div class="col-md-8">
                        <select id="Incardi" name="Incardi" class="form-select" aria-label="Incardi">
                            <option value="1" {{ $Miembro->i_incardi==1?'Selected':'' }}>Si</option>
                            <option value="0" {{ $Miembro->i_incardi==0?'Selected':'' }}>No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-6">
                {{-- Fecha de Incardi --}}
                <div class="form-group row">
                    <label for="FechaIncardi"
                            class="col-md-4 col-form-label text-md-right">Fecha de Incardinacion</label>
                    <div class="col-md-8">
                        <input id="FechaIncardi" type="date"
                                class="form-control @error('FechaIncardi') is-invalid @enderror"
                                name="FechaRetirado"
                                value="{{ old('FechaIncardi')?old('FechaIncardi'):date('Y-m-d', strtotime($Miembro->d_incardi)) }}" required autocomplete="off" autofocus>

                        @error('FechaIncardi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
    
            </div>
        </div>
         
        <div class="row">
            <div class="col-6">
                {{-- Excardi --}}
                <div class="form-group row">
                    <label for="Excardi" class="col-md-4 col-form-label text-md-right">Excardinado</label>
                    <div class="col-md-8">
                        <select id="Excardi" name="Excardi" class="form-select" aria-label="Excardi">
                            <option value="1" {{ $Miembro->i_excardi==1?'Selected':'' }}>Si</option>
                            <option value="0" {{ $Miembro->i_excardi==0?'Selected':'' }}>No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-6">
                {{-- Fecha de Excardi --}}
                <div class="form-group row">
                    <label for="FechaExcardi"
                            class="col-md-4 col-form-label text-md-right">Fecha de Excardinacion</label>
                    <div class="col-md-8">
                        <input id="FechaExcardi" type="date"
                                class="form-control @error('FechaExcardi') is-invalid @enderror"
                                name="FechaExcardi"
                                value="{{ old('FechaExcardi')?old('FechaExcardi'):date('Y-m-d', strtotime($Miembro->d_excardi)) }}" required autocomplete="off" autofocus>

                        @error('FechaExcardi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
    
            </div>
        </div>

        <div class="row">
            <div class="col-6">
            {{-- Excardinacion --}}
                <div class="form-group row">
                    <label for="Excardinacion" class="col-md-4 col-form-label text-md-right">Excardinacion </label>
                    <div class="col-md-6">
                    <input id="Excardinacion" type="text"
                        class="form-control @error('Excardinacion') is-invalid @enderror"
                        name="Excardinacion"
                        value="{{ old('Excardinacion')?old('Excardinacion'):$Miembro->x_excardi }}"  autocomplete="off" autofocus
                        placeholder="Excardinacion">

                        @error('Excardinacion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>  
    
            </div>
            <div class="col-6">

    
            </div>
        </div>

      </div>
      <div class="card-header float-end">
      <button class="btn btn-outline-primary" type="submit">Grabar</button>
      </div>
    </div>

  </form>


@endsection