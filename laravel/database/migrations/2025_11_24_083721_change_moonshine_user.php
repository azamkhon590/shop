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
        Schema::table('moonshine_users', function (Blueprint $table) {
            $table->string("full_name")->nullable();
            $table->string("job_title")->nullable();
            $table->date("work_start")->nullable();
            $table->enum("status", ["work", "holiday"])->default("work");
            $table->json("work_days")->nullable();
            $table->foreignIdFor(App\Models\Shop::class)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropColumn("moonshine_users", ["full_name", "job_title", "work_start","status","work_days"]);
    }
};
