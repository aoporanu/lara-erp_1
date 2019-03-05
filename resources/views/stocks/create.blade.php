@extends('layouts.app')

@section('title')
    {{ __('stocks.pages.create.title') }}
@endsection

@section('content')
    <form action="{{ route('stocks.store') }}" method="post" class="form form-horizontal">
        @csrf
        <div class="form-group">
            <label for="name" class="col-md-2 control-label">{{ __('stocks.pages.create.name') }}</label>
            <div class="col-md-8{{ $errors->has('name') ? ' is-invalid' : '' }}">
                <input type="text" placeholder="{{ __('stocks.pages.create.name') }}" value="{{ old('name') }}" class="form-control" id="name" name="name" />
                @if ($errors->has('name'))
                    <div class="alert alert-danger"><strong>{{ $errors->first('name') }}</strong></div>
                @endif
            </div>
        </div>
        <input type="hidden" name="product" value="{{ $product }}">
        <div class="form-group">
            <label for="category_id" class="col-md-2 control-label">{{ __('stocks.pages.create.category_id') }}</label>
            <div class="col-md-8{{ $errors->has('category_id') ? ' is-invalid' : '' }}">
                <input type="text" class="form-control" id="category_id" name="category_id" value="{{ old('category_id') }}" />
            </div>
        </div>
        <div class="form-group">
            <label for="price" class="col-md-2 control-label">{{ __('stocks.pages.create.price') }}</label>
            <div class="col-md-8{{ $errors->has('price') ? ' is-invalid' : '' }}">
                <input type="text" id="price" class="form-control" name="price" value="{{ old('price') }}" />
            </div>
        </div>
        <div class="form-group">
            <label for="lot" class="col-md-2 control-label">{{ __('stocks.pages.create.lot') }}</label>
            <div class="col-md-8{{ $errors->has('lot') ? ' is-invalid' : '' }}">
                <input type="text" id="lot" name="lot" class="form-control" value="{{ old('lot') }}" />
            </div>
        </div>
        </div>
        <div class="form-group">
            <label for="qty" class="col-md-2 control-label">{{ __('stocks.pages.create.qty') }}</label>
            <div class="col-md-8{{ $errors->has('qty') ? ' is-invalid' : '' }}">
                <input type="text" id="qty" name="qty" class="form-control" value="{{ old('qty') }}" />
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('stocks.pages.create.submit') }}
        </div>
    </form>
@endsection
