<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosCotizacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_cotizacion', function (Blueprint $table) {
            $table->id();
            $table->string('producto');
            $table->string('cantidad');
            $table->string('precio');
            $table->string('total_neto');
            $table->string('entrega');
            $table->string('id_cotizacion');
            $table->string('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos_cotizacion');
    }
}
