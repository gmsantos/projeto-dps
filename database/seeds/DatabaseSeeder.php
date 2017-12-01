<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private $toTruncate = ['cause_institution', 'cause_volunteer', 'institutions', 'volunteers', 'causes', 'users'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        $this->truncateTables();

		$this->call(UserTableSeeder::class);
        $this->call(InstitutionSeeder::class);
        $this->call(VolunteerSeeder::class);
        $this->call(CauseSeeder::class);
        $this->call(CauseVolunteerSeeder::class);
        $this->call(CauseInstitutionSeeder::class);

        Schema::enableForeignKeyConstraints();
    }

    private function truncateTables()
    {
        foreach($this->toTruncate as $table)
        {
            DB::table($table)->truncate();
        }
    }
}
