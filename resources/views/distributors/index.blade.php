@extends('layouts.app')

@section('title'){{ __('distributors.pages.index.title') }}@endsection

@section('content')
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>{{ __('distributors.pages.index.public-id') }}</th>
                <th>{{ __('distributors.pages.index.name') }}</th>
            </tr>
            @foreach($distributors as $distributor)
                <tr>
                    <td>{{ $distributor->public_id }}</td>
                    <td>{{ $distributor->name }}</td>
                </tr>
                @endforeach
            </thead>
        </table>
    </div>
    @endsection