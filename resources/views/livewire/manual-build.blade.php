<div class="py-12 bg-gray-50">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-8">
                
                <div class="text-center mb-10">
                    <h1 class="text-4xl font-extrabold text-gray-800 tracking-tight">Manual Build Creator</h1>
                    <p class="mt-2 text-lg text-gray-500">Craft your perfect build by selecting hero, spell, and items.</p>
                </div>

                <form wire:submit.prevent="save">
                    <div class="space-y-6">
                        <!-- Hero and Spell Selection -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="hero" class="block text-sm font-medium text-gray-700">Hero</label>
                                <select id="hero" wire:model.lazy="selectedHeroId" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="">Select Hero</option>
                                    @foreach($heroes as $hero)
                                        <option value="{{ $hero->id }}">{{ $hero->name }}</option>
                                    @endforeach
                                </select>
                                @error('selectedHeroId') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="spell" class="block text-sm font-medium text-gray-700">Spell</label>
                                <select id="spell" wire:model.lazy="selectedSpellId" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="">Select Spell</option>
                                    @foreach($spells as $spell)
                                        <option value="{{ $spell->id }}">{{ $spell->name }}</option>
                                    @endforeach
                                </select>
                                @error('selectedSpellId') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Items Selection -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Items (Select 6)</label>
                            <div class="grid grid-cols-3 sm:grid-cols-6 gap-4 mt-2">
                                @foreach($items as $item)
                                    <label wire:key="item-{{ $item->id }}" class="flex flex-col items-center cursor-pointer p-2 border border-gray-200 rounded-lg hover:bg-gray-50 transition-all duration-200">
                                        <input type="checkbox" wire:model.lazy="selectedItems" value="{{ $item->id }}" class="rounded text-indigo-600 shadow-sm focus:ring-indigo-500">
                                        <img src="{{ $item->icon_url }}" alt="{{ $item->name }}" class="w-12 h-12 mt-1 rounded-md">
                                        <span class="text-xs text-gray-700 text-center mt-1">{{ $item->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('selectedItems') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Challenge Name -->
                        <div class="space-y-2">
                            <label for="challenge_name" class="block text-sm font-medium text-gray-700">Challenge Name (Optional)</label>
                            <input id="challenge_name" type="text" wire:model.lazy="challenge_name" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <!-- Save Button -->
                        <div class="text-center pt-4">
                            <button type="submit" class="w-full md:w-1/2 inline-flex items-center justify-center px-8 py-4 border border-transparent text-lg font-bold rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition transform hover:scale-105">
                                Save Build
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>