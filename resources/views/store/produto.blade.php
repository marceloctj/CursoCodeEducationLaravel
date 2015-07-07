@extends('store.store')

@section('categorias')
    @include('store.partial.categorias')
@stop

@section('content')
<div class="col-sm-9 padding-right">
    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">
                @if(count($produto->imagens))
                    <img src="{{url('uploads/' . $produto->id . '/imagem_' . $produto->imagens->first()->id .'.' . $produto->imagens->first()->extension)}}" alt="" width="200" />
                @else
                    <img src="{{url('images/no-img.jpg')}}" alt="" width='200'/>
                @endif
            </div>

            <div id="similar-product" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        @if(count($produto->imagens) > 1)
                            @foreach($produto->imagens as $imagem)                   
                                <a href="#">
                                    <img src="{{ url('uploads/' . $produto->id . '/imagem_' . $imagem->id .'.' . $imagem->extension) }}" alt="" width="80">
                                </a>
                            @endforeach                        
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->

                <h2>{{ $produto->categoria->name }} :: {{ $produto->name }}</h2>
                
                <p>{{ $produto->description }}</p>

                <span>
                    <span>R$ {{ number_format($produto->price,2,',','.') }}</span>
                        <a href="#" class="btn btn-fefault cart">
                            <i class="fa fa-shopping-cart"></i>
                            Adicionar no Carrinho
                        </a>
                </span>
            </div>
            <!--/product-information-->
        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->
                <h2>Tags</h2>
                @foreach($produto->tags as $tag)                                        
                    <a href="{{ route('store.produtos.tag',['tagId'=>$tag->id]) }}">{{ $tag->name }}</a>                    
                @endforeach                                
            </div>
            <!--/product-information-->
        </div>
    </div>
    <!--/product-details-->
</div>
@stop