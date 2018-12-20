<div class='session'>
    <h3>
        @foreach($session->descriptions as $description)
            {{ $description->type. ' // ' }}
        @endforeach
    </h3>
    <ul>
        <li>date: {{ $session->day->convertDate() }}</li>
        <li>{{ $session->hours. ' hours' }}</li>
    </ul>
</div>