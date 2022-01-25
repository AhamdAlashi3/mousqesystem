<?php

namespace Database\Seeders;

use App\Models\Classes;
use Illuminate\Database\Seeder;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Classes::create(['name'=>'أول','active'=>true]);
        Classes::create(['name'=>'ثاني','active'=>true]);
        Classes::create(['name'=>'ثالث','active'=>true]);
        Classes::create(['name'=>'رابع','active'=>true]);
        Classes::create(['name'=>'خامس','active'=>true]);
        Classes::create(['name'=>'سادس','active'=>true]);
        Classes::create(['name'=>'سابع','active'=>true]);
        Classes::create(['name'=>'ثامن','active'=>true]);
        Classes::create(['name'=>'تاسع','active'=>true]);
        Classes::create(['name'=>'عاشر','active'=>true]);
        Classes::create(['name'=>'حادي عشر','active'=>true]);
        Classes::create(['name'=>'توجيهي','active'=>true]);

    }
}
