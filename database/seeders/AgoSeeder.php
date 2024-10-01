<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jaarbasis;
use App\Models\Data;

class AgoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = fopen(base_path("database/data/jaarbasis.csv"), "r");
        $counter = 0;
        
        while ($line = fgetcsv($file, 0,";")) {
            if ($counter!==0) {
                $jaarbasis = new Jaarbasis();
                $jaarbasis->naam = $line[0];
                $jaarbasis->trap = $line[1];
                $jaarbasis->loon = $line[2];

                $jaarbasis->save();
            }
            $counter++;
        }
        fclose($file);

        $data = new Data();
        $data->naam = 'sz_bijdrage';
        $data->waarde = 0.1307;
        $data->save();

        $data_index = new Data();
        $data_index->naam = 'index';
        $data_index->waarde = 1.020807;
        $data_index->save();

        $data_voorheffing = new Data();
        $data_voorheffing->naam = 'voorheffing';
        $data_voorheffing->waarde = 0.33;
        $data_voorheffing->save();
    }
}
