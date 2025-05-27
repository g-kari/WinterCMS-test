<?php namespace Gkari\UserManagement\Updates;

use Schema;
use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;

class CreateTables extends Migration
{
    public function up()
    {
        Schema::create('t_users', function (Blueprint $table) {
            $table->id();
            $table->string('public_user_id')->unique()->comment('公開用ユーザーID');
            $table->string('user_name')->comment('ユーザー名');
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->string('created_by')->nullable()->comment('作成者');
            $table->string('updated_by')->nullable()->comment('更新者');
            $table->string('deleted_by')->nullable()->comment('削除者');
        });

        Schema::create('l_user_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('t_user_id')->comment('ユーザーID');
            $table->string('log_type')->comment('ログタイプ');
            $table->text('log_message')->comment('ログメッセージ');
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->string('created_by')->nullable()->comment('作成者');
            $table->string('updated_by')->nullable()->comment('更新者');
            $table->string('deleted_by')->nullable()->comment('削除者');
        });

        Schema::create('m_user_roles', function (Blueprint $table) {
            $table->id();
            $table->string('role_name')->comment('ロール名');
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->string('created_by')->nullable()->comment('作成者');
            $table->string('updated_by')->nullable()->comment('更新者');
            $table->string('deleted_by')->nullable()->comment('削除者');
        });

        Schema::create('t_user_roles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('t_user_id')->comment('ユーザーID');
            $table->unsignedBigInteger('m_user_role_id')->comment('ロールID');
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->string('created_by')->nullable()->comment('作成者');
            $table->string('updated_by')->nullable()->comment('更新者');
            $table->string('deleted_by')->nullable()->comment('削除者');
        });

        Schema::create('t_user_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('t_user_id')->comment('ユーザーID');
            $table->string('setting_key')->comment('設定キー');
            $table->text('setting_value')->comment('設定値');
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->string('created_by')->nullable()->comment('作成者');
            $table->string('updated_by')->nullable()->comment('更新者');
            $table->string('deleted_by')->nullable()->comment('削除者');
        });
    }

    public function down()
    {
        Schema::dropIfExists('t_user_settings');
        Schema::dropIfExists('t_user_roles');
        Schema::dropIfExists('m_user_roles');
        Schema::dropIfExists('l_user_logs');
        Schema::dropIfExists('t_users');
    }
}