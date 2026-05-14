<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('sinh_viens', function (Blueprint $table) {
            $table->id();
            $table->string('ma_sv');  // Thêm dòng này
            $table->string('ho_ten'); // Thêm dòng này
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('sinh_viens');
    }
};