<?php

namespace App\Models;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(teachers::class);
        });
    }

    public function down()
    {
        Schema::dropIfExists('votes');
    }
};
