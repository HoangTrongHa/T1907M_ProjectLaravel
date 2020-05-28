<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    public $fillable = [
        "name",
        "description",
        "image"
    ];

    public function __get($key)
    {
        if (is_null($this->get($key)))
            return "default value";
        return $this->get($key);
    }
}
