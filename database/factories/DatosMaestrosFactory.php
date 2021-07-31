<?php

namespace Database\Factories;

use App\Models\ModelDatosMaestros;
use Illuminate\Database\Eloquent\Factories\Factory;

class DatosMaestrosFactory extends Factory
{

    protected $model = ModelDatosMaestros::class;

    public function definition()
    {
        return [
            'codigo' =>  'PT-741AZ',
            'referencia' => 'POLISER P-741 AZUL RAL5004',

        ];
    }
}
