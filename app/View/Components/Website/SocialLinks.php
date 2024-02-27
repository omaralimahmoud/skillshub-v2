<?php

namespace App\View\Components\Website;

use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SocialLinks extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $settings = Setting::select('key', 'value')->WhereIn('key', ['facebook', 'instagram'])->get();

        return view('components.website.social-links', [
            'facebook' => $settings->firstWhere('key', 'facebook'),
            'instagram' => $settings->firstWhere('key', 'instagram'),
        ]);
    }
}
