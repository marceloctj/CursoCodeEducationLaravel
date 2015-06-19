@extends('app')

@section('content')
<div class="container">
    <div class="content">
        <h2>HOME</h2>
        <div class="quote">{{ Inspiring::quote() }}</div>
    </div>
</div>
@endsection