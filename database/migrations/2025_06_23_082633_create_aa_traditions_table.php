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
        Schema::create('aa_traditions', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Judul tradisi');
            $table->string('slug')->unique()->comment('Slug untuk URL');
            $table->text('synopsis')->nullable()->comment('Deskripsi atau sinopsis tradisi');
            $table->string('cover_image')->nullable()->comment('Nama file gambar sampul');
            $table->integer('year')->nullable()->comment('Tahun tradisi');
            $table->string('creator')->nullable()->comment('Pembuat atau pencipta tradisi');

            $table->unsignedBigInteger('category_id')->comment('Relasi ke kategori');
            $table->foreign('category_id')->references('id')->on('aa_categories')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aa_traditions');
    }
};
