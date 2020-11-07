<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::enableForeignKeyConstraints();


        $faker = Faker::create('fr_FR');
        //  CREATION D'UN UTILISATEUR

        $user              = new \App\User();
        $user->prenom = 'Jamal';
        $user->nom = 'AGURRAM';
        $user->email = 'jamal.agurram@gmail.com';
        $user->photo = $faker->imageUrl($width = 640, $height = 480); // 'http://lorempixel.com/640/480/';
        $user->password = bcrypt('blabla');
        $user->save();

        for ($i = 0; $i < 50; $i++){

            $user->contacts()->save(factory(App\Contact::class)->make());
            $user->entreprises()->save(factory(App\Entreprise::class)->make());

        }

        $this->command->info('User added : jamal.agurram@gmail : blabla');

        factory(App\User::class, 3)->create()->each(function ($u) {

            for ($i = 0; $i < 50; $i++){
                $u->contacts()->save(factory(App\Contact::class)->make());
                $u->entreprises()->save(factory(App\Entreprise::class)->make());

            }

        });




        DB::table('employees')->insert([

            ['entreprise_id' => 1, 'contact_id' => 1,'fonction' => $faker->jobTitle],
            ['entreprise_id' => 1, 'contact_id' => 2,'fonction' => $faker->jobTitle],
            ['entreprise_id' => 1,'contact_id' => 3,'fonction' => $faker->jobTitle],
            ['entreprise_id' => 1, 'contact_id' => 4,'fonction' => $faker->jobTitle],
            ['entreprise_id' => 1, 'contact_id' => 5,'fonction' => $faker->jobTitle],
            ['entreprise_id' => 1, 'contact_id' => 6,'fonction' => $faker->jobTitle],
            ['entreprise_id' => 1,'contact_id' => 7,'fonction' => $faker->jobTitle],
            ['entreprise_id' => 1, 'contact_id' => 8,'fonction' => $faker->jobTitle],

        ]);


        $path = '/tmp/sql-pays.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Country list added!');


    }
}
