
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
            <div class="text-left">
                <ul class="side-nav">
                    <li><?= $this->Html->link(__('เพิ่ม Active code'),  ['controller' => 'Activecodes', 'action' => 'add', $game->id]); ?></li>
                    <li><?= $this->Html->link(__('รายการเกมส์'), '/games/index/') ?></li>
                </ul>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1" >
            <div><h4>รายการรหัสเกมส์ <b><?= h($game->game_nameEN) ?></b></h4></div>
            <br>
            <?= $this->Form->create('Post', array('url' => '/activecodes/index/'.$game->id)); ?>
            <table class="table-condensed">
                <tr>
                    <td><?= $this->Form->select('searchfrom', $searchfrom, ['class' => 'form-control', 'id' => 'searchfrom']); ?></td>  
                    <td><?= $this->Form->button('ค้นหา', ['class' => 'btn btn-primary', 'id' => 'checkblank']) ?></td>
                </tr>
            </table>
            <input type="hidden" name="game_id" value="<?= $game->id ?>">
            
            <table class="table table-bordered table-invers" style="width: 100%">
                <thead class="thead-inverse">
                    <tr bgcolor="#CCCC99">
                        <th class="text-center">Active code</th>
                        <th class="text-center">ชื่อผู้ใช้ที่ทำการ Active</th>
                        <th class="text-center"><?= $this->Paginator->sort('สถานะ') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    foreach ($activecodes as $activecode):
                        ?>
                        <tr>
                            <td><?= h($activecode->ac_code) ?></td>
                            <td class="text-center"><?= $activecode->has('account') ? h($activecode->account->username) : '' ?></td>
                            <td class="text-center">
                                <?php if ($activecode->code_status == 1) { ?>
                                <font color="green"><b>ยังไม่ได้ใช้งาน</b></font>
                                <?php } else if ($activecode->code_status == 2) { ?>
                                    <font color="red"><b>ใช้งานแล้ว</b></font>
                                <?php } else { ?>
                                    <font color="gray">-</font>
                                <?php } ?>
                        </tr>
                        <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>

        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
            <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
        </div>
<?= $this->Form->end() ?>
    </div>
</div>