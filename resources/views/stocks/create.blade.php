@extends('layouts.app')

@section('title')
    {{ __('stocks.pages.create.title') }}
@endsection

@section('content')
    <form action="{{ route('stocks.store') }}" method="post" class="form form-horizontal">
        @csrf
        <div class="form-group">
            <label for="name" class="col-md-2 control-label">{{ __('stocks.pages.create.name') }}</label>
            <div class="col-md-8{{ $errors->has('name') ? ' alert alert-danger' : '' }}">
                <input type="text" placeholder="{{ __('stocks.pages.create.name') }}" value="{{ old('name') }}" class="form-control" id="name" name="name" />
                @if ($errors->has('name'))
                    <div class="alert alert-danger"><strong>{{ $errors->first('name') }}</strong></div>
                @endif
            </div>
        </div>
        @if (isset($product))
            <input type="hidden" name="product" value="{{ $product }}">
        @else
            <div class="form-group{{ $errors->has('product') || $errors->has('product_id') ? ' alert alert-danger' : '' }}">
                <label for="products" class="col-md-2 control-label">{{ __('stocks.pages.create.product') }}</label>
                <div class="col-md-8">
                     <input type="text" name="product" id="product" class="bs-autocomplete form-control" value="{{ old('products') }}" data-source="{{ route('products.index') }}" data-hidden_field_id="product_id" data-item_id="id" data-name="products" data-item_label="productName" autocomplete="off" />
                    @if($errors->has('product'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('products') }}</strong>
                        </div>
                    @endif
                    <input type="hidden" id="product_id" value="{{ old('product_id') }}" name="product_id" />
                    @if($errors->has('product_id'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('product_id') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
        @endif
        <div class="form-group">
            <label for="category_id" class="col-md-2 control-label">{{ __('stocks.pages.create.category_id') }}</label>
            <div class="col-md-8{{ $errors->has('category_id') ? ' alert alert-danger' : '' }}">
                 <input type="text" name="category_id" id="category_id" class="bs-autocomplete form-control" value="{{ old('category_id') }}" data-source="{{ route('types.get', ['type' => 'stocks']) }}" data-hidden_field_id="category-id" data-item_id="id" data-name="category" data-item_label="categoryName" autocomplete="off" />
                <input type="hidden" id="category-id" value="{{ old('category__id') }}" name="category__id" />
                @if ($errors->has('category__id'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('category__id') }}</strong>
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="price" class="col-md-2 control-label">{{ __('stocks.pages.create.price') }}</label>
            <div class="col-md-8{{ $errors->has('price') ? ' alert alert-danger' : '' }}">
                <input type="text" id="price" class="form-control" name="price" value="{{ old('price') }}" />
                @if ($errors->has('price'))
                    <div class="alert alert-danger"><strong>{{ $errors->first('price') }}</strong></div>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="lot" class="col-md-2 control-label">{{ __('stocks.pages.create.lot') }}</label>
            <div class="col-md-8{{ $errors->has('lot') ? ' alert alert-danger' : '' }}">
                <input type="text" id="lot" name="lot" class="form-control" value="{{ old('lot') }}" />
                @if ($errors->has('lot'))
                    <div class="alert alert-danger"><strong>{{ $errors->first('lot') }}</strong></div>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="qty" class="col-md-2 control-label">{{ __('stocks.pages.create.qty') }}</label>
            <div class="col-md-8{{ $errors->has('qty') ? ' alert alert-danger' : '' }}">
                <input type="text" id="qty" name="qty" class="form-control" value="{{ old('qty') }}" />
                @if ($errors->has('qty'))
                    <div class="alert alert-danger"><strong>{{ $errors->first('qty') }}</strong></div>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('description') ? ' alert alert-danger' : '' }}">
            <label for="description" class="col-md-2 control-label">{{ __('stocks.pages.create.description') }}</label>
            <div class="col-md-8">
                <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea>
                @if ($errors->has('description'))
                    <div class="alert-danger">
                        <strong>{{ $errors->first('description') }}</strong>
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('stocks.pages.create.submit') }}</button>
        </div>
    </form>
@endsection

@section('scripts')

@endsection
