<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->catalogs();
    }


    private function catalogs()
    {
        /**
         * Por mes
         */
        DB::table('water_source_type')->insert([
            ['name' => 'Comercial', 'price' => 200],
            ['name' => 'Habitacional', 'price' => 100]
        ]);

        DB::table('state')->insert([
            ['name' => 'Activo', 'discount' => 0],
            ['name' => 'Conservación', 'discount' => 50],
            ['name' => 'Cortada', 'discount' => 100]
        ]);

        DB::table('rol')->insert([
            ['name' => 'Administrador'],
            ['name' => 'Cliente']
        ]);

        DB::table('transaction_type')->insert([
            ['name' => 'Ingreso'],
            ['name' => 'Egreso']
        ]);

    }
}
