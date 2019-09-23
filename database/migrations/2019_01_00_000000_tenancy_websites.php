<?php

/*
 * This file is part of the hyn/multi-tenant package.
 *
 * (c) Daniël Klabbers <daniel@klabbers.email>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://tenancy.dev
 * @see https://github.com/hyn/multi-tenant
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Hyn\Tenancy\Abstracts\AbstractMigration;

class TenancyWebsites extends AbstractMigration
{
    protected $system = true;

    public function up()
    {
        if (! Schema::hasTable('websites')) {
            Schema::create('websites', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('uuid');
                $table->string('name')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('websites');
    }
}
