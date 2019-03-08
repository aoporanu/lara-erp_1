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
        @if (isset($product))
            <input type="hidden" name="product" value="{{ $product }}">
        @else
            <div class="form-group{{ $errors->has('product') ? ' is-invalid' : '' }}">
                <label for="products" class="col-md-2 control-label">{{ __('stocks.pages.create.product') }}</label>
                <div class="col-md-8">
                    <select name="products" id="products" class="js-products-single">

                    </select>
                </div>
            </div>
        @endif
        <div class="form-group">
            <label for="category_id" class="col-md-2 control-label">{{ __('stocks.pages.create.category_id') }}</label>
            <div class="col-md-8{{ $errors->has('category_id') ? ' is-invalid' : '' }}">
                <input type="text" name="category_id" id="category_id" class="js-example-basic-single form-control" value="{{ old('category_id') }}" />
                @if ($errors->has('category_id'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('category_id') }}</strong>
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="price" class="col-md-2 control-label">{{ __('stocks.pages.create.price') }}</label>
            <div class="col-md-8{{ $errors->has('price') ? ' is-invalid' : '' }}">
                <input type="text" id="price" class="form-control" name="price" value="{{ old('price') }}" />
                @if ($errors->has('price'))
                    <div class="alert alert-danger"><strong>{{ $errors->first('price') }}</strong></div>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="lot" class="col-md-2 control-label">{{ __('stocks.pages.create.lot') }}</label>
            <div class="col-md-8{{ $errors->has('lot') ? ' is-invalid' : '' }}">
                <input type="text" id="lot" name="lot" class="form-control" value="{{ old('lot') }}" />
                @if ($errors->has('lot'))
                    <div class="alert alert-danger"><strong>{{ $errors->first('lot') }}</strong></div>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="qty" class="col-md-2 control-label">{{ __('stocks.pages.create.qty') }}</label>
            <div class="col-md-8{{ $errors->has('qty') ? ' is-invalid' : '' }}">
                <input type="text" id="qty" name="qty" class="form-control" value="{{ old('qty') }}" />
                @if ($errors->has('qty'))
                    <div class="alert alert-danger"><strong>{{ $errors->first('qty') }}</strong></div>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('description') ? ' is-invalid' : '' }}">
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
    <script>
    jQuery(document).ready(function($) {
        let grid = [];
        let jsonTypes = $.ajax({
            url: "{{ route('types.get', ['type' => 'stocks']) }}",
            dataType: "json"
        }).done(function(response) {
            console.info(response);
            $('.js-example-basic-single').easyAutocomplete(response['data']);
        })
        // $('.js-example-basic-single').easyAutocomplete(options);

        {{-- console.info(types); --}}


        // $('.js-products-single').select2({
        //     ajax: {
        //         url: "{{ route('products.index') }}",
        //         dataType: 'json'
        //     }
        // });
    });
    </script>
@endsection
