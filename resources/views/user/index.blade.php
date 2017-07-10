@extends('layouts.app')
@section('title', 'User - List')
@section('content')
<div class="panel panel-info">
  <div class="panel-heading">User</div>

  <div class="panel-body">
    <a class="btn btn-sm btn-primary" href="{{ route('user.create') }}">Create</a>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Website</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $key => $value)
        <tr>
          <td>{{$key+1}}</td>
          <td>{{$value->name}}</td>
          <td>{{$value->email}}</td>
          <td>
            @if ($value->canAccess())
              <form action="{{route('user.destroy', $value->id)}}" method="post">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <a class="btn btn-sm btn-default"
                  href="{{ route('user.edit', $value->id) }}">
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </a>
                <button type="submit" class="btn btn-sm btn-danger"
                  onClick="return confirm('DO YOU WANT DELETE THIS?')">
                  <i class="fa fa-trash-o" aria-hidden="true"></i>
                </button>
              </form>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
