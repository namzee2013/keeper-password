
@extends('layouts.app')

@section('content')
<form class="form-horizontal" action="{{ route('keeper-password.update', $data->id) }}" method="post" autocomplete="off">
  {{ method_field('PUT') }}
  {{ csrf_field() }}
  <div class="panel panel-info">
    <div class="panel-heading">Keeper Password</div>

    <div class="panel-body">
      <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
        <label for="title" class="col-md-2 control-label">Title</label>
        <div class="col-md-8">
          <input id="title" class="form-control" type="text"
            name="title" placeholder="title..." value="{{ $data->title }}">
          @if ($errors->has('title'))
            <span class="help-block">{{ $errors->first('title') }}</span>
          @endif
        </div>
      </div>

      <div class="form-group {{$errors->has('login') ? 'has-error' : ''}}">
        <label for="login" class="col-md-2 control-label">Login</label>
        <div class="col-md-8">
          <input id="login" class="form-control" type="text"
            name="login" placeholder="login..." value="{{ $data->login }}">
          @if ($errors->has('login'))
            <span class="help-block">{{ $errors->first('login') }}</span>
          @endif
        </div>
      </div>

      <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
        <label for="password" class="col-md-2 control-label">Password</label>
        <div class="col-md-8">
          <div class="input-group">
            <input  id="password" type="password" name="password" class="form-control"
              placeholder="password keeper..." value="{{ $data->password }}">
            <span class="input-group-btn">
              <a id="ShowPassword" class="btn btn-default" type="button">show</a>
              <a id="Copy" class="btn btn-info" type="button">copy</a>
            </span>
          </div>
          @if ($errors->has('password'))
            <div class="has-error">
              <span class="help-block">{{ $errors->first('password') }}</span>
            </div>
          @endif
        </div>
        <div class="col-md-2">
          <a id="random" class="btn btn-link" type="button" name="button">
            <i class="fa fa-random fa-2x" aria-hidden="true"></i>
          </a>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-8 col-md-offset-2">
          <div class="form-inline">
            <div class="checkbox">
              <input id="ModeUpercase" type="checkbox">
              <label for="ModeUpercase">Uper Case</label>
            </div>
            <div class="checkbox m-l-md">
              <input id="ModeLowercase" type="checkbox">
              <label for="ModeLowercase">Lower Case</label>
            </div>
            <div class="checkbox m-l-md">
              <input id="ModeNumber" type="checkbox">
              <label for="ModeNumber">Number</label>
            </div>
            <div class="checkbox m-l-md">
              <input id="ModeSymbol" type="checkbox">
              <label for="ModeSymbol">Symbol</label>
            </div>
          </div>

          <div class="form-inline">
            <span>Length</span>
            <input id="Length" class="form-control" type="number">
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="website" class="col-md-2 control-label">Website</label>
        <div class="col-md-8">
          <input id="website" class="form-control" type="text"
            name="website" placeholder="http://" value="{{ $data->website }}">
        </div>
      </div>
    </div>

    <div class="panel-footer text-right">
      <a class="btn btn-sm btn-default" href="{{ route('keeper-password.index') }}">Cancel</a>
      <button class="btn btn-sm btn-primary" type="submit">Save</button>
    </div>

  </div>
</form>
@endsection
