@extends ('layouts.main')

@section ('title')
    @parentРедактирование пользователей
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
                        <h2>CRUD пользователей</h2>
                        @forelse ($users as $item)
                            <h3>{{$item->name}}</h3>
                            <form action="{{ route('admin.users.destroy', $item) }}" method="post">
                                <a href="{{ route('admin.users.edit', $item) }}" class="btn btn-success">
                                    Edit
                                </a>
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                            <br>
                            <form action="{{ route('admin.users.update', $item) }}" method="post">
                            <form enctype="multipart/form-data" action="{{ route('admin.users.update', $item) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-check">
                                    @if ($errors->has('is_Private'))
                                        <div class="alert alert-danger" role="alert">
                                            @foreach ($errors->get('is_Private') as $error)
                                                {{ $error }}
                                            @endforeach
                                        </div>
                                    @endif
                                    <input  @if ($item->is_admin === 1 || old('is_admin') === 1) checked @endif id="newAdmin" name="is_admin"
                                            type="checkbox" value="1" class="form-check-input">
                                    <label for="newAdmin">Администратор</label>
                                </div>
                                <p><input type="submit" value="Изменить"></p>
{{--                                <button type="button" class="btn btn-primary">Изменить</button>--}}
                            </form><br><br>
                        @empty
                            Новостей нет.
                     @endforelse
                    <br>{{ $users->links() }}
                    </div>
                 </div>
            </div>
        </div>
    </div>

@endsection
