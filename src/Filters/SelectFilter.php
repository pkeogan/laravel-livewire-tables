<?php

namespace Pkeogan\LaravelLivewireTables\Filters;

use Pkeogan\LaravelLivewireTables\Filters\Traits\HasOptions;

class SelectFilter extends BaseFilter
{
    use HasOptions;

    public $type = 'select';

    public $view = 'select-filter';
}
