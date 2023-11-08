<?php

namespace App\Http\Resources;

use App\Helpers\Functions;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiResource extends JsonResource
{
  use Functions;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */


    public function toArray(Request $request): array
    {
        return [
          'student_id'=>$this->id ,
          'student_name'=>$this->name,
          'created_at'=>$this->HumanTime($this->created_at)
        ];
    }
}
