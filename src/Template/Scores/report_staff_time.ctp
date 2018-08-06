<?php
/**
  * @var \App\View\AppView $this
  */
?>

<script>
    $(document).ready(function (){
        
        $('#searchfrom').change(function(){
            $.post('../kidsociety/Scores/index/', function(resp){
                //alert("Hi");
                //alert(resp);
            });
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
    <div class="row">
        <h3><?= __('Scores') ?></h3>
        <?= $this->Form->create('Post', array('url' => '/Scores/index/')); ?>

        <br><br>
    <table class="table table-bordered table-invers" style="width: 100%">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Times game 1 (min)') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Times game 2 (min)') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Times game 3 (min)') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Times game 4 (min)') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
            </tr>
        </thead>
        <tbody>
        
            <?php foreach ($scores as $score): ?>
                <?php $chart_data = "{ year:'".$score->name."', total:'".$score->total_score."' }";
                    //echo $chart_data;
                ?>
                <tr>
                    <td><?= h($score->username) ?></td>
                    <td><?= h($score->name) ?></td>
                    <td><?= h($score->game_name) ?></td>
                    <td><?= h($score->time_g1) ?></td>
                    <td><?= h($score->time_g2) ?></td>
                    <td><?= h($score->time_g3) ?></td>
                    <td><?= h($score->time_g4) ?></td>
                    <td><?= h($score->created) ?></td>
                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    </div>
</div>
