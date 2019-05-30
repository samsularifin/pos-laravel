<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationsToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('category_id')->unsigned()->change();
            $table->foreign('category_id')->references('id')->on('categories')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //table_field_foreign
            $table->dropForeign('producs_category_id_foreign');
        });

        Schema::table('products', function (Blueprint $table) {
            //table_field_foreign
            $table->dropIndex('producs_category_id_foreign');
        });
        Schema::table('products', function (Blueprint $table) {
            //change to integer
            $table->integer('category_id')->change();
        });
    }
}
