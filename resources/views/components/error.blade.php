@if ($errors -> any())
    <div class="validation">
        @foreach ($errors -> all() as $error)
            • {{ $error }} <br>
        @endforeach
    </div>
@endif
