<x-layout class="lg:px-48 sm:px-16 flex flex-col justify-center items-center h-full">
    <div
        class="py-12 px-16 mx-auto my-8 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 flex flex-col items-center">
        <div class="w-full flex justify-between mb-4 items-center">
            <x-home-btn />
            <div class="flex gap-4">
                <a href="/jobs/{{ $job->id }}/edit" class="text-gray-200">
                    <i class="fa-solid fa-pencil"></i> Edit
                </a>
                <form method="POST" action="/jobs/{{ $job->id }}" onsubmit="return confirmDelete();">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
                </form>
            </div>
        </div>
        <img class="w-48 h-48 mb-3 rounded-full shadow-lg"
            src="{{ Storage::disk('public')->exists($job->logo) ? asset('storage/' . $job->logo) : asset($job->logo) }}"
            alt="logo" />
        <h5 class="mb-1 text-3xl font-medium text-gray-900 dark:text-white">{{ $job->title }}</h5>
        <span class="text-xl text-gray-500 dark:text-gray-400">{{ $job->company }}</span>
        <span class="text-xl text-gray-500 dark:text-gray-400">{{ $job->location }}</span>
        <p class="text-xl text-gray-200 dark:text-gray-200 my-8 text-center">{{ $job->description }}</p>
        <div class="flex mt-4 md:mt-6">
            <a href="mailto:{{ $job->email }}"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Send
                mail</a>
            <a href="{{ $job->website }}" target="_blank"
                class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Website</a>
        </div>
    </div>
</x-layout>

<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this job?');
    }
</script>
