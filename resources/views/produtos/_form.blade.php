<div class='form-group'>
	{!! Form::label('categoria_id', 'Categoria:') !!}
	{!! Form::select('categoria_id', $categorias, null, ['class'=>'form-control']) !!}
</div>

<div class='form-group'>
	{!! Form::label('name', 'Nome:') !!}
	{!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class='form-group'>
	{!! Form::label('description', 'Descrição:') !!}
	{!! Form::textarea('description', null, ['class'=>'form-control']) !!}
</div>
<div class='form-group'>
	{!! Form::label('price', 'Preço:') !!}
	{!! Form::number('price', null, ['class'=>'form-control']) !!}
</div>
<div class='form-group'>
	{!! Form::label('featured', 'Featured') !!} {!! Form::checkbox('featured', 1) !!} | 
	{!! Form::label('recommend', 'Recommend') !!} {!! Form::checkbox('recommend', 1) !!}
</div>
<div class='form-group'>
	{!! Form::label('tags', 'Tags:') !!}
	{!! Form::textarea('tags', isset($tags) ? $tags : null, ['class'=>'form-control']) !!}
</div>