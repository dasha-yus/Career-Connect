@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
        class="fixed top-4 right-4 bg-blue-600 text-white p-4 rounded">
        <p>
            {{ session('message') }}
        </p>
    </div>
@endif
