@extends('layouts.app')

@section('content')

<h1>Parroquia - {{ $Parroquia->x_nombre }}</h1>
<div class="container">
  <!-- Tabs navs -->
  <ul class="nav nav-tabs nav-fill mb-3" id="ex1" role="tablist">
    <li class="nav-item" role="presentation">
      <a
        class="nav-link"
        id="ex2-tab-1"
        data-mdb-toggle="tab"
        href="{{ route("parroquia.editar",$Parroquia->c_codigo) }}"
        role="tab"
        aria-controls="ex2-tabs-1"
        aria-selected="true"
        >Parroquia - Info</a
      >
    </li>
    <li class="nav-item" role="presentation">
      <a
        class="nav-link"
        id="ex2-tab-2"
        data-mdb-toggle="tab"
        href="{{ route("parroquia.miembros",$Parroquia->c_codigo) }}"
        role="tab"
        aria-controls="ex2-tabs-2"
        aria-selected="false"
        >Miembros</a
      >
    </li>
    <li class="nav-item" role="presentation">
      <a
        class="nav-link active"
        id="ex2-tab-3"
        data-mdb-toggle="tab"
        href="{{ route("parroquia.capillas",$Parroquia->c_codigo) }}"
        role="tab"
        aria-controls="ex2-tabs-3"
        aria-selected="false"
        >Capillas</a
      >
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
    <form method="POST" action="{{ route('parroquia.miembros', $codigo) }}">
                              @csrf
        <div>

                <div class="container text-center">
                    <div class="row header">
                        <div class="col-4 text-start">Nombre</div>
                        <div class="col-4 text-start">Direccion</div>
                        <div class="col-2 text-start">Fecha Ereccion</div>
                        <div class="col-1 text-start">Opciones</div>
                    </div>
                    @if($Capillas->isNotEmpty())
                        @foreach ($Capillas as $cp)
                            
                            <div class="row gridRow">
                                <div class="col-4 text-start border-bottom">{{ $cp->nombre  }} </div>
                                <div class="col-4 text-start border-bottom">{{ $cp->direcc  }}</div>
                                <div class="col-2 text-start border-bottom">{{ $cp->d_erecion  }}</div>
                                <div class="col-1 text-start border-bottom">
                                    <button class="btn btn-outline-danger" type="button">Remover</button>
                                </div>
                            </div>
                        @endforeach
                    @else 
                        <div>
                            <h2>No hay Capillas</h2>
                        </div>
                    @endif                


                </div>
                
        </div>
        
  



    </form>

@endsection