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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            //ایدی کاربر
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade' );
            // ایدی دسته بندی
//            $table->integer('category_id')->unsigned();
//            $table->foreign('category_id')->references('id')->on('categories');
//            // آیدی فیلد موقعیت
//            $table->integer('mahale')->unsigned()->nullable()->default(null);
//            $table->foreign('mahale')->references('id')->on('fieldchilds');
//            // متن
//            $table->string('mahalekharid')->nullable()->default('[]');
//            $table->string('address', 50)->nullable();
//            // آیدی فیلد اطلاعات
//            $table->integer('sanad')->unsigned()->nullable()->default(null);
//            $table->foreign('sanad')->references('id')->on('fieldchilds');
//            $table->integer('jahat')->unsigned()->nullable()->default(null);
//            $table->foreign('jahat')->references('id')->on('fieldchilds');
//            $table->integer('senbana')->unsigned()->nullable()->default(null);
//            $table->foreign('senbana')->references('id')->on('fieldchilds');
//            $table->integer('kolvahed')->unsigned()->nullable()->default(null);
//            $table->foreign('kolvahed')->references('id')->on('fieldchilds');
//            // متن
//            $table->string('vahed', 10)->nullable();
//            // آیدی فیلد اطلاعات
//            $table->integer('tabaghat')->unsigned()->nullable()->default(null);
//            $table->foreign('tabaghat')->references('id')->on('fieldchilds');
//            $table->integer('tabaghe')->unsigned()->nullable()->default(null);
//            $table->foreign('tabaghe')->references('id')->on('fieldchilds');
//            // json
//            $table->string('tabaghatbeyn')->nullable()->default('[]');
//            // مقادیر هست و نیست
//            $table->boolean('parking')->default(0);
//            $table->boolean('anbari')->default(0);
//            $table->boolean('elvator')->default(0);
//            // مقدار اعدادی
//            $table->integer('metrajzamin')->nullable()->default(0);
//            $table->integer('metrajmaskoni')->nullable()->default(0);
//            $table->integer('metrajtejari')->nullable()->default(0);
//            $table->integer('metrajmohavate')->nullable()->default(0);
//            // json
//            $table->string('metrajmohavatebeyn')->nullable()->default('[]');
//            $table->string('metrajbanabeyn')->nullable()->default('[]');
//            $table->string('metrajbeyn')->nullable()->default('[]');
//            // مقدار اعدادی
//            $table->integer('metrajhashiye')->nullable()->default(0);
//            $table->integer('metraj')->nullable()->default(0);
//            $table->integer('metrajbana')->nullable()->default(0);
//            $table->integer('metrajbalkon')->nullable()->default(0);
//            $table->integer('metrajhayat')->nullable()->default(0);
//            // آیدی فیلد اطلاعات
//            $table->integer('otagh')->unsigned()->nullable()->default(null);
//            $table->foreign('otagh')->references('id')->on('fieldchilds');
//            // مقادیر هست و نیست
//            $table->boolean('ashpazkhane')->default(0);
//            // فیلد امتیازات
//            $table->string('emtiazat')->nullable()->default('[]');
//            $table->string('emtiazatbagh')->nullable()->default('[]');
//            // متن
//            $table->string('abouteemtiazat', 100)->nullable();
//            // آیدی فیلد بدنه
//            $table->integer('nama')->unsigned()->nullable()->default(null);
//            $table->foreign('nama')->references('id')->on('fieldchilds');
//            $table->integer('darb')->unsigned()->nullable()->default(null);
//            $table->foreign('darb')->references('id')->on('fieldchilds');
//            $table->integer('kafposh')->unsigned()->nullable()->default(null);
//            $table->foreign('kafposh')->references('id')->on('fieldchilds');
//            $table->integer('divar')->unsigned()->nullable()->default(null);
//            $table->foreign('divar')->references('id')->on('fieldchilds');
//            $table->integer('divarsanati')->unsigned()->nullable()->default(null);
//            $table->foreign('divarsanati')->references('id')->on('fieldchilds');
//            $table->integer('saghf')->unsigned()->nullable()->default(null);
//            $table->foreign('saghf')->references('id')->on('fieldchilds');
//            $table->integer('loster')->unsigned()->nullable()->default(null);
//            $table->foreign('loster')->references('id')->on('fieldchilds');
//            // آیدی فیلد بهداشتی
//            $table->integer('hammam')->unsigned()->nullable()->default(null);
//            $table->foreign('hammam')->references('id')->on('fieldchilds');
//            $table->integer('tovalet')->unsigned()->nullable()->default(null);
//            $table->foreign('tovalet')->references('id')->on('fieldchilds');
//            $table->integer('dastshor')->unsigned()->nullable()->default(null);
//            $table->foreign('dastshor')->references('id')->on('fieldchilds');
//            // آیدی فیلد آپشن
//            $table->integer('zarfiyattedad')->unsigned()->nullable()->default(null);
//            $table->foreign('zarfiyattedad')->references('id')->on('fieldchilds');
//            // مقدار اعدادی
//            $table->integer('zarfiyat')->nullable()->default(0);
//            // آیدی فیلد آپشن
//            $table->integer('zarfiyatmazad')->unsigned()->nullable()->default(null);
//            $table->foreign('zarfiyatmazad')->references('id')->on('fieldchilds');
//            // آیدی فیلد امکانات
//            $table->integer('abgarm')->unsigned()->nullable()->default(null);
//            $table->foreign('abgarm')->references('id')->on('fieldchilds');
//            $table->integer('garmayesh')->unsigned()->nullable()->default(null);
//            $table->foreign('garmayesh')->references('id')->on('fieldchilds');
//            // json
//            $table->string('sarmayesh')->nullable()->default('[]');
//            // id field
//            $table->integer('estakhr')->unsigned()->nullable()->default(null);
//            $table->foreign('estakhr')->references('id')->on('fieldchilds');
//            // مقادیر هست و نیست
//            $table->boolean('sonajacozi')->default(0);
//            $table->boolean('alachigh')->default(0);
//            $table->boolean('gasromizi')->default(0);
//            $table->boolean('takht')->default(0);
//            $table->boolean('moble')->default(0);
//            $table->boolean('tv')->default(0);
//            $table->boolean('yakhchal')->default(0);
//            $table->boolean('pokhtopaz')->default(0);
//            // مقدار اعدادی
//            $table->bigInteger('priceadi')->nullable()->default(0);
//            $table->bigInteger('priceendhafte')->nullable()->default(0);
//            $table->bigInteger('pricetatilat')->nullable()->default(0);
//            $table->bigInteger('pricenafar')->nullable()->default(0);
//            $table->bigInteger('price')->nullable()->default(0);
//            $table->bigInteger('pricerahnaz')->nullable()->default(0);
//            $table->bigInteger('priceejareaz')->nullable()->default(0);
//            $table->bigInteger('pricerahnta')->nullable()->default(0);
//            $table->bigInteger('priceejareta')->nullable()->default(0);
//            $table->bigInteger('priceasl')->nullable()->default(0);
//            $table->bigInteger('pricebarahn')->nullable()->default(0);
//            // json
//            $table->string('priceejarebeyn')->nullable()->default('[]');
//            // تقویم
//            $table->integer('takhleyeday')->nullable();
//            $table->integer('takhleyemonth')->nullable();
//            // آیدی فیلد امکانات
//            $table->integer('van')->unsigned()->nullable()->default(null);
//            $table->foreign('van')->references('id')->on('fieldchilds');
//            $table->integer('komoddivari')->unsigned()->nullable()->default(null);
//            $table->foreign('komoddivari')->references('id')->on('fieldchilds');
//            $table->integer('kabinet')->unsigned()->nullable()->default(null);
//            $table->foreign('kabinet')->references('id')->on('fieldchilds');
//            // متن
//            $table->string('shoghl', 30)->nullable();
//            $table->string('aboute')->nullable();
//            $table->string('image')->nullable();
//            $table->string('imagemulti')->nullable()->default('[]');
//            $table->string('video')->nullable();
//            // آیدی فیلد معاوضه
//            $table->integer('sabeghe')->unsigned()->nullable()->default(null);
//            $table->foreign('sabeghe')->references('id')->on('fieldchilds');
//            // json
//            $table->string('sabegheaz')->nullable()->default('[]');
//            // مقادیر هست و نیست
//            $table->boolean('mojavez')->default(0);
//            $table->boolean('shekar')->default(0);
//            // مقدار اعدادی
//            $table->bigInteger('amval')->nullable()->default(0);
//            $table->bigInteger('ajnas')->nullable()->default(0);
//            $table->bigInteger('pricemoaveze')->nullable()->default(0);
//            $table->integer('like')->nullable()->default(0);
//            // آیدی فیلد معاوضه
//            $table->integer('moavezeba')->unsigned()->nullable()->default(null);
//            $table->foreign('moavezeba')->references('id')->on('fieldchilds');
//            // json
//            $table->string('mahalemoaveze')->nullable()->default('[]');
//            // انتخابی
//            $table->enum('status', ['PUBLISHED', 'DRAFT', 'PENDING'])->default('DRAFT');
            // زمان ها
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
