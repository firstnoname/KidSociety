<script>
    $(document).ready(function () {

        $('#checkblank').click(function () {

            var loopgnameth = 'game4nameTH';
            var loopgnameEN = 'game4nameEN';
            var loopgvoiceth = 'game4voiceTH';
            var loopgvoiceEN = 'game4voiceEN';
            var loopgimage = 'game4image';
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
                <?= $this->Html->link('<button class="btn btn-warning" >Logout</button>', '/accounts/logout/', ['escape' => false]); ?>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <?= $this->Form->create($gamesfour, array('type' => 'file')) ?>
    <div class="row">
        <div class="col-md-12">
            <div class="text-center"><h3>แก้ไขเกมส์ที่ 4</h3></div>

            <table class="table table-bordered table-invers" style="width: 100%">
                <thead>
                    <tr bgcolor="#CCCC99">
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
                    foreach ($gamesfour as $gamefour):
                        ?>
                    <input type="hidden" name="id<?= $chkrank ?>" value="<?= $gamefour->id ?>" >
                    <?php if ($chkrank == 1 || $chkrank == 3 || $chkrank == 5 || $chkrank == 7 || $chkrank == 9
                            || $chkrank == 11 || $chkrank == 13 || $chkrank == 15 || $chkrank == 17 || $chkrank == 19) { ?>
                        <tr>
                            <td><b>สี<?= $gamefour->game4_color ?></b></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td class="text-center"><input type="text" name="game4_nameTH<?= $chkrank ?>" id="game4nameTH<?= $chkrank ?>" value="<?= $gamefour->game4_nameTH ?>" style="width: 100%"></td>
                        <td class="text-center"><input type="text" name="game4_nameEN<?= $chkrank ?>" id="game4nameEN<?= $chkrank ?>" value="<?= $gamefour->game4_nameEN ?>" style="width: 100%"></td>
                        <td class="text-center"><input type="file" name="game4_voiceTH<?= $chkrank ?>" id="game4voiceTH<?= $chkrank ?>" style="width: 100%"></td>
                        <td class="text-center"><input type="file" name="game4_voiceEN<?= $chkrank ?>" style="width: 100%" id="game4voiceEN<?= $chkrank ?>"></td>
                        <td class="text-center"><input type="file" name="game4_image<?= $chkrank ?>"style="width: 100%" id="game4image<?= $chkrank ?>"></td>
                        <input type="hidden" name="chkstatus<?= $chkrank ?>" id="chkstatus<?= $chkrank ?>" value="<?= $gamefour->game4_complete_status ?>">
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

