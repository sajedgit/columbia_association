<?php

namespace App\Http\Resources;
use App\Models\BoardMember;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BoardMembersResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        $items = array();
        foreach ($this->resource as $object) {
            $items[] = array(
                'id' => $object->id,
                'board_members_category_name' => $object->board_members_category_name,
                'details' => new BoardMembersRelationshipResource($object),
            );
        }

        return $items;


    }



}
