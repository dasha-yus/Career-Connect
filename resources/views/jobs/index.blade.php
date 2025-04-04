<x-layout>
    @include('partials._hero')
    @include('partials._search')

    @if (count($jobs) === 0)
        <p class="text-white text-center mt-16 text-2xl">No jobs found</p>
    @else
        <div class="grid grid-cols-3 gap-12 p-12">
            @foreach ($jobs as $job)
                <x-job-card :job="$job" />
            @endforeach
        </div>
        <div class="px-12 pb-8">
            {{ $jobs->links() }}
        </div>
    @endif
</x-layout>
