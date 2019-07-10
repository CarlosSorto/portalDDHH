<?php

namespace App\Transformers;

use App\Organization;
use League\Fractal\TransformerAbstract;

class OrganizationTransformer extends TransformerAbstract
{
    public function transform(Organization $organization)
    {
        return [
          'id'        => $organization->id,
          'name'      => $organization->name,
          'logo'      => $organization->image,
          'website'   => $organization->website,
          'workareas' => $organization->work_areas()->get(),
      ];
    }
}
