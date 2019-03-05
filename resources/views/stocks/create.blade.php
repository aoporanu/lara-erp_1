@extends('layouts.app')

@section('title')
    {{ __('stocks.pages.create.title') }}
@endsection

@section('content')
    {{ debug($product) }}
    <form action="{{ route('stocks.store') }}" method="post" class="form form-horizontal">
        @csrf
        <div class="form-group">
            <label for="name" class="col-md-2 control-label">{{ __('stocks.pages.create.name') }}</label>
            <div class="col-md-8{{ $errors->has('name') : ' is-invalid' : '' }}">
                <input type="text" placeholder="{{ __('stocks.pages.create.name') }}" value="{{ old('name') }}" class="form-control" id="name" name="name" />
                @if ($errors->has('name'))
                    <div class="alert alert-danger"><strong>{{ $errors->first('name') }}</strong></div>
                @endif
            </div>
        </div>
    </form>
@endsection
