@extends('layout.app')

@section('content')
    <div class="mx-auto w-8/12 p-6 bg-white rounded">
        @auth
            <h2 class="text-2xl mb-3">New post</h2>
            <form action="{{ route('posts.store') }}" method="post">
                @csrf

                <label for="post" class="sr-only">Enter a post</label>
                <textarea name="post_content" id="post" cols="30" rows="5" placeholder="Enter a post"
                    class="border-2 border-gray-500 rounded w-full p-3 @error('post_content')
                        border-red-500
                    @enderror" required></textarea>

            @error('post_content')
                <div class="text-red-500 text-sm">
                    {{ $message }}
                </div>
            @enderror
                
                <button type="submit" class="bg-blue-500 text-white rounded py-3 px-6 my-4">Save</button>
            </form>
        @endauth
        
        <div id="currentPosts">
            <h2 class="text-2xl mb-3">Latest Posts</h2>

            @forelse ($posts as $post)
                <div class="p-3 mb-3 bg-gray-100 rounded">

                    <p class="mb-3">
                        {{ $post->content }}
                    </p>

                    <hr>

                    <span class="italic text-sm text-gray-400">
                        Posted by 

                        <a href="" class="font-medium">{{ $post->user->name }}</a>

                        - {{ $post->created_at->diffForHumans() }}
                    </span>

                </div>
            @empty
                <p class="italic">
                    No post yet.

                    @guest
                        <a href="{{ route('login') }}">Login</a> to start posting.
                    @endguest
                </p>
            @endforelse

            @if ($post->count())
                {{ $posts->links() }}
            @endif
        </div>
    </div>
@endsection