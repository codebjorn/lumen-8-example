<?php

namespace App\Actions;

use Illuminate\View\View;

class GetIndexPage
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        return view('index');
    }
}
