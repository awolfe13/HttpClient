@extends('layout')
@section('content')

    <div>
        <h2 class="flex-row text-dark mb-0 pb-0">Clients</h2>
        <div>
            <a href="{{ route('clients.create') }}" class="btn">Add Client</a>
        </div>
        <div class="table-responsive">
            <section class="flex-table">
                <div class="flex-row header mt-3">
                    <div class="flex-column left-indent">ID</div>
                    <div class="flex-column left-indent">Name</div>
                    <div class="flex-column left-indent">Email</div>
                    <div class="flex-column">Image</div>
                    <div class="flex-column">Show</div>
                    <div class="flex-column">Edit</div>
                    <div class="flex-column">Delete</div>
                </div>
            </section>
            <section class="flex-table">
                @foreach ($clients as $client)
                <div class="flex-row data">
                    <div class="flex-column left-indent">{{$client['id']}}</div>
                    <div class="flex-column left-indent">{{$client['first_name']}} {{$client['last_name']}}</div>
                    <div class="flex-column left-indent">{{$client['email']}}</div>
                    <div class="flex-column"><img src="{{$client['avatar']}}" /></div>
                    <div class="flex-column"><a href={{ route('clients.show', $client['id']) }} class="btn">Show</a></div>
                    <div class="flex-column"><a href="{{route('clients.edit', $client['id'])}}" class="btn">Edit</a></div>
                    <div class="flex-column"> <form method="post" action="{{ route('clients.destroy', $client['id']) }}"
                                                    onSubmit="return confirm('Are you sure you want to delete?')">
                            @csrf
                            @method('delete')
                       <button class="btn" type="submit">Delete</button>
                    </form></div>
                    </div>
                    @endforeach
                </section>
            </div>
        </div>
    @endsection


