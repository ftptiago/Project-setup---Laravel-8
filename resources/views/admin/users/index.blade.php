@extends('templates.main')
@section('content')
<div class="row">
  <div class="col-12">
    <h1 class="pull-left">Users
    <a class="btn btn-sm btn-success pull-right" href="{{route('admin.users.create')}}" role="button">Create</a>
  </h1> </div>
</div>
<div class="card">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">E-mail</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>
          <a class="btn btn-sm btn-primary" href="{{route('admin.users.edit', $user->id)}}" role="button">Edit</a>
          <button type="button" class="btn btn-sm btn-danger"
          onclick="event.preventDefault();
          document.getElementById('delete-user-form-{{$user->id}}').submit()"
          >Delete
        </button>
          <form id="delete-user-form-{{$user->id}}" action="{{route('admin.users.destroy',
           $user->id)}}" method="POST" style="display: none">
          @csrf
          @method('DELETE')
          </form>
        </td>
      </tr>
      @endforeach    
    </tbody>
  </table>
</div>
{{ $users->links() }}
@endsection