<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HomeIndex extends Component
{
    public function pengaduan()
    {
        //return view('livewire.form-pengaduan');
        return redirect()->to('/formpengaduan');
    }

    public function pengajuan()
    {
        return redirect()->to('/formpengajuancek');
    }

    public function render()
    {
        return view('livewire.public_display.home-index');
    }
}
