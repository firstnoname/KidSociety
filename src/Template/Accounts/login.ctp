
<script>
    $(document).ready(function () {
        
         $('#checkblank').click(function () {
              var user = $('#user').val();
            var pass = $('#pass').val();
             
              if (user === '') {
                alert("กรุณากรอก Username");
                $('#user').focus();
                return false;
            }
            if (pass === '') {
                alert("กรุณากรอก Password");
                $('#pass').focus();
                return false;
            }
             });
         
    });
    </script>



<div class="container">
    <div class="row" >
        <?= $this->Form->create() ?>
        <div class="col-md-4 col-md-offset-4 " > 

            <table class="table-condensed ">
                <tr>
                    <td colspan="4" class="text-center"><h3>LOGIN</h3></td>

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
                    <td colspan="4" class="text-center"> <?= $this->Form->button('Login', ['class' => 'btn btn-primary', 'id' => 'checkblank']) ?>&nbsp;&nbsp;&nbsp; 
                   
                   <?= $this->Html->link('<button class="btn btn-warning" type="button">Register</button>', '/accounts/register/', ['escape' => false]); ?> </td>

                </tr>


            </table>

        </div>
        <?= $this->Form->end() ?>

    </div>
</div>