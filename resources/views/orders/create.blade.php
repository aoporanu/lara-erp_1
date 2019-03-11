@extends('layouts.app')

@section('title'){{ __('orders.pages.create.title') }}@endsection

@section('content')
    <h4 class="page-title">{{ __('orders.pages.create.title') }}</h4>
    <form action="{{ route('orders.store') }}" method="post" class="form form-horizontal">
        @csrf
        <div class="form-group row{{ $errors->has('shop_id') ? ' is-invalid' : '' }}">
            <label class="col-sm-2 control-label" for="shop_id">{{ __('orders.pages.create.shop_id') }}</label>
            <div class="col-sm-10">
                <input type="text" id="shop_id" class="bs-autocomplete form-control" value="{{ old('shop_id') }}" data-item_id="id" data-name="shops" data-item_label="shopName" data-source="{{ route('shops.index') }}" autocomplete="off" />
                @if($errors->has('shop_id'))
                    <div class="alert alert-danger">
                        {{ $errors->first('shop_id') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="tp" class="col-sm-2 control-label">{{ __('orders.pages.create.tp') }}</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="tp" name="tp" value="{{ old('tp') }}" autocomplete="off" />
                @if($errors->has('tp'))
                    <div class="alert alert-danger">
                        {{ $errors->first('tp') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group row{{ $errors->has('user_id') ? ' is-invalid' : '' }}">
            <label for="user_id" class="col-sm-2 control-label">{{ __('orders.pages.create.user_id') }}</label>
            <div class="col-sm-10">
                <input type="text" class="bs-autocomplete form-control" id="user_id" data-item_id=id value="{{ old('user_id') }}" data-name="users" data-item_label="agentName" data-source="{{ route('users.index', ['role' => 'agent']) }}" autocomplete="off" />
                @if($errors->has('user_id'))
                    <div class="alert alert-danger">
                        {{ $errors->first('user_id') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group row"><label for="product-list" class="col-sm-2 col-form-label">{{ __('orders.pages.create.product-list') }}</label>
            <div class="col">
                <select name="product_list" id="product-list" class="form-control" multiple></select>
            </div>
        </div>
        <div class="form-group row{{ $errors->has('products') ? ' is-invalid': '' }}">
            <label for="products" class="col-sm-2 col-form-label">{{ __('orders.pages.create.products') }}</label>
            <div class="col">
                <input type="text" class="bs-autocomplete form-control" id="products" data-item_id="id" value="{{ old('products') }}" data-name="products" data-list="product-list" data-item_label="productName" data-source="{{ route('products.index') }}" autocomplete="off" />
            </div>
            <div class="col">
                <input type="text" id="qty" class="form-control" name="qty" autocomplete="off" placeholder="{{ __('orders.pages.create.qty') }}" />
            </div>
            @if($errors->has('products'))
                <div class="alert alert-danger">
                    {{ $errors->first('products') }}
                </div>
            @endif
        </div>
        <div class="form-group row">
            <label for="observations" class="col-sm-2 col-form-label">{{ __('orders.pages.create.observations') }}</label>
            <div class="col">
                <textarea name="observations" id="observations" cols="30" rows="10" class="form-control">{{ old('observations') }}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-8 ml-md-auto">
                <button class="btn btn-primary" type="submit">{{ __('orders.pages.create.submit') }}</button>
            </div>
        </div>
    </form>
    @endsection
