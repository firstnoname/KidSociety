<script>
    $(document).ready(function () {

        $('#checkblank').click(function () {

            var loopgnameth = 'game4nameTH';
            var loopgnameEN = 'game4nameEN';
            var loopgvoiceth = 'game4voiceTH';
            var loopgvoiceEN = 'game4voiceEN';
            var loopgimage = 'game4image';

            for (var i = 1; i <= 10; ++i) {

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
//        });
//        
//        $('#checkblank').click(function () {

            var loopgnameth = 'game4_2_nameTH';
            var loopgnameEN = 'game4_2_nameEN';
            var loopgvoiceth = 'game4_2_voiceTH';
            var loopgvoiceEN = 'game4_2_voiceEN';
            var loopgimage = 'game4_2_image';

            for (var i = 1; i <= 10; ++i) {

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
    <?= $this->Form->create($gamesfour, array('type' => 'file')) ?>
    <div class="row">
        <div class="col-md-12">
            <div class="text-center"><h3>สร้างเกมส์</h3></div>
            <table class="table table-bordered table-invers" style="width: 100%">
                <tr>
                    <td><font color="gray">ขั้นตอนที่ 1</font></td>
                    <td><font color="gray">ขั้นตอนที่ 2</font></td>
                    <td><font color="gray">ขั้นตอนที่ 3</font></td>
                    <td><font color="gray">ขั้นตอนที่ 4</font></td>
                    <td bgcolor="#696969"><font color="white">ขั้นตอนที่ 5</font></td>
                </tr>
            </table>

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
                        $rank = 1;
                        $arrcolors = array('เหลือง', 'ม่วง', 'น้ำเงิน', 'ชมพู', 'แดง', 'ขาว', 'ส้ม', 'เขียว', 'น้ำตาล', 'ดำ');
                        foreach ($arrcolors as $arrcolor):
                            ?>
                        <tr>
                            <td><b>สี<?php echo $arrcolor; ?></b></td>
                        </tr>
                            
                            <tr>
                                <td class="text-center"><input type="text" name="game4_nameTH<?= $rank ?>" style="width: 100%" id="game4nameTH<?= $rank ?>"></td>
                                <td class="text-center"><input type="text" name="game4_nameEN<?= $rank ?>" style="width: 100%" id="game4nameEN<?= $rank ?>"></td>
                                <td class="text-center"><input type="file" name="game4_voiceTH<?= $rank ?>" style="width: 100%" id="game4voiceTH<?= $rank ?>"></td>
                                <td class="text-center"><input type="file" name="game4_voiceEN<?= $rank ?>" style="width: 100%" id="game4voiceEN<?= $rank ?>"></td>
                                <td class="text-center"><input type="file" name="game4_image<?= $rank ?>" style="width: 100%" id="game4image<?= $rank ?>"></td>
                                <input type="hidden" name="game4_color<?= $rank ?>" value="<?php echo $arrcolor; ?>">
                            </tr>
                            <tr>
                                <td class="text-center"><input type="text" name="game4_2_nameTH<?= $rank ?>" style="width: 100%" id="game4_2_nameTH<?= $rank ?>"></td>
                                <td class="text-center"><input type="text" name="game4_2_nameEN<?= $rank ?>" style="width: 100%" id="game4_2_nameEN<?= $rank ?>"></td>
                                <td class="text-center"><input type="file" name="game4_2_voiceTH<?= $rank ?>" style="width: 100%" id="game4_2_voiceTH<?= $rank ?>"></td>
                                <td class="text-center"><input type="file" name="game4_2_voiceEN<?= $rank ?>" style="width: 100%" id="game4_2_voiceEN<?= $rank ?>"></td>
                                <td class="text-center"><input type="file" name="game4_2_image<?= $rank ?>" style="width: 100%" id="game4_2_image<?= $rank ?>"></td>
                                <input type="hidden" name="game4_2_color<?= $rank ?>" value="<?php echo $arrcolor; ?>">
                            </tr>
                        <?php $rank++;
                        endforeach; ?>
                    </tbody>
                </table>
            <div class="text-center"><?= $this->Form->button('บันทึกข้อมูล', ['class' => 'btn btn-primary', 'id' => 'checkblank']) ?></div>
            <br><br>
        </div>
    </div>

    <?= $this->Form->end() ?>
</div>

