<?php

namespace App\Livewire;

use App\Models\Build;
use Livewire\Component;
use Livewire\WithPagination;

class BuildGallery extends Component
{
    use WithPagination;

    public $searchHero = '';
    public $searchChallenge = '';

    public function render()
    {
        $builds = Build::with(['hero', 'spell', 'items'])
            ->where(function ($query) {
                if ($this->searchHero) {
                    $query->whereHas('hero', function ($q) {
                        $q->where('name', 'like', '%' . $this->searchHero . '%');
                    });
                }
                if ($this->searchChallenge) {
                    $query->where('challenge_name', 'like', '%' . $this->searchChallenge . '%');
                }
            })
            ->paginate(9);

        return view('livewire.build-gallery', [
            'builds' => $builds,
        ]);
    }
}