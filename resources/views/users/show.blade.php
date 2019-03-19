@extends('layouts.app')

@section('title')
    {{ __('users.pages.show.title') }}
@endsection

@section('content')
    <div class="pb-2 mt-4 mb-2 border-bottom">
        {{ __('users.pages.show.title') }}
    </div>
    <nav class="nav nav-pills nav-justified" role="tablist" id="myTab">
      <a class="nav-link active" href="#general">{{ __('users.pages.show.general') }}</a>
      <a class="nav-link" href="#distributors">{{ __('users.pages.show.distributors') }}</a>
      <a class="nav-link" href="#orders">{{ __('users.pages.show.orders') }}</a>
      <a class="nav-link" href="#clients">{{ __('users.pages.show.clients') }}</a>
    </nav>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="general">
            asd1
        </div>
        <div class="tab-pane fade" id="distributors">
            @if (count($user->distributors) == 0)
                {{ __('users.pages.show.messages.no-distributors') }}
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('users.pages.show.labels.distributor.name') }}</th>
                            <th>{{ __('users.pages.show.labels.distributor.products') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($user->distributors as $distributor)
                        <tr>
                            <td>{{ $distributor->name }}</td>
                            <td>
                                {{ count($distributor->products) }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="tab-pane fade" id="orders">
            asd3
        </div>
        <div class="tab-pane fade" id="clients">
            @if (count($user->route) === 0)
                <p class="alert alert-danger">{{ __('users.pages.show.messages.no-routes') }}</p>
            @else
                <form action="" method="post" class="mb-2">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="hidden" name="user" value="{{ $user->public_id }}" />
                            <label for="shop_id">{{ __('users.pages.show.form.shop_id') }}</label>
                            <input type="text" id="shop_id" name="shop_id" class="form-control bs-autocomplete" value="{{ old('shop_id') }}" autocomplete="off" />
                            <label for="ceil">{{ __('users.pages.show.form.ceil') }}</label>
                            <input type="text" value="{{ old('ceil') }}" autocomplete="off" id="ceil" class="form-control" name="ceil" />
                            <label for="payment_due">{{ __('users.pages.show.form.payment_due') }}</label>
                            <input type="text" value="{{ old('payment_due') }}" autocomplete="off" id="payment_due" class="form-control" name="payment_due">
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="day[]" name="day[]" />
                                <label class="form-check-label" for="day[]">{{ __('users.pages.show.form.mon') }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="day[]" name="day[]" />
                                <label class="form-check-label" for="day[]">{{ __('users.pages.show.form.tue') }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="day[]" name="day[]" />
                                <label class="form-check-label" for="day[]">{{ __('users.pages.show.form.wed') }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="day[]" name="day[]" />
                                <label class="form-check-label" for="day[]">{{ __('users.pages.show.form.thu') }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="day[]" name="day[]" />
                                <label class="form-check-label" for="day[]">{{ __('users.pages.show.form.fri') }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="day[]" name="day[]" />
                                <label class="form-check-label" for="day[]">{{ __('users.pages.show.form.sat') }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="day[]" name="day[]" />
                                <label class="form-check-label" for="day[]">{{ __('users.pages.show.form.sun') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6"></div>
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary">{{ __('users.pages.show.form.submit') }}</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                {{ __('users.pages.show.labels.client') }}
                            </th>
                            <th>
                                {{ __('users.pages.show.labels.client-day1') }}

                            </th>
                            <th>
                                {{ __('users.pages.show.labels.client-day2') }}
                            </th>
                            <th>
                                {{ __('users.pages.show.labels.client-day3') }}
                            </th>
                            <th>
                                {{ __('users.pages.show.labels.client-day4') }}
                            </th>
                            <th>
                                {{ __('users.pages.show.labels.client-day5') }}
                            </th>
                            <th>
                                {{ __('users.pages.show.labels.client-day6') }}
                            </th>
                            <th>
                                {{ __('users.pages.show.labels.client-day7') }}
                            </th>
                            <th>
                                {{ __('users.pages.show.labels.client-actions') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->route as $route)
                            <tr>
                                <td>
                                    {{ $route->client[0]->name }}
                                </td>
                                <td>
                                    <i class="fa fa-check{{ $route->day1 == 1 ? ' text-success' : ' text-danger' }}"></i>
                                </td>
                                <td>
                                    <i class="fa fa-check{{ $route->day2 == 1 ? ' text-success' : ' text-danger' }}"></i>
                                </td>
                                <td>
                                    <i class="fa fa-check{{ $route->day3 == 1 ? ' text-success' : ' text-danger' }}"></i>
                                </td>
                                <td>
                                    <i class="fa fa-check{{ $route->day4 == 1 ? ' text-success' : ' text-danger' }}"></i>
                                </td>
                                <td>
                                    <i class="fa fa-check{{ $route->day5 == 1 ? ' text-success' : ' text-danger' }}"></i>
                                </td>
                                <td>
                                    <i class="fa fa-check{{ $route->day6 == 1 ? ' text-success' : ' text-danger' }}"></i>
                                </td>
                                <td>
                                    <i class="fa fa-check{{ $route->day7 == 1 ? ' text-success' : ' text-danger' }}"></i>
                                </td>
                                <td>
                                    @if ($route->day1 == 1 && $day === 1)
                                        <a href="{{ route('orders.create', ['client' => $route->client[0]->cui]) }}" class="btn btn-default">create order</a>
                                    @endif
                                    @if ($route->day2 == 1 && $day === 2)
                                        <a href="{{ route('orders.create', ['client' => $route->client[0]->cui]) }}" class="btn btn-default">create order</a>
                                    @endif
                                    @if ($route->day3 == 1 && $day === 3)
                                        <a href="{{ route('orders.create', ['client' => $route->client[0]->cui]) }}" class="btn btn-default">create order</a>
                                    @endif
                                    @if ($route->day4 == 1 && $day === 4)
                                        <a href="{{ route('orders.create', ['client' => $route->client[0]->cui]) }}" class="btn btn-default">create order</a>
                                    @endif
                                    @if ($route->day5 == 1 && $day === 5)
                                        <a href="{{ route('orders.create', ['client' => $route->client[0]->cui]) }}" class="btn btn-default">create order</a>
                                    @endif
                                    @if ($route->day6 == 1 && $day === 6)
                                        <a href="{{ route('orders.create', ['client' => $route->client[0]->cui]) }}" class="btn btn-default">create order</a>
                                    @endif
                                    @if ($route->day7 == 1 && $day === 7)
                                        <a href="{{ route('orders.create', ['client' => $route->client[0]->cui]) }}" class="btn btn-default">create order</a>
                                    @endif
                                    <a href="{{ route('users.ledger', ['client' => $route->client[0]->cui]) }}" class="btn btn-success">{{ __('users.pages.show.labels.ledgers') }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    $(document).ready(function() {
        $('#myTab a').on('click', function(e) {
            e.preventDefault();
            $(this).tab('show');
        });
    });
@endsection
