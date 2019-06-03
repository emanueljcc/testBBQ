@if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="close-alert">×</button>
        <i class="material-icons">error</i>
        {{$message}}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Ooops!</strong> Hubo algunos problemas.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
