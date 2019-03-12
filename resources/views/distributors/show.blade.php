{{--{{ dump($distributors>distributors) }}--}}
<ul>
        @foreach($distributors as $distributor)
            @foreach($distributor->distributors as $distributor)
                <li>{{ $distributor->name }}</li>
                @endforeach
        @endforeach
    </ul>