@extends('layouts.app')

@section('title'){{ __('stocks.pages.index.title') }}@endsection

    @section('content')
        <div class="table-responsive">
            <table class="table table-stripped">
                <tr>
                    <th>{{ __('stocks.pages.index.id') }}</th>
                    <th>{{ __('stocks.pages.index.stock-name') }}</th>
                    <th>{{ __('stocks.pages.index.stock-price') }}</th>
                    <th>{{ __('stocks.pages.index.qty') }}</th>
                    <th>{{ __('stocks.pages.index.lot') }}</th>
                    <th>{{ __('stocks.pages.index.type') }}</th>
                    <th>{{ __('stocks.pages.index.product-name') }}</th>
                    <th>{{ __('stocks.pages.index.product-price') }}</th>
                </tr>
                @if (count($stocks))
                    @foreach($stocks as $stock)
                        <tr>
                            <td>{{ $stock->id }}</td>
                            <td>{{ $stock->name }}</td>
                            <td>{{ $stock->sprice }}</td>
                            <td>{{ $stock->sqty }}</td>
                            <td>{{ $stock->lot }}</td>
                            <td>{{ $stock->tname }}</td>
                            <td>{{ $stock->pname }}</td>
                            <td>{{ $stock->pprice }}</td>
                        </tr>
                    @endforeach
                @endif
            </table>
            <a href="{{ route('stocks.create') }}" class="btn btn-primary">{{ __('stocks.pages.create.submit') }}</a>
        </div>
    @endsection
