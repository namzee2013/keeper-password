@extends('layouts.app')
@section('title', 'Password - '.$data->title)
@section('content')
<div class="panel panel-primary">
  <div class="panel-heading">
    Infomation account
  </div>

  <div class="panel-body form-horizontal">
    <div class="form-group">
      <label class="col-md-2 control-label">Title:</label>
      <div class="col-md-8">
        <p class="form-control-static">{{$data->title}}</p>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-2 control-label">Login:</label>
      <div class="col-md-8">
        <p class="form-control-static">{{$data->login}}</p>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-2 control-label">Password:</label>
      <div class="col-md-8">
        <div class="input-group">
          <input id="password" type="password" class="form-control"
            value="{{$data->password}}">
          <span class="input-group-btn">
            <a id="ShowPassword" class="btn btn-default" type="button">show</a>
            <a id="Copy" class="btn btn-info" type="button">copy</a>
          </span>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-2 control-label">Website:</label>
      <div class="col-md-8">
        <p class="form-control-static">
          <a href="{{$data->website}}">{{$data->website ? $data->website : 'n/a'}}</a>
        </p>
      </div>
    </div>
    <div class="col-md-8 col-md-offset-2 text-right">
      <a class="btn btn-default" href="{{route('keeper-password.index')}}">back</a>
    </div>
  </div>
</div>
@endsection
