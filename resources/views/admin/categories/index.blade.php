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
                        <h2>Категории новостей</h2>
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-success">
                            Добавить
                        </a><br><br>
                        @forelse ($categories as $item)
                            <h3>{{$item->title}}</h3>
{{--                        @dump($item->id)--}}
                            <form action="{{ route('admin.categories.destroy', $item) }}" method="post">
                                <a href="{{ route('admin.categories.edit', $item) }}" class="btn btn-success">
                                    Edit
                                </a>
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        @empty
                            Категорий нет.
                        @endforelse
                        <br>{{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
