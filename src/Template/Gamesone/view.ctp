<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Gamesone'), ['action' => 'edit', $gamesone->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Gamesone'), ['action' => 'delete', $gamesone->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gamesone->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Gamesone'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gamesone'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Games'), ['controller' => 'Games', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Game'), ['controller' => 'Games', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="gamesone view large-9 medium-8 columns content">
    <h3><?= h($gamesone->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($gamesone->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game1 NameTH') ?></th>
            <td><?= h($gamesone->game1_nameTH) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game1 NameEN') ?></th>
            <td><?= h($gamesone->game1_nameEN) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game1 VoiceTH') ?></th>
            <td><?= h($gamesone->game1_voiceTH) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game1 VoiceEN') ?></th>
            <td><?= h($gamesone->game1_voiceEN) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game1 Image') ?></th>
            <td><?= h($gamesone->game1_image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game') ?></th>
            <td><?= $gamesone->has('game') ? $this->Html->link($gamesone->game->id, ['controller' => 'Games', 'action' => 'view', $gamesone->game->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($gamesone->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($gamesone->updated) ?></td>
        </tr>
    </table>
</div>
