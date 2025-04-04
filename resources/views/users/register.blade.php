<x-layout>
    <div class="flex flex-col justify-center items-center h-full">
        <div style="width: 30%">
            <x-home-btn />
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1 text-gray-100">Register</h2>
                <p class="mb-4 text-gray-100">Create an account to post jobs</p>
            </header>
            <form class="mx-auto mt-8 w-full" method="POST" action="/users">
                @csrf

                <div class="relative z-0 w-full mb-5 group">
                    <label for="name" class="inline-block text-lg mb-2 text-gray-200 text-sm">
                        Name
                    </label>
                    <input type="text" name="name" id="name"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder="Enter your name" value="{{ old('name') }}" />
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="relative z-0 w-full mb-5 group mt-8">
                    <label for="email" class="inline-block text-lg mb-2 text-gray-200 text-sm">
                        Email address
                    </label>
                    <input type="email" name="email" id="email"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder="Enter your email address" value="{{ old('email') }}" />
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="relative z-0 w-full mb-5 group mt-8">
                    <label for="password" class="inline-block text-lg mb-2 text-gray-200 text-sm">
                        Password
                    </label>
                    <input type="password" name="password" id="password"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder="Enter password" value="{{ old('password') }}" />
                    <small class="form-text text-muted text-gray-500">Minimum length: 6 characters</small>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="relative z-0 w-full mb-5 group mt-8">
                    <label for="password_confirmation" class="inline-block text-lg mb-2 text-gray-200 text-sm">
                        Confirm Password
                    </label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder="Confirm password" value="{{ old('password_confirmation') }}" />
                    <small class="form-text text-muted text-gray-500">Minimum length: 6 characters</small>
                    @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                <div class="mt-8">
                    <p class="text-gray-200">
                        Already have an account?
                        <a href="/login" class="text-blue-500">Login</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-layout>
