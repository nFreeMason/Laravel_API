<?php

use Illuminate\Database\Seeder;

class LinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $factory = factory(\App\Models\Link::class)->times(100)->make();
        \App\Models\Link::insert($factory->toArray());
    }
}
