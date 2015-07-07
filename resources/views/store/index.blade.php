@extends('store.store')

@section('categorias')
    @include('store.partial.categorias')
@stop

@section('content')
    <div class="col-sm-9 padding-right">

        @if(count($produtosEmDestaque))
            <div class="features_items"><!--features_items-->
                <h2 class="title text-center">Em destaque</h2>                
                
                @include('store.partial.produto', ['produtos'=>$produtosEmDestaque])
            </div><!--features_items-->
        @endif

        @if(count($produtosRecomendados))
            <div class="features_items"><!--recommended-->
                <h2 class="title text-center">Recomendados</h2>

                @include('store.partial.produto', ['produtos'=>$produtosRecomendados])
            </div><!--recommended-->
        @endif

    </div>
@stop