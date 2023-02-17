<?php

namespace Admin\Support;

use Illuminate\Support\Facades\Cache;

class Feature
{

    public static function enabled($feature)
    {
        $features = self::getFeatures();

        if(!isset($features[$feature])) {
            return false;
        }

        if(is_string($features[$feature])) {
            return $features[$feature] === 'true';
        }

        return (bool) $features[$feature];
    }

    public static function disabled($feature)
    {
        return !self::enabled($feature);
    }

    public static function getFeatures(): array
    {
        return Cache::remember('admin.features', 60, function (){
            $config = json_decode(file_get_contents(self::getConfigPath()), true);

            if(!isset($config['features']) || !is_array($config['features'])) {
                return [];
            }

            return $config['features'];
        });
    }

    public static function getConfigPath()
    {
        return base_path('admin/admin.config.json');
    }
}
