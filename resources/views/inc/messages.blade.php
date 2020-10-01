</pre>








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
    {{session('success')}}
</div>
    
@endif

@if (session('error'))

<div class="alert alert-danger">
    {{session::get('error')}}
</div>
    
@endif