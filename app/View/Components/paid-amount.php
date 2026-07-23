<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PaidAmount extends Component
{
    /**
     * Create a new component instance.
     */
    public $paidAmounts;
    public $id;

    public function __construct($paidAmounts, $id)
    {
        $this->paidAmounts = $paidAmounts;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.paid-amount');
    }
}
