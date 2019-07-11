<?php

use Faker\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * @var \Faker\Generator
     */
    private $faker;


    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Factory::create();

        $this->catalogs();
        $this->fakers();
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

        DB::table('status_request')->insert([
            ['name' => 'Nueva'],
            ['name' => 'En progreso'],
            ['name' => 'Completada']
        ]);
    }

    public function fakers()
    {
        DB::table('user')->insert([
            [
                'username' => 'admin',
                'password' => bcrypt('prueba'),
                'name' => 'Administrador',
                'last_name' => 'Sistema',
                'fk_id_rol' => \App\Models\Rol::ADMIN,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        ]);

        for ($i = 0; $i < 10; $i++) {
            $userId = DB::table('user')->insertGetId([
                'username' => 'usuario_' . ($i + 1),
                'password' => bcrypt('prueba'),
                'name' => $this->faker->name,
                'last_name' => $this->faker->lastName,
                'fk_id_rol' => \App\Models\Rol::CLIENT,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

            $clientId = DB::table('client')->insertGetId([
                'email' => $this->faker->email,
                'cellphone' => $this->faker->phoneNumber,
                'street' => $this->faker->streetName,
                'ext_num' => $this->faker->randomNumber(2),
                'colony' => $this->faker->streetName,
                'town' => "Metepec",
                'zip_address' => $this->faker->randomNumber(5),
                'fk_id_user' => $userId,

            ]);
        }
    }
}
