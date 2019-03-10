@extends('layouts.app')
@section('title') -- {{ __('shops.pages.create.title') }} @endsection
@section('content')
    <form action="{{ route('shops.store') }}" method="post" class="form form-horizontal">
        <div class="form-group">
            <label for="name" class="col-md-2">{{ __('shops.pages.create.name') }}</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
            </div>
        </div>
        <div class="form-group">
            <label for="agent_id" class="col-md-2">{{ __('shops.pages.create.agent_id') }}</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="agent_id" name="agent_id" value="{{ old('agent_id') }}" />
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-md-2">{{ __('shops.pages.create.lat') }}</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="lat" name="lat" value="{{ old('lat') }}" />
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-md-2">{{ __('shops.pages.create.lng') }}</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="lng" name="lng" value="{{ old('lng') }}" />
            </div>
        </div>
    </form>
    @endsection