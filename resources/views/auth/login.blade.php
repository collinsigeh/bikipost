@extends('layout.app')

@section('content')
    <div class="mx-auto w-4/12 p-6 bg-white rounded">
        <form action="{{ route('login') }}" method="post">
            @csrf

            @if (session('failure_status'))
                <div class="bg-red-100 border-l-4 border-r border-red-700 text-red-600 mb-6 p-3 rounded-md">
                    {{ session('failure_status') }}
                </div>
            @endif
            
            <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" id="email" placeholder="Your email"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email')
                        border-red-500
                    @enderror">
                
                @error('email')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" value="{{ old('password') }}" id="password" placeholder="Choose a password"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password')
                        border-red-500
                    @enderror">

                @error('password')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white w-full p-4 rounded-lg">Login</button>
            </div>
        </form>
    </div>
@endsection