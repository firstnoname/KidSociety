<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Game'), ['action' => 'edit', $game->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Game'), ['action' => 'delete', $game->id], ['confirm' => __('Are you sure you want to delete # {0}?', $game->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Games'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Game'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="games view large-9 medium-8 columns content">
    <h3><?= h($game->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($game->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game NameTH') ?></th>
            <td><?= h($game->game_nameTH) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game NameEN') ?></th>
            <td><?= h($game->game_nameEN) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game Image') ?></th>
            <td><?= h($game->game_image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game Voice') ?></th>
            <td><?= h($game->game_voice) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($game->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($game->updated) ?></td>
        </tr>
    </table>
</div>
