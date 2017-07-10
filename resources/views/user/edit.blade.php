@extends('layouts.app')
@section('title', 'User - edit: '.$user->email)
@section('content')
<form class="form-horizontal" action="{{ route('user.update', $user->id) }}" method="post" autocomplete="off">
  {{ method_field('PUT') }}
  {{ csrf_field() }}
  <div class="panel panel-info">
    <div class="panel-heading">Update User: {{$user->email}}</div>

    <div class="panel-body">
      <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
        <label for="name" class="col-md-2 control-label">Name</label>
        <div class="col-md-8">
          <input id="name" class="form-control" type="text"
            name="name" placeholder="name..." value="{{ $user->name }}">
          @if ($errors->has('name'))
            <span class="help-block">{{ $errors->first('name') }}</span>
          @endif
        </div>
      </div>
      <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
        <label for="password" class="col-md-2 control-label">Password</label>
        <div class="col-md-8">
          <input id="password" class="form-control" type="text"
            name="password" placeholder="password..." value="">
          @if ($errors->has('password'))
            <span class="help-block">{{ $errors->first('password') }}</span>
          @endif
        </div>
      </div>
    </div>

    <div class="panel-footer text-right">
      <a class="btn btn-sm btn-default" href="{{ route('user.index') }}">Cancel</a>
      <button class="btn btn-sm btn-primary" type="submit">Save</button>
    </div>
  </div>
</form>
@endsection
