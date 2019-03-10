@extends('layouts.app')

@section('title')
    -- {{ __('orders.pages.create.title') }}
    @endsection

@section('content')
    <form action="{{ route('orders.store') }}" method="post" class="form form-horizontal">
        <div class="form-group{{ $errors->has('shop_id') ? ' is-invalid' : '' }}">
            <label class="col-md-2 control-label" for="shop_id">{{ __('orders.pages.create.shop_id') }}</label>
            <div class="col-md-8">
                <input type="text" id="shop_id" class="bs-autocomplete form-control" value="{{ old('shop_id') }}" data-item_id="id" data-name="shops" data-item_label="shopName" data-source="{{ route('shops.index') }}" autocomplete="off" />
            </div>
        </div>
    </form>
    @endsection