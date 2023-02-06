@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-10">
        <h3>Miembro - {{ $Miembro->nombre }} - Historia</h3>
        </div>
        <div class="col-2 align-middle">
        <span class="badge bg-secondary">{{ date('Y-m-d', strtotime($Miembro->suscri)) }}</span>
        </div> 
    </div>


    <!-- Tabs navs -->
    <ul class="nav nav-tabs nav-fill mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="tabMiembro" data-mdb-toggle="tab" 
            href="{{ route('miembro.editar',$Miembro->c_codigo) }}" role="tab" aria-controls="tabMiembro" aria-selected="true">Miembro - Info</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="tabHistoria" data-mdb-toggle="tab" 
            href="{{ route('historia.miembro',$Miembro->c_codigo) }}" role="tab" aria-controls="tabHistoria" aria-selected="true">Historia</a>
        </li>
    </ul>

    <!-- Tabs navs -->


    @csrf
    <div>
        <div class="card">
            <div class="card-header float-end">

            </div>
            <div class="card-body" >
                <div class="container text-center">
                    <div class="row header">
                        <div class="col-2 text-start">Centro</div>
                        <div class="col-2 text-start">Cargo</div>
                        <div class="col-1 text-start">Desde</div>
                        <div class="col-1 text-start">Hasta</div>
                        <div class="col-2 text-start">Parroquia</div>
                        <div class="col-2 text-start">Vicaria</div>
                        <div class="col-2 text-start">Decanato</div>
                    </div>
                    @if($Historia)
                        @foreach($Historia as $hito)                        
                            <div class="row gridRow">
                                <div class="col-2 text-start border">{{ $hito->x_centrolab }}</div>
                                <div class="col-2 text-start border">{{ $hito->x_cargo }}</div>
                                <div class="col-1 text-end border">{{ date('Y-m-d', strtotime($hito->d_desde)) }}</div>
                                <div class="col-1 text-end border">{{ date('Y-m-d', strtotime($hito->d_hasta)) }}</div>
                                <div class="col-2 text-start border">
                                    @foreach($Parroquias->where('c_codigo',$hito->c_parroquia)->all() as $item)
                                        {{ $item->x_nombre }}
                                    @endforeach 
                                </div>
                                <div class="col-2 text-start border">
                                    @foreach($Vicarias->where('c_codigo',$hito->c_vicaria)->all() as $item)
                                        {{ $item->x_nombre }}
                                    @endforeach 
                                </div>
                                <div class="col-2 text-start border">
                                    @foreach($Decanatos->where('c_codigo',$hito->c_decanato)->all() as $item)
                                        {{ $item->x_nombre }}
                                    @endforeach 
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