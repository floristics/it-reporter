<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'User',
        ]);
        DB::table('roles')->insert([
            'name' => 'Admin',
        ]);
        DB::table('roles')->insert([
            'name' => 'SuperAdmin',
        ]);
        DB::table('role_user')->insert([
            'role_id' => '3',
            'user_id' => '11',
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'p.rodionov@hcsds.ru',
            'password' => bcrypt('qwerty'),
            'remember_token' => str_random(10),
        ]);
        DB::table('systems')->insert([
            'name' => '1c',
        ]);
        DB::table('systems')->insert([
            'name' => 'Галактика',
        ]);
        DB::table('fundamental_settings')->insert([
            'name' => 'Справочник типов договоров',
            'var' => 'contract_type_list',
            'value' => '6',
        ]);
        DB::table('fundamental_settings')->insert([
            'name' => 'Справочник контрагентов',
            'var' => 'contractor_list',
            'value' => '7',
        ]);
        DB::table('fundamental_settings')->insert([
            'name' => 'Справочник периодов оплаты по договорам',
            'var' => 'pay_period_list',
            'value' => '8',
        ]);
    }

}
