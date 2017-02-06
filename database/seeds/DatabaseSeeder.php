<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //Model::unguard();
        factory(App\User::class, 10)->create();
        factory(App\Organisation::class, 10)->create();
        factory(App\Catalog::class, 9)->create();
        factory(App\CatalogItem::class, 30)->create();
        factory(App\Workplace::class, 9)->create();
        factory(App\Workplace_soft::class, 30)->create();
        factory(App\Budget::class, 50)->create();
        factory(App\License::class, 50)->create();
        factory(App\Contract::class, 50)->create();
        $this->call(RoleTableSeeder::class);


        //Model::reguard();
    }
}
