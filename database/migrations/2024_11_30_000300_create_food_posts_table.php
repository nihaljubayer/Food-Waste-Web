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
        Schema::create('food_posts', function (Blueprint $table) {
            $table->id();

            // কোন donor post করছে
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // মূল তথ্য
            $table->string('title');                  // e.g. "Extra Biryani for 20 people"
            $table->string('category')->nullable();   // e.g. rice, bread, veg, dessert
            $table->integer('quantity')->nullable();  // e.g. 20
            $table->string('unit')->nullable();       // e.g. "plates", "packs", "kg"

            // সময় সম্পর্কিত
            $table->timestamp('cooked_at')->nullable();      // কখন রান্না হয়েছে (optional)
            $table->timestamp('expiry_time')->nullable();    // কত সময়ের মধ্যে নিলে ভালো
            $table->timestamp('pickup_time_from')->nullable();
            $table->timestamp('pickup_time_to')->nullable();

            // লোকেশন (default donor er address use করব, চাইলে আলাদা লিখতে পারবে)
            $table->string('pickup_address')->nullable();

            // বর্ণনা + ছবি
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();        // storage er path

            // AI summary future এর জন্য
            $table->text('ai_summary')->nullable();

            // স্ট্যাটাস – কোন stage এ আছে
            $table->enum('status', ['available', 'reserved', 'completed', 'cancelled'])
                  ->default('available');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_posts');
    }
};
