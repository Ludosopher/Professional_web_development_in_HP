@extends ('layouts.main')

@section ('title')
    @parentДобавление ресурса
@endsection
@section ('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create') }}</div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="{{ $resource->id ? route('admin.resources.update', $resource): route('admin.resources.store') }}" method="post">
                            @csrf
                            @if($resource->id) @method('PUT') @endif
                            <div class="form-group">
                                <label for="resourceTitle">Заголовок ресурса</label>
                                @if ($errors->has('title'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach($errors->get('title') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <input type="text" name="title" id="resourceTitle" class="form-control"
                                       value="{{ $resource->title ?? old('title') }}">
                            </div>

                            <div class="form-group">
                                <label for="link">Ссылка</label>
                                @if ($errors->has('link'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach($errors->get('link') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <input type="text" name="link" id="resource" class="form-control"
                                       value="{{ $resource->link ?? old('resource') }}">
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-outline-primary" value="{{ $resource->id ? 'Изменить': 'Добавить' }}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
