<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateNovasuinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datosmaestros', function (Blueprint $table) {
            $table->id();
            $table->string('codigo',25)->index();
            $table->string('referencia',150);
            $table->string('grupo',5)->nullable();
            $table->string('clase',100)->nullable();
            $table->text('comentario')->nullable();
            $table->integer('userId')->nullable();
            $table->timestamps();
            //$table->foreign('userId')->references('id')->on('users');
        });
        DB::unprepared("
        INSERT INTO `datosmaestros` (`userId`,`codigo`, `referencia`, `grupo`,`clase`, `created_at`, `updated_at`) VALUES
        (1, 'PT-741AZ', 'POLISER P-741 AZUL RAL5004', 'PT','Gelcoat', NULL, NULL),
        (1, 'MP-710AZF', 'P710 AZUL FTALO', 'MP',NULL, NULL, NULL),
        (1, 'MP-BLANCOAND', 'BLANCO 20438', 'MP',NULL, NULL, NULL),
        (1, 'MP-NEGROAND', 'NEGRO 20439', 'MP', NULL, NULL, NULL),
        (1, 'MP-GARAMITE', 'GARAMITE', 'MP', NULL, NULL, NULL),
        (1, 'MP-BYK9076', 'BYK 9076', 'MP', NULL, NULL, NULL);

        ");
        Schema::create('especificaciones', function (Blueprint $table) {
            $table->id();
            $table->string('idCodigo',25)->index();
            $table->string('especificacion',25);
            $table->string('valor',25);
            $table->string('metodo',25);
            $table->integer('userId')->nullable();
            $table->timestamps();
            $table->foreign('idCodigo')->references('codigo')->on('datosmaestros');
        });
        DB::unprepared("
        INSERT INTO `especificaciones` (`id`, `idCodigo`, `especificacion`, `valor`, `metodo`, `created_at`, `updated_at`) VALUES
        (1, 'PT-741AZ', 'Viscocidad Bookfield', '1200 - 1600', 'IQ-010', NULL, NULL),
        (2, 'PT-741AZ', 'Tiempo de Gel', '7 - 9', 'IQ-012', NULL, NULL),
        (3, 'PT-741AZ', 'Exotermia', '150 -190', 'IQ-012', NULL, NULL),
        (4, 'PT-741AZ', 'Tixotropia', '5,0  - 6,0', 'IQ-011', NULL, NULL),
        (5, 'PT-741AZ', 'Color', 'AZUL', 'N/A', NULL, NULL),
        (6, 'PT-741AZ', '% Sodio', '58 -68', 'IQ-013', NULL, NULL);
        ");
        Schema::create('listamateriales', function (Blueprint $table) {
            $table->id();
            $table->string('idCodigo',25)->index();
            $table->string('codigo',25)->index();
            $table->string('referencia',150);
            $table->float('formula', 5, 3)->defaul(0)->nullable();
            $table->integer('userId')->nullable();
            $table->timestamps();
            $table->foreign('idCodigo')->references('codigo')->on('datosmaestros');
        });

        DB::unprepared("

        INSERT INTO `listamateriales` ( `idCodigo`, `codigo`, `referencia`, `formula`, `created_at`, `updated_at`) VALUES
        ('PT-741AZ', 'MP-SALDONOVA', 'RESINA SALDO NOVA (P-741 TTE)', 0.944, NULL, NULL),
        ('PT-741AZ', 'MP-710AZF', 'P710 AZUL FTALO', 0.016, NULL, NULL),
        ('PT-741AZ', 'MP-BLANCOAND', 'BLANCO 20438', 0.001, NULL, NULL),
        ('PT-741AZ', 'MP-NEGROAND', 'NEGRO 20439', 0.032, NULL, NULL),
        ('PT-741AZ', 'MP-GARAMITE', 'GARAMITE', 0.004, NULL, NULL),
        ('PT-741AZ', 'MP-BYK9076', 'BYK 9076', 0.002, NULL, NULL);
        ");
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo',50)->index();
            $table->string('equipo',25)->nullable();
            $table->integer('userId')->nullable();
            $table->timestamps();
            //$table->foreign('idCodigo')->references('codigo')->on('datosmaestros');
        });
        DB::unprepared("
        INSERT INTO `equipos` ( `codigo`, `equipo`) VALUES
        ('MZ1', 'MEZCLADOR 1'),
        ('MZ2', 'MEZCLADOR 2'),
        ('MZ3', 'MEZCLADOR 3');
        ");
        Schema::create('ordenproduccion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo',25)->index();
            $table->string('referencia',150);
            $table->string('equipo',25)->nullable();
            $table->float('cantidad', 10, 3)->defaul(0)->nullable();
            $table->string('lote',25)->nullable();
            $table->string('status',25)->nullable()->default('Abierta');
            $table->integer('userId')->nullable();
            $table->timestamps();

        });
        Schema::create('ordenproduccionD', function (Blueprint $table) {
            $table->id();
            $table->integer('OP_id')->unsigned()->nullable();
            $table->string('codigo',25)->nullable();
            $table->string('materiaPrima',150)->nullable();
            $table->float('KGFormula', 8, 3)->defaul(0)->nullable();
            $table->float('KGCarga', 8, 3)->defaul(0)->nullable();
            $table->string('lote',25)->nullable()->nullable();
            $table->string('operador',25)->nullable();
            $table->integer('userId')->nullable();
            $table->timestamps();
          //$table->foreign('OP_id')->references('id')->on('ordenproduccion')->onDelete('cascade');
        });

    }








    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datosmaestros');
        Schema::dropIfExists('especificaciones');
        Schema::dropIfExists('listamateriales');
        Schema::dropIfExists('equipos');
        Schema::dropIfExists('ordenproduccion');
        Schema::dropIfExists('ordenproduccionD');

    }
}
