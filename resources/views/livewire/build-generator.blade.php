<div class="py-12 bg-gray-50">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-8">
                
                <div class="text-center mb-10">
                    <h1 class="text-4xl font-extrabold text-gray-800 tracking-tight">MLBB Build Generator</h1>
                    <p class="mt-2 text-lg text-gray-500">Create the perfect build for your next match!</p>
                </div>

                <div class="space-y-8">
                    <!-- Filter Controls -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6 bg-gray-100 rounded-lg border border-gray-200">
                        <div class="space-y-2">
                            <label for="filterType" class="block text-sm font-medium text-gray-700">1. Filter By</label>
                            <select id="filterType" wire:model="filterType" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="lane">Lane</option>
                                <option value="role">Role</option>
                                <option value="hero">Hero</option>
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label for="filterChoice" class="block text-sm font-medium text-gray-700">2. Your Choice</label>
                            @if ($filterType === 'lane')
                                <select id="filterChoice" wire:model.lazy="selectedLane" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="">Any Lane</option>
                                    @foreach($lanes as $lane)
                                        <option value="{{ $lane }}">{{ ucfirst($lane) }}</option>
                                    @endforeach
                                </select>
                            @elseif ($filterType === 'role')
                                <select id="filterChoice" wire:model.lazy="selectedRole" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="">Any Role</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            @else
                                <select id="filterChoice" wire:model.lazy="selectedHeroId" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="">Any Hero</option>
                                    @foreach($heroes as $hero)
                                        <option value="{{ $hero->id }}">{{ $hero->name }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                        
                        <div class="space-y-2">
                            <label for="itemCategory" class="block text-sm font-medium text-gray-700">3. Item Type</label>
                            <select id="itemCategory" wire:model.lazy="itemCategory" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="all">All</option>
                                <option value="physical">Physical</option>
                                <option value="mage">Mage</option>
                                <option value="tank">Tank</option>
                            </select>
                        </div>
                    </div>

                    <!-- Generate Button -->
                    <div class="text-center">
                        <button wire:click="generate" wire:loading.attr="disabled" class="w-full md:w-1/2 inline-flex items-center justify-center px-8 py-4 border border-transparent text-lg font-bold rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition transform hover:scale-105">
                            <svg wire:loading wire:target="generate" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span wire:loading.remove wire:target="generate">Generate Build</span>
                            <span wire:loading wire:target="generate">Generating...</span>
                        </button>
                    </div>
                </div>

                <!-- Results Area -->
                @if ($latestBuild)
                <div class="mt-12 pt-8 border-t-2 border-gray-200 border-dashed">
                    <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Your Generated Build!</h2>
                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 max-w-3xl mx-auto p-6 rounded-lg shadow-md flex flex-col md:flex-row items-center gap-6 border border-gray-200">
                        <div class="flex-shrink-0 text-center">
                            <img src="{{ $latestBuild->hero?->icon_url }}" alt="{{ $latestBuild->hero?->name }}" class="w-28 h-28 rounded-full border-4 border-indigo-500 mx-auto shadow-lg">
                            <h3 class="mt-3 text-2xl font-bold text-gray-900">{{ $latestBuild->hero?->name }}</h3>
                            <div class="flex items-center justify-center gap-2 mt-2">
                                <img src="{{ $latestBuild->spell?->icon_url }}" alt="{{ $latestBuild->spell?->name }}" class="w-10 h-10 rounded-md shadow">
                                <span class="text-md font-semibold text-gray-600">{{ $latestBuild->spell?->name }}</span>
                            </div>
                        </div>

                        <div class="flex-grow w-full">
                            <p class="text-center md:text-left text-gray-600 font-semibold mb-3">Item Build:</p>
                            <div class="grid grid-cols-3 md:grid-cols-6 gap-4">
                                @foreach($latestBuild->items as $item)
                                <div class="text-center transform transition hover:scale-110">
                                    <img src="{{ $item?->icon_url }}" alt="{{ $item?->name }}" class="w-16 h-16 rounded-lg border-2 border-gray-300 shadow-md" title="{{ $item?->name }}">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
