<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class BreadcrumbServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {
            $routeName = request()->route() ? request()->route()->getName() : null;

            $allBreadcrumbs = config('breadcrumbs', []);
            $breadcrumbs = $allBreadcrumbs[$routeName] ?? [];

            // Convert route names to URLs
            foreach ($breadcrumbs as &$crumb) {
                $crumb['url'] = !empty($crumb['route']) ? route($crumb['route']) : null;
                unset($crumb['route']); // remove route key
            }

            $view->with('breadcrumbs', $breadcrumbs);
        });
    }
}
