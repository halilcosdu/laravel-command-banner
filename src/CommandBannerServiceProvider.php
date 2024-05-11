<?php

namespace HalilCosdu\CommandBanner;

use Illuminate\Console\Events\CommandStarting;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Console\Output\ConsoleOutput;

class CommandBannerServiceProvider extends ServiceProvider
{
    public function boot(): void
    {

        $this->publishes([
            __DIR__.'/../config/command-banner.php' => config_path('command-banner.php'),
        ], 'command-banner-config');
    }

    public function register(): void
    {
        Event::listen(function (CommandStarting $event) {
            if (! config('command-banner.enabled') || is_null(config('command-banner.environments'))) {
                return;
            }

            foreach (config('command-banner.environments') as $environment => $signature) {
                if (app()->environment($environment)) {
                    foreach ($signature as $command) {
                        if ($event->command == $command) {
                            $output = new ConsoleOutput;
                            $output->writeln("<error>Command [$event->command] is disabled in $environment environment.</error>");
                            exit(1);
                        }
                    }
                }
            }
        });
    }
}
