@extends('layouts.app')

@section('content')

<h3>Congregacion - Nuevo</h3>
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
  <form method="POST" action="{{ route('congregacion.nuevo') }}">
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
                {{-- Email Congregacion--}}
                <div class="form-group row">
                    <label for="EmailCongregacion" class="col-md-4 col-form-label text-md-right">Email Congregacion</label>
                    <div class="col-md-6">
                    <input id="EmailCongregacion" type="text"
                        class="form-control @error('EmailCongregacion') is-invalid @enderror"
                        name="EmailCongregacion"
                        value="{{ old('EmailCongregacion') }}" required autocomplete="off" autofocus
                        placeholder="Email Congregacion">

                        @error('EmailCongregacion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
    
            </div>
            <div class="col-6">
                {{-- Vicaria --}}
                <div class="form-group row">
                    <label for="Vicarias" class="col-md-4 col-form-label text-md-right">Vicaria</label>
                    <div class="col-md-6">
                        <select id="Vicarias" name="Vicarias" class="form-select" aria-label="Vicarias">
                        <option value="">--- Escoger Vicaria ---</option>
                        @foreach ($Vicarias as $v)
                            <option value="{{ $v->c_codigo }}" />{{ $v->x_nombre }}</option>
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
        </div>
        <div class="row">
            <div class="col-6">
            {{-- Derecho--}}
                <div class="form-group row">
                    <label for="Derecho" class="col-md-4 col-form-label text-md-right">Derecho</label>
                    <div class="col-md-6">
                    <input id="Derecho" type="text"
                        class="form-control @error('Derecho') is-invalid @enderror"
                        name="Derecho"
                        value="{{ old('Derecho') }}" autocomplete="off" autofocus
                        placeholder="Derecho">

                        @error('Derecho')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
    
            </div>
            <div class="col-6">
                {{-- Carisma --}}
                <div class="form-group row">
                    <label for="Carisma" class="col-md-4 col-form-label text-md-right">Carisma </label>
                    <div class="col-md-6">
                    <input id="Carisma" type="text"
                        class="form-control @error('Carisma') is-invalid @enderror"
                        name="Carisma"
                        value="{{ old('Carisma') }}" autocomplete="off" autofocus
                        placeholder="Carisma">

                        @error('Carisma')
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
                {{-- fundad --}}
                <div class="form-group row">
                    <label for="Apartado" class="col-md-4 col-form-label text-md-right">Fundacion</label>
                    <div class="col-md-6">
                    <input id="fundad" type="text"
                        class="form-control @error('fundad') is-invalid @enderror"
                        name="fundad"
                        value="{{ old('fundad') }}" autocomplete="off" autofocus
                        placeholder="Descripcion">

                        @error('fundad')
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
        <div class="row">
            <div class="col-6">
                {{-- Lugar Funcacion --}}
                <div class="form-group row">
                    <label for="LugarFundacion" class="col-md-4 col-form-label text-md-right">Lugar Fundacion</label>
                    <div class="col-md-6">
                    <input id="LugarFundacion" type="text"
                        class="form-control @error('LugarFundacion') is-invalid @enderror"
                        name="LugarFundacion"
                        value="{{ old('LugarFundacion') }}" required autocomplete="off" autofocus
                        placeholder="Lugar Fundacion">

                        @error('LugarFundacion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
    
            </div>
            <div class="col-6">
                {{-- Fecha de fundac --}}
                <div class="form-group row">
                    <label for="Fechafundac"
                            class="col-md-4 col-form-label text-md-right">Fecha de Fundacion</label>

                    <div class="col-md-6">
                        <input id="Fechafundac" type="date"
                                class="form-control @error('Fechafundac') is-invalid @enderror"
                                name="Fechafundac"
                                value="{{ old('Fechafundac') }}" required autocomplete="off" autofocus>

                        @error('Fechafundac')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>



        <hr />

        <div class="row">
            <div class="col-6">
                <h4>NIVEL ARQUIDIOCESIS</h4>    
            </div>
            <div class="col-6">
                <h4>SUPERIOR NACIONAL (Provincial o Regional)</h4>            
            </div>
        </div>    

        <div class="row">
            <div class="col-6">
                {{-- Nombre General --}}
                <div class="form-group row">
                    <label for="NombreGeneral" class="col-md-4 col-form-label text-md-right">Nombre</label>
                    <div class="col-md-6">
                    <input id="NombreGeneral" type="text"
                        class="form-control @error('NombreGeneral') is-invalid @enderror"
                        name="NombreGeneral"
                        value="{{ old('NombreGeneral') }}" required autocomplete="off" autofocus
                        placeholder="Nombre">

                        @error('NombreGeneral')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
    
            </div>
            <div class="col-6">
                {{-- Nombre Nacional --}}
                <div class="form-group row">
                    <label for="NombreNacional" class="col-md-4 col-form-label text-md-right">Nombre</label>
                    <div class="col-md-6">
                    <input id="NombreNacional" type="text"
                        class="form-control @error('NombreNacional') is-invalid @enderror"
                        name="NombreNacional"
                        value="{{ old('NombreNacional') }}" required autocomplete="off" autofocus
                        placeholder="Nombre">

                        @error('NombreNacional')
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
                {{-- DireccionGeneral --}}
                <div class="form-group row">
                    <label for="DireccionGeneral" class="col-md-4 col-form-label text-md-right">Direccion</label>
                    <div class="col-md-6">
                    <input id="DireccionGeneral" type="text"
                        class="form-control @error('DireccionGeneral') is-invalid @enderror"
                        name="DireccionGeneral"
                        value="{{ old('DireccionGeneral') }}" required autocomplete="off" autofocus
                        placeholder="Direccion">

                        @error('DireccionGeneral')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
    
            </div>
            <div class="col-6">
                {{-- Direccion Nacional --}}
                <div class="form-group row">
                    <label for="DireccionNacional" class="col-md-4 col-form-label text-md-right">Direccion </label>
                    <div class="col-md-6">
                        <input id="DireccionNacional" type="text"
                            class="form-control @error('Nombre') is-invalid @enderror"
                            name="DireccionNacional"
                            value="{{ old('DireccionNacional') }}" required autocomplete="off" autofocus
                            placeholder="Direccion ">

                            @error('DireccionNacional')
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
                {{-- Email General--}}
                <div class="form-group row">
                    <label for="EmailGeneral" class="col-md-4 col-form-label text-md-right">Email</label>
                    <div class="col-md-6">
                    <input id="EmailGeneral" type="text"
                        class="form-control @error('EmailGeneral') is-invalid @enderror"
                        name="EmailGeneral"
                        value="{{ old('EmailGeneral') }}" required autocomplete="off" autofocus
                        placeholder="Email">

                        @error('EmailGeneral')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>    
            </div>
            <div class="col-6">
                {{-- Email Nacional--}}
                <div class="form-group row">
                    <label for="EmailNacional" class="col-md-4 col-form-label text-md-right">Email </label>
                    <div class="col-md-6">
                    <input id="EmailNacional" type="text"
                        class="form-control @error('Email') is-invalid @enderror"
                        name="EmailNacional"
                        value="{{ old('EmailNacional') }}" required autocomplete="off" autofocus
                        placeholder="Email ">

                        @error('EmailNacional')
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
                {{-- TelefonoGeneral --}}
                <div class="form-group row">
                    <label for="TelefonoGeneral" class="col-md-4 col-form-label text-md-right">Telefono </label>
                    <div class="col-md-6">
                    <input id="TelefonoGeneral" type="text"
                        class="form-control @error('TelefonoGeneral') is-invalid @enderror"
                        name="TelefonoGeneral"
                        value="{{ old('TelefonoGeneral') }}" required autocomplete="off" autofocus
                        placeholder="Telefono">

                        @error('TelefonoGeneral')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
    
            </div>
            <div class="col-6">
                {{-- TelefonoNacional --}}
                <div class="form-group row">
                    <label for="TelefonoNacional" class="col-md-4 col-form-label text-md-right">Telefono  </label>
                    <div class="col-md-6">
                    <input id="TelefonoNacional" type="text"
                        class="form-control @error('TelefonoNacional') is-invalid @enderror"
                        name="TelefonoNacional"
                        value="{{ old('TelefonoNacional') }}" autocomplete="off" autofocus
                        placeholder="Telefono">

                        @error('TelefonoNacional')
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
                {{-- Fax Celular Wsp General --}}
                <div class="form-group row">
                    <label for="FaxGeneral" class="col-md-4 col-form-label text-md-right">Celular/Whatsapp</label>
                    <div class="col-md-6">
                    <input id="FaxGeneral" type="text"
                        class="form-control @error('FaxGeneral') is-invalid @enderror"
                        name="FaxGeneral"
                        value="{{ old('FaxGeneral') }}" autocomplete="off" autofocus
                        placeholder="Celular/Whatsapp">

                        @error('FaxGeneral')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
    
            </div>
            <div class="col-6">
                {{-- Fax Celular Wsp Nacional--}}
                <div class="form-group row">
                    <label for="FaxNacional" class="col-md-4 col-form-label text-md-right">Celular/Whatsapp </label>
                    <div class="col-md-6">
                    <input id="FaxNacional" type="text"
                        class="form-control @error('FaxNacional') is-invalid @enderror"
                        name="FaxNacional"
                        value="{{ old('FaxNacional') }}" autocomplete="off" autofocus
                        placeholder="Celular/Whatsapp">

                        @error('FaxNacional')
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
                {{-- APA General --}}
                <div class="form-group row">
                    <label for="APAGeneral" class="col-md-4 col-form-label text-md-right">Apartado </label>
                    <div class="col-md-6">
                    <input id="APAGeneral" type="text"
                        class="form-control @error('APAGeneral') is-invalid @enderror"
                        name="APAGeneral"
                        value="{{ old('APAGeneral') }}" required autocomplete="off" autofocus
                        placeholder="Apartado">

                        @error('APAGeneral')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
    
            </div>
            <div class="col-6">
                {{-- APA Nacional --}}
                <div class="form-group row">
                    <label for="APANacional" class="col-md-4 col-form-label text-md-right">Apartado </label>
                    <div class="col-md-6">
                    <input id="APANacional" type="text"
                        class="form-control @error('APANacional') is-invalid @enderror"
                        name="APANacional"
                        value="{{ old('APANacional') }}" required autocomplete="off" autofocus
                        placeholder="Apartado">

                        @error('APANacional')
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
                {{-- Fecha de fundac --}}
                <div class="form-group row">
                    <label for="fecfun"
                            class="col-md-4 col-form-label text-md-right">Fundacion</label>

                    <div class="col-md-6">
                        <input id="fecfun" type="date"
                                class="form-control @error('fecfun') is-invalid @enderror"
                                name="fecfun"
                                value="{{ old('fecfun') }}" required autocomplete="off" autofocus>

                        @error('fecfun')
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

        <div class="row">
            <div class="col-6">
                {{-- Fecha desde General--}}
                <div class="form-group row">
                    <label for="desgen"
                            class="col-md-4 col-form-label text-md-right">Desde</label>

                    <div class="col-md-6">
                        <input id="desgen" type="date"
                                class="form-control @error('desgen') is-invalid @enderror"
                                name="desgen"
                                value="{{ old('desgen') }}" required autocomplete="off" autofocus>

                        @error('desgen')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
    
            </div>
            <div class="col-6">
                {{-- Fecha desde Nacional --}}
                <div class="form-group row">
                    <label for="desnac"
                            class="col-md-4 col-form-label text-md-right">Desde</label>

                    <div class="col-md-6">
                        <input id="desnac" type="date"
                                class="form-control @error('desnac') is-invalid @enderror"
                                name="desnac"
                                value="{{ old('desnac') }}" required autocomplete="off" autofocus>

                        @error('desnac')
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
                {{-- Fecha hasta General--}}
                <div class="form-group row">
                    <label for="hasgen"
                            class="col-md-4 col-form-label text-md-right">Hasta</label>

                    <div class="col-md-6">
                        <input id="hasgen" type="date"
                                class="form-control @error('hasgen') is-invalid @enderror"
                                name="hasgen"
                                value="{{ old('hasgen') }}" required autocomplete="off" autofocus>

                        @error('hasgen')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
    
            </div>
            <div class="col-6">
                {{-- Fecha hasta Nacional --}}
                <div class="form-group row">
                    <label for="hasnac"
                            class="col-md-4 col-form-label text-md-right">Hasta</label>

                    <div class="col-md-6">
                        <input id="hasnac" type="date"
                                class="form-control @error('hasnac') is-invalid @enderror"
                                name="hasnac"
                                value="{{ old('hasnac') }}" required autocomplete="off" autofocus>

                        @error('hasnac')
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