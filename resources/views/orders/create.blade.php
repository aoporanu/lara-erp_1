@extends('layouts.app')

@section('title'){{ __('orders.pages.create.title') }}@endsection

@section('content')
    <form action="{{ route('orders.store') }}" method="post" class="form form-horizontal">
        <div class="form-group{{ $errors->has('shop_id') ? ' is-invalid' : '' }}">
            <label class="col-md-2 control-label" for="shop_id">{{ __('orders.pages.create.shop_id') }}</label>
            <div class="col-md-8">
                <input type="text" id="shop_id" class="bs-autocomplete form-control" value="{{ old('shop_id') }}" data-item_id="id" data-name="shops" data-item_label="shopName" data-source="{{ route('shops.index') }}" autocomplete="off" />
            </div>
        </div>
        <div class="form-group{{ $errors->has('user_id') ? ' is-invalid' : '' }}">
            <label for="user_id" class="col-md-2 control-label">{{ __('orders.pages.create.user_id') }}</label>
            <div class="col-md-8">
                <input type="text" class="bs-autocomplete form-control" id="user_id" data-item_id=id value="{{ old('user_id') }}" data-name="users" data-item_label="agentName" data-source="{{ route('users.index', ['role' => 'agent']) }}" autocomplete="off" />
            </div>
        </div>
        <div class="form-group{{ $errors->has('products') ? ' is-invalid': '' }}">
            <label for="products" class="col-md-2 control-label">{{ __('orders.pages.create.products') }}</label>
            <div class="col-md-8">
                <input type="text" class="bs-autocomplete form-control" id="products" data-item_id="id" value="{{ old('products') }}" data-name="products" data-item_label="productName" data-source="{{ route('products.index') }}" autocomplete="off" />
            </div>
        </div>
    </form>
    @endsection
