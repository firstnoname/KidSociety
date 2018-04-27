<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Activecode'), ['action' => 'edit', $activecode->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Activecode'), ['action' => 'delete', $activecode->id], ['confirm' => __('Are you sure you want to delete # {0}?', $activecode->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Activecodes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Activecode'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Games'), ['controller' => 'Games', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Game'), ['controller' => 'Games', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="activecodes view large-9 medium-8 columns content">
    <h3><?= h($activecode->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($activecode->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ac Code') ?></th>
            <td><?= h($activecode->ac_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game') ?></th>
            <td><?= $activecode->has('game') ? $this->Html->link($activecode->game->id, ['controller' => 'Games', 'action' => 'view', $activecode->game->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Account') ?></th>
            <td><?= $activecode->has('account') ? $this->Html->link($activecode->account->id, ['controller' => 'Accounts', 'action' => 'view', $activecode->account->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Code Status') ?></th>
            <td><?= $this->Number->format($activecode->code_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($activecode->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($activecode->updated) ?></td>
        </tr>
    </table>
</div>
