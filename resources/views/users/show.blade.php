@extends('layouts.app')

@section('title')
    {{ __('users.pages.show.title') }}
@endsection

@section('content')
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
            asd4
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
