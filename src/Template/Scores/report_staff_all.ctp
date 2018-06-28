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
                <th scope="col"><?= $this->Paginator->sort('score_g1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('score_g2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('score_g3') ?></th>
                <th scope="col"><?= $this->Paginator->sort('score_g4') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_score') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($scores as $score): ?>
            <?php $chart_data = "{ year:'".$score->name."', total:'".$score->total_score."' }";
                //echo $chart_data;
            ?>
            <tr>
                <td><?= h($score->username) ?></td>
                <td><?= $this->Html->link($score->name, '/scores/reportStaffTime/'.$score->id, ['escape' => false]); ?></td>
                <td><?= h($score->game_name) ?></td>
                <td><?= h($score->score_g1) ?></td>
                <td><?= h($score->score_g2) ?></td>
                <td><?= h($score->score_g3) ?></td>
                <td><?= h($score->score_g4) ?></td>
                <td><?= h($score->total_score) ?></td>
                <td><?= h($score->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $score->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $score->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $score->id], ['confirm' => __('Are you sure you want to delete # {0}?', $score->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    </div>
</div>
