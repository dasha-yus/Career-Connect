<x-layout>
    <div style="margin-top: 80px" class="px-12">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase text-white">
                Manage Jobs
            </h1>
        </header>
        @unless ($jobs->isEmpty())
            <table class="min-w-full bg-gray-800 border border-gray-600">
                <thead>
                    <tr class="w-full bg-gray-950 text-white uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Job title</th>
                        <th class="py-3 px-6 text-left">Job type</th>
                        <th class="py-3 px-6 text-left">Company</th>
                        <th class="py-3 px-6 text-left">Location</th>
                        <th class="py-3 px-6 text-left">Created</th>
                        <th class="py-3 px-6 text-left">Updated</th>
                        <th class="py-3 px-6 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-white text-md font-light">
                    @foreach ($jobs as $job)
                        <tr class="border-b border-gray-600 hover:bg-gray-800">
                            <td class="py-3 px-6">{{ $job->title }}</td>
                            <td class="py-3 px-6">{{ $job->type->name }}</td>
                            <td class="py-3 px-6">{{ $job->company }}</td>
                            <td class="py-3 px-6">{{ $job->location }}</td>
                            <td class="py-3 px-6">{{ $job->created_at }}</td>
                            <td class="py-3 px-6">{{ $job->updated_at }}</td>
                            <td class="py-3 px-6 flex items-center gap-8">
                                <a href="/jobs/{{ $job->id }}" class="text-gray-300 rounded-xl"><i class="fa-solid fa-eye"></i>
                                    View</a>
                                <a href="/jobs/{{ $job->id }}/edit" class="text-blue-400 rounded-xl"><i
                                        class="fa-solid fa-pen-to-square"></i>
                                    Edit</a>
                                <form method="POST" action="/jobs/{{ $job->id }}" onsubmit="return confirmDelete();">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <tr class="border-gray-300">
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <p class="text-white text-center text-2xl">No jobs Found</p>
                </td>
            </tr>
        @endunless
    </div>
</x-layout>

<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this job?');
    }
</script>
