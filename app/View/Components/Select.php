<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Select extends Component
{
    public $name;
    public $label;
    public $records;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$label,$record)
    {
        $this->name = $name;
        $this->label = $label;

        if (isset($record)) {
            
            $this->records = $record[$name];
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.select');
    }
}
