<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class StatusSupport extends Component
{
    public function __construct(
        protected string $status
    ) {}

    public function render(): View|Closure|string
    {
        $color = 'blue';
        $color = $this->status === 'P' ? 'yellow' : $color;
        $color = $this->status === 'C' ? 'green' : $color;

        $textStatus = getStatusSupport($this->status);

        return view('components.status-support', compact('textStatus', 'color'));
    }
}
