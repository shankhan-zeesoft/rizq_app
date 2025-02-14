<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RowTextAreaField extends Component
{
    public $type, $id, $name, $label, $rows, $placeholder, $col, $classes, $required;
    /**
     * Create a new component instance.
     */
    public function __construct($type, $id, $name, $label, $rows = 3, $placeholder = "", $col = "col-md-12", $classes = "", $required = false)
    {
        $this->type = $type;
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->rows = $rows;
        $this->placeholder = $placeholder;
        $this->col = $col;
        $this->classes = $classes;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.row-text-area-field');
    }
}
