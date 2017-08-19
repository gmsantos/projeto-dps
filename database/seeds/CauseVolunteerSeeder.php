<?php

use Illuminate\Database\Seeder;

class CauseVolunteerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $volunteers = App\Volunteer::pluck('id');
        $causes = App\Cause::pluck('id');
        
        $counter = 0;
        
        do
        {
            DB::table('cause_volunteer')->insert([
                'cause_id' => $causes->random(),
                'volunteer_id' => $volunteers->random(),
            ]);
            
            $counter++;
        } while ($counter < 100) ;
    }
}
