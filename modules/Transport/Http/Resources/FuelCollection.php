<?php

namespace Modules\Transport\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FuelCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection->transform(function($row, $key) {

            return [
                'id' => $row->id,
                'description' => $row->description,
                'fuel_type_id' => $row->fuel_type_id,
                'fuel_type_description' => $row->fuel_type->description,
                'created_at' => $row->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $row->updated_at->format('Y-m-d H:i:s'),
            ];
        });

    }
    
}
