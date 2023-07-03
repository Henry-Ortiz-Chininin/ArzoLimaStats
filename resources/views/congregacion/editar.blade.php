@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-10">
      <h3>Congregacion - {{ $Congregacion->x_nombre }} </h3>
    </div>
    <div class="col-2 align-middle">
      <span class="badge bg-secondary">{{ date('Y-m-d', strtotime($Congregacion->d_suscrip)) }}</span>
    </div> 
  </div>


  <!-- Tabs navs -->
  <ul class="nav nav-tabs nav-fill mb-3" id="ex1" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="tabParroquia" data-mdb-toggle="tab" 
      href="{{ route('congregacion.editar',$Congregacion->c_codigo) }}" role="tab" aria-controls="tabParroquia" aria-selected="true">Congregacion - Info</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="tabCasas" data-mdb-toggle="tab" 
      href="{{ route('casas.congregacion',$Congregacion->c_codigo) }}" role="tab" aria-controls="tabCasas" aria-selected="true">Casas</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="tabReligion" data-mdb-toggle="tab" 
      href="{{ route('religion.congregacion',$Congregacion->c_codigo) }}" role="tab" aria-controls="tabReligion" aria-selected="true">Religion</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="tabColegios" data-mdb-toggle="tab" 
      href="{{ route('colegios.congregacion',$Congregacion->c_codigo) }}" role="tab" aria-controls="tabColegios" aria-selected="true">Colegios</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="tabObras" data-mdb-toggle="tab" 
      href="{{ route('obras.congregacion',$Congregacion->c_codigo) }}" role="tab" aria-controls="tabObras" aria-selected="true">Obras</a>
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
  <form method="POST" action="{{ route('congregacion.editar', $codigo) }}">
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
                        value="{{ old('Nombre')?old('Nombre'):$Congregacion->x_nombre }}" 
                        required autocomplete="off" autofocus
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
                    <label for="siglas" class="col-md-4 col-form-label text-md-right">Siglas</label>
                    <div class="col-md-6">
                        <input id="siglas" type="text"
                            class="form-control @error('siglas') is-invalid @enderror"
                            name="siglas"
                            value="{{ old('siglas')?old('siglas'):$Congregacion->siglas }}" 
                            required autocomplete="off" autofocus
                            placeholder="Siglas">

                            @error('siglas')
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
                    <label for="emailcon" class="col-md-4 col-form-label text-md-right">Email Congregacion</label>
                    <div class="col-md-6">
                    <input id="emailcon" type="text"
                        class="form-control @error('emailcon') is-invalid @enderror"
                        name="emailcon"
                        value="{{ old('emailcon')?old('emailcon'):$Congregacion->emailcon }}" 
                        required autocomplete="off" autofocus
                        placeholder="Email Congregacion">

                        @error('emailcon')
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
                        if($v->c_codigo==$Congregacion->c_vicaria)
                        {
                          <option selected value="{{ $v->c_codigo }}" />{{ $v->x_nombre }}</option>
                        }
                        else{
                          <option value="{{ $v->c_codigo }}" />{{ $v->x_nombre }}</option>
                        }
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
                    <label for="derech" class="col-md-4 col-form-label text-md-right">Derecho</label>
                    <div class="col-md-6">
                    <input id="derech" type="text"
                        class="form-control @error('derech') is-invalid @enderror"
                        name="derech"
                        value="{{ old('derech')?old('derech'):$Congregacion->derech }}" 
                        autocomplete="off" autofocus
                        placeholder="derech">

                        @error('derech')
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
                    <label for="carism" class="col-md-4 col-form-label text-md-right">Carisma </label>
                    <div class="col-md-6">
                    <input id="carism" type="text"
                        class="form-control @error('carism') is-invalid @enderror"
                        name="carism"
                        value="{{ old('carism')?old('carism'):$Congregacion->carism }}" 
                        autocomplete="off" autofocus
                        placeholder="carism">

                        @error('carism')
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
                    <label for="fundad" class="col-md-4 col-form-label text-md-right">Fundacion</label>
                    <div class="col-md-6">
                    <input id="fundad" type="text"
                        class="form-control @error('fundad') is-invalid @enderror"
                        name="fundad"
                        value="{{ old('fundad')?old('fundad'):$Congregacion->fundad }}" 
                        autocomplete="off" autofocus
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
                    <label for="lugarf" class="col-md-4 col-form-label text-md-right">Lugar Fundacion</label>
                    <div class="col-md-6">
                    <input id="lugarf" type="text"
                        class="form-control @error('lugarf') is-invalid @enderror"
                        name="lugarf"
                        value="{{ old('lugarf')?old('lugarf'):$Congregacion->lugarf }}" 
                        required autocomplete="off" autofocus
                        placeholder="Lugar Fundacion">

                        @error('lugarf')
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
                    <label for="fundac"
                            class="col-md-4 col-form-label text-md-right">Fecha de Fundacion</label>

                    <div class="col-md-6">
                        <input id="fundac" type="date"
                                class="form-control @error('fundac') is-invalid @enderror"
                                name="fundac" 
                                value="{{ date('Y-m-d', strtotime($Congregacion->fundac)) }}" 
                                required autocomplete="off" autofocus>

                        @error('fundac')
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
                    <label for="nomgen" class="col-md-4 col-form-label text-md-right">Nombre</label>
                    <div class="col-md-6">
                    <input id="nomgen" type="text"
                        class="form-control @error('nomgen') is-invalid @enderror"
                        name="nomgen"
                        value="{{ old('nomgen')?old('nomgen'):$Congregacion->nomgen }}" 
                        required autocomplete="off" autofocus
                        placeholder="Nombre">

                        @error('nomgen')
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
                    <label for="nomnac" class="col-md-4 col-form-label text-md-right">Nombre</label>
                    <div class="col-md-6">
                    <input id="nomnac" type="text"
                        class="form-control @error('nomnac') is-invalid @enderror"
                        name="nomnac"
                        value="{{ old('nomnac')?old('nomnac'):$Congregacion->nomnac }}" 
                        required autocomplete="off" autofocus
                        placeholder="Nombre">

                        @error('nomnac')
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
                    <label for="dirgen" class="col-md-4 col-form-label text-md-right">Direccion</label>
                    <div class="col-md-6">
                    <input id="dirgen" type="text"
                        class="form-control @error('dirgen') is-invalid @enderror"
                        name="dirgen"
                        value="{{ old('dirgen')?old('dirgen'):$Congregacion->dirgen }}" 
                        required autocomplete="off" autofocus
                        placeholder="Direccion">

                        @error('dirgen')
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
                    <label for="dirnac" class="col-md-4 col-form-label text-md-right">Direccion </label>
                    <div class="col-md-6">
                        <input id="dirnac" type="text"
                            class="form-control @error('Nombre') is-invalid @enderror"
                            name="dirnac"
                            value="{{ old('dirnac')?old('dirnac'):$Congregacion->dirnac }}" 
                            required autocomplete="off" autofocus
                            placeholder="Direccion ">

                            @error('dirnac')
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
                    <label for="emailgen" class="col-md-4 col-form-label text-md-right">Email</label>
                    <div class="col-md-6">
                    <input id="emailgen" type="text"
                        class="form-control @error('emailgen') is-invalid @enderror"
                        name="emailgen"
                        value="{{ old('emailgen')?old('emailgen'):$Congregacion->emailgen }}" 
                        required autocomplete="off" autofocus
                        placeholder="Email">

                        @error('emailgen')
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
                    <label for="emailnac" class="col-md-4 col-form-label text-md-right">Email </label>
                    <div class="col-md-6">
                    <input id="emailnac" type="text"
                        class="form-control @error('Email') is-invalid @enderror"
                        name="emailnac"
                        value="{{ old('emailnac')?old('emailnac'):$Congregacion->emailnac }}" 
                        required autocomplete="off" autofocus
                        placeholder="Email ">

                        @error('emailnac')
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
                    <label for="telgen" class="col-md-4 col-form-label text-md-right">Telefono </label>
                    <div class="col-md-6">
                    <input id="telgen" type="text"
                        class="form-control @error('telgen') is-invalid @enderror"
                        name="telgen"
                        value="{{ old('telgen')?old('telgen'):$Congregacion->telgen }}" 
                        required autocomplete="off" autofocus
                        placeholder="Telefono">

                        @error('telgen')
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
                    <label for="telnac" class="col-md-4 col-form-label text-md-right">Telefono  </label>
                    <div class="col-md-6">
                    <input id="telnac" type="text"
                        class="form-control @error('telnac') is-invalid @enderror"
                        name="telnac"
                        value="{{ old('telnac')?old('telnac'):$Congregacion->telnac }}" 
                        autocomplete="off" autofocus
                        placeholder="Telefono">

                        @error('telnac')
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
                    <label for="faxgen" class="col-md-4 col-form-label text-md-right">Celular/Whatsapp</label>
                    <div class="col-md-6">
                    <input id="faxgen" type="text"
                        class="form-control @error('faxgen') is-invalid @enderror"
                        name="faxgen"
                        value="{{ old('faxgen')?old('faxgen'):$Congregacion->faxgen }}" 
                        autocomplete="off" autofocus
                        placeholder="Celular/Whatsapp">

                        @error('faxgen')
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
                    <label for="faxnac" class="col-md-4 col-form-label text-md-right">Celular/Whatsapp </label>
                    <div class="col-md-6">
                    <input id="faxnac" type="text"
                        class="form-control @error('faxnac') is-invalid @enderror"
                        name="faxnac"
                        value="{{ old('faxnac')?old('faxnac'):$Congregacion->faxnac }}" 
                        autocomplete="off" autofocus
                        placeholder="Celular/Whatsapp">

                        @error('faxnac')
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
                    <label for="apagen" class="col-md-4 col-form-label text-md-right">Apartado </label>
                    <div class="col-md-6">
                    <input id="apagen" type="text"
                        class="form-control @error('apagen') is-invalid @enderror"
                        name="apagen"
                        value="{{ old('apagen')?old('apagen'):$Congregacion->apagen }}" 
                        autocomplete="off" autofocus
                        placeholder="Apartado">

                        @error('apagen')
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
                    <label for="apanac" class="col-md-4 col-form-label text-md-right">Apartado </label>
                    <div class="col-md-6">
                    <input id="apanac" type="text"
                        class="form-control @error('apanac') is-invalid @enderror"
                        name="apanac"
                        value="{{ old('apanac')?old('apanac'):$Congregacion->apanac }}" 
                        autocomplete="off" autofocus
                        placeholder="Apartado">

                        @error('apanac')
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
                                value="{{ date('Y-m-d', strtotime($Congregacion->fecfun)) }}" 

                                required autocomplete="off" autofocus>

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
                                value="{{ date('Y-m-d', strtotime($Congregacion->desgen)) }}" 
                                required autocomplete="off" autofocus>

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
                                value="{{ date('Y-m-d', strtotime($Congregacion->desnac)) }}" 
                                required autocomplete="off" autofocus>

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
                                value="{{ date('Y-m-d', strtotime($Congregacion->hasgen)) }}" 
                                required autocomplete="off" autofocus>

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
                                value="{{ date('Y-m-d', strtotime($Congregacion->hasnac)) }}" 
                                required autocomplete="off" autofocus>

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

</div>



@endsection