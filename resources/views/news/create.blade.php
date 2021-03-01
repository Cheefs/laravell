@extends('layouts.app')

@section('menu')
    @include(
        'main-menu', [
            'current' => [
                'route' => 'news.create',
                'name' => __('Create News'),
            ]
        ])
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create news') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('news.create') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                            <div class="col-md-6">
                                <input
                                   id="title"
                                   type="text"
                                   class="form-control @error('title') is-invalid @enderror"
                                   name="title"
                                   value="{{ old('title') }}"
                                   required
                                   autofocus
                                >
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Text" class="col-md-4 col-form-label text-md-right">{{ __('Text') }}</label>

                            <div class="col-md-6">
                                <textarea
                                    id="Text"
                                    type="text"
                                    class="form-control @error('Text') is-invalid @enderror"
                                    name="text"
                                    required
                                ></textarea>
                                @error('Text')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-6">
                                <select
                                    id="category_id"
                                    class="form-control @error('category_id') is-invalid @enderror"
                                    name="category_id"
                                    required
                                >
                                    @foreach($categoryList as $category)
                                        <option value="{{ $category['id'] }}">{{ __($category['title']) }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection