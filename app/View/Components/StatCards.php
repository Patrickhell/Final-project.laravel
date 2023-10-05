<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatCards extends Component
{
    public $votes;
    public $reviews;
    public $messages;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $vote
     * @param  mixed  $reviews
     * @param  mixed  $messages
     */
    public function __construct($votes, $reviews, $messages)
    {
        $this->votes = $votes;
        $this->reviews = $reviews;
        $this->messages = $messages;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.stats-cards');
    }
}
