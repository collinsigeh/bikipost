@extends('layout.app')

@section('content')

    <div class="mx-auto w-8/12 my-6">
        <h1 class="font-medium text-2xl italic">Posts by &commat;{{ $user->username }}</h1>

        <p>
            Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }} and received x likes
        </p>
    </div>

    <div class="mx-auto mb-4 w-8/12 p-6 bg-white rounded">

        @forelse ($posts as $post)

            <x-post-component :post="$post" />

        @empty
            <p class="italic">
                <span class="font-medium">{{ $user->username }}</span> has no post!
            </p>
        @endforelse

        @if ($posts->count())
            {{ $posts->links() }}
        @endif
    </div>
@endsection