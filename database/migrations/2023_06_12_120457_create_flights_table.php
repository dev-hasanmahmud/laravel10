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
        Schema::create('flights', function (Blueprint $table) {

            /***
             * Generating Migrations Command- php artisan make:migration create_flights_table
             * Running Migrations Command- php artisan migrate, php artisan migrate:status
             * Rolling Back Migrations Command- php artisan migrate:rollback
             */
            // The id method is an alias of the bigIncrements method. By default, the method will create an id column; however, you may pass a column name if you would like to assign a different name to the column
            $table->id();
            // The string method creates a VARCHAR equivalent column of the given length
            $table->string('name');
            // The bigIncrements method creates an auto-incrementing UNSIGNED BIGINT (primary key) equivalent column
            $table->bigInteger('votes');
            // The binary method creates a BLOB equivalent column
            $table->binary('photo');
            // The boolean method creates a BOOLEAN equivalent column
            $table->boolean('confirmed');
            // The char method creates a CHAR equivalent column with of a given length
            $table->char('username', 100);
            // The dateTimeTz method creates a DATETIME (with timezone) equivalent column with an optional precision (total digits)
            $table->dateTimeTz('created_dateTimeTz', $precision = 0);
            // The dateTime method creates a DATETIME equivalent column with an optional precision (total digits)
            $table->dateTime('created_dateTime', $precision = 0);
            // The date method creates a DATE equivalent column
            $table->date('created_date');
            // The decimal method creates a DECIMAL equivalent column with the given precision (total digits) and scale (decimal digits)
            $table->decimal('amount', $precision = 8, $scale = 2);
            // The double method creates a DOUBLE equivalent column with the given precision (total digits) and scale (decimal digits)
            $table->double('amount3', 8, 2);
            // The enum method creates a ENUM equivalent column with the given valid values
            $table->enum('difficulty', ['easy', 'hard']);
            // The float method creates a FLOAT equivalent column with the given precision (total digits) and scale (decimal digits)
            $table->float('amount2', 8, 2);
            // The json method creates a JSON equivalent column
            $table->json('options');
            // The longText method creates a LONGTEXT equivalent column
            $table->longText('description');
            // The text method creates a TEXT equivalent column
            $table->text('description2');
            // The unsignedInteger method creates an UNSIGNED INTEGER equivalent column
            $table->unsignedInteger('votes2');
            // The timestamp method creates a TIMESTAMP equivalent column with an optional precision (total digits)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
