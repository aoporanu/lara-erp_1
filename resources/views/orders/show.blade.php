<ul>
    @foreach ($orders as $order)
        <li>{{ $order->name }}</li>
        @endforeach
</ul>