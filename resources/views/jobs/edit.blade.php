<x-layout>
    <div class="flex flex-col justify-center items-center h-full">
        <div style="width: 50%">
            <x-home-btn />
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1 text-gray-100">Updated a Job</h2>
                <p class="mb-4 text-gray-100">You can change the fields you need</p>
            </header>
            <x-job-form :job="$job" :types="$types" />
        </div>
    </div>
</x-layout>
