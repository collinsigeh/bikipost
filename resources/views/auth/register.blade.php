@extends('layout.app')

@section('content')
    <div class="mx-auto w-4/12 p-6 bg-white rounded">
        <form action="{{ route('register') }}" method="post">
            @csrf

            <div class="mb-4">
                <label for="name" class="sr-only">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" id="name" placeholder="Your Name" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name')
                        border-red-500
                    @enderror">
                
                    @error('name')
                        <div class="text-red-500 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
            
            <div class="mb-4">
                <label for="username" class="sr-only">Username</label>
                <input type="text" name="username" value="{{ old('username') }}" id="username" placeholder="Your username"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror">

                @error('username')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
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
                <label for="password_confirmation" class="sr-only">Confirm password</label>
                <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" id="password_confirmation" 
                    placeholder="Repeat your password"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password_confirmation')
                        border-red-500
                    @enderror">
                
                @error('password_confirmation')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white w-full p-4 rounded-lg">Register</button>
            </div>
        </form>
    </div>
@endsection