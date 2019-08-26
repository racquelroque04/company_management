<?php

namespace App\Http\Transformer;

use App\Position;
use League\Fractal\TransformerAbstract;

class PositionTransformer extends TransformerAbstract
{
    public function transform(Position $position)
    {
        return [
            'id'            => (int) $position->id,
            'name'          => $position->name,
            'company_id'    => $position->company_id,
        ];
    }
}