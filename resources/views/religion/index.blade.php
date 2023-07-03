@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-10">
        <h3>Congregacion - {{ $Congregacion->x_nombre }} - Religiosos</h3>
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
      <a class="nav-link" id="tabCasas" data-mdb-toggle="tab" 
      href="{{ route('casas.congregacion',$Congregacion->c_codigo) }}" role="tab" aria-controls="tabCasas" aria-selected="false">Casas</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="tabReligion" data-mdb-toggle="tab" 
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
                    onclick="window.location='{{ route("religion.nuevo",$codigo) }}'" type="button">Agregar</button>

            </div>
            <div class="card-body" >
                <div class="container text-center">
                    <div class="row header">
                        <div class="col-1 text-start">Año</div>
                        <div class="col-2 text-end">Profesantes Varones</div>
                        <div class="col-2 text-end">Profesantes Mujeres</div>
                        <div class="col-2 text-end">Sacerdotes</div>
                        <div class="col-2 text-end">Laicos Consagrados</div> 
                    </div>
                    @if($Religiones)
                        @foreach($Religiones as $religion)                        
                            <div class="row gridRow" onclick="window.location='{{ route("religion.editar",[$religion->c_congre,$religion->c_anno]) }}'">
                                <div class="col-1 text-start border">{{ $religion->c_anno }}</div>
                                <div class="col-2 text-end border">{{ $religion->n_profesos }}</div>
                                <div class="col-2 text-end border">{{ $religion->n_profesas }}</div>
                                <div class="col-2 text-end border">{{ $religion->n_sacerdotes }}</div>
                                <div class="col-2 text-end border">{{ $religion->n_laicosconsagrados }}</div>
                            </div>
                        @endforeach

                        <div class="row header">
                            <div class="col-1 text-start">Total</div>
                            <div class="col-2 text-end">{{ $Religiones->sum("n_profesos")}}</div>
                            <div class="col-2 text-end">{{ $Religiones->sum("n_profesas")}}</div>
                            <div class="col-2 text-end">{{ $Religiones->sum("n_sacerdotes")}}</div>
                            <div class="col-2 text-end">{{ $Religiones->sum("n_laicosconsagrados")}}</div>
                        </div>
                    @endif                

                </div>

            </div>
        </div>
    </div>

</div>


@endsection