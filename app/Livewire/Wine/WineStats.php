<?php

namespace App\Livewire\Wine;

use App\Models\Wine;
use Livewire\Component;

class WineStats extends Component
{
    public \Illuminate\Support\Collection $wines;

    public $totalReds = 0;
    public $totalRedsLiked = 0;
    public $totalWhites = 0;
    public $totalWhitesLiked = 0;
    public $totalWines = 0;
    public $whitesPercentage = 0;
    public $redsPercentage = 0;

    public function mount()
    {
        $this->wines = Wine::all();
        $this->totalWines = $this->wines->count();
        $this->totalReds = $this->wines->where('color', 'red')->count();
        $this->totalWhites = $this->wines->where('color', 'white')->count();
        $this->totalRedsLiked = $this->wines->where('color', 'red')->where('liked_it', '1')->count();
        $this->totalWhitesLiked = $this->wines->where('color', 'white')->where('liked_it', '1')->count();
        $this->whitesPercentage = $this->calculatePercentage($this->totalWhites, $this->totalWhitesLiked);
        $this->redsPercentage = $this->calculatePercentage($this->totalReds, $this->totalRedsLiked);
    }

    private function calculatePercentage($total, $liked)
    {
        return $total > 0 ? round(($liked / $total) * 100) : 0;
    }

    public function render()
    {
        return view('livewire.wine.wine-stats');
    }
}
