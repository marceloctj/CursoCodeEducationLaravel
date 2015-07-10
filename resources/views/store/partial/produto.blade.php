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
                <a href="{{ route('store.produto',['id'=>$produto->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
            </div>
            <div class="product-overlay">
                <div class="overlay-content">
                    <h2>R$ {{ number_format($produto->price, 2, ',', '.') }}</h2>
                    <p>{{ $produto->name }}</p>
                    <a href="{{ route('store.produto',['id'=>$produto->id])}}" class="btn btn-default add-to-cart">
                        <i class="fa fa-crosshairs"></i>Mais detalhes
                    </a>
                    <a href="{{ route('cart.add',['id'=> $produto->id]) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                </div>
            </div>
        </div>
    </div>
</div>        
@empty
    <div class='alert alert-danger'>{{ (isset($empty)) ? $empty : '' }}</div> 
@endforelse    
