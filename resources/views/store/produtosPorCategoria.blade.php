@extends('store.store')

@section('categorias')
    @include('store.categorias_partial')
@stop

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items">
            <h2 class="title text-center">Categoria: {{ $categoria->name }}</h2>
            @forelse($produtos as $produto)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">

                                @if(count($produto->imagens))
                                    <img src="{{url('uploads/' . $produto->id . '/imagem_' . $produto->imagens->first()->id .'.' . $produto->imagens->first()->extension)}}" alt="" width='200'/>
                                @else
                                    <img src="{{url('images/no-img.jpg')}}" alt="" width='200'/>
                                @endif

                                <h2>R$ {{ $produto->price }}</h2>
                                <p>{{ $produto->name }}</p>
                                <a href="javascript:void(0)" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>R$ {{ $produto->price }}</h2>
                                    <p>{{ $produto->name }}</p>
                                    <a href="javascript:void(0)" class="btn btn-default add-to-cart">
                                        <i class="fa fa-crosshairs"></i>Mais detalhes
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            @empty
                <div class='alert alert-danger'>Nenhum produto encontrado nessa categoria!</div>                       
            @endforelse
            
        </div><!--features_items-->        

        <div class='pull-right'>{!! $produtos->render() !!}</div>
    </div>
@stop