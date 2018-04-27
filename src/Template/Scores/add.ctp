<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Scores'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="scores form large-9 medium-8 columns content">
    <?= $this->Form->create($score) ?>
    <fieldset>
        <legend><?= __('Add Score') ?></legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('name');
            echo $this->Form->control('score_1');
            echo $this->Form->control('score_2');
            echo $this->Form->control('score_3');
            echo $this->Form->control('score_4');
            echo $this->Form->control('total_score');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
