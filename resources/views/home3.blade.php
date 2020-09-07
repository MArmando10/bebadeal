@extends('layouts.main')

@section('body-config')

@section('content')

<style>
     .carousel-inner img {

  width: 100%;
  max-height: 460px;
}

.claseProduct{
    width: 250px;
    height: 250px;
    background: none;
    box-shadow: none;
    border: none;
    display: contents;
    /* color: #3490dc; */
     text-decoration: none;
    background-color: transparent;
}
</style>

{{-- <div class="row justify-content-center" >
    <div class="form-group logoClass" style="width: 110px; height: 95%; text-align: center; border-radius: 10%">
       @if(!$anterior)
    </div>
    <div class="form-group  col-md-4">
        <input size="45" class="redondeado confondo form-control form-control-lg ml-2 w-40" name="categoria" type="text" placeholder="Buscar por Categoría" aria-label="Search">
     </div>
    @else
    <div class="form-group col-md-3">
        <input type="text" class="form-control" name="product" placeholder="Buscar por Categoria" value="{{ (!$anterior['categoria']) ? '' : $anterior['categoria']}}">
    </div>
    @endif
        <button type="submit" class="btn btn-primary logoClass" style="width: 110px; height: 95%;">
          <i class="fas fa-search"></i> Buscar
        </button>
    <div class="form-group col-md-2 col-4">
        <a href="{{route('home')}}">
            <button type="button" class="btn btn-default" >
                <i class="fas fa-broom"></i> Limpiar filtro
            </button>
        </a>
    </div>
</div> --}}
    <br>

    <div class="border-lines"></div>
    <br>


    <!--Empieza carusel de imagenes-->
<div class="row" style=" height: auto;  ">
    <div id="myCarouselCustom" class="carousel slide col-sm-12 col-12 bg-secondary" data-ride="carousel" style="height: 350px; ">
        <h2 style="color: black">Mejores Precios</h2>
        <br><br>
        <!-- Indicators -->
        {{-- <ol class="carousel-indicators" style="">
            <li data-target="#myCarouselCustom" data-slide-to="0" class="active"></li>
            <li data-target="#myCarouselCustom" data-slide-to="1"></li>
            <li data-target="#myCarouselCustom" data-slide-to="2"></li>
        </ol> --}}

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active ">
                {{-- {{dd($users )}} --}}
                @foreach($products as $product)

                    @if($product->imagenes->count() > 0 )
                    <div class="item">
                        {{ Form::open(['route' => ['product.show', $product->id,], 'method' => 'get' ]) }}
                        <button class="claseProduct" type="submit" style="width: 250px; height:auto">
                            <div class="col-sm-2" id="mostrar">
                                <a href="product">
                                    <img class="d-block bg-ter bord"  src="{{asset($product->imagenes[0]->url)}}"  alt="First slide" style="width: 70%;">
                                </a>
                            </div>
                        </button>
                        {{ Form::close()}}

                    </div>
                    @endif
                @endforeach
            </div>
        </div>
        <br><br>
    </div>
</div>
  <!--Termina carusel de imagenes-->

    <div class="row" style=" padding: $spacer !important; margin: 50px; justify-content: center;">
        <div class="col-sm-5 bg-secondary">
            <h2 style="color: black; text-align: center" >Explora lo mejor en hogar y cocina</h2>
            @foreach($categorias as $categoria)

                    @if($categoria->imagenes->count() > 0 )
                    <div class="item">
                        {{ Form::open(['route' => ['product.show', $categoria->id,], 'method' => 'get' ]) }}
                        <button class="claseProduct" type="submit" style="width: 250px; height:auto">
                            <div class="col-sm-2" id="mostrar">
                                <a href="product">
                                    <img class="d-block bg-ter bord"  src="{{asset($categoria->imagenes[0]->url)}}"  alt="First slide" style="width: 70%;">
                                </a>
                            </div>
                        </button>
                        {{ Form::close()}}

                    </div>
                    @endif
            @endforeach
            <br>
        </div>
        <br>


        <div class="col-sm-5 bg-secondary">
            <h2 style="color: black; text-align: center">Lo mejor en deportes</h2>
            <br>
            @foreach($categorias as $categoria)

            @if($categoria->imagenes->count() > 0 )
            <div class="item">
                {{ Form::open(['route' => ['product.show', $categoria->id,], 'method' => 'get' ]) }}
                <button class="claseProduct" type="submit" style="width: 250px; height:auto">
                    <div class="col-sm-2" id="mostrar">
                        <a href="product">
                            <img class="d-block bg-ter bord"  src="{{asset($categoria->imagenes[0]->url)}}"  alt="First slide" style="width: 70%;">
                        </a>
                    </div>
                </button>
                {{ Form::close()}}

            </div>
            @endif
    @endforeach
    </div>

<script type="text/javascript">
    // Call carousel manually
    $('#myCarouselCustom').carousel();

    // Go to the previous item
    $("#prevBtn").click(function(){
        $("#myCarouselCustom").carousel("prev");
    });
    // Go to the previous item
    $("#nextBtn").click(function(){
        $("#myCarouselCustom").carousel("next");
    });




    function mostrar(mostrar)
    {
        for(i = 0; i < 3; i ++)
        {
            console.log(x[i]);
        }
    }
    mostrar()

    </script>


@endsection
