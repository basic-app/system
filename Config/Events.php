<?php

use CodeIgniter\Events\Events;

Events::on('pre_system', function()
{
    helper(['t', 'current_lang']);

    $config = config(\Config\Validation::class);

    $config->ruleSets[] = BasicApp\Validators\HtmlTagsValidator::class;
    $config->ruleSets[] = BasicApp\Validators\NotHtmlTagsValidator::class;
    $config->ruleSets[] = BasicApp\Validators\NotSpecialCharsValidator::class;
});