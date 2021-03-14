<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Leads') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-6">
                @forelse ($emails as $email)
                    @if ($loop->first)
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">#</th>
                                <th class="py-3 px-6 text-left">Email</th>
                                <th class="py-3 px-6 text-center">Subject</th>
                                <th class="py-3 px-6 text-center">Opened</th>
                                <th class="py-3 px-6 text-center">Viewed</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                    @endif
                            <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">
                                    {{ $email->tracking_id }}
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <span class="font-medium">
                                        {{ $email->email }}
                                    </span>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <span class="font-medium">
                                        {{ $email->subject }}
                                    </span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    {!! $email->getOpenedElement() !!}
                                </td>
                                <td class="py-3 px-6 text-center">
                                    {{ $email->viewed }} {{ Str::plural('time', $email->viewed) }}
                                </td>
                            </tr>
                    @if ($loop->last) </tbody></table> @endif
                @empty
                    <div class="flex justify-center py-10">
                        <span class="text-gray-700 text-3xl font-bold">No leads.</span>
                    </div>
                @endforelse
            </div>

            {{ $emails->links() }}
        </div>
    </div>
</x-app-layout>
