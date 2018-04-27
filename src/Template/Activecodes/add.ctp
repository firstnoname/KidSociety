<script>
    $(document).ready(function () {

        
        $('#checkblank').click(function () {
            
            var acnum = $('#ac_num').val();
            
            if (acnum === '') {
                alert("กรุณากรอกจำนวนรหัสที่ต้องการ");
                $('#ac_num').focus();
                return false;
            }
            
            if (acnum > 100) {
                alert("กรุณากรอกจำนวนรหัสไม่เกิน 100");
                $('#ac_num').focus();
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
            <div class="text-left">
                <ul class="side-nav">
                    <li><?= $this->Html->link(__('รายการเกมส์'), '/games/index/') ?></li>
                </ul>
            </div>
        </div>
    </div>
</header>

<div class="col-md-4 col-md-offset-4 ">
    <?= $this->Form->create($activecode) ?>

    <table class="table-condensed " id="tableid">
        <tr>
            <td colspan="4" class="text-center"><h3>เพิ่ม Active code</h3></td>
        </tr>

        <tr>
            <td colspan="2" class="text-right"><h4>กรอกจำนวนรหัส : </h4></td>
            <td colspan="2"><?= $this->Form->control('ac_num', ['class' => 'form-control', 'style ' => 'width: 100%', 'label' => false, 'id' => 'ac_num']) ?></td>

        </tr>
        <tr>
            <td colspan="4" class="text-center"> <?= $this->Form->button('เพิ่ม', ['id' => 'checkblank','type' => 'submit', 'class' => 'btn btn-primary']) ?> </td>
        </tr>
       
    </table>
    <input type="hidden" name="game_id" value="<?= $game->id ?>">
    <?= $this->Form->end() ?>
</div>
