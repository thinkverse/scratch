<x-guest-layout>
    <div class="relative flex h-full justify-center bg-gray-100 items-top dark:bg-gray-900 sm:items-center sm:pt-0">
        @if (session('status'))
            <div class="absolute top-4 left-4 right-4 rounded-md p-4 bg-green-600 text-white">
                {{ session('status') }}
            </div>
        @endif

        <div class="h-full w-full max-w-6xl mx-auto sm:px-6 lg:px-8">
            <livewire:markdown-x />
        </div>
    </div>

    @once
        @push('scripts')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js" integrity="sha512-GZ1RIgZaSc8rnco/8CXfRdCpDxRCphenIiZ2ztLy3XQfCbQUSCuk8IudvNHxkRA3oUg6q0qejgN/qqyG1duv5Q==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
        @endpush
    @endonce
</x-guest-layout>
