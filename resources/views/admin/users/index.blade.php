@extends('layouts.app')

@section('content')
<div class="w3-container">
  <table class="w3-table-all w3-hoverable w3-card-4" style="max-width: 960px; margin: 0 auto;">
    <thead>
      <tr class="w3-red">
        <th>Ime</th>
        <th>email</th>
        <th>Roles</th>
        <th></th>
      </tr>
    </thead>
    @foreach($users as $user)
    <tr>
      <td>{{ $user->name }}</td>
      <td> {{ $user->email }}</td>
      <td> {{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
      <td class="w3-right-align">
        <a href="{{ route('admin.users.edit', $user->id) }}"><button class="w3-button w3-blue w3-small w3-hover-red">Edit</button></a>
        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display: inline-block;" onclick="console.log(999)">
          @csrf
          {{ method_field('DELETE') }}
          <button type="submit" class="w3-button w3-pink w3-small w3-hover-red">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
</div>
@endsection