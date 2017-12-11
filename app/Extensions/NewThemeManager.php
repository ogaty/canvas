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
    const ACTIVE_KEY = 'active_theme';

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
     * @return Collection
     */
    public function getThemes()
    {
        $themes = new Collection;

        $files = new Filesystem;
        $path = resource_path('views/themes');
        $dirs = $files->directories($path);
          
        $count = 0;
        foreach ($dirs as $dir) {
            $themes->put($count, $files->basename($dir));
            $count++;
        }

        return $themes;
    }

    /**
     * Get default Theme name.
     * @return string
     */
    public function getDefaultThemeName()
    {
        return Constants::DEFAULT_THEME_NAME;
    }

    public function currentThemeName()
    {
        return Settings::themeName();
    }

    public function getViewPath() : string
    {
        $theme = $this->currentThemeName();
        logger("theme: {$theme}");
   
        if ($theme == 'cnvs-paper-dark') {
            return "";
        }
        $prefix = $theme == 'default' ? '' : $themeName . '/';
        return $prefix;
    }

    public function activateTheme($themeId)
    {
        Settings::updateOrCreate(['setting_name' => self::ACTIVE_KEY], ['setting_value' => $themeId]);
    }

    public function setActiveTheme($id)
    {
        return $this->activateTheme($id);
    }

}
