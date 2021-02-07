@extends('layouts.app')

@section('content')

@foreach($users as $user)
<p>{{ $user->name }} - {{ $user->email }}</p>
@foreach($user->roles as $role)
<ul>
  <li>{{ $role->name }}</li>
</ul>
@endforeach
<hr>
@endforeach

@endsection