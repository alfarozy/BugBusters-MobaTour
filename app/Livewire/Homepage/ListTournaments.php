<?php

namespace App\Livewire\Homepage;

use App\Models\Tournament;
use Livewire\Component;
use Livewire\WithPagination;

class ListTournaments extends Component
{
    use WithPagination;
    protected $title = 'Turnamen online Mobile legends';
    public $filter;
    public $search;

    public function mount()
    {
        $this->filter = "all";
        $this->search = null;
        if (isset(request()->search)) {
            $this->search = request()->search;
        }
    }

    public function selectFilter()
    {
        $this->render();
    }

    public function searchTournaments()
    {
        $this->render();
    }
    public function render()
    {
        if ($this->filter == 'latest') {
            $turnaments = Tournament::latest()->where('title', 'LIKE', '%' . $this->search . '%')->where('is_active', 1)->paginate(9);
        } else if ($this->filter == 'oldest') {
            $turnaments = Tournament::oldest()->where('title', 'LIKE', '%' . $this->search . '%')->where('is_active', 1)->paginate(9);
        } else if ($this->filter == 'free') {
            $turnaments = Tournament::oldest()->where('title', 'LIKE', '%' . $this->search . '%')->where('type', 'free')->where('is_active', 1)->paginate(9);
        } else if ($this->filter == 'premium') {
            $turnaments = Tournament::oldest()->where('title', 'LIKE', '%' . $this->search . '%')->where('type', 'premium')->where('is_active', 1)->paginate(9);
        } else {
            $turnaments = Tournament::where('title', 'LIKE', '%' . $this->search . '%')->where('is_active', 1)->orderBy('id', 'desc')->paginate(9);
        }

        return view('livewire.homepage.list-tournaments', [
            'turnaments' => $turnaments,
        ])->layout('layouts.homepageLivewire', ['title' => $this->title]);
    }
}
