<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RowImageInputCol extends Component
{
    public $id, $name, $outputId, $label, $onchange, $src, $col;
    /**
     * Create a new component instance.
     */
    public function __construct($id, $name, $outputId, $label, $onchange="", $src = "", $col = "col-md-12 text-center")
    {
        $this->id = $id;
        $this->name = $name;
        $this->outputId = $outputId;
        $this->label = $label;
        $this->onchange = $onchange;
        $this->src = $src;
        $this->col = $col;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.row-image-input-col');
    }
}
