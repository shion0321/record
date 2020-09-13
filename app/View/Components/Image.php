<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Image extends Component
{
    public $name;
    public $label;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $label,$record = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->record = $record;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $record = $this->record;
        return view('components.image',['record' => $record]);
    }
}
