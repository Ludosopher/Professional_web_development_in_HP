@extends ('layouts.main')

@section ('title')
    @parentНовость
@endsection
@section ('menu')
    @include('menu')
@endsection

@section('content')
    @if (!$news->isPrivate|| Auth::check())
        <div class="container">
            <div class="card" style="width: 500px; margin: 0 auto;">
                <img src="{{$news->image ?? asset('storage/news_1.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$news->title}}</h5>

                    <p class="card-text">{!! $news->text !!}</p>

{{--                    <p class="card-text">{{$news->text}}</p>--}}
                    <a href="/news/all" class="btn btn-primary">Все новости</a>
                </div>
             </div>
        </div>
     @else
        <div class="container">
            Новость приватная. Зарегистрируйтесь для просмотра.
        </div>
    @endif
@endsection
