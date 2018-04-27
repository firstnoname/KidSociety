
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
        </div>
    </div>
</header>

<div class="col-md-4 col-md-offset-4 ">

    <table class="table-condensed " id="tableid">
        <tr>
            <td colspan="4" class="text-center"><font color="red"><h3>ไม่พบรหัส หรือ มีผู้ใช้อื่นใช้รหัสนี้แล้ว</h3></font></td>
        </tr>
        <tr>
            <td colspan="4" class="text-center"><?= $this->Html->link(__('<< ย้อนกลับ'),  ['controller' => 'Games', 'action' => 'index', 'escape' => false]); ?></td>
        </tr>
       
    </table>
</div>
