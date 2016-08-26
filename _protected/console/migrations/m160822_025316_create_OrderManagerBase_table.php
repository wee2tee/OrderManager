<?php

use yii\db\Migration;

/**
 * Handles the creation for table `ordermanagerbase`.
 */
class m160822_025316_create_OrderManagerBase_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $tableOptions = null;
        
        if($this->db->driverName === 'mysql'){
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=innoDB';
        }
        
        // ## CREATE TABLE ISTAB ##
        $this->createTable('istab', [
            'id' => $this->primaryKey(),
            'tabtyp' => $this->string(8)->notNull(),
            'typcod' => $this->string(8)->notNull(),
            'abbreviate_th' => $this->string(20),
            'abbreviate_en' => $this->string(20),
            'typdes_th' => $this->string(50),
            'typdes_en' => $this->string(20),
            'rate' => $this->decimal(18, 4),
            'creby' => $this->integer()->notNull(),
            'credate' => $this->dateTime()->notNull(),
            'chgby' => $this->integer(),
            'chgdate' => $this->dateTime()
        ]);
        
        // create an index
        $this->createIndex('ndx-istab_typcod', 'istab', 'typcod');
        $this->createIndex('ndx-istab_tabtyp_typcod', 'istab', ['tabtyp', 'typcod'], TRUE);
        
        // add foreignkey
        $this->addForeignKey('fk-istab_creby-user_id', 'istab', 'creby', 'user', 'id', 'CASCADE');
        $this->addForeignKey('fk-istab_chgby-user_id', 'istab', 'chgby', 'user', 'id', 'CASCADE');
        //------------------------------------------
        
        // ## CREATE TABLE STMAS ##
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
            'isupgrade' => $this->boolean()->notNull(),
            'creby' => $this->integer()->notNull(),
            'credate' => $this->dateTime()->notNull(),
            'chgby' => $this->integer(),
            'chgdate' => $this->dateTime(),
            'status' => $this->string(1)->notNull()
        ], $tableOptions);
        
        // create an index
        $this->createIndex('ndx-stmas_stkcod', 'stmas', 'stkcod', true);
        $this->createIndex('ndx-stmas_barcod', 'stmas', 'barcod', true);
        
        // add foreignkey
        $this->addForeignKey('fk-stmas_creby-user_id', 'stmas', 'creby', 'user', 'id', 'CASCADE');
        $this->addForeignKey('fk-stmas_stkgrp-istab_id', 'stmas', 'stkgrp', 'istab', 'id', 'CASCADE');
        //------------------------------------------
        
        // ## CREATE TABLE STPRI ##
        $this->createTable('stpri', [
            'id' => $this->primaryKey(),
            'pricecode' => $this->string(20)->notNull(),
            'description' => $this->string(50),
            'tabpr' => $this->integer()->notNull(),
            'disc1' => $this->decimal(18, 4),
            'discperc1' => $this->boolean(),
            'disc2' => $this->decimal(18, 4),
            'discperc2' => $this->boolean(),
            'creby' => $this->integer()->notNull(),
            'credate' => $this->dateTime()->notNull(),
            'chgby' => $this->integer(),
            'chgdate' => $this->dateTime()
        ], $tableOptions);
        
        // create an index
        $this->createIndex('ndx-stpri_pricecode', 'stpri', 'pricecode', true);
        
        // add foreignkey
        $this->addForeignKey('fk-stpri_creby-user_id', 'stpri', 'creby', 'user', 'id', 'CASCADE');
        $this->addForeignKey('fk-stpri_chgby-user_id', 'stpri', 'chgby', 'user', 'id', 'CASCADE');
        //------------------------------------------
        
        // ## CREATE TABLE DLVPROFILE ##
        $this->createTable('dlvprofile', [
            'id' => $this->primaryKey(),
            'profileid' => $this->integer()->notNull(),
            'dlvid' => $this->integer()->notNull()
        ], $tableOptions);
        
        // create an index
        $this->createIndex('ndx-dlvprofile_profileid', 'dlvprofile', 'profileid');
        
        // add foreignkey
        $this->addForeignKey('fk-dlvprofile_profileid-istab_id', 'dlvprofile', 'profileid', 'istab', 'id', 'CASCADE');
        $this->addForeignKey('fk-dlvprofile_dlvid-istab_id', 'dlvprofile', 'dlvid', 'istab', 'id', 'CASCADE');
        //------------------------------------------
        
        // ## CREATE TABLE CART ##
        $this->createTable('cart', [
            'id' => $this->primaryKey(),
            'stmasid' => $this->integer()->notNull(),
            'qty' => $this->decimal(18, 4)->notNull(),
            'creby' => $this->integer()->notNull(),
            'credate' => $this->dateTime()->notNull(),
            'slipfilename' => $this->string(200)->notNull(),
            'taxfilename' => $this->string(200)->notNull()
        ], $tableOptions);
        
        // create an index
        $this->createIndex('ndx-cart_creby', 'cart', 'creby');
        
        // add foreignkey
        $this->addForeignKey('fk-cart_stmasid-stmas_id', 'cart', 'stmasid', 'stmas', 'id', 'CASCADE');
        $this->addForeignKey('fk-cart_creby-user_id', 'cart', 'creby', 'user', 'id', 'CASCADE');
        //------------------------------------------
        
        // ## CREATE TABLE ORDER (mix popr with poprit) ##
        $this->createTable('order', [
            'id' => $this->primaryKey(),
            'ordernum' => $this->string(20)->notNull(),
            'orderdate' => $this->dateTime()->notNull(),
            'sonum' => $this->string(20),
            'sodate' => $this->date(),
            'sorecby' => $this->integer(),
            'sorecdate' => $this->dateTime(),
            'ivnum' => $this->string(20),
            'ivdate' => $this->date(),
            'ivrecby' => $this->integer(),
            'ivrecdate' => $this->date(),
            'remark' => $this->string(100),
            'isupgrade' => $this->boolean()->notNull(),
            'refsn' => $this->string(20),
            'stmasid' => $this->integer()->notNull(),
            'stkdes' => $this->string(50)->notNull(),
            'ordqty' => $this->decimal(18, 4)->notNull(),
            'tqucod' => $this->integer()->notNull(),
            'unitpr' => $this->decimal(18, 4)->notNull(),
            'disc' => $this->string(20),
            'discamt' => $this->decimal(18, 4)->notNull(),
            'amount' => $this->decimal(18, 4)->notNull(),
            'vatcod' => $this->string(1)->notNull(),
            'vatamt' => $this->decimal(18, 4)->notNull(),
            'taxamt' => $this->decimal(18, 4)->notNull(),
            'netamt' => $this->decimal(18, 4)->notNull(),
            'creby' => $this->integer()->notNull(),
            'credate' => $this->dateTime()->notNull(),
            'chgby' => $this->integer(),
            'chgdate' => $this->dateTime(),
            'custprename' => $this->string(30),
            'custname' => $this->string(100)->notNull(),
            'custaddr01' => $this->string(50)->notNull(),
            'custaddr02' => $this->string(50),
            'custaddr03' => $this->string(30),
            'custzipcod' => $this->string(5),
            'custtelnum' => $this->string(40),
            'custfaxnum' => $this->string(40),
            'custtaxid' => $this->string(20),
            'dlvby' => $this->integer()->notNull(),
            'dlvdate1' => $this->date(),
            'dlvdate2' => $this->date(),
            'slipfilename' => $this->string(200),
            'taxfilename' => $this->string(200),
            'status' => $this->string(20)
        ], $tableOptions);
        
        // create an index
        $this->createIndex('ndx-order_ordernum', 'order', 'ordernum', TRUE);
        $this->createIndex('ndx-order_creby', 'order', 'creby');
        $this->createIndex('ndx-order_chgby', 'order', 'chgby');
        $this->createIndex('ndx-order_sorecby', 'order', 'sorecby');
        $this->createIndex('ndx-order_ivrecby', 'order', 'ivrecby');
        $this->createIndex('ndx-order_stmasid', 'order', 'stmasid');
        $this->createIndex('ndx-order_status', 'order', 'status');
        
        // add foreignkey
        $this->addForeignKey('fk-order_stmasid-stmas_id', 'order', 'stmasid', 'stmas', 'id', 'CASCADE');
        $this->addForeignKey('fk-order_tqucod-istab_id', 'order', 'tqucod', 'istab', 'id', 'CASCADE');
        $this->addForeignKey('fk-order_dlvby-istab_id', 'order', 'dlvby', 'istab', 'id', 'CASCADE');
        $this->addForeignKey('fk-order_creby-user_id', 'order', 'creby', 'user', 'id', 'CASCADE');
        $this->addForeignKey('fk-order_chgby-user_id', 'order', 'chgby', 'user', 'id', 'CASCADE');
        $this->addForeignKey('fk-order_sorecby-user_id', 'order', 'sorecby', 'user', 'id', 'CASCADE');
        $this->addForeignKey('fk-order_ivrecby-user_id', 'order', 'ivrecby', 'user', 'id', 'CASCADE');
        
        
        // ## CREATE TABLE OESO ##
        
        // ## CREATE TABLE OESOIT ##
        
        // ## CREATE TABLE ARTRN ##
        
        // ## CREATE TABLE STCRD ##
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        // ## DOWN TABLE STCRD ##
        
        // ## DOWN TABLE ARTRN ##
        
        // ## DOWN TABLE OESOIT ##
        
        // ## DOWN TABLE OESO ##
        
        // ## DOWN TABLE ORDER ##
        $this->dropForeignKey('fk-order_stmasid-stmas_id', 'order');
        $this->dropForeignKey('fk-order_tqucod-istab_id', 'order');
        $this->dropForeignKey('fk-order_dlvby-istab_id', 'order');
        $this->dropForeignKey('fk-order_creby-user_id', 'order');
        $this->dropForeignKey('fk-order_chgby-user_id', 'order');
        $this->dropForeignKey('fk-order_sorecby-user_id', 'order');
        $this->dropForeignKey('fk-order_ivrecby-user_id', 'order');
        $this->dropIndex('ndx-order_ordernum', 'order');
        $this->dropIndex('ndx-order_creby', 'order');
        $this->dropIndex('ndx-order_chgby', 'order');
        $this->dropIndex('ndx-order_sorecby', 'order');
        $this->dropIndex('ndx-order_ivrecby', 'order');
        $this->dropIndex('ndx-order_stmasid', 'order');
        $this->dropIndex('ndx-order_status', 'order');
        $this->dropTable('order');

        // ## DOWN TABLE CART ##
        $this->dropForeignKey('fk-cart_creby-user_id', 'cart');
        $this->dropForeignKey('fk-cart_stmasid-stmas_id', 'cart');
        $this->dropTable('cart');
        
        // ## DOWN TABLE DLVPROFILE ##
        $this->dropForeignKey('fk-dlvprofile_dlvid-istab_id', 'dlvprofile');
        $this->dropForeignKey('fk-dlvprofile_profileid-istab_id', 'dlvprofile');
        $this->dropIndex('ndx-dlvprofile_profileid', 'dlvprofile');
        $this->dropTable('dlvprofile');
        
        // ## DOWN TABLE STPRI ##
        $this->dropForeignKey('fk-stpri_chgby-user_id', 'stpri');
        $this->dropForeignKey('fk-stpri_creby-user_id', 'stpri');
        $this->dropIndex('ndx-stpri_pricecode', 'stpri');
        $this->dropTable('stpri');
        
        // ## DOWN TABLE STMAS ##
        $this->dropForeignKey('fk-stmas_stkgrp-istab_id', 'stmas');
        $this->dropForeignKey('fk-stmas_creby-user_id', 'stmas');
        $this->dropIndex('ndx-stmas_barcod', 'stmas');
        $this->dropIndex('ndx-stmas_stkcod', 'stmas');
        $this->dropTable('stmas');
        
        // ## DOWN TABLE ISTAB ##
        $this->dropForeignKey('fk-istab_chgby-user_id', 'istab');
        $this->dropForeignKey('fk-istab_creby-user_id', 'istab');
        $this->dropIndex('ndx-istab_typcod', 'istab');
        $this->dropTable('istab');
    }
}
