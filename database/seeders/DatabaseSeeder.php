<?php

namespace Database\Seeders;

use App\Models\Action;
use App\Models\Area;
use App\Models\Bussiness_unit;
use App\Models\Cause;
use App\Models\Incidents;
use App\Models\Companies;
use App\Models\Corrective_action;
use App\Models\Electrical_service;
use App\Models\Event;
use App\Models\Image;
use App\Models\Incident_action;
use App\Models\Incident_cause;
use App\Models\Incident_state;
use App\Models\Person;
use App\Models\Type_image;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Companies::factory(4)->create();
        Person::factory(5)->create();
        User::factory(5)->create();
        Bussiness_unit::factory(2)->create();
        Electrical_service::factory(2)->create();
        Area::factory(4)->create();
        Event::factory(20)->create();
        Incident_state::factory(3)->create();
        Corrective_action::factory(50)->create();

        Incidents::factory(50)->create();

        Type_image::factory(2)->create();
        Image::factory(50)->create();



        Cause::factory(40)->create();
        Incident_cause::factory(80)->create();

        Action::factory(40)->create();
        Incident_action::factory(100)->create();
    }
}
