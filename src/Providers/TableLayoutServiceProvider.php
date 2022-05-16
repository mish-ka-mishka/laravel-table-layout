<?php

namespace TableLayout\Providers;

use Illuminate\Support\ServiceProvider;

class TableLayoutServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'table-layout');
    }
}
