@extends('layout.app')

@section('content')
    <div class="mx-auto mb-4 w-8/12 p-6 bg-white rounded">

        @forelse ($posts as $post)
            <div class="p-3 mb-3 bg-gray-100 rounded">
                <p class="mb-3">
                    <a href="{{ route('user.posts', $post->user) }}" class="font-medium">{{ $post->user->name }}</a> 
                        - <span class="italic text-sm text-gray-500">posted 
                        {{ $post->created_at->diffForHumans() }}</span>
                </p>

                <p class="mb-3">
                    {{ $post->content }}
                </p>

                @can('delete', $post)
                    <div class="mb-3">
                        <form action="{{ route('posts.destroy', $post) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="text-blue-500">Delete</button>
                        </form>
                    </div>
                @endcan
                
                <div class="flex items-center">
                    @auth
                        @if ($post->likedBy(auth()->user()))
                            <form action="{{ route('post.likes', $post) }}" method="post" class="mr-1">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="text-blue-500">Unlike</button>
                            </form>
                        @else
                            <form action="{{ route('post.likes', $post) }}" method="post" class="mr-1">
                                @csrf

                                <button type="submit" class="text-blue-500">Like</button>
                            </form>
                        @endif
                    @endauth    


                    {{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count())   }}
                </div>
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
@endsection