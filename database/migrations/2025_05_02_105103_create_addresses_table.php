<?php

// database/migrations/xxxx_xx_xx_create_addresses_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // giriş yapan kullanıcı
            $table->enum('type', ['receiver', 'sender']); // adres tipi
            $table->string('name');      // kişi/firma adı
            $table->string('phone');     // telefon
            $table->string('city');
            $table->string('district');
            $table->string('address');
            $table->timestamps();

            // foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
