<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidents extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'slug',
        'description',
        'activity',
        'location',
        'reported_user',
        'registered_user',
        'company_id',
        'bussiness_unit_id',
        'electrical_service_id',
        'area_id',
        'event_id',
        'incident_state_id',
        'lifting_period'
    ];
    public function company(){
        return $this->belongsTo(Companies::class);
    }

    public function incident_state(){
        return $this->belongsTo(Incident_state::class);
    }

    public function event(){
        return $this->belongsTo(Event::class);
    }
    public function area(){
        return $this->belongsTo(Area::class);
    }

    public function reported(){
        return $this -> belongsTo(User::class, 'reported_user');
    }

    public function registered(){
        return $this -> belongsTo(User::class, 'registered_user');
    }

    public function bussiness_unit(){
        return $this -> belongsTo(Bussiness_unit::class, 'bussiness_unit_id');
    }
    public function electrical_service(){
        return $this -> belongsTo(Electrical_service::class, 'electrical_service_id');
    }
    public function corrective_action(){
        return $this->hasMany(Corrective_action::class, 'incident_id');

    }


}

