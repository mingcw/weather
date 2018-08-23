<?php

/*
 * This file is part of the mingcw/weather.
 *
 * (c) mingcw <mingc2016@126.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Mingcw\Weather;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(Weather::class, function () {
            return new Weather(config('services.weather.key'));
        });

        $this->app->alias(Weather::class, 'weather');
    }

    public function provides()
    {
        return [Weather::class, 'weather'];
    }
}
