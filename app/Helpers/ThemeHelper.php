<?php

namespace App\Helpers;

class ThemeHelper
{
    public static function getThemeView($view)
    {
        $theme = session('current_theme', 'theme');

        // Check if view exists in current theme
        if (view()->exists($theme . '.' . $view)) {
            return $theme . '.' . $view;
        }

        // Fallback to default theme
        return 'theme.' . $view;
    }
}
