<?php
/**
 * @var \App\View\AppView $this
 */
?>
<header>
    <div class="container">
        <div class="row">
            <div class="text-right">
                <b>
                    <?php
                    echo $this->request->Session()->read('loginstatus');
                    ?> &nbsp;&nbsp;&nbsp;
                </b>
                <?= $this->Html->link('<button class="btn btn-warning" >ออกจากระบบ</button>', '/accounts/logout/', ['escape' => false]); ?>
            </div>
            <div <?= $status1 ?> class="text-left">
                <ul class="side-nav">
                    <li><?= $this->Html->link(__('เพิ่มเกมส์ใหม่'), '/games/add/') ?></li>
                </ul>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">

        <div <?= $status1 ?> class="col-md-10 col-md-offset-1" >
            <table class="table-condensed" style="width: 100%">
                <thead>
                    <tr>
                        <td colspan="5"><h4>รายการเกมส์</h4></td>
                    </tr>

                    <tr>
                        <th class="text-center"><?= $this->Paginator->sort('ลำดับ') ?></th>
                        <th class="text-center">ชื่อเกมส์</th>
                        <th class="text-center">แก้ไข</th>
                        <th class="text-center">ลบ</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

        <div <?= $status2 ?> class="col-md-10 col-md-offset-1" >
            <table class="table-condensed" style="width: 100%">
                 <thead>
                    <tr>
                        <td colspan="5"><h4>รายการเกมส์ที่สามารถดาวน์โหลดได้</h4></td>
                    </tr>

                    <tr>
                        <th class="text-center"><?= $this->Paginator->sort('ลำดับ') ?></th>
                        <th class="text-center"><?= $this->Paginator->sort('ชื่อเกมส์') ?></th>
                        <th class="text-center"><?= $this->Paginator->sort('Download') ?></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>




    </div>
</div>
