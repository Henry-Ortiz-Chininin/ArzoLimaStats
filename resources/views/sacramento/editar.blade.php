@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-10">
        <h3>Parroquia - {{ $Parroquia->x_nombre }} - Sacramento - Editar</h3>
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

    <form method="POST" action="{{ route('sacramento.guardar', $codigo) }}">
                                    @csrf

        <div>
            <div class="card">
                <div class="card-header">
                    <button type="submit" class="btn btn-outline-primary">Guardar</button>
                    <input type="hidden" name="codigo" value="{{ $Sacramento->codigo }}"/>
                </div>
                <div class="card-body" >
                    <div class="row">
                        <div class="col-3">
                            {{-- Anno --}}
                            <div class="form-group row">
                                <label for="Agno" class="col-md-6 col-form-label text-md-right">A&ntilde;o</label>
                                <div class="col-md-6">
                                <input id="Agno" type="number" min="1950" max="2100"
                                    class="form-control @error('Agno') is-invalid @enderror"
                                    name="Agno"
                                    value="{{ old('Agno')?old('Agno'):$Sacramento->sacano }}" required autocomplete="off" autofocus
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

                    
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group row">
                                <label for="bauinf" class="col-form-label col-md-6 text-md-right">Menos de 1 </label>
                                <div class="col-md-6">
                                    <input id="bauinf" type="number" class="form-control" name="bauinf"
                                    value="{{ old('bauinf')?old('bauinf'):$Sacramento->bauinf }}" autocomplete="off" autofocus></div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group row">
                                <label for="baunin" class="col-form-label col-md-6 text-md-right">De 1 - 7</label>
                                <div class="col-md-6">
                                    <input id="baunin" type="number" class="form-control" name="baunin"
                                    value="{{ old('baunin')?old('baunin'):$Sacramento->baunin }}" autocomplete="off" autofocus></div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group row">
                                <label for="baumay" class="col-form-label col-md-6 text-md-right">Menos de 18</label>
                                <div class="col-md-6">
                                    <input id="baumay" type="number" class="form-control" name="baumay"
                                    value="{{ old('baumay')?old('baumay'):$Sacramento->baumay }}" autocomplete="off" autofocus></div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group row">
                                <label for="bauadu" class="col-form-label col-md-6 text-md-right">Adultos</label>
                                <div class="col-md-6">
                                    <input id="bauadu" type="number" class="form-control" name="bauadu"
                                    value="{{ old('bauadu')?old('bauadu'):$Sacramento->bauadu }}" autocomplete="off" autofocus></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3">
                            <div class="form-group row">
                                <label for="pcteca" class="col-form-label col-md-6 text-md-right">pcteca</label>
                                <div class="col-md-6">
                                    <input id="pcteca" type="number" class="form-control" name="pcteca"
                                    value="{{ old('pcteca')?old('pcteca'):$Sacramento->pcteca }}" autocomplete="off" autofocus></div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group row">
                                <label for="pccole" class="col-form-label col-md-6 text-md-right">pccole</label>
                                <div class="col-md-6">
                                    <input id="pccole" type="number" class="form-control" name="pccole"
                                    value="{{ old('pccole')?old('pccole'):$Sacramento->pccole }}" autocomplete="off" autofocus></div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group row">
                                <label for="coteca" class="col-form-label col-md-6 text-md-right">coteca</label>
                                <div class="col-md-6">
                                    <input id="coteca" type="number" class="form-control" name="coteca"
                                    value="{{ old('coteca')?old('coteca'):$Sacramento->coteca }}" autocomplete="off" autofocus></div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group row">
                                <label for="cocole" class="col-form-label col-md-6 text-md-right">cocole</label>
                                <div class="col-md-6">
                                    <input id="cocole" type="number" class="form-control" name="cocole"
                                    value="{{ old('cocole')?old('cocole'):$Sacramento->cocole }}" autocomplete="off" autofocus></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3">
                            <div class="form-group row">
                                <label for="matcat" class="col-form-label col-md-6 text-md-right">matcat</label>
                                <div class="col-md-6">
                                    <input id="matcat" type="number" class="form-control" name="matcat"
                                    value="{{ old('matcat')?old('matcat'):$Sacramento->matcat }}" autocomplete="off" autofocus></div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group row">
                                <label for="matmix" class="col-form-label col-md-6 text-md-right">matmix</label>
                                <div class="col-md-6">
                                    <input id="matmix" type="number" class="form-control" name="matmix"
                                    value="{{ old('matmix')?old('matmix'):$Sacramento->matmix }}" autocomplete="off" autofocus></div>
                            </div>
                        </div>
                    </div>
       

                </div>
            </div>
        </div>
    
    </form>  
</div>


@endsection