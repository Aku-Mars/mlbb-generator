<div x-data="{ open: false }" class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <div class="flex justify-end mb-4">
            <button @click="open = true" class="inline-flex items-center px-6 py-3 bg-indigo-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150 shadow-md">
                Add New Build
            </button>
        </div>

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-8">
                <div class="text-center mb-10">
                    <h1 class="text-4xl font-extrabold text-gray-800 tracking-tight">My Builds</h1>
                    <p class="mt-2 text-lg text-gray-500">Manage your personal collection of generated builds.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($myBuilds as $build)
                        <div class="bg-gray-100 rounded-lg p-5 flex flex-col justify-between border border-gray-200 shadow-sm">
                            <div>
                                <div class="flex items-center mb-4">
                                    <img src="{{ $build->hero?->icon_url ?? '' }}" alt="{{ $build->hero?->name ?? '' }}" class="w-16 h-16 rounded-full mr-4 border-2 border-indigo-500 shadow-md">
                                    <div>
                                        <h3 class="font-bold text-xl leading-tight text-gray-900">{{ $build->hero?->name ?? 'Unknown Hero' }}</h3>
                                        <p class="text-sm text-gray-600 font-semibold">{{ $build->challenge_name }}</p>
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-2">
                                    @foreach($build->items as $item)
                                        <img src="{{ $item?->icon_url ?? '' }}" alt="{{ $item?->name ?? '' }}" class="w-10 h-10 rounded-md border border-gray-300 shadow-sm" title="{{ $item?->name ?? '' }}">
                                    @endforeach
                                </div>
                            </div>
                            <div class="mt-4 text-right">
                                <button 
                                    wire:click="deleteBuild({{ $build->id }})" 
                                    onclick="return confirm('Are you sure you want to delete this build? This action cannot be undone.')"
                                    class="px-4 py-2 bg-red-600 text-white text-xs font-semibold rounded-md hover:bg-red-700 transition shadow-sm">
                                    Delete
                                </button>
                            </div>
                        </div>
                    @empty
                        <p class="md:col-span-2 lg:col-span-3 text-center text-gray-600 py-10">You haven't created any builds yet. Let's make some!</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <div 
        x-show="open" 
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
        style="display: none;">
        
        <div @click.away="open = false" class="bg-white rounded-lg shadow-xl p-8 max-w-sm w-full mx-4 text-center">
            <h3 class="text-2xl font-bold text-gray-800 mb-4">Choose Build Method</h3>
            <p class="text-gray-600 mb-6">Select whether to generate a random build or create one manually.</p>
            <div class="space-y-4">
                <a href="{{ route('dashboard') }}" class="block w-full text-center px-6 py-3 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 transition shadow-sm">
                    Generate Random Build
                </a>
                <a href="{{ route('manual.build') }}" class="block w-full text-center px-6 py-3 bg-gray-200 border border-gray-300 rounded-md font-semibold text-gray-700 hover:bg-gray-300 transition shadow-sm">
                    Create Manual Build
                </a>
            </div>
             <button @click="open = false" class="w-full text-center mt-6 text-gray-500 hover:text-gray-700 text-sm">Cancel</button>
        </div>
    </div>
</div>
