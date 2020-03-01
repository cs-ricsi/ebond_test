<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Task extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'type' => 'task',
                'task_id' => $this->id,
                'attributes' => [
                    'title' => $this->title,
                    'description' => $this->description,
                    'partner' => new Partner($this->partner),
                    'done' => !empty($this->done_jobs),
                ],
            ],
            'links' => [
                'self' => $this->path(),
            ]
        ];
    }
}
