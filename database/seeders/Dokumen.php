<?php

namespace Database\Seeders;

use App\Models\Dokumen as ModelsDokumen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Dokumen extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsDokumen::insert([
            [
            'id_category' => 1,
            'id_user' => 1,
            'title' => 'Instalasi VCenter desktop',
            'file_name' => '1212.pdf',
            'deskripsi' => 'Statistics Indonesia is an Indonesian Government Agency which is carrying out government duties in the field of statistics. Until now, Statistics Indonesia has been carrying out data collection in three ways: censuses, surveys, and compilation of administrative products. Consumer price data collection through the Survey of Consumer Prices which is conducted by Statistics Indonesia take place in weekly, two weekly, and monthly. Until now, Statistics Indonesia has not publication in daily frequency especially for Consumer Price Index (CPI) and inflation product. Nowadays, big data is rapidly evolving and emerging from a variety of sources. Utilization of big data can provide opportunities for organizations to become smarter and more productive. Inthis paper, 
            researcher identified that big data can be combined in statistical methodology as a part of data source in Statistics Indonesia. The development of Information Technology especially internet is so rapid and penetrated into various sectors including the online shopping. Ordering and buying goods or services for private use over the internet is increasing in popularity. Researcher identified all the type of big data which can create daily CPI in Statistics Indonesia by advantages and disadvantages. In this case, researcher chooses web scraped price data collection to create daily CPI because it is lower cost than the crowd sourced mobile application. Web scraped price data collection can be an alternative way to create daily CPI in Statistics Indonesia. The flow to create daily CPI is as following: identifying, scraping, parsing, saving, calculating, and visualization.',
            'created_at' => now(),
            'updated_at' => now()
            ]
        ]);
    }
}
