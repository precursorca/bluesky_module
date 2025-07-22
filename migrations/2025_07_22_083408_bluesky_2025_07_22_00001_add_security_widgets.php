<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class Bluesky2025072200001AddSecurityWidgets.php extends Migration
{
    public function up()
    {
        $capsule = new Capsule();
        $capsule::schema()->table($this->tableName, function (Blueprint $table) {
            $table->boolean('vnclocalonly')->nullable();
            $table->boolean('passwordauth')->nullable();

            
            $table->index('vnclocalonly');
            $table->index('passwordauth');

        });
    }
    
    public function down()
    {
        $capsule = new Capsule();
        $capsule::schema()->table($this->tableName, function (Blueprint $table) {
            $table->dropColumn('vnclocalonly');
            $table->dropColumn('passwordauth');
        });
    }
}
