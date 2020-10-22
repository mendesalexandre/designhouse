<?php

namespace App\Http\Resources;

use App\Models\Api\TabelaCusta;
use Illuminate\Http\Resources\Json\JsonResource;

class TabelaCustaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'data' => new TabelaCusta()
        ];
    }
}
