<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('equipments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->restrictOnDelete();
            $table->string('asset_code', 40)->unique();
            $table->string('name', 150);
            $table->string('brand', 100)->nullable();
            $table->text('specifications');
            $table->enum('condition', ['baik', 'perlu_perbaikan', 'rusak'])->default('baik');
            $table->enum('status', ['tersedia', 'dipinjam', 'dalam_perbaikan'])->default('tersedia');
            $table->decimal('daily_rental_fee', 12, 2)->default(0);
            $table->string('image_path', 255)->nullable();
            $table->timestamps();
            $table->index(['category_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('equipments');
    }
};
