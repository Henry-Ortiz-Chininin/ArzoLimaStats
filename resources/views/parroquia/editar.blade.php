@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-10">
      <h3>Parroquia - {{ $Parroquia->x_nombre }} </h3>
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



  @if($errors->any())
      <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Hubo problemas con la validacion de datos, verificar.</strong>
          @if(env('APP_DEBUG'))
              <strong>{{$errors->first()}}</strong>
          @endif
      </div>
  @endif
  <form method="POST" action="{{ route('parroquia.editar', $codigo) }}">
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
                    value="{{ $Parroquia->x_nombre }}" required autocomplete="off" autofocus
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
                    value="{{ $Parroquia->siglas }}" required autocomplete="off" autofocus
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
            {{-- Direccion --}}
            <div class="form-group row">
                <label for="Direccion" class="col-md-4 col-form-label text-md-right">Direccion</label>
                <div class="col-md-6">
                  <input id="Direccion" type="text"
                    class="form-control @error('Nombre') is-invalid @enderror"
                    name="Direccion"
                    value="{{ $Parroquia->x_direcc }}" required autocomplete="off" autofocus
                    placeholder="Direccion">

                    @error('Direccion')
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
                      @foreach ($Distritos as $d)
                        if($d->c_codigo==$Parroquia->distri)
                        {
                          <option selected value="{{ $d->c_codigo }}"  />{{ $d->x_nombre }}</option>
                        }
                        else{
                          <option value="{{ $d->c_codigo }}"  />{{ $d->x_nombre }}</option>
                        }
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
            {{-- Direccion Postal --}}
            <div class="form-group row">
                <label for="DireccionPostal" class="col-md-4 col-form-label text-md-right">Direccion Postal</label>
                <div class="col-md-6">
                  <input id="DireccionPostal" type="text"
                    class="form-control @error('DireccionPostal') is-invalid @enderror"
                    name="DireccionPostal"
                    value="{{ $Parroquia->dirpos }}" autocomplete="off" autofocus
                    placeholder="Direccion Postal">

                    @error('DireccionPostal')
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
                    value="{{ $Parroquia->x_email }}" required autocomplete="off" autofocus
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
                    value="{{ $Parroquia->telef1 }}" required autocomplete="off" autofocus
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
            {{-- CElular WSP --}}
            <div class="form-group row">
                <label for="Fax" class="col-md-4 col-form-label text-md-right">Celular/Whatsapp</label>
                <div class="col-md-6">
                  <input id="Fax" type="text"
                    class="form-control @error('Fax') is-invalid @enderror"
                    name="Fax"
                    value="{{ $Parroquia->telfax }}" required autocomplete="off" autofocus
                    placeholder="Fax">

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
                    value="{{ $Parroquia->aparta }}" autocomplete="off" autofocus
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
            {{-- Fecha de Ereccion --}}
            <div class="form-group row">
                <label for="FechaEreccion"
                        class="col-md-4 col-form-label text-md-right">Fecha de Ereccion</label>

                <div class="col-md-6">
                    <input id="FechaEreccion" type="date"
                            class="form-control @error('FechaEreccion') is-invalid @enderror"
                            name="FechaEreccion"
                            value="{{ date('Y-m-d', strtotime($Parroquia->d_erec)) }}" required autocomplete="off" autofocus>

                    @error('FechaEreccion')
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
                        if($c->c_codigo==$Parroquia->c_congrega){
                          <option selected value="{{ $c->c_codigo }}" />{{ $c->x_nombre }}</option>
                        }
                        else{
                          <option value="{{ $c->c_codigo }}" />{{ $c->x_nombre }}</option>
                        }
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
                        if($v->c_codigo==$Parroquia->c_vicaria)
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
          <div class="col-6">
            {{-- Decanato --}}
            <div class="form-group row">
                <label for="Decanatos" class="col-md-4 col-form-label text-md-right">Decanato</label>
                <div class="col-md-6">
                    <select id="Decanatos" name="Decanatos" class="form-select" aria-label="Decanatos">
                      <option value="">--- Escoger Decanato ---</option>
                      @foreach ($Decanatos as $d)
                        if($d->c_codigo==$Parroquia->c_decanato){
                          <option selected value="{{ $d->c_codigo }}" />{{ $d->x_nombre }}: {{ $d->decano }}</option>
                        }
                        else{
                          <option value="{{ $d->c_codigo }}" />{{ $d->x_nombre }}: {{ $d->decano }}</option>
                        }
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

      </div>
      <div class="card-body" >
        <div class="container text-center">
            <div class="row header">
                <div class="col-4 text-start">Nombre</div>
                <div class="col-2 text-start">Cargo</div>
                <div class="col-2 text-start"></div>
            </div>
            @if($MiembrosParroquia->isNotEmpty())
                @foreach ($MiembrosParroquia as $mp)
                    
                    <div class="row gridRow">
                        <div class="col-4 text-start border-bottom">
                          @foreach($Miembros->where('c_codigo',$mp->c_miembro)->all() as $miembro)
                              {{ $miembro->nombre  }} 
                              {{ $miembro->patern  }} 
                              {{ $miembro->matern  }}
                          @endforeach                        
                        </div>
                        <div class="col-5 text-start border">
                          @foreach($Cargos->where('c_codigo',$mp->c_cargo)->all() as $cargo)
                            {{ $cargo->x_nombre  }}
                          @endforeach                        
                        </div>
                        <div class="col-3 text-start border">
                            <button class="btn btn-outline-danger" onclick="window.location='{{ route("parroquia.miembros.desactivar", [$codigo, $mp->c_miembro]) }}'" type="button">Desactivar</button>
                        </div>                        
                    </div>
                @endforeach
            @else 
                <div>
                    <h2>No hay Miembros</h2>
                </div>
            @endif                
            <div class="row gridRow">
              <div class="col-9 text-start border-bottom"></div>
              <div class="col-3 text-start border-bottom">
                  <button class="btn btn-outline-primary" 
                  onclick="window.location='{{ route("parroquia.miembros.buscar",$codigo) }}'" type="button">Agregar</button>
              </div>
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