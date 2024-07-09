<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IncidentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'nombre' => $this->title,
            'descripcion' => $this->description,
            'activity' => $this->activity,
            'location' => $this->location,
            'plazo_subsanacion' => $this->lifting_period,
            'usuario_reportado' => $this->user ? $this->user->email : null,
            'area_nombre' => $this->area ? $this->area->name : null


        ];
    }
}
