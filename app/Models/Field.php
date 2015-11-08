<?php namespace Platform\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Field extends Model
{
    use SluggableTrait;

    protected $table = 'fields';

    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];

}
