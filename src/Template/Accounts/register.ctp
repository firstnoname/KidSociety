<?= $this->Html->script('/jquery.Thailand.js/dependencies/JQL.min.js') ?>
<?= $this->Html->script('/jquery.Thailand.js/dependencies/typeahead.bundle.js') ?>

<?= $this->Html->css('/jquery.Thailand.js/dist/jquery.Thailand.min.css') ?>
<?= $this->Html->script('/jquery.Thailand.js/dist/jquery.Thailand.min.js') ?>

<script>
    $(document).ready(function () {

        
        $('#checkblank').click(function () {
            
            var user = $('#user').val();
            var pass = $('#pass').val();
            var repass = $('#repass').val();
            
            if (user === '' || pass === '' || repass === '') {
                alert("Please fill in all information.");
                return false;
            }
            
            if (pass !== repass) {
                alert("Passwords do not match.");
                $('#repass').focus();
                return false;
            }
            
        });
    });

    $(document).ready(function () {
        //Validation.initValidation();

        $.Thailand({
            $district: $('#district'), // input ของตำบล
            $amphoe: $('#amphoe'), // input ของอำเภอ
            $province: $('#province'), // input ของจังหวัด
            $zipcode: $('#zipcode'), // input ของรหัสไปรษณีย์
        });
        $('#hasmeadow').change(function () {
            if (this.checked) {
                $('#hasmeadow_box').show();
            } else {
                $('#hasmeadow_box').hide();
            }

        });

        $('#hasstable').change(function () {
            if (this.checked) {
                $('#hasstable_box').show();
            } else {
                $('#hasstable_box').hide();
            }
        });

    });
</script>




<div class="col-md-4 col-md-offset-4 ">
    <?= $this->Form->create($account) ?>


    <table class="table-condensed " id="tableid" style="width: 150%">
        <tr>
            <td colspan="4" class="text-center"><h3>Register</h3></td>
        </tr>

        <tr>
            <td colspan="2" class="text-right"><h4>Username : </h4></td>
            <td colspan="2"><?= $this->Form->control('username', ['class' => 'form-control', 'style ' => 'width: 100%', 'label' => false, 'id' => 'user']) ?></td>

        </tr>
        <tr>
            <td colspan="2" class="text-right"><h4>Password : </h4></td>
            <td colspan="2"><?= $this->Form->control('password', ['class' => 'form-control', 'style ' => 'width: 100%', 'label' => false, 'id' => 'pass']) ?></td>          
        </tr>
        <tr>
            <td colspan="2" class="text-right"><h4>Retype Password : </h4></td>
            <td colspan="2"><?= $this->Form->control('password', ['class' => 'form-control', 'style ' => 'width: 100%', 'label' => false, 'id' => 'repass']) ?></td>          
        </tr>

        <tr>
            <td colspan="2" class="text-right"><label for="">บ้านเลขที่ <i class="text-danger">*</i></label></td>
            <td colspan="2"><?= $this->Form->control('houseno', ['class' => 'form-control', 'label' => false, 'required' => true]) ?></td>
            <td colspan="2" class="text-right"><label for="">หมู่บ้าน <i class="text-danger">*</i></label></td>
            <td colspan="2"<?= $this->Form->control('villagename', ['class' => 'form-control', 'label' => false, 'required' => true]) ?></td>          
        </tr>
        <tr>
                      
        </tr>
        <tr>
            <td colspan="2" class="text-right"><label for="">ตำบล <i class="text-danger">*</i></label></td>
            <td colspan="2"><?= $this->Form->control('subdistrict', ['class' => 'form-control', 'label' => false, 'id' => 'district', 'required' => true]) ?></td>          
            <td colspan="2" class="text-right"><label for="">อำเภอ <i class="text-danger">*</i></label></td>
            <td colspan="2"><?= $this->Form->control('district', ['class' => 'form-control', 'label' => false, 'id' => 'amphoe', 'required' => true]) ?></td>
        </tr>
        <tr>
            <td colspan="2" class="text-right"><label for="">จังหวัด <i class="text-danger">*</i></label></td>
            <td colspan="2"><?= $this->Form->control('province', ['class' => 'form-control', 'label' => false, 'id' => 'province', 'required' => true]) ?></td>          
            <td colspan="2" class="text-right"><label for="">รหัสไปรษณีย์ <i class="text-danger">*</i></label></td>
            <td colspan="2"><?= $this->Form->control('zipcode', ['class' => 'form-control', 'label' => false, 'id' => 'zipcode', 'required' => true]) ?></td>
        </tr>

        <tr>
            <td colspan="2" class="text-right"><h4>รายได้ครอบครัว : </h4></td>
            <td colspan="2"><?= $this->Form->control('salary', ['class' => 'form-control', 'style ' => 'width: 100%', 'label' => false, 'id' => 'salary']) ?></td>          
        </tr>

        <tr>
            <td colspan="2" class="text-right"><h4>ชื่อเล่น : </h4></td>
            <td colspan="2"><?= $this->Form->control('name', ['class' => 'form-control', 'style ' => 'width: 100%', 'label' => false, 'id' => 'nickName']) ?></td> 
            <td colspan="2" class="text-right"><h4>อายุ : </h4></td>
            <td colspan="2"><?= $this->Form->control('age', ['class' => 'form-control', 'style ' => 'width: 100%', 'label' => false, 'id' => 'age']) ?></td>            
        </tr>

            <?= $this->Form->control('status', ['class' => 'form-control', 'type' => 'hidden', 'id' => 'status']) ?>
        <tr>
            <td colspan="4" class="text-center"> <?= $this->Form->button('Register', ['id' => 'checkblank','type' => 'submit', 'class' => 'btn btn-primary']) ?> </td>
        </tr>
       
    </table>

    <?= $this->Form->end() ?>
</div>

