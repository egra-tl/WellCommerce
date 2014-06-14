<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 *
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */
namespace WellCommerce\Core\Migration;

use WellCommerce\Core\Migration;

/**
 * Migration1402758545
 *
 * This class has been auto-generated
 * by the WellCommerce Console migrate:add command
 */
class Migration1402758545 extends AbstractMigration implements MigrationInterface
{
    public function up()
    {
        if (!$this->getDb()->schema()->hasTable('category_shop')) {
            $this->getDb()->schema()->create('category_shop', function ($table) {
                $table->increments('id');
                $table->integer('category_id')->unsigned();
                $table->integer('shop_id')->unsigned();
                $table->timestamps();
                $table->foreign('category_id')->references('id')->on('category')->onDelete('CASCADE')->onUpdate('NO ACTION');
                $table->foreign('shop_id')->references('id')->on('shop')->onDelete('CASCADE')->onUpdate('NO ACTION');
                $table->unique(['category_id', 'shop_id']);
            });
        }
    }

    public function down()
    {

    }
}