@extends('layouts.app')

@section('content')

<h3>Miembro - Nuevo</h3>
<div class="container">

  @if($errors->any())
      <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Hubo problemas con la validacion de datos, verificar.</strong>
          @if(env('APP_DEBUG'))
              <strong>{{$errors->first()}}</strong>
          @endif
      </div>
  @endif
  <form method="POST" action="{{ route('miembro.nuevo') }}">
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
                        value="{{ old('Nombre') }}" required autocomplete="off" autofocus
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
                            value="{{ old('Siglas') }}" required autocomplete="off" autofocus
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
                        value="{{ old('Paterno') }}" required autocomplete="off" autofocus
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
                        value="{{ old('Direccion') }}" required autocomplete="off" autofocus
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
                            value="{{ old('Materno') }}" required autocomplete="off" autofocus
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
                    <label for="Distritos" class="col-md-4 col-form-label text-md-right">Distrito</label>
                    <div class="col-md-6">
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
    
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                {{-- Congregacion --}}
                <div class="form-group row">
                    <label for="Congrecaciones" class="col-md-4 col-form-label text-md-right">Congregacion</label>
                    <div class="col-md-6">
                        <select id="Congregaciones" name="Congregaciones" class="form-select" aria-label="Congregaciones">
                        <option value="">--- Escoger Congregacion ---</option>
                        @foreach ($Congregaciones as $c)
                            <option value="{{ $c->c_codigo }}" />{{ $c->x_nombre }}</option>
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
                        value="{{ old('Email') }}" required autocomplete="off" autofocus
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
                        value="{{ old('Telefono') }}" required autocomplete="off" autofocus
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
                        value="{{ old('Fax') }}" autocomplete="off" autofocus
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
                        value="{{ old('Apartado') }}" autocomplete="off" autofocus
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
                            <option value="M" />Masculino</option>
                            <option value="F" />Femenino</option>
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
                            class="col-md-4 col-form-label text-md-right">F. Nacimiento</label>

                    <div class="col-md-6">
                        <input id="FechaNacimiento" type="date"
                                class="form-control @error('FechaNacimiento') is-invalid @enderror"
                                name="FechaNacimiento"
                                value="{{ old('FechaNacimiento') }}" required autocomplete="off" autofocus>

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
                                value="{{ old('FechaOrdenacion') }}" required autocomplete="off" autofocus>

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
                        value="{{ old('LugarNacimiento') }}" required autocomplete="off" autofocus
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
                        value="{{ old('LugarOrdenacion') }}" required autocomplete="off" autofocus
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
                            <option value="{{ $clase->c_codigo }}" />{{ $clase->x_nombre }}</option>
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
                        <option value="">--- Escoger Clase ---</option>
                        @foreach ($Cargos as $cargo)
                            <option value="{{ $cargo->c_codigo }}" />{{ $cargo->x_nombre }}</option>
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
                        value="{{ old('CentroLaboral') }}" required autocomplete="off" autofocus
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
                        value="{{ old('Estudios') }}" required autocomplete="off" autofocus
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
                            <option value="{{ $v->c_codigo }}" />{{ $v->nvicar }}</option>
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
                            <option value="{{ $d->c_codigo }}" />{{ $d->x_nombre }}: {{ $d->decano }}</option>
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