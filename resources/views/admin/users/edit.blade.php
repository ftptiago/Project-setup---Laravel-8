@extends('templates.main')
@section('content')
<h1>Edit user</h1>
<form method="POST" action="{{ route('admin.users.update', $user->id) }}">
@method('PATCH')
  @include('admin.users.partials.form')
</form>
@endsection