@extends('layouts.app')

@section('content')
<div class="panel panel-info">
  <div class="panel-heading">Keeper Password</div>

  <div class="panel-body">
    <a class="btn btn-sm btn-primary" href="{{ route('keeper-password.create') }}">Create</a>
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
        @foreach ($data as $key => $value)
        <tr>
          <td>{{$key+1}}</td>
          <td><a href="{{route('keeper-password.show', $value->id)}}">{{$value->title}}</a></td>
          <td>{{$value->website ? $value->website : 'n/a'}}</td>
          <td>
            <form action="{{route('keeper-password.destroy', $value->id)}}" method="post">
              {{ method_field('DELETE') }}
              {{ csrf_field() }}
              <a class="btn btn-sm btn-default"
                href="{{ route('keeper-password.edit', $value->id) }}">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
              </a>
              <button type="submit" class="btn btn-sm btn-danger"
                onClick="return confirm('DO YOU WANT DELETE THIS?')">
                <i class="fa fa-trash-o" aria-hidden="true"></i>
              </button>
            </form>

          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
