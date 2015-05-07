@if (count($errors) > 0)
    <div class="alert alert-danger">
        It looks like there was a few errors with that last request:<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
