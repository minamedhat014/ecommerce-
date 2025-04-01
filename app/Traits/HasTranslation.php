<?php

namespace App\Traits;

trait HasTranslation {

   
    public function getLocalizedAttribute($attribute)
    {
        $locale = app()->getLocale();
        $localizedAttribute = "{$attribute}_" . $locale;

        return $this->{$localizedAttribute} ?? $this->{$attribute};
    }

    /**
     * Dynamically retrieve localized attributes.
     *
     * @param string $key
     * @return mixed
     */
    public function __get($key)
    {
        // Check if the requested key is a localized attribute
        if (in_array("{$key}_ar", array_keys($this->attributes)) && in_array("{$key}_en", array_keys($this->attributes))) {
            return $this->getLocalizedAttribute($key);
        }

        // Fallback to default model behavior
        return parent::__get($key);
    }


}