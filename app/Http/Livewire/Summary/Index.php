<?php

namespace App\Http\Livewire\Summary;

use App\Models\Summary;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.summary.index', [
            'summaries' => Summary::latest()->paginate(5)
        ]);
    }
}
