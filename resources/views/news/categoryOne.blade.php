@extends ('layouts.main')

@section ('title')
    @parentНовости по категории
@endsection
@section ('menu')
    @include('menu')
@endsection

{{--@section ('content')--}}
{{--    <div class="container">--}}
{{--        <div class="list-group">--}}
{{--            <a href="#" class="list-group-item list-group-item-action active">--}}
{{--                Новости в категории "{{$title}}"--}}
{{--            </a>--}}
{{--     @forelse ($news as $item)--}}
{{--            <a href="{{route('news.newsOne', $item->id)}}" class="list-group-item list-group-item-action">{{$item->title}}</a>--}}
{{--        @empty--}}
{{--            Новостей по данной категории нет.--}}
{{--        @endforelse--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

@section ('content')
    <div class="container">
        <h2>Новости в категории "{{$title}}"</h2>
        <div class="row row-cols-1 row-cols-md-3">
            @forelse ($news as $item)
                <div class="col mb-4">
                    <div class="card h-100" style="width: 195px;">
                        <img src="{{$item->image ?? asset('storage/news_1.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6 class="card-title">{{$item->title}}</h6>
                            @if(!$item->isPrivate || Auth::check())
                                <a href="{{route('news.newsOne', $item->id)}}" class="btn btn-primary">Подробнее ...</a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                Новостей нет.
            @endforelse
        </div>
{{--        {{ $news->links() }}--}}
    </div>
@endsection

