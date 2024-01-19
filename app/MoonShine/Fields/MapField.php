<?php

declare(strict_types=1);

namespace App\MoonShine\Fields;

use MoonShine\Fields\Field;
use Closure;

class MapField extends Field
{
    protected string $view = 'admin.fields.map-field';
}
