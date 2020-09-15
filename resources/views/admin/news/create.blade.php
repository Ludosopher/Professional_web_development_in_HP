@extends ('layouts.main')

@section ('title')
    @parentДобавление новости
@endsection
@section ('menu')
    @include('admin.menu')
@endsection

{{--@dump(old())--}}

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create') }}</div>

                    <div class="card-body">
                        <form enctype="multipart/form-data" action="{{ $news->id ? route('admin.news.update', $news): route('admin.news.store') }}" method="post">
                            @csrf
                            @if($news->id) @method('PUT') @endif
                            <div class="form-group">
                                <label for="newsTitle">Заголовок новости</label>
                                @if ($errors->has('title'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach($errors->get('title') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <input type="text" name="title" id="newsTitle" class="form-control"
                                       value="{{ old('title') ?? $news->title ?? '' }}">
                            </div>

                            <div class="form-group">
                                <label for="newsCategory">Категория новости</label>
                                @if ($errors->has('category_id'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->get('category_id') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <select name="category_id" id="newsCategory" class="form-control">

                                    @forelse($categories as $item)

                                        @if (old('category_id'))
                                            <option @if ($item->id == old('category_id')) selected
                                                    @endif value="{{ $item->id }}">{{ $item->title }}
                                        @else
                                            <option @if ($item->id == $news->category_id) selected
                                                    @endif value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endif

                                    @empty
                                        <h2>Нет категории</h2>
                                    @endforelse
                                        <option value="55">несуществующая категория</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="textEdit">Текст новости</label>
                                @if ($errors->has('text'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->get('text') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <textarea name="text" id="textEdit" class="form-control">{{ old('text') ?? $news->text ?? '' }}</textarea>
                            </div>

                            <div class="form-group">
                                @if ($errors->has('image'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->get('image') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <input type="file" name="image">
                            </div>

                            <div class="form-check">
                                @if ($errors->has('is_Private'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->get('is_Private') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <input  @if ($news->isPrivate === "1" || old('isPrivate') === "1") checked @endif id="newsPrivate" name="isPrivate"
                                        type="checkbox" value="1" class="form-check-input">
                                <label for="newsPrivate">Приватная</label>

                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-outline-primary" value="{{ $news->id ? 'Изменить': 'Добавить' }}">
                            </div>
                        </form>
                        <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
                        <script>
                            var options = {
                                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
                            };
                        </script>
                        <script>
                            CKEDITOR.replace('textEdit', options);
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
