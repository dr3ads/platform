<?php namespace Platform\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Field extends Model/* implements SluggableInterface*/
{
    use SluggableTrait;

    protected $table = 'fields';
    protected $fillable = ['name','type','options','validation','slug'];

    /*protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];*/

}
