<?php

use yii\db\Migration;

/**
 * Handles the creation for table `stmas`.
 */
class m160820_033605_create_Stmas_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        
        if($this->db->driverName === 'mysql'){
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=innoDB';
        }
        
        // create table
        $this->createTable('stmas', [
            'id' => $this->primaryKey(),
            'stkcod' => $this->string(20)->notNull(),
            'stkdes' => $this->string(50),
            'stkdes2' => $this->string(50),
            'barcod' => $this->string(40),
            'product_img' => $this->string(50),
            'stktyp' => $this->string(1),
            'stkgrp' => $this->integer()->notNull(),
            'qucod' => $this->integer()->notNull(),
            'cqucod' => $this->integer()->notNull(),
            'squcod' => $this->integer()->notNull(),
            'pqucod' => $this->integer()->notNull(),
            'cfactor' => $this->decimal(18, 4)->notNull(),
            'sfactor' => $this->decimal(18, 4)->notNull(),
            'pfactor' => $this->decimal(18, 4)->notNull(),
            'remark' => $this->string(50),
            'sellpr1' => $this->decimal(18, 4),
            'sellpr2' => $this->decimal(18, 4),
            'sellpr3' => $this->decimal(18, 4),
            'sellpr4' => $this->decimal(18, 4),
            'sellpr5' => $this->decimal(15, 4),
            'vatcod' => $this->string(1),
            'creby' => $this->integer()->notNull(),
            'credate' => $this->dateTime()->notNull(),
            'chgby' => $this->integer(),
            'chgdate' => $this->dateTime(),
            'status' => $this->string(1)->notNull()
        ], $tableOptions);
        
        // create an index
        $this->createIndex(
            'ndx-stmas-stkcod',
            'stmas',
            'stkcod'
        );
        $this->createIndex(
            'ndx-stmas-barcod',
            'stmas', 
            'barcod'
        );
        
        // add foreign key for stmas.creby to user.id
        $this->addForeignKey(
            'fk-stmas_creby-user_id', 
            'stmas', 
            'creby', 
            'user', 
            'id', 
            'CASCADE'
        );
        
        // add foreign key for stmas.stkgrp to istab.id
        $this->addForeignKey(
            'fk-stmas_stkgrp-istab_id',
            'stmas', 
            'stkgrp', 
            'istab', 
            'id', 
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk-stmas_stkgrp-istab_id', 'stmas');
        $this->dropForeignKey('fk-stmas_creby-user_id', 'stmas');
        $this->dropIndex('ndx-stmas-barcod', 'stmas');
        $this->dropIndex('ndx-stmas-stkcod', 'stmas');
        
        $this->dropTable('stmas');
    }
}
