@extends('layouts.app')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                      <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">{{ __('Title') }}</label>
                            <input
                               id="title"
                               type="text"
                               class="form-control"
                               name="title"
                               value="{{ old('title') }}"
                               required
                               autofocus
                            >
                        </div>

                        <div class="form-group">
                            <label for="news_category_id">{{ __('Category') }}</label>
                            <select
                                id="news_category_id"
                                class="form-control"
                                name="news_category_id"
                                required
                            >
                                @foreach($categoryList as $category)
                                    <option
                                        @if( old('news_category_id') === $category->id) selected @endif
                                        value="{{ $category->id }}"
                                    >
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="Text">{{ __('Text') }}</label>
                            <textarea
                                id="Text"
                                type="text"
                                class="form-control"
                                name="text"
                                required
                            >{{ old('text') }}</textarea>
                        </div>

                        <div class="form-check">
                            <input id="is_private"
                               @if( old('is_private') ) checked @endif
                               name="is_private"
                               type="checkbox"
                               value="1"
                               class="form-check-input"
                            >
                            <label for="is_private" >{{ __('Is Private') }}</label>
                        </div>

                        <div class="form-group">
                          <input type="file" name="image">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Create') }}
                            </button>
                        </div>

                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection