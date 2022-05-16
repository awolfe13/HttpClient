@extends('layout')
@section('content')
    <h1>Edit Client</h1>
    <form method="post" action="{{ route('clients.update', $client['id']) }}">
        @method('Put')
        <label class="form-label" for="first_name">First Name</label>
        <input class="form-label" type="text" name="first_name" id="first_name" value="{{old('first_name', $client['first_name'])}}">

        <label class="form-label" for="last_name">Last Name</label>
        <input class="form-label" type="text" name="last_name" id="last_name" value="{{old('last_name', $client['last_name'])}}">

        <label class="form-label" for="email">Email</label>
        <input class="form-label" type="email" name="email" id="email" value="{{old('email', $client['email'])}}">

        <button type="submit">Save</button>
        @csrf
    </form>

@endsection
