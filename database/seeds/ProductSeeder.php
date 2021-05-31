<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Store;

class ProductSeeder extends Seeder
{
    private $alimentos = array(
        'Arroz','Feijao','Macarrao','Oleo','Azeite','Tempero','Maionese','Farinha','Cafe','Cha','Leite'
    );

    private $alimentosCongelados = array(
        'Frango','Lasanha','Pizza','Salsicha','Petiscos','Humburguer','Linguica','Pao de queijo','Batata'
    );

    private $frios = array(
        'Mateiga','Margarina','Requijao','Leite fermentado','Queijo','Presunto','Mortadela'
    );

    private $hortifruti = array(
        'Banana, Melancia','Manga','Maca','Papaia',
        'Batata','Cenoura','Pimentao','Beterraba',
        'Couve','Alface','Couve-flor','Repolho',
        'Alho','Cebola','Salsa',
        'Polpas de frutas congeladas'
    );

    private $padaria = array(
        'Pao de forma','Pao de Cachorro Quente',
        'Pao de Humburguer','Biscoito','Massa Pronta para bolo',
        'Paes de Queijo'
    );

    private $bebidas = array(
        'Agua','Chas prontos','Yougurte','Sumo','Refresco','Vitamina','Achocolatado','Cerveja','Vinho','Vodca'
    );

    private $limpeza = array(
        'Agua sanitaria','Desinfectante','Detergente','Esponja de aco','Sabao em po','Sabao em barra',
        'Amaciante','Alvenjante','Escovinhas','Vassoura','Rodo','Pa','Pano de chao','Pano de prato','Luvas de borracha'
    );

    private $higiene = array(
        'Shampoo','Condicionador','Creme de pentear','Escova de cabelo','Pente','Desodorante',
        'Lamina de Barbear','Creme dental','Escova de dentes','Enxaguante bucal',
        'Creme hidratante para o corpo',
        'Sabonete','Papel Higienico','Absorvente'
    );
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stores = Store::all();

        foreach($stores as $s){

            $categories = Category::where('store_id', $s->id)->get();

            foreach($this->alimentos as $i){
                
                $product = new Product();
                $product->designation = $i;
                $product->price = random_int(1,1000);
                $product->category_id = $categories[0]->id;
                $product->quantity = random_int(1,50);
                $product->save();

            }

            foreach ($this->alimentosCongelados as $i) {

                $product = new Product();
                $product->designation = $i;
                $product->price = random_int(1, 1000);
                $product->category_id = $categories[1]->id;
                $product->quantity = random_int(1, 50);
                $product->save();

            }

            foreach ($this->frios as $i) {

                $product = new Product();
                $product->designation = $i;
                $product->price = random_int(1, 1000);
                $product->category_id = $categories[2]->id;
                $product->quantity = random_int(1, 50);
                $product->save();
            }

            foreach ($this->hortifruti as $i) {

                $product = new Product();
                $product->designation = $i;
                $product->price = random_int(1, 1000);
                $product->category_id = $categories[3]->id;
                $product->quantity = random_int(1, 50);
                $product->save();

            }

            foreach ($this->padaria as $i) {

                $product = new Product();
                $product->designation = $i;
                $product->price = random_int(1, 1000);
                $product->quantity = random_int(1, 50);
                $product->category_id = $categories[4]->id;
                $product->save();

            }

            foreach ($this->bebidas as $i) {

                $product = new Product();
                $product->designation = $i;
                $product->price = random_int(1, 1000);
                $product->category_id = $categories[5]->id;
                $product->quantity = random_int(1, 50);
                $product->save();

            }

            foreach ($this->limpeza as $i) {

                $product = new Product();
                $product->designation = $i;
                $product->price = random_int(1, 1000);
                $product->category_id = $categories[6]->id;
                $product->quantity = random_int(1, 50);
                $product->save();

            }

            foreach ($this->higiene as $i) {

                $product = new Product();
                $product->designation = $i;
                $product->price = random_int(1, 1000);
                $product->category_id = $categories[7]->id;
                $product->quantity = random_int(1, 50);
                $product->save();

            }
        }
   }
}
