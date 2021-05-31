<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Store;

class CategorySeeder extends Seeder
{
    private $categories = array(
        'Alimentos',
        'Alimentos congelados',
        'Frios',
        'Hortifruti',
        'Padaria',
        'Bebidas',
        'Produtos de Limpeza',
        'Higiene Pessoal',
    );

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(Category::class, 30)->create();

        $stores = Store::all();

        foreach($stores as $s){

            foreach($this->categories as $c){

                $category = new Category();
                $category->designation = $c;
                $category->store_id = $s->id;
                $category->save();

            }

        }
    }
}
