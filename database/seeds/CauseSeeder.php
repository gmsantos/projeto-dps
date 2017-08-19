<?php

use Illuminate\Database\Seeder;

class CauseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $causes = [
            ['cause' => 'Meio Ambiente', 'user_id' => 1],
            ['cause' => 'Animais', 'user_id' => 1],
            ['cause' => 'Elefantes', 'user_id' => 1],
            ['cause' => 'Patrimonio Histórico', 'user_id' => 2],
            ['cause' => 'Crianças', 'user_id' => 2],
            ['cause' => 'Ensino de Adultos', 'user_id' => 2],
        ];
        
        foreach($causes as $cause)
        {
            App\Cause::create($cause)->save();
        }
    }
}
