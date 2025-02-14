<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RolePermissionSwtich extends Component
{
    public $item, $operation, $permissions, $cls;
    /**
     * Create a new component instance.
     */
    public function __construct($item, $operation, $permissions, $cls)
    {
        $this->item = $item;
        $this->operation = $operation;
        $this->permissions = $permissions;
        $this->cls = $cls;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.role-permission-switch');
    }
}
