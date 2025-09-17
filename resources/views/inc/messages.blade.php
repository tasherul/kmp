@if(count($errors)>0)
<div class="alert alert-danger">
    @foreach($errors->all() as $errors)
        <li>{{$errors}}</li>
    @endforeach
</div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif


@if(session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
@endif


@if(session('delete_message'))
    <div class="alert alert-danger">
        {{session('delete_message')}}
    </div>
@endif

