<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\Resource;

class CategoriesResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);

        // return [ //$item->id,$item->name,$item->avatar,$item->created_at,$item->updated_at
        //     'id'         => $this->id,
        //     'name'      => $this->name, // $this->name,
        //     'avatar'      => 'http://127.0.0.1:8000' . $this->avatar,
        //     'created_at'      =>  $this->created_at,
        //     'updated_at'      => $this->updated_at,
        // ];
    }
}
