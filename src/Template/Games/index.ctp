<script>
    $(document).ready(function () {

        
        $('#checkblank').click(function () {
            
            var accode = $('#ac_code').val();
            
            if (accode === '') {
                alert("กรุณากรอกรหัสเพื่อ Download เกมส์");
                $('#ac_code').focus();
                return false;
            }
            
        });
    });
</script>

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

                <ul class="side-nav">
                    <li><?= $this->Html->link(__('ดูคะแนน'), '/scores/scoreReport/') ?></li>
                </ul>
            </div>
            
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div <?= $status1 ?> class="col-md-10 col-md-offset-1" >
            <div><h4>รายการเกมส์</h4></div>
            <table class="table table-bordered table-invers" style="width: 100%">
                <thead class="thead-inverse">
                    <tr bgcolor="#CCCC99">
                        <th class="text-center"><?= $this->Paginator->sort('ลำดับ') ?></th>
                        <th class="text-center">ชื่อเกมส์ภาษาไทย</th>
                        <th class="text-center">ชื่อเกมส์ภาษาอังกฤษ</th>
                        <th class="text-center">สถานะ</th>
                        <th class="text-center" colspan="2">จัดการข้อมูล</th>
                        <th class="text-center">Active code</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $rank = 1;
                    foreach ($games as $game):
                        ?>
                        <tr>
                            <td class="text-center"><?= h($rank) ?></td>
                            <td><?= h($game->game_nameTH) ?></td>
                            <td><?= h($game->game_nameEN) ?></td>
                            <td class="text-center">
                                <?php if ($game->game_complete_status == 1) { ?>
                                <font color="green"><b>สามารถ Download ได้</b></font>
                                <?php } else if ($game->game_complete_status == 0) { ?>
                                    <font color="red"><b>ไม่สามารถ Download ได้</b></font>
                                <?php } else { ?>
                                    <font color="gray">-</font>
                                <?php } ?>
                            </td>
                            <td class="text-center"><?= $this->Html->link(__('แก้ไข'), ['action' => 'ListEditPage', $game->id]) ?></td>
                            <td class="text-center"><?= $this->Form->postLink(__('ลบ'), ['action' => 'delete', $game->id], ['confirm' => __('Are you sure you want to delete # {0}?', $game->id)]) ?></td>
                            <td class="text-center">
                                        <?php if ($game->game_complete_status == 1) { ?>
                                <?= $this->Html->link(__('รายการ Active code'), ['controller' => 'Activecodes', 'action' => 'index', $game->id]); ?>
                                <?php } else if ($game->game_complete_status == 0) { ?>
                                <font color="gray">รายการ Active code</font>
                                <?php } ?>  
                            </td>
                        </tr>
                        <?php
                        $rank++;
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>

        <div <?= $status2 ?> class="col-md-4 col-md-offset-4 " >
            <?= $this->Form->create('Post', array('url' => '/games/download')); ?>
            <table class="table-condensed " id="tableid">
                <tr>
                    <td colspan="4" class="text-center"><h3>กรอกรหัสเพื่อดาวน์โหลดเกมส์</h3></td>
                </tr>

                <tr>
                    <td colspan="4"><?= $this->Form->control('ac_code', ['class' => 'form-control', 'style ' => 'width: 100%', 'label' => false, 'id' => 'ac_code']) ?></td>

                </tr>
                <tr>
                    <td colspan="4" class="text-center"> <?= $this->Form->button('Download', ['id' => 'checkblank', 'type' => 'submit', 'class' => 'btn btn-primary']) ?> </td>
                </tr>

            </table>
            <?= $this->Form->end() ?>
        </div>

    </div>
</div>