<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('custom_domain')->nullable()->unique()->after('code');
            $table->boolean('custom_domain_enabled')->default(0)->after('custom_domain');
            $table->boolean('custom_domain_verified')->default(0)->after('custom_domain_enabled');
            $table->string('domain_verification_token')->nullable()->after('custom_domain_verified');
            $table->timestamp('domain_verified_at')->nullable()->after('domain_verification_token');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'custom_domain',
                'custom_domain_enabled',
                'custom_domain_verified',
                'domain_verification_token',
                'domain_verified_at'
            ]);
        });
    }
};
