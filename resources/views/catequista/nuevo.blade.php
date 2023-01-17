@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-10">
        <h3>Parroquia - {{ $Parroquia->x_nombre }} - Catequistas - Nuevo</h3>
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
        <a class="nav-link" id="tabSacramentos" data-mdb-toggle="tab" 
        href="{{ route('sacramentos',$Parroquia->c_codigo) }}" role="tab" aria-controls="tabSacramentos" aria-selected="true">Sacramentos</a>
        </li>
        <li class="nav-item" role="presentation">
        <a class="nav-link" id="tabCasas" data-mdb-toggle="tab" 
        href="{{ route('casas.parroquia',$Parroquia->c_codigo) }}" role="tab" aria-controls="tabCasas" aria-selected="true">Casas</a>
        </li>
        <li class="nav-item" role="presentation">
        <a class="nav-link active" id="tabCatequistas" data-mdb-toggle="tab" 
        href="{{ route('catequistas',$Parroquia->c_codigo) }}" role="tab" aria-controls="tabCatequistas" aria-selected="true">Catequistas</a>
        </li>
        <li class="nav-item" role="presentation">
        <a class="nav-link" id="tabHistoria" data-mdb-toggle="tab" 
        href="{{ route('historia.parroquia',$Parroquia->c_codigo) }}" role="tab" aria-controls="tabHistoria" aria-selected="true">Historia</a>
        </li>
    </ul>

    <!-- Tabs navs -->

    <form method="POST" action="{{ route('catequista.guardar', $codigo) }}">
                                    @csrf

        <div>
            <div class="card">
                <div class="card-header">
                    <button type="submit" class="btn btn-outline-primary">Guardar</button>
                </div>
                <div class="card-body" >
                    <div class="row">
                        <div class="col-3">
                            {{-- Anno --}}
                            <div class="form-group row">
                                <label for="Agno" class="col-md-6 col-form-label text-md-right">A&ntilde;o</label>
                                <div class="col-md-6">
                                <input id="Agno" type="number"  min="1950" max="2100"
                                    class="form-control @error('Agno') is-invalid @enderror"
                                    name="Agno"
                                    value="{{ old('Agno') }}" required autocomplete="off" autofocus
                                    placeholder="Agno">

                                    @error('Agno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                    
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group row">
                                <label for="n_cateq" class="col-form-label col-md-6 text-md-right">Catequistas </label>
                                <div class="col-md-6">
                                <input id="n_cateq" type="text" class="form-control" name="n_cateq"
                                    value="{{ old('n_cateq') }}" autocomplete="off" autofocus></div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group row">
                                <label for="n_agenp" class="col-form-label col-md-6 text-md-right">Agenp</label>
                                <div class="col-md-6">
                                <input id="n_agenp" type="text" class="form-control" name="n_agenp"
                                    value="{{ old('n_agenp') }}" autocomplete="off" autofocus></div>
                            </div>
                        </div>
                    </div>
       

                </div>
            </div>
        </div>
    
    </form>  

</div>


@endsection