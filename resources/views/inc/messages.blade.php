
@if (count($errors)>0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif
    </pre>

@if (session('success'))

<div class="alert alert-success">
    {!!Session::get('success')!!}
</div>

@endif

@if (session('error'))

<div class="alert alert-danger">
    {!!Session::get('error')!!}
</div>

@endif
