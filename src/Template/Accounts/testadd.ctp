<script>
    function openPage(evt, pageName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(pageName).style.display = "block";
        evt.currentTarget.className += " active";

    }

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
    <div class="row">
        <div class="col-md-12">
            <table class="table-condensed" style="width: 100%">
                <tr>
                    <td colspan="7" class="text-center"><h3>สร้างเกมส์</h3></td>
                </tr>
                <tr>
                    <td class="text-center">
                        <button type="button" class="btn btn-secondary btn-sm" onclick="openPage(event, 'page1')">Game Detail</button>
                        <button type="button" class="btn btn-secondary btn-sm" onclick="openPage(event, 'page2')">Game 1</button>
                        <button type="button" class="btn btn-secondary btn-sm" onclick="openPage(event, 'page3')">Game 2</button>
                        <button type="button" class="btn btn-secondary btn-sm" onclick="openPage(event, 'page4')">Game 3</button>
                        <button type="button" class="btn btn-secondary btn-sm" onclick="openPage(event, 'page5')">Game 4</button>
                    </td>
                </tr>
            </table>
            <table class="table table-bordered table-invers" style="width: 100%">
                <tr>
                    <td colspan="7" class="text-center"><h3>สร้างเกมส์</h3></td>
                </tr>
                <tr>
                    <td bgcolor="#696969"><font color="white">Step 1</font></td>
                    <td><font color="gray">Step 2</font></td>
                    <td><font color="gray">Step 3</font></td>
                    <td><font color="gray">Step 4</font></td>
                    <td><font color="gray">Step 5</font></td>
                </tr>
            </table>
            <div id="page1" class="tabcontent" >
                11111111111111
                <table class="table table-bordered table-invers" style="width: 100%">
                    <thead class="thead-inverse">
                        <tr bgcolor="#CCCC99">
                            <th class="text-center">ชื่อภาษาไทย</th>
                            <th class="text-center">ชื่อภาษาอังกฤษ</th>
                            <th class="text-center">รูปภาพ</th>
                            <th class="text-center">เสียง</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center"><input type="text" name="game_nameTH" ></td>
                            <td class="text-center"><input type="text" name="game_nameEN" ></td>
                            <td class="text-center"><input type="file" name="game_image" ></td>
                            <td class="text-center"><input type="file" name="game_voice" ></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="page2" class="tabcontent" style="display:none">
                22222222222222
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
                                <td class="text-center"><input type="text" name="g1nameTH<?= $chkrank ?>" ></td>
                                <td class="text-center"><input type="text" name="g1nameEN<?= $chkrank ?>" ></td>
                                <td class="text-center"><input type="file" name="g1voiceTH<?= $chkrank ?>" ></td>
                                <td class="text-center"><input type="file" name="g1voiceEN<?= $chkrank ?>" ></td>
                                <td class="text-center"><input type="file" name="g1image<?= $chkrank ?>" ></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div id="page3" class="tabcontent" style="display:none">
                33333333333333
                
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
                                <td class="text-center"><input type="text" name="g2nameTH<?= $chkrank ?>" ></td>
                                <td class="text-center"><input type="text" name="g2nameEN<?= $chkrank ?>" ></td>
                                <td class="text-center"><input type="file" name="g2voiceTH<?= $chkrank ?>" ></td>
                                <td class="text-center"><input type="file" name="g2voiceEN<?= $chkrank ?>" ></td>
                                <td class="text-center"><input type="file" name="g2image<?= $chkrank ?>" ></td>
                                <td class="text-center"><input type="hidden" name="size<?= $chkrank ?>" value="l"></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                
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
                                <td class="text-center"><input type="text" name="g2nameTH<?= $chkrank ?>" ></td>
                                <td class="text-center"><input type="text" name="g2nameEN<?= $chkrank ?>" ></td>
                                <td class="text-center"><input type="file" name="g2voiceTH<?= $chkrank ?>" ></td>
                                <td class="text-center"><input type="file" name="g2voiceEN<?= $chkrank ?>" ></td>
                                <td class="text-center"><input type="file" name="g2image<?= $chkrank ?>" ></td>
                                <td class="text-center"><input type="hidden" name="size<?= $chkrank ?>" value="s"></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div id="page4" class="tabcontent" style="display:none">
                44444444444444
                <table class="table table-bordered table-invers" style="width: 100%">
                    <thead>
                        <tr bgcolor="#CCCC99">
                            <th class="text-center"><?= $this->Paginator->sort('ลำดับ') ?></th>
                            <th class="text-center">ชื่อภาษาไทย</th>
                            <th class="text-center">ชื่อภาษาอังกฤษ</th>
                            <th class="text-center">เสียงภาษาไทย</th>
                            <th class="text-center">เสียงภาษาอังกฤษ</th>
                            <th class="text-center">รูปภาพ</th>
                            <th class="text-center">ช่วงเวลา</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $arrchkrank = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
                        foreach ($arrchkrank as $chkrank):
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $chkrank; ?></td>
                                <td class="text-center"><input type="text" name="g3nameTH<?= $chkrank ?>" ></td>
                                <td class="text-center"><input type="text" name="g3nameEN<?= $chkrank ?>" ></td>
                                <td class="text-center"><input type="file" name="g3voiceTH<?= $chkrank ?>" ></td>
                                <td class="text-center"><input type="file" name="g3voiceEN<?= $chkrank ?>" ></td>
                                <td class="text-center"><input type="file" name="g3image<?= $chkrank ?>" ></td>
                                <td class="text-center"><input type="text" name="duration<?= $chkrank ?>"></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div id="page5" class="tabcontent" style="display:none">
                55555555555555
                <table class="table table-bordered table-invers" style="width: 100%">
                    <thead>
                        <tr bgcolor="#CCCC99">
                            <th class="text-center"><?= $this->Paginator->sort('ลำดับ') ?></th>
                            <th class="text-center">ชื่อภาษาไทย</th>
                            <th class="text-center">ชื่อภาษาอังกฤษ</th>
                            <th class="text-center">เสียงภาษาไทย</th>
                            <th class="text-center">เสียงภาษาอังกฤษ</th>
                            <th class="text-center">รูปภาพ</th>
                            <th class="text-center">สี</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $arrchkrank = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
                        foreach ($arrchkrank as $chkrank):
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $chkrank; ?></td>
                                <td class="text-center"><input type="text" name="g4nameTH<?= $chkrank ?>" ></td>
                                <td class="text-center"><input type="text" name="g4nameEN<?= $chkrank ?>" ></td>
                                <td class="text-center"><input type="file" name="g4voiceTH<?= $chkrank ?>" ></td>
                                <td class="text-center"><input type="file" name="g4voiceEN<?= $chkrank ?>" ></td>
                                <td class="text-center"><input type="file" name="g4image<?= $chkrank ?>" ></td>
                                <td class="text-center"><input type="text" name="color<?= $chkrank ?>"></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
