@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-10">
        <h3>Parroquia - {{ $Parroquia->x_nombre }} - Sacramentos</h3>
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
        <a class="nav-link" id="tabColegios" data-mdb-toggle="tab" 
        href="{{ route('colegios.parroquia',$Parroquia->c_codigo) }}" role="tab" aria-controls="tabColegios" aria-selected="true">Colegios</a>
        </li>
        <li class="nav-item" role="presentation">
        <a class="nav-link" id="tabObras" data-mdb-toggle="tab" 
        href="{{ route('obras.parroquia',$Parroquia->c_codigo) }}" role="tab" aria-controls="tabObras" aria-selected="true">Obras Parroquias</a>
        </li>
        <li class="nav-item" role="presentation">
        <a class="nav-link active" id="tabSacramentos" data-mdb-toggle="tab" 
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

    @csrf
    <div class="row">
        <div class="card">
            <div class="card-header float-end">
                <button class="btn btn-outline-primary" type="button">Agregar</button>

            </div>
            <div class="card-body" >
                <div class="container text-center">
                    <div class="row header">
                        <div class="col-1 text-start">Año</div>
                        <div class="col-1 text-end">1<</div>
                        <div class="col-1 text-end">1-7</div>
                        <div class="col-1 text-end">18<</div>
                        <div class="col-1 text-end">pcteca</div>
                        <div class="col-1 text-end">pccole</div>
                        <div class="col-1 text-end">coteca</div>
                        <div class="col-1 text-end">cocole</div>
                        <div class="col-1 text-end">matcat</div>
                        <div class="col-1 text-end">matmix</div>      
                        <div class="col-1 text-end">baumay</div>   
                    </div>
                    @if($Sacramentos)
                        @foreach($Sacramentos as $sacramento)                        
                            <div class="row gridRow">
                                <div class="col-1 text-start border">{{ $sacramento->sacano }}</div>
                                <div class="col-1 text-end border">{{ $sacramento->bauinf }}</div>
                                <div class="col-1 text-end border">{{ $sacramento->baunin }}</div>
                                <div class="col-1 text-end border">{{ $sacramento->bauadu }}</div>
                                <div class="col-1 text-end border">{{ $sacramento->pcteca }}</div>
                                <div class="col-1 text-end border">{{ $sacramento->pccole }}</div>
                                <div class="col-1 text-end border">{{ $sacramento->coteca }}</div>
                                <div class="col-1 text-end border">{{ $sacramento->cocole }}</div>
                                <div class="col-1 text-end border">{{ $sacramento->matcat }}</div>
                                <div class="col-1 text-end border">{{ $sacramento->matmix }}</div>
                                <div class="col-1 text-end border">{{ $sacramento->baumay }}</div> 
                            </div>
                        @endforeach

                        <div class="row header">
                            <div class="col-1 text-start">Total</div>
                            <div class="col-1 text-end">{{ $Sacramentos->sum("bauinf")}}</div>
                            <div class="col-1 text-end">{{ $Sacramentos->sum("baunin")}}</div>
                            <div class="col-1 text-end">{{ $Sacramentos->sum("bauadu")}}</div>
                            <div class="col-1 text-end">{{ $Sacramentos->sum("pcteca")}}</div>
                            <div class="col-1 text-end">{{ $Sacramentos->sum("pccole")}}</div>
                            <div class="col-1 text-end">{{ $Sacramentos->sum("coteca")}}</div>
                            <div class="col-1 text-end">{{ $Sacramentos->sum("cocole")}}</div>
                            <div class="col-1 text-end">{{ $Sacramentos->sum("matcat")}}</div>
                            <div class="col-1 text-end">{{ $Sacramentos->sum("matmix")}}</div>      
                            <div class="col-1 text-end">{{ $Sacramentos->sum("baumay")}}</div>   
                        </div>
                    @endif                

                </div>

            </div>
        </div>
    </div>

</div>


@endsection