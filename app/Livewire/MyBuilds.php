<?php

namespace App\Livewire;

use App\Models\Build;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyBuilds extends Component
{
    public function deleteBuild($buildId)
    {
        $build = Build::find($buildId);

        if ($build && $build->user_id === Auth::id()) {
            $build->delete();
        }
    }

    public function render()
    {
        $myBuilds = Build::with(['hero', 'spell', 'items'])
            ->where('user_id', Auth::id())
            ->get();

        return view('livewire.my-builds', [
            'myBuilds' => $myBuilds,
        ]);
    }
}