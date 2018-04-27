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

<div class="container">
    <div class="row">
        <?= $this->Form->create($games) ?>
        <div class="col-md-4 col-md-offset-4" >
            <div class="text-center"><h3>เลือกรายการที่ต้องการแก้ไข</h3></div>
            <table class="table table-bordered table-invers" style="width: 100%">
                <thead class="thead-inverse">
                    <tr bgcolor="#CCCC99">
                        <th class="text-center">รายการ</th>
                        <th class="text-center">แก้ไข</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>ข้อมูลเกมส์</td>
                        <td class="text-center"><?= $this->Html->link(__('Edit'), ['controller' => 'Games', 'action' => 'edit', $games->id]) ?></td>
                    </tr>
                    <tr>
                        <td>เกมส์ที่ 1</td>
                        <td class="text-center"><?= $this->Html->link(__('Edit'), ['controller' => 'Gamesone', 'action' => 'edit', $games->id]) ?></td>
                    </tr>
                    <tr>
                        <td>เกมส์ที่ 2</td>
                        <td class="text-center"><?= $this->Html->link(__('Edit'), ['controller' => 'Gamestwo', 'action' => 'edit', $games->id]) ?></td>
                    </tr>
                    <tr>
                        <td>เกมส์ที่ 3</td>
                        <td class="text-center"><?= $this->Html->link(__('Edit'), ['controller' => 'Gamesthree', 'action' => 'edit', $games->id]) ?></td>
                    </tr>
                    <tr>
                        <td>เกมส์ที่ 4</td>
                        <td class="text-center"><?= $this->Html->link(__('Edit'), ['controller' => 'Gamesfour', 'action' => 'edit', $games->id]) ?></td>
                    </tr>

                </tbody>
            </table>
            <div><?= $this->Html->link(__('<< ย้อนกลับ'),  ['controller' => 'Games', 'action' => 'index', 'escape' => false]); ?></div>
            <br><br>
        </div>
    </div>
</div>
