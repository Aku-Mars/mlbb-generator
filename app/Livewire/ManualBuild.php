<?php

namespace App\Livewire;

use App\Models\Hero;
use App\Models\Item;
use App\Models\Spell;
use App\Models\Build;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ManualBuild extends Component
{
    public $heroes, $spells, $items;
    public $selectedHeroId, $selectedSpellId, $selectedItems = [], $challenge_name;

    public function mount()
    {
        $this->heroes = Hero::all();
        $this->spells = Spell::all();
        $this->items = Item::all();
    }

    public function save()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $this->validate([
            'selectedHeroId' => 'required',
            'selectedSpellId' => 'required',
            'selectedItems' => 'required|array|size:6',
            'challenge_name' => 'nullable|string|max:255',
        ]);

        $build = Build::create([
            'user_id' => Auth::id(),
            'hero_id' => $this->selectedHeroId,
            'spell_id' => $this->selectedSpellId,
            'challenge_name' => $this->challenge_name,
        ]);

        $build->items()->attach($this->selectedItems);

        return redirect()->route('my.builds');
    }

    public function render()
    {
        return view('livewire.manual-build');
    }
}