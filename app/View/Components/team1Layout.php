<?php

namespace App\View\Components;

use Illuminate\View\Component;

class team1Layout extends Component
{
    public $title;
    public function __construct($title = null)
    {
        $this->title = $title ?? 'Laravel 8 Projects';
    }

    public function render()
    {
        return view('theme.team1.index');
    }
}