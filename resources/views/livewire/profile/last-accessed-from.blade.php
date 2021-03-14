<x-jet-action-section>
    <x-slot name="title">
        {{ __('Last account activity') }}
    </x-slot>

    <x-slot name="description">
        {{ __('View when and where your account was last accessed.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('Your account was last accessed :lastLoggedInAt, from IP Address :lastLoggedInFrom.', compact('lastLoggedInAt', 'lastLoggedInFrom')) }}
        </div>
    </x-slot>
</x-jet-action-section>
