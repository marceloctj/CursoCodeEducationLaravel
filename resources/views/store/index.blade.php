@extends('store.store')

@section('categorias')
    @include('store.categorias_partial')
@stop

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Em destaque</h2>
            @foreach($produtosEmDestaque as $dProduto)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">

                                @if(count($dProduto->imagens))
                                    <img src="{{url('uploads/' . $dProduto->id . '/imagem_' . $dProduto->imagens->first()->id .'.' . $dProduto->imagens->first()->extension)}}" alt="" width='200'/>
                                @else
                                    <img src="{{url('images/no-img.jpg')}}" alt="" width='200'/>
                                @endif

                                <h2>R$ {{ $dProduto->price }}</h2>
                                <p>{{ $dProduto->name }}</p>
                                <a href="javascript:void(0)" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>R$ {{ $dProduto->price }}</h2>
                                    <p>{{ $dProduto->name }}</p>
                                    <a href="javascript:void(0)" class="btn btn-default add-to-cart">
                                        <i class="fa fa-crosshairs"></i>Mais detalhes
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
            @endforeach
         </div><!--features_items-->
        <div class="features_items"><!--recommended-->
            <h2 class="title text-center">Recomendados</h2>
            @foreach($produtosRecomendados as $rProduto)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">

                                @if(count($rProduto->imagens))
                                    <img src="{{url('uploads/' . $rProduto->id . '/imagem_' . $rProduto->imagens->first()->id .'.' . $rProduto->imagens->first()->extension)}}" alt="" width='200'/>
                                @else
                                    <img src="{{url('images/no-img.jpg')}}" alt="" width='200'/>
                                @endif

                                <h2>R$ {{ $rProduto->price }}</h2>
                                <p>{{ $rProduto->name }}</p>
                                <a href="javascript:void(0)" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>R$ {{ $rProduto->price }}</h2>
                                    <p>{{ $rProduto->name }}</p>
                                    <a href="javascript:void(0)" class="btn btn-default add-to-cart">
                                        <i class="fa fa-crosshairs"></i>Mais detalhes
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
            @endforeach
        </div><!--recommended-->
    </div>
@stop