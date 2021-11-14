<?php

namespace Database\Seeders;

use App\Models\Folder;
use Illuminate\Database\Seeder;

class FolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Folder::create([
            'title' => 'Rapat Komisariat'
        ]);
        Folder::create([
            'title' => 'Latihan Kader 1'
        ]);
        Folder::create([
            'title' => 'Kohati',
            'parent_id' => 1
        ]);
        Folder::create([
            'title' => 'HMI-WAN',
            'parent_id' => 1
        ]);
        Folder::create([
            'title' => 'Surat - Surat',
            'parent_id' => 2
        ]);
        Folder::create([
            'title' => 'KOHATI SK Kepengurusan',
            'parent_id' => 3
        ]);
    }
}
