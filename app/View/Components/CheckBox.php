<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CheckBox extends Component
{
    public $label;
    public $upName;
    public $downName;
    public $name;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $label, $upName = null, $downName = null,$record = null)
    {
        $this->upName = $upName;
        $this->downName = $downName;
        $this->label = $label;
        $this->name = $name;
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
        return view('components.check-box',compact('record'));
    }
}
