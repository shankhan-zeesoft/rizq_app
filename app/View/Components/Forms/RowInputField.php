<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RowInputField extends Component
{
    public $type, $id, $name, $label, $placeholder, $col, $classes, $value, $required, $datePicker, $readonly;
    /**
     * Create a new component instance.
     */
    public function __construct($type, $id, $name, $label, $placeholder = "", $col = "col-md-12", $classes = "", $value = "", $required = false, $datePicker = false, $readonly = false)
    {
        $this->type = $type;
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->col = $col;
        $this->classes = $classes;
        $this->value = $value;
        $this->required = $required;
        $this->datePicker = $datePicker;
        $this->readonly = $readonly;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.row-input-field');
    }
}
