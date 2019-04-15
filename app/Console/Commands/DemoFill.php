<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Category;
use App\Product;

class DemoFill extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:fill';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed all the databases for demo usage.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Bani Supermarkt Demo Fill
        $this->line('-=-=-=-=-=-=-=-=-=-=-=-=-');
        $this->line('Bani Supermarkt Demo Fill');
        $this->line('-=-=-=-=-=-=-=-=-=-=-=-=-');

        if ($this->confirm('Wil je de voorbeeldcategorieën aanmaken?', 'yes')) {
            // Fill the category table
            $bar = $this->output->createProgressBar(18);
            $this->info('Categorieën aan het aanmaken');
            $bar->start();

            $category = Category::create(['naam' => 'Aardappels, Groente en Fruit', 'image' => 'https://static.ahold.com/image-optimization/cmgtcontent/media//001002000/000/001002086_008_Aardappelen,_groente,_fruit_(3).png']);
            $this->line('');
            $this->line($category->naam . ' aangemaakt.');
            $this->line('');
            $bar->advance();

            $category = Category::create(['naam' => 'Verse Maaltijden en Salades', 'image' => 'https://static.ahold.com/image-optimization/cmgtcontent/media//001002100/000/001002182_009_Kant-en-klaar_maaltijden,_salades_(4).png']);
            $this->line('');
            $this->line($category->naam . ' aangemaakt.');
            $this->line('');
            $bar->advance();

            $category = Category::create(['naam' => 'Vlees, Kip, Vis en Vegatarisch', 'image' => 'https://static.ahold.com/image-optimization/cmgtcontent/media//000752000/000/000752066_006_Vlees,_kip,_vis,_vega_(4).png']);
            $this->line('');
            $this->line($category->naam . ' aangemaakt.');
            $this->line('');
            $bar->advance();

            $category = Category::create(['naam' => 'Kaas, Vleeswaren en Delicatessen', 'image' => 'https://static.ahold.com/image-optimization/cmgtcontent/media//001002100/000/001002106_007_Kaas,_vleeswaren,_delicatessen_(4).png']);
            $this->line('');
            $this->line($category->naam . ' aangemaakt.');
            $this->line('');
            $bar->advance();

            $category = Category::create(['naam' => 'Zuivel en Eieren', 'image' => 'https://static.ahold.com/image-optimization/cmgtcontent/media//001002100/000/001002190_008_Zuivel,_eieren_(4).png']);
            $this->line('');
            $this->line($category->naam . ' aangemaakt.');
            $this->line('');
            $bar->advance();

            $category = Category::create(['naam' => 'Bakkerij', 'image' => 'https://static.ahold.com/image-optimization/cmgtcontent/media//001002000/000/001002098_006_Bakkerij_(4).png']);
            $this->line('');
            $this->line($category->naam . ' aangemaakt.');
            $this->line('');
            $bar->advance();

            $category = Category::create(['naam' => 'Ontbijtgranen, Broodbeleg en Tussendoor', 'image' => 'https://static.ahold.com/image-optimization/cmgtcontent/media//001002100/000/001002112_007_Ontbijtgranen,_broodbeleg,_tussendoor_(4).png']);
            $this->line('');
            $this->line($category->naam . ' aangemaakt.');
            $this->line('');
            $bar->advance();

            $category = Category::create(['naam' => 'Frisdrank, Sappen, Koffie en Thee', 'image' => 'https://static.ahold.com/image-optimization/cmgtcontent/media//001002100/000/001002102_008_Frisdrank,_sappen,_koffie,_thee_(4).png']);
            $this->line('');
            $this->line($category->naam . ' aangemaakt.');
            $this->line('');
            $bar->advance();

            $category = Category::create(['naam' => 'Wijn', 'image' => 'https://static.ahold.com/image-optimization/cmgtcontent/media//000749200/000/000749292_009_Wijn_(4).png']);
            $this->line('');
            $this->line($category->naam . ' aangemaakt.');
            $this->line('');
            $bar->advance();

            $category = Category::create(['naam' => 'Bier, Sterke Drank en Aperitieven', 'image' => 'https://static.ahold.com/image-optimization/cmgtcontent/media//001002100/000/001002188_014_Bier,_sterke_drank,_aperitieven_(4).png']);
            $this->line('');
            $this->line($category->naam . ' aangemaakt.');
            $this->line('');
            $bar->advance();

            $category = Category::create(['naam' => 'Pasta, Rijst en Internationale Keuken', 'image' => 'https://static.ahold.com/image-optimization/cmgtcontent/media//001002100/000/001002114_006_Pasta,_rijst,_internationale_keuken_(4).png']);
            $this->line('');
            $this->line($category->naam . ' aangemaakt.');
            $this->line('');
            $bar->advance();

            $category = Category::create(['naam' => 'Soepen, Conserven, Sauzen en Smaakmakers', 'image' => 'https://static.ahold.com/image-optimization/cmgtcontent/media//001002100/000/001002168_008_Soepen,_conserven,_sauzen_(4).png']);
            $this->line('');
            $this->line($category->naam . ' aangemaakt.');
            $this->line('');
            $bar->advance();

            $category = Category::create(['naam' => 'Snoep, Koek en Chips', 'image' => 'https://static.ahold.com/image-optimization/cmgtcontent/media//001002100/000/001002120_008_Snoep,_koek,_chips_(4).png']);
            $this->line('');
            $this->line($category->naam . ' aangemaakt.');
            $this->line('');
            $bar->advance();

            $category = Category::create(['naam' => 'Diepvries', 'image' => 'https://static.ahold.com/image-optimization/cmgtcontent/media//000749000/000/000749036_017_Diepvries_(4).png']);
            $this->line('');
            $this->line($category->naam . ' aangemaakt.');
            $this->line('');
            $bar->advance();

            $category = Category::create(['naam' => 'Drogisterij en Babyproducten', 'image' => 'https://static.ahold.com/image-optimization/cmgtcontent/media//001002000/000/001002094_015_Drogisterij,_baby.png']);
            $this->line('');
            $this->line($category->naam . ' aangemaakt.');
            $this->line('');
            $bar->advance();

            $category = Category::create(['naam' => 'Bewuste Voeding', 'image' => 'https://static.ahold.com/image-optimization/cmgtcontent/media//000889100/000/000889140_007_Bewuste_voeding_(4).png']);
            $this->line('');
            $this->line($category->naam . ' aangemaakt.');
            $this->line('');
            $bar->advance();

            $category = Category::create(['naam' => 'Huishouden en Huisdier', 'image' => 'https://static.ahold.com/image-optimization/cmgtcontent/media//000752100/000/000752126_009_Huishouden,_huisdier_(4).png']);
            $this->line('');
            $this->line($category->naam . ' aangemaakt.');
            $this->line('');
            $bar->advance();

            $category = Category::create(['naam' => 'Koken, Tafelen en Non-Food', 'image' => 'https://static.ahold.com/image-optimization/cmgtcontent/media//000778800/000/000778848_008_Koken,_tafelen,_non-food_(4).png']);
            $this->line('');
            $this->line($category->naam . ' aangemaakt.');
            $this->line('');
            $bar->finish();

            $this->line('');
            $this->info('Alle categorieën aangemaakt.');
        } else {
            $this->error('Geen categorieën aangemaakt.');
        }

        // Testproducten toevoegen aan categorieën

        if ($this->confirm('Wil je testproducten toevoegen?', 'yes')) {
            // Prompt voor aantal testproducten per categorie
            $aantalProducten = $this->ask('Hoeveel testproducten wil je per categorie toevoegen?');

            $categories = Category::all();
            // Testproducten aanmaken

            $bar = $this->output->createProgressBar($aantalProducten);
            $this->info('Testproducten aan het aanmaken');
            $bar->start();
            foreach ($categories as $category) {
                for ($i = 0; $i < $aantalProducten; $i++) {
                    $product = new Product();

                    $product->ean = substr(hexdec(uniqid()), 0, 13);
                    $product->naam = substr(md5(microtime()), rand(0, 26), 5);
                    $product->merk = substr(md5(microtime()), rand(0, 26), 8);
                    $product->foto = 'https://static.ah.nl/image-optimization/static/product/AHI_434d50313631353231_2_LowRes_JPG.JPG';
                    $product->prijs = rand(1, 15);
                    $product->categorie_id = $category->id;
                    $product->gewicht = rand(1, 1000);
                    $product->korteomschrijving = substr(md5(microtime()), rand(0, 26), 10);
                    $product->omschrijving = substr(md5(microtime()), rand(0, 26), 100);
                    $product->ingredienten = substr(md5(microtime()), rand(0, 26), 50);
                    $product->allergieinfo = substr(md5(microtime()), rand(0, 26), 20);
                    $product->kenmerken = 'Biologisch & Vegan';
                    $product->gebruik = substr(md5(microtime()), rand(0, 26), 20);
                    $product->bewaren = substr(md5(microtime()), rand(0, 26), 20);
                    $product->oorsprong = substr(md5(microtime()), rand(0, 26), 5);
                    $product->voorraadcode = 111;

                    $product->save();
                }
                $bar->advance();
            }
            $bar->finish();
            $this->line('');
            $this->info('Testproducten succesvol toegevoegd.');
        } else {
            $this->error('Geen testproducten toegevoegd.');
        }
    }
}
