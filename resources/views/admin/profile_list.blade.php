@extends('layouts.app')

@section('content')
    <section class="sec5">
        <h2>Admin - User List</h2>

        <div class="gallery">
            @forelse ($users as $user)
                    <div class="photo">
                        <h2>{{$user->name}}</h2>
                        <a href="mailto:{{$user->email}}">{{$user->email}}</a>
                        @if ($user->is_admin === 1)
                            <p>SUPER ADMIN</p>
                        @endif
                    </div>
            @empty
                <p>Leeg</p>
            @endforelse
        </div>
        <br>
        {{ $users->links() }}
    </section>
@endsection