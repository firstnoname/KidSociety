<script>
    $(document).ready(function () {

        $('#checkblank').click(function () {

            var loopgnameth = 'game2nameTH';
            var loopgnameEN = 'game2nameEN';
            var loopgvoiceth = 'game2voiceTH';
            var loopgvoiceEN = 'game2voiceEN';
            var loopgimage = 'game2image';
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

//        });
//
//        $('#checkblank').click(function () {

            var loopgnameth = 'game2_2nameTH';
            var loopgnameEN = 'game2_2nameEN';
            var loopgvoiceth = 'game2_2voiceTH';
            var loopgvoiceEN = 'game2_2voiceEN';
            var loopgimage = 'game2_2image';
            var loopchk = 'chkstatus2_2';

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
                <?= $this->Html->link('<button class="btn btn-warning" >Logout</button>', '/accounts/logout/', ['escape' => false]); ?>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <?= $this->Form->create($gamestwo, array('type' => 'file')) ?>
    <div class="row">
        <div class="col-md-12">
            <div class="text-center"><h3>แก้ไขเกมส์ที่ 2</h3></div>

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
                    $chkrank = 1;
                    foreach ($gamestwoL as $gametwoL):
                        ?>
                    <input type="hidden" name="1id<?= $chkrank ?>" value="<?= $gametwoL->id ?>" >
                    <tr>
                        <td class="text-center"><?php echo $chkrank; ?></td>
                        <td class="text-center"><input type="text" name="game2_nameTH<?= $chkrank ?>" value="<?= $gametwoL->game2_nameTH ?>" style="width: 100%" id="game2nameTH<?= $chkrank ?>"></td>
                        <td class="text-center"><input type="text" name="game2_nameEN<?= $chkrank ?>" value="<?= $gametwoL->game2_nameEN ?>" style="width: 100%" id="game2nameEN<?= $chkrank ?>"></td>
                        <td class="text-center"><input type="file" name="game2_voiceTH<?= $chkrank ?>" style="width: 100%" id="game2voiceTH<?= $chkrank ?>"></td>
                        <td class="text-center"><input type="file" name="game2_voiceEN<?= $chkrank ?>" style="width: 100%" id="game2voiceEN<?= $chkrank ?>"></td>
                        <td class="text-center"><input type="file" name="game2_image<?= $chkrank ?>" style="width: 100%" id="game2image<?= $chkrank ?>"></td>
                    <input type="hidden" name="game2_size<?= $chkrank ?>" value="l">
                    <input type="hidden" name="chkstatus<?= $chkrank ?>" id="chkstatus<?= $chkrank ?>" value="<?= $gametwoL->game2_complete_status ?>">
                    </tr>
                    <?php $chkrank++;
                endforeach;
                ?>
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
                    $chkrank2 = 1;
                    foreach ($gamestwoS as $gametwoS):
                        ?>
                    <input type="hidden" name="2id<?= $chkrank2 ?>" value="<?= $gametwoS->id ?>" >
                    <tr>
                        <td class="text-center"><?php echo $chkrank2; ?></td>
                        <td class="text-center"><input type="text" name="game2_2_nameTH<?= $chkrank2 ?>" value="<?= $gametwoS->game2_nameTH ?>" style="width: 100%" id="game2_2nameTH<?= $chkrank2 ?>"></td>
                        <td class="text-center"><input type="text" name="game2_2_nameEN<?= $chkrank2 ?>" value="<?= $gametwoS->game2_nameEN ?>" style="width: 100%" id="game2_2nameEN<?= $chkrank2 ?>"></td>
                        <td class="text-center"><input type="file" name="game2_2_voiceTH<?= $chkrank2 ?>" style="width: 100%" id="game2_2voiceTH<?= $chkrank2 ?>"></td>
                        <td class="text-center"><input type="file" name="game2_2_voiceEN<?= $chkrank2 ?>" style="width: 100%" id="game2_2voiceEN<?= $chkrank2 ?>"></td>
                        <td class="text-center"><input type="file" name="game2_2_image<?= $chkrank2 ?>" style="width: 100%" id="game2_2image<?= $chkrank2 ?>"></td>
                    <input type="hidden" name="game2_2_size<?= $chkrank2 ?>" value="s">
                    <input type="hidden" name="chkstatus2_2<?= $chkrank2 ?>" id="chkstatus2_2<?= $chkrank2 ?>" value="<?= $gametwoS->game2_complete_status ?>">
                    </tr>
                    <?php $chkrank2++;
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

