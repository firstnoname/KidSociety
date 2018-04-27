<script>
    $(document).ready(function () {

        $('#checkblank').click(function () {

            var loopgnameth = 'game1nameTH';
            var loopgnameEN = 'game1nameEN';
            var loopgvoiceth = 'game1voiceTH';
            var loopgvoiceEN = 'game1voiceEN';
            var loopgimage = 'game1image';
            var loopchk = 'chkstatus';

            for (var i = 1; i <= 9; ++i) {

                var chkstatus = document.getElementById(loopchk + i).value;
                if (chkstatus === '0') {

                    var val1chk = document.getElementById(loopgvoiceth + i).value;
                    if (val1chk === '') {

                        alert("กรุณาใส่ประเภทไฟล์ให้ถูกต้อง");
                        document.getElementById(loopgvoiceth + i).value = '';
                        document.getElementById(loopgvoiceth + i).focus();

                        return false;

                    }

                    var val2chk = document.getElementById(loopgvoiceEN + i).value;
                    if (val2chk === '') {

                        alert("กรุณาใส่ประเภทไฟล์ให้ถูกต้อง");
                        document.getElementById(loopgvoiceEN + i).value = '';
                        document.getElementById(loopgvoiceEN + i).focus();
                        return false;

                    }

                    var gimgchk = document.getElementById(loopgimage + i).value;
                    if (gimgchk === '') {

                        alert("กรุณาใส่ประเภทไฟล์ให้ถูกต้อง");
                        document.getElementById(loopgimage + i).value = '';
                        document.getElementById(loopgimage + i).focus();

                        return false;

                    }
                }

                var gnameTH = document.getElementById(loopgnameth + i).value;
                if (gnameTH === '') {
                    alert("กรุณากรอกข้อมูลให้ครบทุกช่อง");
                    document.getElementById(loopgnameth + i).focus();

                    return false;
                }

                var gnameEN = document.getElementById(loopgnameEN + i).value;
                if (gnameEN === '') {
                    alert("กรุณากรอกข้อมูลให้ครบทุกช่อง");
                    document.getElementById(loopgnameEN + i).focus();

                    return false;
                }

                var gval = document.getElementById(loopgvoiceth + i).value;
                if (gval !== '') {

                    var spg = gval.split(".");
                    var lastarr = spg.length;
                    lastarr = lastarr - 1;

                    if (spg[lastarr] !== 'mp3' && spg[lastarr] !== 'wav') {
                        alert("กรุณาใส่ประเภทไฟล์ให้ถูกต้อง");
                        document.getElementById(loopgvoiceth + i).value = '';
                        document.getElementById(loopgvoiceth + i).focus();

                        return false;
                    }
                }

                var gval2 = document.getElementById(loopgvoiceEN + i).value;
                if (gval2 !== '') {

                    var spg2 = gval2.split(".");
                    var lastarr2 = spg2.length;
                    lastarr2 = lastarr2 - 1;

                    if (spg2[lastarr2] !== 'mp3' && spg2[lastarr2] !== 'wav') {
                        alert("กรุณาใส่ประเภทไฟล์ให้ถูกต้อง");
                        document.getElementById(loopgvoiceEN + i).value = '';
                        document.getElementById(loopgvoiceEN + i).focus();

                        return false;
                    }
                }

                var gimg = document.getElementById(loopgimage + i).value;
                if (gimg !== '') {

                    var spg3 = gimg.split(".");
                    var lastarr3 = spg3.length;
                    lastarr3 = lastarr3 - 1;

                    if (spg3[lastarr3] !== 'jpg' && spg3[lastarr3] !== 'png') {
                        alert("กรุณาใส่ประเภทไฟล์ให้ถูกต้อง");
                        document.getElementById(loopgimage + i).value = '';
                        document.getElementById(loopgimage + i).focus();

                        return false;
                    }
                }
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
        </div>
    </div>
</header>

<div class="container">
    <?= $this->Form->create($gamesone, array('type' => 'file')) ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="text-center"><h3>แก้ไขเกมส์ที่ 1</h3></div>

            <table class="table table-bordered table-invers" style="width: 100%">
                <thead>
                    <tr bgcolor="#CCCC99">
                        <th class="text-center"><?= $this->Paginator->sort('ลำดับ') ?></th>
                        <th class="text-center">ชื่อภาษาไทย</th>
                        <th class="text-center">ชื่อภาษาอังกฤษ</th>
                        <th class="text-center">เสียงภาษาไทย</th>
                        <th class="text-center">เสียงภาษาอังกฤษ</th>
                        <th class="text-center">รูปภาพ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $chkrank = 1;
                    foreach ($gamesone as $gameone):
                        ?>
                    <input type="hidden" name="id<?= $chkrank ?>" value="<?= $gameone->id ?>" >
                    <tr>
                        <td class="text-center"><?php echo $chkrank; ?></td>
                        <td class="text-center"><input type="text" style="width: 100%" name="game1_nameTH<?= $chkrank ?>" id="game1nameTH<?= $chkrank ?>" value="<?= $gameone->game1_nameTH ?>" ></td>
                        <td class="text-center"><input type="text" style="width: 100%" name="game1_nameEN<?= $chkrank ?>" id="game1nameEN<?= $chkrank ?>" value="<?= $gameone->game1_nameEN ?>"></td>
                        <td class="text-center"><input type="file" style="width: 100%" name="game1_voiceTH<?= $chkrank ?>" id="game1voiceTH<?= $chkrank ?>"></td>
                        <td class="text-center"><input type="file" style="width: 100%" name="game1_voiceEN<?= $chkrank ?>" id="game1voiceEN<?= $chkrank ?>">
                        <td class="text-center"><input type="file" style="width: 100%" name="game1_image<?= $chkrank ?>" id="game1image<?= $chkrank ?>"></td>
                        <input type="hidden" name="chkstatus<?= $chkrank ?>" id="chkstatus<?= $chkrank ?>" value="<?= $gameone->game1_complete_status ?>">
                    </tr>
                    <?php
                    $chkrank++;
                endforeach;
                ?>
                </tbody>
            </table>
            <div class="text-center"><?= $this->Form->button('บันทึกข้อมูล', ['class' => 'btn btn-primary', 'id' => 'checkblank']) ?></div>
            <br><br>
        </div>
    </div>

    <?= $this->Form->end() ?>
</div>
