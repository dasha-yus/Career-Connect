@props(['job', 'types'])

<form class="mx-auto mt-8 w-full" method="POST" action="{{ !empty($job) ? '/jobs/' . $job->id : '/jobs' }}"
    enctype="multipart/form-data">
    @csrf
    @if (!empty($job))
        @method('PUT')
    @endif

    <div class="relative z-0 w-full mb-5 group">
        <label for="title" class="inline-block text-lg mb-2 text-gray-200 text-sm">
            Job title
        </label>
        <input type="text" name="title" id="title"
            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            placeholder="Enter job title" value="{{ !empty($job) ? $job->title : old('title') }}" />
        @error('title')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <label for="type" class="inline-block text-lg mb-2 text-gray-200 text-sm">
            Job type
        </label>
        <select id="type" name="type"
            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 pee dark:bg-gray-900">
            @foreach ($types as $type)
                <option value="{{ $type->id }}"
                    @if (isset($job) && $job->type->id === $type->id) selected @elseif(!isset($job) && $loop->first) selected @endif>
                    {{ $type->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="relative z-0 w-full mb-5 group mt-8">
        <label for="company" class="inline-block text-lg mb-2 text-gray-200 text-sm">
            Company
        </label>
        <input type="text" name="company" id="company"
            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            placeholder="Ex. Google" value="{{ !empty($job) ? $job->company : old('company') }}" />
        @error('company')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="relative z-0 w-full group mt-8 mb-5">
        <label class="block mb-2 text-sm font-medium text-gray-200" for="logo">Upload
            company logo</label>
        <input
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-200 focus:outline-none dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400"
            id="logo" name="logo" type="file">
        @error('logo')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="grid md:grid-cols-3 md:gap-6 mt-8 mb-5">
        <div class="relative z-0 w-full group">
            <label for="location" class="inline-block text-lg mb-2 text-gray-200 text-sm">
                Location
            </label>
            <input type="text" name="location" id="location"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder="New York, USA" value="{{ !empty($job) ? $job->location : old('location') }}" />
            @error('location')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="relative z-0 w-full group">
            <label for="email" class="inline-block text-lg mb-2 text-gray-200 text-sm">
                Email address
            </label>
            <input type="email" name="email" id="email"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder="company@email.com" value="{{ !empty($job) ? $job->email : old('email') }}" />
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="relative z-0 w-full group">
            <label for="website" class="inline-block text-lg mb-2 text-gray-200 text-sm">
                Website
            </label>
            <input type="text" name="website" id="website"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder="www.company.com" value="{{ !empty($job) ? $job->website : old('website') }}" />
            @error('website')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="relative z-0 w-full mb-5 group mt-8">
        <label for="description" class="inline-block text-lg mb-2 text-gray-200 text-sm">
            Job Description
        </label>
        <textarea name="description" id="description"
            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            name="description" rows="4" placeholder="Specify details">{{ !empty($job) ? $job->description : old('description') }}</textarea>
        @error('description')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>
