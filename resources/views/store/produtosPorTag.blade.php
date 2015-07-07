@extends('store.store')

@section('categorias')
    @include('store.partial.categorias')
@stop

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items">
            <h2 class="title text-center">{{ isset($tag->name) ? $tag->name : 'Não Existente' }}</h2>

            @include('store.partial.produto', ['produtos'=>$produtos, 'empty'=>'Nenhum produto encontrado nessa tag!'])            
            
        </div><!--features_items-->        

        <div class='pull-right'>{!! $produtos->render() !!}</div>
    </div>
@stop