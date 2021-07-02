@extends('layout.app')

@section('content')
    <div class="mx-auto w-8/12 p-6 bg-white rounded">
        @auth
            <h2 class="text-2xl mb-3">New post</h2>
            <form action="{{ route('post.store') }}" method="post">
                @csrf

                <label for="post" class="sr-only">Enter a post</label>
                <textarea name="post_content" id="post" cols="30" rows="5" placeholder="Enter a post"
                    class="border-2 border-gray-500 rounded w-full p-3 mb-4" required></textarea>
                
                <button type="submit" class="bg-blue-500 text-white rounded py-3 px-6 mb-4">Save</button>
            </form>
        @endauth
    </div>
@endsection