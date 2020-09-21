<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CheckBox extends Component
{
    public $label;
    public $upName;
    public $downName;
    public $name;
    public $record;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $label,$record =null, $upName = null,$downName = null)
    {
        $this->upName = '上昇トレンド';
        $this->downName = '下降トレンド';
        $this->label = $label;
        $this->name = $name;
        
        if (isset($record)) {

            $this->record = $record[$name];
        }
        if (isset($upName)) {

            $this->upName = $upName;
        }
        if (isset($downName)) {

            $this->downName = $downName;

        }

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
       
        return view('components.check-box');
    }
}
