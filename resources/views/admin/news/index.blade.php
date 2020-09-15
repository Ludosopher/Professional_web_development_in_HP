@extends ('layouts.main')

@section ('title')
    @parentГлавная администратора
@endsection
@section ('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Новости</h2>
                        <a href="{{ route('admin.news.create') }}" class="btn btn-success">
                            Добавить
                        </a><br><br>
                        @forelse ($news as $item)
                            <h3>{{$item->title}}</h3>
                            <form action="{{ route('admin.news.destroy', $item) }}" method="post">
                                <a href="{{ route('admin.news.edit', $item) }}" class="btn btn-success">
                                    Edit
                                </a>
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        @empty
                            Новостей нет.
                     @endforelse
                        <br>{{ $news->links() }}
                    </div>
                 </div>
            </div>
        </div>
    </div>

@endsection
