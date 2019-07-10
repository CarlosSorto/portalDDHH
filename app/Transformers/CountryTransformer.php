<?php

namespace App\Transformers;

use App\Country;
use League\Fractal\TransformerAbstract;

class CountryTransformer extends TransformerAbstract
{
    public function transform(Country $country)
    {
        return [
          'id'       => $country->id,
          'iso_name' => $country->iso_name,
          'name'     => $country->name,
          'iso'      => $country->iso,
      ];
    }
}
