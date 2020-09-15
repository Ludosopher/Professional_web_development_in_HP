@extends ('layouts.main')

@section ('title')
    @parentДобавление категорий
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
{{--                    @dd($categories->id);--}}
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="{{ $categories->id ? route('admin.categories.update', $categories): route('admin.categories.store') }}" method="post">
                            @csrf
                            @if($categories->id) @method('PUT') @endif
                            <div class="form-group">
                                <label for="categoryTitle">Заголовок категории</label>
                                @if ($errors->has('title'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach($errors->get('title') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <input type="text" name="title" id="categoryTitle" class="form-control"
                                       value="{{ $categories->title ?? old('title') }}">
                            </div>

                            <div class="form-group">
                                <label for="categorySlug">Slug</label>
                                @if ($errors->has('slug'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach($errors->get('slug') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <input type="text" name="slug" id="categorySlug" class="form-control"
                                       value="{{ $categories->slug ?? old('slug') }}">
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-outline-primary" value="{{ $categories->id ? 'Изменить': 'Добавить' }}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
