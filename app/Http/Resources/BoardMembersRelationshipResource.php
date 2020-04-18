<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BoardMembersRelationshipResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'author'   => route("board_members.show")

        ];

    }

    public function with($request)
    {
//        return [
//            'links' => [
//                'self' => route('articles.index'),
//            ],
//        ];
    }
}
