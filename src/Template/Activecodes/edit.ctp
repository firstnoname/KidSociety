<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $activecode->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $activecode->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Activecodes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Games'), ['controller' => 'Games', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Game'), ['controller' => 'Games', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="activecodes form large-9 medium-8 columns content">
    <?= $this->Form->create($activecode) ?>
    <fieldset>
        <legend><?= __('Edit Activecode') ?></legend>
        <?php
            echo $this->Form->control('ac_code');
            echo $this->Form->control('game_id', ['options' => $games]);
            echo $this->Form->control('account_id', ['options' => $accounts]);
            echo $this->Form->control('code_status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
