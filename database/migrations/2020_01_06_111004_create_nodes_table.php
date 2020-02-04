<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('hier',['กฟจ.','กฟอ.','กฟส.อ.','กฟย.อ.','กฟย.ต.','กฟย.บ.','สถานีฯ ','คลังพัสดุ','PEA Shop ']);
            $table->string('name');
            $table->enum('memOf',['กฟจ.ลพบุรี','กฟอ.พัฒนานิคม','กฟอ.โคกสำโรง','กฟอ.ชัยบาดาล','กฟจ.สิงห์บุรี','กฟจ.อุทัยธานี','กฟจ.ชัยนาท','กฟจ.เพชรบูรณ์','กฟอ.หล่มสัก','กฟอ.หนองไผ่','กฟจ.นครสวรรค์','กฟอ.ลาดยาว','กฟอ.ตาคลี']);
            $table->string('abbrTH');
            $table->string('abbrEN');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nodes');
    }
}
