@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-10">
        <h3>Congregacion - {{ $Congregacion->x_nombre }} - Religioso - Editar</h3>
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

    <form method="POST" action="{{ route('religion.guardar', $codigo) }}">
                                    @csrf

        <div>
            <div class="card">
                <div class="card-header">
                    <button type="submit" class="btn btn-outline-primary">Guardar</button>
                    <input type="hidden" name="codigo" value="{{ $Religion->codigo }}"/>
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
                                    value="{{ old('Agno')?old('Agno'):$Religion->c_anno }}" required autocomplete="off" autofocus
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
                                <label for="n_profesos" class="col-form-label col-md-6 text-md-right">Profesantes Varones </label>
                                <div class="col-md-6">
                                <input id="n_profesos" type="text" class="form-control" name="n_profesos"
                                    value="{{ old('n_profesos')?old('n_profesos'):$Religion->n_profesos }}" autocomplete="off" autofocus></div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group row">
                                <label for="n_profesas" class="col-form-label col-md-6 text-md-right">Profesantes Mujeres </label>
                                <div class="col-md-6">
                                <input id="n_profesas" type="text" class="form-control" name="n_profesas"
                                    value="{{ old('n_profesas')?old('n_profesas'):$Religion->n_profesas }}" autocomplete="off" autofocus></div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group row">
                                <label for="n_sacerdotes" class="col-form-label col-md-6 text-md-right">Sacerdotes</label>
                                <div class="col-md-6">
                                <input id="n_sacerdotes" type="text" class="form-control" name="n_sacerdotes"
                                    value="{{ old('n_sacerdotes')?old('n_sacerdotes'):$Religion->n_sacerdotes }}" autocomplete="off" autofocus></div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group row">
                                <label for="n_laicosconsagrados" class="col-form-label col-md-6 text-md-right">Laicos Consagrados</label>
                                <div class="col-md-6">
                                <input id="n_laicosconsagrados" type="text" class="form-control" name="n_laicosconsagrados"
                                    value="{{ old('n_laicosconsagrados')?old('n_laicosconsagrados'):$Religion->n_laicosconsagrados }}" autocomplete="off" autofocus></div>
                            </div>
                        </div>
                    </div>
       



                </div>
            </div>
        </div>
    
    </form>  
</div>


@endsection