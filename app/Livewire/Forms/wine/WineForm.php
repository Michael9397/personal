<?php

namespace App\Livewire\Forms\wine;

use App\Models\Wine;
use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Form;

class WineForm extends Form
{
    public ?int $id = null;

    #[Validate('required')]
    public string $name = '';
    #[Validate('required')]
    public string $color = 'white';
    #[Validate('required')]
    public string $type = '';
    public string $from = '';
    #[Validate('boolean')]
    public bool $liked_it = false;

    public string $notes = '';

    #[Validate('required|date')]
    public string $time_tried = '';

    public function save()
    {;
        $this->validate();
        if ($this->id > 0) {
            $wine = Wine::find($this->id);
            $wine->update($this->all());
        } else {
            Wine::create($this->only('name', 'color', 'from', 'liked_it', 'notes', 'time_tried'));
        }
    }

    public function setForm($wine) {
        $this->id = $wine->id;
        $this->name = $wine->name;
        $this->color = $wine->color;
        $this->type = $wine->type;
        $this->from = $wine->from;
        $this->liked_it = $wine->liked_it;
        $this->notes = $wine->notes;
        $this->time_tried = $wine->time_tried->format('Y-m-d');
    }
}
