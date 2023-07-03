@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-10">
        <h3>Congregacion - {{ $Congregacion->x_nombre }} - Casa - Nuevo</h3>
        </div>
        <div class="col-2 align-middle">
        <span class="badge bg-secondary">{{ date('Y-m-d', strtotime($Congregacion->d_suscrip)) }}</span>
        </div> 
    </div>



    
   <!-- Tabs navs -->
   <ul class="nav nav-tabs nav-fill mb-3" id="ex1" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="tabParroquia" data-mdb-toggle="tab" 
      href="{{ route('congregacion.editar',$Congregacion->c_codigo) }}" role="tab" aria-controls="tabParroquia" aria-selected="false">Congregacion - Info</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="tabCasas" data-mdb-toggle="tab" 
      href="{{ route('casas.congregacion',$Congregacion->c_codigo) }}" role="tab" aria-controls="tabCasas" aria-selected="false">Casas</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="tabReligion" data-mdb-toggle="tab" 
      href="{{ route('religion.congregacion',$Congregacion->c_codigo) }}" role="tab" aria-controls="tabReligion" aria-selected="false">Religion</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="tabColegios" data-mdb-toggle="tab" 
      href="{{ route('colegios.congregacion',$Congregacion->c_codigo) }}" role="tab" aria-controls="tabColegios" aria-selected="true">Colegios</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="tabObras" data-mdb-toggle="tab" 
      href="{{ route('obras.congregacion',$Congregacion->c_codigo) }}" role="tab" aria-controls="tabObras" aria-selected="false">Obras</a>
    </li>
  </ul>

    <!-- Tabs navs -->

    <form method="POST" action="{{ route('casa.congregacion.guardar', $codigo) }}">
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

                    {{-- Apartado --}}
                    <div class="form-group row">
                        <label for="Apartado" class="col-md-4 col-form-label text-md-right">Apartado</label>
                        <div class="col-md-8">
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

                    {{-- Fecha de Consitucion --}}
                    <div class="form-group row">
                        <label for="FechaConsitucion"
                                class="col-md-4 col-form-label text-md-right">Fecha de Consitucion</label>

                        <div class="col-md-8">
                            <input id="FechaConsitucion" type="date"
                                    class="form-control @error('FechaEreccion') is-invalid @enderror"
                                    name="FechaConsitucion"
                                    value="{{ old('FechaConsitucion') }}" required autocomplete="off" autofocus>

                            @error('FechaConsitucion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    {{-- Observacion --}}
                    <div class="form-group row">
                        <label for="Observacion" class="col-md-4 col-form-label text-md-right">Observacion</label>
                        <div class="col-md-8">
                        <input id="Observacion" type="text"
                            class="form-control @error('Observacion') is-invalid @enderror"
                            name="Observacion"
                            value="{{ old('Observacion') }}" autocomplete="off" autofocus
                            placeholder="Observacion">

                            @error('Observacion')
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