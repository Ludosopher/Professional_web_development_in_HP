@extends ('layouts.main')

@section ('title')
    @parentГлавная
@endsection
@section ('menu')
    @include('admin.menu')
@endsection

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Страница администратора</h1>
        <p class="lead">На этой странице администратор осуществляет CRUD новостей, категорий новостей, пользователей и ресурсов.</p>
    </div>
</div>
@endsection

