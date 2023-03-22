<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "social_number"=>$this->social_number,
            "post_name"=>$this->post->getName(),
            "first_name"=>$this->user->first_name,
            "last_name"=>$this->user->last_name,
            "salary"=>$this->salary,
            "hiring_date"=>$this->hiring_date,
             "inHoliday"=>$this->inHoliday()
        ];
    }
}
