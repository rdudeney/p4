<div class='session'>
    <h3>
        @foreach($session->descriptions as $description)
            {{ $description->type. ' ' }}
        @endforeach
    </h3>
    <ul>
        <li>date: {{ $session->day->date }}</li>
        <li>{{ $session->hours. ' hours' }}</li>

        <a href='/sessions/{{ $session->id }}'>View Session</a>
    </ul>
</div>