@extends ('layouts.main')

@section ('title')
    @parentКатегории новостей для администратора
@endsection
@section ('menu')
    @include('admin.menu')
@endsection

@section ('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Источники новостей</h2>
                        <a href="{{ route('admin.resources.create') }}" class="btn btn-success">
                            Добавить
                        </a>
                        <a href="{{ route('admin.parser') }}" class="btn btn-info">
                            Парсить
                        </a>
                        <br><br>
                        @forelse ($resources as $item)
                            <h3>{{$item->title}}</h3>
                            <form action="{{ route('admin.resources.destroy', $item) }}" method="post">
                                <a href="{{ route('admin.resources.edit', $item) }}" class="btn btn-success">
                                    Edit
                                </a>
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        @empty
                            Источников нет.
                        @endforelse
                        <br>{{ $resources->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
