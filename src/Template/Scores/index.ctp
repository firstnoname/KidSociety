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
        
        <table class="table-invers" style="width: 30%">
        
            <tr>
                <td>
                    <?= $this->Form->select('searchfrom', $searchfrom, ['class' => 'form-control', 'id' => 'searchfrom']); ?>
                </td>
                <td><?= $this->Form->button('ค้นหา', ['class' => 'btn btn-primary', 'id' => 'checkblank']) ?></td>
            </tr>

        </table>
        <br><br>
    <table class="table table-bordered table-invers" style="width: 100%">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_score') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($scores as $score): ?>
            <?php $chart_data = "{ year:'".$score->name."', total:'".$score->total_score."' }";
                //echo $chart_data;
            ?>
            <tr>
                <td><?= $this->Html->link($score->username, '/scores/reportStaffTime/'.$score->username, ['escape' => false]); ?></td>
                <td><?= h($score->name) ?></td>
                <td><?= h($score->game_name) ?></td>
                <td><?= h($score->total_score) ?></td>
                <td><?= h($score->time_total) ?></td>
                <td><?= h($score->created) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    </div>
</div>
