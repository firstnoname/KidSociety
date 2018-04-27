<script>
    $(document).ready(function () {

        $('#checkblank').click(function () {

            var gval = document.getElementById("gamevoice").value;
            var gval2 = document.getElementById("gameimage").value;
            //gaval = gamevalue
            var spg = gval.split(".");
            var spg2 = gval2.split(".");
            //spg = split game
            var lastarr = spg.length;
            var lastarr2 = spg2.length;
            lastarr = lastarr-1;
            lastarr2 = lastarr2-1;
            
            if (spg[lastarr] !== 'mp3' && spg[lastarr] !== 'wav') {
                alert("กรุณาใส่ประเภทไฟล์ให้ถูกต้อง");
                document.getElementById("gamevoice").value = '';
                document.getElementById("gamevoice").focus();
                
                return false;
            }
            
            if (spg2[lastarr2] !== 'jpg' && spg2[lastarr2] !== 'png') {
                alert("กรุณาใส่ประเภทไฟล์ให้ถูกต้อง");
                document.getElementById("gameimage").value = '';
                document.getElementById("gameimage").focus();
                
                return false;
            }
            
            var ganmeTH = document.getElementById("gamenameTH").value;
            if (ganmeTH === '') {
                alert("กรุณากรอกชื่อภาษาไทย");
                document.getElementById("gamenameTH").focus();
                
                return false;
            }
            var ganmeEN = document.getElementById("gamenameEN").value;
            if (ganmeEN === '') {
                alert("กรุณากรอกชื่อภาษาไทย");
                document.getElementById("gamenameEN").focus();
                
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
                <?= $this->Html->link('<button class="btn btn-warning" >Logout</button>', '/accounts/logout/', ['escape' => false]); ?>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <?= $this->Form->create($game, array('type' => 'file')) ?>
    <div class="row">
        <div class="col-md-12">
            <div class="text-center"><h3>สร้างเกมส์</h3></div>
            <table class="table table-bordered table-invers" style="width: 100%">
                <tr>
                    <td bgcolor="#696969"><font color="white">ขั้นตอนที่ 1</font></td>
                    <td><font color="gray">ขั้นตอนที่ 2</font></td>
                    <td><font color="gray">ขั้นตอนที่ 3</font></td>
                    <td><font color="gray">ขั้นตอนที่ 4</font></td>
                    <td><font color="gray">ขั้นตอนที่ 5</font></td>
                </tr>
            </table>

            <table class="table table-bordered table-invers" style="width: 100%">
                <thead class="thead-inverse">
                    <tr bgcolor="#CCCC99">
                        <th class="text-center">ชื่อภาษาไทย</th>
                        <th class="text-center">ชื่อภาษาอังกฤษ</th>
                        <th class="text-center">เสียง</th>
                        <th class="text-center">รูปภาพ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center"><input type="text" name="game_nameTH" style="width: 100%" id="gamenameTH"></td>
                        <td class="text-center"><input type="text" name="game_nameEN" style="width: 100%" id="gamenameEN"></td>
                        <td class="text-center"><input type="file" name="game_voice" style="width: 100%" id="gamevoice"></td>
                        <td class="text-center"><input type="file" name="game_image" style="width: 100%" id="gameimage"></td>
                    </tr>
                </tbody>
            </table>
            <div class="text-center"><?= $this->Form->button('บันทึกข้อมูล', ['class' => 'btn btn-primary', 'id' => 'checkblank']) ?></div>
            <br><br>
        </div>
    </div>

    <?= $this->Form->end() ?>
</div>

