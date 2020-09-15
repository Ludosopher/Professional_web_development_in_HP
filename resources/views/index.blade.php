@extends ('layouts.main')

@section ('title')
    @parentГлавная
@endsection
@section ('menu')
    @include('menu')
@endsection

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Добро пожаловать!</h1>
        <p class="lead">Это сайт новостей</p>
    </div>
</div>
@endsection

