<?php

namespace App;

use App\Traits\Models\SearchContentOrganization;
use Illuminate\Database\Eloquent\Model;
use Iw\Api\Traits\Models\Searchable;

class Organization extends Model
{
    use Searchable;
    use SearchContentOrganization;

    protected $fillable= [
        'name',
        'phone',
        'email',
        'description',
        'long_description',
        'classification_id',
        'country_id',
        'website',
        'latitude',
        'longitude',
        'image',
        'applicant',
        'institution',
        'position',
        'longitude',
        'latitude',
    ];

    protected static $searchable_fields = [
          'id' => [
            'type'=> 'integer',
          ],
          'name' => [
            'type'=> 'string',
          ],
          'active' => [
            'type'=> 'boolean',
          ],
          'country_id' => [
            'type'=> 'integer',
          ],
          'classification_id' => [
            'type'=> 'integer',
          ],
    ];

    public function countryId()
    {
        return $this->belongsTo(Country::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function classificationId()
    {
        return $this->belongsTo(Classification::class);
    }

    public function classification()
    {
        return $this->belongsTo(Classification::class);
    }

    public function workAreas()
    {
        return $this->belongsToMany(WorkArea::class, 'organization_work_areas');
    }

    public function work_areas()
    {
        return $this->belongsToMany(WorkArea::class, 'organization_work_areas');
    }

    public function searchContent()
    {
        return $this->morphOne('App\SearchContent', 'sourceable');
    }

    public function scopeWorkArea($q, $value)
    {
        if (is_null($value)) {
            return $q;
        }

        return $q->whereHas('work_areas', function ($query) use ($value) {
            $query->where('id', $value);
        });
    }
}
