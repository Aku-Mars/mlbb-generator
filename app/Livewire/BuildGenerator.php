<?php

namespace App\Livewire;

use App\Models\Hero;
use App\Models\Role;
use App\Services\BuildGeneratorService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BuildGenerator extends Component
{
    public $heroes;
    public $lanes;
    public $roles;
    public $selectedLane = '';
    public $selectedRole = '';
    public $selectedHeroId;
    public $latestBuild;
    public $filterType = 'lane'; // 'lane' or 'hero'
    public $itemCategory = 'all'; // 'all', 'physical', 'mage', 'tank'

    public function mount()
    {
        $this->heroes = Hero::all();
        $this->lanes = ['exp', 'mid', 'roam', 'jungle', 'gold'];
        $this->roles = Role::whereIn('name', ['Tank', 'Fighter', 'Assassin', 'Mage', 'Marksman', 'Support'])->get();
    }

    public function generate(BuildGeneratorService $buildGeneratorService)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $filters = [];
        if ($this->filterType === 'lane') {
            if (!empty($this->selectedLane)) {
                $filters['lane'] = $this->selectedLane;
            }
        } elseif ($this->filterType === 'role') {
            if (!empty($this->selectedRole)) {
                $filters['role'] = $this->selectedRole;
            }
        } else {
            if (!empty($this->selectedHeroId)) {
                $filters['hero_id'] = $this->selectedHeroId;
            }
        }

        $filters['item_category'] = $this->itemCategory;

        $this->latestBuild = $buildGeneratorService->generate($filters, Auth::user());
    }

    public function updatedFilterType($value)
    {
        $this->selectedHeroId = null;
        $this->selectedLane = '';
        $this->selectedRole = '';
    }

    public function render()
    {
        return view('livewire.build-generator');
    }
}