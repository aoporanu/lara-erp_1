@extends('layouts.app')

@section('title')
    {{ __('products.pages.index.title') }}
@endsection

@section('content')
    <div class="table-responsive">
        <table class="table table-stripped">
            <tr>
                <th>{{ __('products.pages.index.id') }}</th>
                <th>{{ __('products.pages.index.name') }}</th>
                <th>{{ __('products.pages.index.price') }}</th>
                <th>{{ __('products.pages.index.actions') }}</th>
            </tr>
            @if(isset($products))
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td><a href="{{ route('stocks.create', ['product' => $product]) }}" class="button button-primary">{{ __('products.pages.index.create-stock') }}</a></td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>
@endsection
