@extends('layouts.app')

@section('title'){{ __('distributors.pages.create.title') }}@endsection

@section('content')
    <form method="post" action="{{ route('distributors.store') }}">
        @csrf
        <div class="form-group row{{ $errors->has('name') ? ' alert alert-danger' : '' }}">
            <label for="name" class="col-sm-2 col-form-label">{{ __('distributors.pages.create.name') }}</label>
            <div class="col-sm-10">
                <input type="text" autocomplete="off" class="form-control" id="name" name="name" value="{{ old('name') }}" />
                @if($errors->has('name'))
                    <div class="alert alert-danger">
                        {{ $errors->first('name') }}
                    </div>
                    @endif
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">{{ __('distributors.pages.create.submit') }}</button>
            </div>
        </div>
    </form>
    @endsection