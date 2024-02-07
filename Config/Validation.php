<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        \BasicApp\Validators\HtmlTagsValidator::class,
        \BasicApp\Validators\NotHtmlTagsValidator::class,
        \BasicApp\Validators\NotSpecialCharsValidator::class,
    ];
    
}
