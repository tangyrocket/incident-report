<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corrective_action extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'incident_id'];
    public function incident()
    {
        return $this->belongsTo(Incidents::class, 'incident_id');
    }
}
