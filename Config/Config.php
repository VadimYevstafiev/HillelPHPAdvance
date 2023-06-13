<?php

namespace Config;

class Config
{
    protected static Config|null $instatnce = null;
    protected array $configs = [];

    protected function __construct() {}

    public static function get(string $name): string|null
    {
        if (is_null(static::$instatnce)) {
            static::$instatnce = new static;
        }

        return static::$instatnce->getParam($name);
    }

    public function getParam(string $name): string|null
    {
        $keys = explode('.', $name);

        return $this->findParamByKeys($keys, $this->readConfigs());
    }

    protected function readConfigs(): array
    {
        if(empty($this->configs)) {
            $this->configs = include CONFIG_DIR . '/configurations.php';
        }
        
        return $this->configs;
    }

    protected function findParamByKeys(array $keys = [], array $configs = []): string|null
    {
        $value = null;

        if (empty($keys)) {
            return $value;
        }

        $needle = array_shift($keys);

        if (array_key_exists($needle, $configs)) {
            $value = is_array($configs[$needle])
                ? $this->findParamByKeys($keys, $configs[$needle])
                : $configs[$needle];
        }

        return $value;
    }
}
