@extends('layout')
@section('content')
    <h1>Client: {{$client['first_name']}}</h1>
    <section class="flex-table">
            <div class="flex-row data">
                <div class="flex-column left-indent">{{$client['id']}}</div>
                <div class="flex-column left-indent">{{$client['first_name']}} {{$client['last_name']}}</div>
                <div class="flex-column left-indent">{{$client['email']}}</div>
                <div class="flex-column"><img src="{{$client['avatar']}}" /></div>
            </div>
    </section>
    <a href="{{ url()->previous() }}" class="btn">Go Back</a>
@endsection
