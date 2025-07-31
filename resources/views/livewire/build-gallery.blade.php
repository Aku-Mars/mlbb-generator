<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-8">
                
                <div class="text-center mb-10">
                    <h1 class="text-4xl font-extrabold text-gray-800 tracking-tight">Community Build Gallery</h1>
                    <p class="mt-2 text-lg text-gray-500">Explore builds created by other players.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                    <input type="text" wire:model.debounce.500ms="searchHero" placeholder="Search by hero name..." class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <input type="text" wire:model.debounce.500ms="searchChallenge" placeholder="Search by challenge name..." class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($builds as $build)
                        <div class="bg-gray-100 rounded-lg p-5 transition hover:scale-105 hover:shadow-lg border border-gray-200">
                            <div class="flex items-center mb-4">
                                <img src="{{ $build->hero?->icon_url ?? '' }}" alt="{{ $build->hero?->name ?? '' }}" class="w-16 h-16 rounded-full mr-4 border-2 border-indigo-500 shadow-md">
                                <div>
                                    <h3 class="font-bold text-xl leading-tight text-gray-900">{{ $build->hero?->name ?? 'Unknown Hero' }}</h3>
                                    <p class="text-sm text-gray-600 font-semibold">{{ $build->challenge_name }}</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between mt-4">
                                <div class="grid grid-cols-6 gap-2 flex-grow">
                                    @foreach($build->items as $item)
                                        <img src="{{ $item?->icon_url ?? '' }}" alt="{{ $item?->name ?? '' }}" class="w-10 h-10 rounded-md border border-gray-300 shadow-sm" title="{{ $item?->name ?? '' }}">
                                    @endforeach
                                </div>
                                <img src="{{ $build->spell?->icon_url ?? '' }}" alt="{{ $build->spell?->name ?? '' }}" class="w-10 h-10 rounded-md ml-4 border border-gray-300 shadow-sm" title="{{ $build->spell?->name ?? '' }}">
                            </div>
                        </div>
                    @empty
                        <p class="md:col-span-2 lg:col-span-3 text-center text-gray-600 py-10">No builds found matching your search criteria.</p>
                    @endforelse
                </div>

                <div class="mt-8">
                    {{ $builds->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
