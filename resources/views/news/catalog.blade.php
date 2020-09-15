@extends ('layouts.main')

@section ('title')
    @parentКатегории новостей
@endsection
@section ('menu')
    @include('menu')
@endsection

@section ('content')
    <div class="container">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">
                Категории новостей
            </a>
        @forelse ($catalog as $item)
        <a href="{{route('news.categoryOne', $item->slug)}}" class="list-group-item list-group-item-action">{{$item->title}}</a>
        @empty
            Категорий нет.
        @endforelse
            <br>{{ $catalog->links() }}
        </div>
    </div>
@endsection

