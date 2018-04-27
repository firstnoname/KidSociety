<script>
    $(document).ready(function () {

        $('#checkblank').click(function () {

            var loopgnameth = 'game2nameTH';
            var loopgnameEN = 'game2nameEN';
            var loopgvoiceth = 'game2voiceTH';
            var loopgvoiceEN = 'game2voiceEN';
            var loopgimage = 'game2image';

            for (var i = 1; i <= 9; ++i) {

                var gnameTH = document.getElementById(loopgnameth+i).value;
                if (gnameTH === '') {
                    alert("กรุณากรอกข้อมูลให้ครบทุกช่อง");
                    document.getElementById(loopgnameth+i).focus();

                    return false;
                }
                
                var gnameEN = document.getElementById(loopgnameEN+i).value;
                if (gnameEN === '') {
                    alert("กรุณากรอกข้อมูลให้ครบทุกช่อง");
                    document.getElementById(loopgnameEN+i).focus();

                    return false;
                }

                var gval = document.getElementById(loopgvoiceth+i).value;
                var gval2 = document.getElementById(loopgvoiceEN+i).value;
                //gval = gamevalue
                var spg = gval.split(".");
                var spg2 = gval2.split(".");
                //spg = split game
                var lastarr = spg.length;
                var lastarr2 = spg2.length;
                lastarr = lastarr - 1;
                lastarr2 = lastarr2 - 1;

                if (spg[lastarr] !== 'mp3' && spg[lastarr] !== 'wav') {
                    alert("กรุณาใส่ประเภทไฟล์ให้ถูกต้อง");
                    document.getElementById(loopgvoiceth+i).value = '';
                    document.getElementById(loopgvoiceth+i).focus();

                    return false;
                }

                if (spg2[lastarr2] !== 'mp3' && spg2[lastarr2] !== 'wav') {
                    alert("กรุณาใส่ประเภทไฟล์ให้ถูกต้อง");
                    document.getElementById(loopgvoiceEN+i).value = '';
                    document.getElementById(loopgvoiceEN+i).focus();

                    return false;
                }

                var gimg = document.getElementById(loopgimage+i).value;
                var spg3 = gimg.split(".");
                var lastarr3 = spg3.length;
                lastarr3 = lastarr3 - 1;

                if (spg3[lastarr3] !== 'jpg' && spg3[lastarr3] !== 'png') {
                    alert("กรุณาใส่ประเภทไฟล์ให้ถูกต้อง");
                    document.getElementById(loopgimage+i).value = '';
                    document.getElementById(loopgimage+i).focus();

                    return false;
                }

            }
//
//        });
//        
//        $('#checkblank').click(function () {

            var loopgnameth = 'game2_2nameTH';
            var loopgnameEN = 'game2_2nameEN';
            var loopgvoiceth = 'game2_2voiceTH';
            var loopgvoiceEN = 'game2_2voiceEN';
            var loopgimage = 'game2_2image';

            for (var i = 1; i <= 9; ++i) {

                var gnameTH = document.getElementById(loopgnameth+i).value;
                if (gnameTH === '') {
                    alert("กรุณากรอกข้อมูลให้ครบทุกช่อง");
                    document.getElementById(loopgnameth+i).focus();

                    return false;
                }
                
                var gnameEN = document.getElementById(loopgnameEN+i).value;
                if (gnameEN === '') {
                    alert("กรุณากรอกข้อมูลให้ครบทุกช่อง");
                    document.getElementById(loopgnameEN+i).focus();

                    return false;
                }

                var gval = document.getElementById(loopgvoiceth + i).value;
                var gval2 = document.getElementById(loopgvoiceEN + i).value;
                //gval = gamevalue
                var spg = gval.split(".");
                var spg2 = gval2.split(".");
                //spg = split game
                var lastarr = spg.length;
                var lastarr2 = spg2.length;
                lastarr = lastarr - 1;
                lastarr2 = lastarr2 - 1;

                if (spg[lastarr] !== 'mp3' && spg[lastarr] !== 'wav') {
                    alert("กรุณาใส่ประเภทไฟล์ให้ถูกต้อง");
                    document.getElementById(loopgvoiceth + i).value = '';
                    document.getElementById(loopgvoiceth + i).focus();

                    return false;
                }

                if (spg2[lastarr2] !== 'mp3' && spg2[lastarr2] !== 'wav') {
                    alert("กรุณาใส่ประเภทไฟล์ให้ถูกต้อง");
                    document.getElementById(loopgvoiceEN + i).value = '';
                    document.getElementById(loopgvoiceEN + i).focus();

                    return false;
                }

                var gimg = document.getElementById(loopgimage + i).value;
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
                <?= $this->Html->link('<button class="btn btn-warning" >Logout</button>', '/accounts/logout/', ['escape' => false]); ?>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <?= $this->Form->create($gamestwo, array('type' => 'file')) ?>
    <div class="row">
        <div class="col-md-12">
            <div class="text-center"><h3>สร้างเกมส์</h3></div>
            <table class="table table-bordered table-invers" style="width: 100%">
                <tr>
                    <td><font color="gray">ขั้นตอนที่ 1</font></td>
                    <td><font color="gray">ขั้นตอนที่ 2</font></td>
                    <td bgcolor="#696969"><font color="white">ขั้นตอนที่ 3</font></td>
                    <td><font color="gray">ขั้นตอนที่ 4</font></td>
                    <td><font color="gray">ขั้นตอนที่ 5</font></td>
                </tr>
            </table>

            <h3>ขนาดใหญ่</h3>
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
                    $arrchkrank = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
                    foreach ($arrchkrank as $chkrank):
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $chkrank; ?></td>
                            <td class="text-center"><input type="text" name="game2_nameTH<?= $chkrank ?>" style="width: 100%" id="game2nameTH<?= $chkrank ?>"></td>
                            <td class="text-center"><input type="text" name="game2_nameEN<?= $chkrank ?>" style="width: 100%" id="game2nameEN<?= $chkrank ?>"></td>
                            <td class="text-center"><input type="file" name="game2_voiceTH<?= $chkrank ?>" style="width: 100%" id="game2voiceTH<?= $chkrank ?>"></td>
                            <td class="text-center"><input type="file" name="game2_voiceEN<?= $chkrank ?>" style="width: 100%" id="game2voiceEN<?= $chkrank ?>"></td>
                            <td class="text-center"><input type="file" name="game2_image<?= $chkrank ?>" style="width: 100%" id="game2image<?= $chkrank ?>"></td>
                            <input type="hidden" name="game2_size<?= $chkrank ?>" value="l">
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <br>
            <h3>ขนาดเล็ก</h3>
            <table class="table table-bordered table-invers" style="width: 100%">
                <thead>
                    <tr bgcolor="#CCCC99">
                        <th class="text-center"><?= $this->Paginator->sort('ลำดับ') ?>.</th>
                        <th class="text-center">ชื่อภาษาไทย</th>
                        <th class="text-center">ชื่อภาษาอังกฤษ</th>
                        <th class="text-center">เสียงภาษาไทย</th>
                        <th class="text-center">เสียงภาษาอังกฤษ</th>
                        <th class="text-center">รูปภาพ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $arrchkrank = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
                    foreach ($arrchkrank as $chkrank):
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $chkrank; ?></td>
                            <td class="text-center"><input type="text" name="game2_2_nameTH<?= $chkrank ?>" style="width: 100%" id="game2_2nameTH<?= $chkrank ?>"></td>
                            <td class="text-center"><input type="text" name="game2_2_nameEN<?= $chkrank ?>" style="width: 100%" id="game2_2nameEN<?= $chkrank ?>"></td>
                            <td class="text-center"><input type="file" name="game2_2_voiceTH<?= $chkrank ?>" style="width: 100%" id="game2_2voiceTH<?= $chkrank ?>"></td>
                            <td class="text-center"><input type="file" name="game2_2_voiceEN<?= $chkrank ?>" style="width: 100%" id="game2_2voiceEN<?= $chkrank ?>"></td>
                            <td class="text-center"><input type="file" name="game2_2_image<?= $chkrank ?>" style="width: 100%" id="game2_2image<?= $chkrank ?>"></td>
                            <input type="hidden" name="game2_2_size<?= $chkrank ?>" value="s">
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="text-center"><?= $this->Form->button('บันทึกข้อมูล', ['class' => 'btn btn-primary', 'id' => 'checkblank']) ?></div>
            <br><br>
        </div>
    </div>

    <?= $this->Form->end() ?>
</div>

