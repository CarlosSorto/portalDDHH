<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Iw\Api\Traits\Models\Searchable;

class Country extends Model
{
    use Searchable;

    protected static $searchable_fields = [
          'id' => [
            'type'=> 'integer',
          ],
          'iso_name' => [
            'type'=> 'string',
          ],
          'name' => [
            'type'=> 'string',
          ],
          'iso' => [
            'type'=> 'string',
          ],
    ];

    public function getKeyRouteName()
    {
        return 'iso';
    }

    public function scopeDefaultSort($q)
    {
        return $q->orderBy('sp_name', 'asc');
    }
}
