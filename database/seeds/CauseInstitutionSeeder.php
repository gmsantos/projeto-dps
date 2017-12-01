<?php

use Illuminate\Database\Seeder;

class CauseInstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $institutions = App\Institution::pluck('id');
        $causes = App\Cause::pluck('id');
        
        $counter = 0;
        
        do
        {
            DB::table('cause_institution')->insert([
                'cause_id' => $causes->random(),
                'institution_id' => $institutions->random(),
            ]);
            
            $counter++;
        } while ($counter < 100) ;
    }
}
