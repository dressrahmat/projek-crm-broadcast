<?php

namespace App\Livewire\Dashboards;

use App\Models\Contact;
use Livewire\Component;

class DashboardsIndex extends Component
{
    public function render()
    {
        $jml_kontak = Contact::where('id_user', auth()->user()->id)->count();
        return view('livewire.dashboards.dashboards-index', compact('jml_kontak'));
    }
}