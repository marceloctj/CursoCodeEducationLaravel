<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Categorias</h2>
        <div class="panel-group category-products" id="accordian">
            @foreach($categoriasSideBar as $categoriaSide)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="{{ route('store.produtos.categorias',['id'=>$categoriaSide->id]) }}">{{ $categoriaSide->name }}</a></h4>
                    </div>
                </div>            
            @endforeach
        </div>
    </div>
</div>