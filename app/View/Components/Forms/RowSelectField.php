<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RowSelectField extends Component
{
    public $id, $name, $label, $col, $classes, $select2, $required, $multiple, $inputGroup, $d_none;
    /**
     * Create a new component instance.
     */
    public function __construct($id, $name, $label, $col = "col-md-12", $classes = "", $select2 = true, $required = false, $multiple = false, $inputGroup = false, $d_none = false)
    {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->col = $col;
        $this->classes = $classes;
        $this->select2 = $select2;
        $this->required = $required;
        $this->multiple = $multiple;
        $this->inputGroup = $inputGroup;
        $this->d_none = $d_none;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.row-select-field');
    }
}
