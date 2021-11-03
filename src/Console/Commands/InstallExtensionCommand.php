<?php

namespace Guysolamour\Administrable\Extensions\Testimonial\Console\Commands;

use Guysolamour\Administrable\Console\Extension\BaseExtension;
use Guysolamour\Administrable\Extensions\Testimonial\ServiceProvider;

class InstallExtensionCommand extends BaseExtension
{
    public function run()
    {
        if ($this->checkifExtensionHasBeenInstalled()) {
            $this->triggerError("The [{$this->name}] extension has already been added, remove all generated files and run this command again!");
        }

        $this->loadMigrations();
        $this->loadControllers();
        $this->loadSeeders();
        $this->loadViews();
        $this->runMigrateArtisanCommand();

        $this->displayMessage("{$this->getUcfirstName()} extension added successfully.");
    }

    protected function getExtensionsStubsBasePath(string $path = '')
    {
        return dirname(ServiceProvider::packagePath(), 2) . DIRECTORY_SEPARATOR . $path;
    }

}
