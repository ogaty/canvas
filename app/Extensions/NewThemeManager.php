<?php

namespace App\Extensions;

use App\Meta\Constants;
use App\Models\Settings;
use App\Helpers\ConfigHelper;
use Illuminate\Support\Collection;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Application;

class NewThemeManager
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * @var ConfigWriter
     */
    protected $config;

    /**
     * @var Filesystem
     */
    protected $filesystem;

    /**
     * @var Collection|null
     */
    protected $extensions;

    /**
     * Get started.
     */
    public function __construct(
        Application $app,
        Filesystem $filesystem
    ) {
        $this->app = $app;
        $this->filesystem = $filesystem;
        $this->config = ConfigHelper::getWriter();
    }

    /**
     * Get default Theme name.
     * @return string
     */
    public function getDefaultThemeName()
    {
        return Constants::DEFAULT_THEME_NAME;
    }
}
