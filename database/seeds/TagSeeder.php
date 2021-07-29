<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Vue.js','HTML', 'CSS', 'Laravel'];
        
        foreach ($tags as $tag) {
            $newtag = new Tag;
            $newtag->name = $tag;
            $newtag->slug = Str::slug($tag, '-');
            $newtag->save();
        }
    }
}
