@extends('layouts.app')

@section('title')
    {{ __('products.pages.index.title') }}
@endsection

@section('content')
    <form class="form-horizontal" method="post" action="{{ route('products.store') }}">
        @csrf
        <div class="form-group{{ $errors->has('name') ? ' is-invalid' : '' }}">
            <label for="name" class="col-md-2 control-label">{{ __('products.pages.create.name') }}</label>
            <div class="col-md-8">
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" />
                @if($errors->has('name'))
                    <div class="alert-danger">
                        <strong>{{ $errors->first('name') }}</strong>
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('description') ? ' is-invalid' : '' }}">
            <label for="description" class="col-md-2 control-label">{{ __('products.pages.create.description') }}</label>
            <div class="col-md-8">
                <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="alert-danger">
                        <strong>{{ $errors->first('description') }}</strong>
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="price" class="col-md-2 control-label">{{ __('products.pages.create.price') }}</label>
            <div class="col-md-8">
                <input type="text" id="price" name="price" class="form-control" value="{{ old('price') }}" />
                @if($errors->has('price'))
                    <div class="alert-danger">
                        <strong>{{ $errors->first('price') }}</strong>
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-4">
                <button type="submit" class="btn green" name="btn_save">{{ __('products.pages.create.button') }}</button>
                <button type="submit" class="button button-primary" name="btn_continue">{{ __('products.pages.create.btn-continue') }}</button>
            </div>
        </div>
    </form>
@endsection
