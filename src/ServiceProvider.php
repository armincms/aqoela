<?php

namespace Armincms\Aqoela;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->afterResolving('conversion', function($conversion) {
            $common = $conversion->driver('common');

            $common->merge('main', [
                'width'         => 1530,
                'height'        => 460,
                'upsize'        => false, // cutting type
                'compress'      => 25,
                'extension'     => null, // save extension
                'placeholder'   => $common->placeholder(1530, 460),
                'label'         => __('Common larg image'),
            ]);
            $common->merge('thumbnail', [
                'width'         => 450,
                'height'        => 394,
                'upsize'        => false, // cutting type
                'compress'      => 25,
                'extension'     => null, // save extension
                'placeholder'   => $common->placeholder(450, 394),
                'label'         => __('Common thumbnail image'),
            ]);
        });
    }
}
