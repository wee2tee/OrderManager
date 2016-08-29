<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
//                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
//                    ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],
//                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
//                    [
//                        'label' => 'Same tools',
//                        'icon' => 'fa fa-share',
//                        'url' => '#',
//                        'items' => [
//                            ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
//                            ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
//                            [
//                                'label' => 'Level One',
//                                'icon' => 'fa fa-circle-o',
//                                'url' => '#',
//                                'items' => [
//                                    ['label' => 'Level Two', 'icon' => 'fa fa-circle-o', 'url' => '#',],
//                                    [
//                                        'label' => 'Level Two',
//                                        'icon' => 'fa fa-circle-o',
//                                        'url' => '#',
//                                        'items' => [
//                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
//                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
//                                        ],
//                                    ],
//                                ],
//                            ],
//                        ],
//                    ],
                    ['label' => 'รายการประจำวัน', 'icon' => 'fa fa-newspaper-o', 'url' => ['/dailytrans']],
                    ['label' => 'ตัวแทนจำหน่าย', 'icon' => 'fa fa-users', 'url' => ['/dealer']],
                    ['label' => 'รายละเอียดสินค้า', 'icon' => 'fa fa-cube', 'url' => ['/stmas']],
                    [
                        'label' => 'กำหนดค่าเริ่มต้น',
                        'icon' => 'fa fa-wrench',
                        'url' => '#',
                        'items' =>  [
                            [
                                'label' => 'ตารางข้อมูล',
                                'icon' => 'fa fa-circle',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'หน่วยนับ', 'icon' => 'fa fa-circle-o', 'url' => ['/istab/qucod']],
                                    ['label' => 'หมวดสินค้า', 'icon' => 'fa fa-circle-o', 'url' => ['/istab/stkgrp']],
                                    ['label' => 'ขนส่งโดย', 'icon' => 'fa fa-circle-o', 'url' => ['/istab/dlvby']]
                                ]
                            ],
                            ['label' => 'กำหนดตารางราคา', 'icon' => 'fa fa-circle-o', 'url' => ['/stpri']],
                            ['label' => 'จัดกลุ่มวิธีการจัดส่ง', 'icon' => 'fa fa-circle-o', 'url' => ['/istab/dlvprofile']]
                        ]
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
