<?php

namespace App\View\Components;

use App\Record;
use Illuminate\View\Component;

class TextArea extends Component
{
    public $name;
    public $label;
    public $record;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $label, $record = null)
    {   
        $this->name = $name;
        $this->label = $label;
        if( isset($record)){

            $this->record = $record[$name];
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.textarea');
    }


}
