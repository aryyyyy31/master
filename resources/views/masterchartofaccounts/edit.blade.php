@extends('layouts.master')

@section('title')
- Edit
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Category</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('masterchartofaccounts.index') }}"> Back</a>
        </div>
    </div>
</div>
<br>
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('masterchartofaccounts.update', $masterchartofaccount->id) }}" method="POST"
    enctype="multipart/form-data">
    @csrf

    @method('PUT')

    <div class="row gap-2 mt-2">
        <div class="col-md-4 col-12 mb-2">
            <div class="form-group">
                <strong>Code</strong>
                <input type="text" name="code" class="form-control" placeholder="Code"
                    value="{{$masterchartofaccount->code}}">
            </div>
        </div>

        <div class="col-md-4 col-12 mb-2">
            <div class="form-group">
                <strong>Name</strong>
                <input type="text" name="name" class="form-control" placeholder="Name"
                    value="{{$masterchartofaccount->name}}">
            </div>
        </div>

        <div class="col-md-4 col-12 mb-2">
            <div class="form-group">
                <strong>Category</strong>
                <input type="text" name="category" class="form-control" placeholder="Category"
                    value="{{$masterchartofaccount->category}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection