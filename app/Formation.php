<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Iw\Api\Traits\Models\Searchable;

class Formation extends Model
{
    use Searchable;
    use \App\Traits\Models\SearchContentFormation;

    protected $fillable = [
        'title',
        'duration',
        'place',
        'since',
        'until',
        'public',
        'organizer',
        'representative',
        'position',
        'email',
        'website',
        'description',
        'link',
        'active',
        'modality_id',
        'country_id',
        'formation_type_id',
    ];

    protected static $searchable_fields = [
      'id' => [
        'type'=> 'integer',
      ],
      'active' => [
        'type'=> 'integer',
      ],
      'title' => [
        'type'=> 'string',
      ],
      'modality_id' => [
        'type'=> 'integer',
      ],
      'formation_type_id' => [
        'type'=> 'integer',
      ],
      'country_id' => [
        'type'=> 'integer',
      ],
    ];

    public function modalityId()
    {
        return $this->belongsTo(Modality::class);
    }

    public function modality()
    {
        return $this->belongsTo(Modality::class);
    }

    public function countryId()
    {
        return $this->belongsTo(Country::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function formationTypeId()
    {
        return $this->belongsTo(FormationType::class);
    }

    public function formationType()
    {
        return $this->belongsTo(FormationType::class);
    }

    public function searchContent()
    {
        return $this->morphOne('App\SearchContent', 'sourceable');
    }

    protected $dates = [
        'since', 'until', 'created_at', 'updated_at', 'deleted_at',
    ];
}
