<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ship', function (Blueprint $table) {
            $table->id(); // 主鍵，自動遞增 bigInt
            $table->string("shipName", 10); // 配送方式，varchar(10)
            $table->char("active", 1); // 使用中，char(1)
            // $table->char("active", 1)->default("Y"); // 預設值 Y
            // $table->timestamps(); // created_at, updated_at
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ships');
    }
};
