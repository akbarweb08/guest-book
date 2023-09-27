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
        Schema::create('visitors', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 255);
            $table->string('company', 255);
            $table->string('office',255)->nullable();
            $table->enum('status',['waiting','accepted','rejected'])->default('waiting');
            $table->string('phone_number', 30)->nullable();
            $table->boolean('is_given_card')->nullable()->default(null);
            $table->string('identity_number',255);
            $table->string('purpose', 255);
            $table->timestampTz('out_at')->nullable();
            $table->string('signature')->nullable();
            $table->string('detained_items')->nullable();
            $table->string('approved_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
