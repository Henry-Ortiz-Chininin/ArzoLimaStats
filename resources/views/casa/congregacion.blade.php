@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-10">
        <h3>Congregacion - {{ $Congregacion->x_nombre }} - Casas</h3>
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

    @csrf
    <div>
        <div class="card">
            <div class="card-header float-end">
            <button class="btn btn-outline-primary" 
                  onclick="window.location='{{ route("casa.congregacion.nuevo",$codigo) }}'" type="button">Agregar</button>

            </div>
            <div class="card-body" >
                <div class="container text-center">
                    <div class="row header">
                        <div class="col-2 text-start">Nombre</div>
                        <div class="col-1 text-start">Dirección</div>
                        <div class="col-1 text-start">Distrito</div>
                        <div class="col-1 text-start">Telefono</div>
                        <div class="col-1 text-start">Constitucion</div>
                        <div class="col-2 text-start">Responsable</div>
                        <div class="col-2 text-start">Observacion</div>
                        <div class="col-1 text-start">F.Ereccion</div>
                        <div class="col-1 text-start">Desactivada</div>
                    </div>
                    @if($Casas)
                        @foreach ($Casas as $casa)
                            <div class="row gridRow" onclick="window.location='{{ route("casa.congregacion.editar",[$casa->c_congre,$casa->codigo]) }}'">
                                <div class="col-2 text-start border">{{ $casa->nombre }}</div>
                                <div class="col-1 text-start border">{{ $casa->direcc }}</div>
                                <div class="col-1 text-start border"> 
                                    @foreach($Distritos->where('c_codigo',$casa->distri)->all() as $distrito)
                                        {{ $distrito->x_nombre }}
                                    @endforeach 
                                </div>
                                <div class="col-1 text-start border">{{ $casa->telef1 }}, {{ $casa->telfax }}</div>
                                <div class="col-1 text-start border">{{ date('Y-m-d', strtotime($casa->d_constitucion)) }}</div>
                                <div class="col-2 text-start border">{{ $casa->respon }}</div>
                                <div class="col-2 text-start border">{{ $casa->observ }}</div>
                                <div class="col-1 text-start border">{{ date('Y-m-d', strtotime($casa->d_erecion)) }}</div>
                                <div class="col-1 text-start border">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" {{ $casa->i_desactivada?'checked':'' }}>
                                        <label class="form-check-label" for="flexCheckChecked">{{ $casa->i_desactivada? date('Y-m-d', strtotime($casa->d_desactivada)):'' }}</label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif                

                </div>

            </div>
        </div>
    </div>
    

</div>

@endsection