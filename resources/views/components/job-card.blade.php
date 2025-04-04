@props(['job'])

@php
    $createdAt = $job->created_at;
    $daysAgo = (int) $createdAt->diffInDays(now());

    $postedText = '';
    if ($daysAgo > 1) {
        $postedText = "Posted $daysAgo days ago";
    } else {
        $postedText = 'Posted today';
    }
@endphp

<a href="/jobs/{{ $job->id }}"
    class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow-sm md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    <img class="object-cover rounded-t-lg md:w-48 md:rounded-none md:rounded-s-lg h-full"
        src="{{ Storage::disk('public')->exists($job->logo) ? asset('storage/' . $job->logo) : asset($job->logo) }}"
        alt="logo" />
    <div class="flex flex-col justify-between p-4 leading-normal">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-500 dark:text-white">{{ $job->title }}</h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-200">{{ Str::limit($job->description, 80) }}</p>
        <p class="text-gray-300">{{ $job->location }}</p>
        {{-- <p class="text-gray-300">{{ $job->type }}</p> --}}
        <p class="mt-4 text-gray-500">{{ $postedText }}</p>
    </div>
</a>
