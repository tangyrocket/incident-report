<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

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
            'observacionId'=>$this->id,
            'nombre' => $this->title,
            'descripcion' => $this->description,
            'activity' => $this->activity,
            'location' => $this->location,
            'plazo_subsanacion' => $this->lifting_period ? Carbon::parse($this->lifting_period)->format('Y-m-d') : null,
           // 'usuario_reportado' => $this->reported_user ? $this->users->email : null,
            //'usuario_reportado' => $this->reported_user ? $this->reported_user->email : null,
            'usuario_reportado' => $this->reported_user,

            'area_nombre' => $this->area_id ? $this->area->name : null,
           'empresa_nombre' => $this->company_id ? $this->company->name : null

        ];
    }
}
