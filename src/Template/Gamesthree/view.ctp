<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Gamesthree'), ['action' => 'edit', $gamesthree->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Gamesthree'), ['action' => 'delete', $gamesthree->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gamesthree->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Gamesthree'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gamesthree'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Games'), ['controller' => 'Games', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Game'), ['controller' => 'Games', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="gamesthree view large-9 medium-8 columns content">
    <h3><?= h($gamesthree->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($gamesthree->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game3 NameTH') ?></th>
            <td><?= h($gamesthree->game3_nameTH) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game3 NameEN') ?></th>
            <td><?= h($gamesthree->game3_nameEN) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game3 VoiceTH') ?></th>
            <td><?= h($gamesthree->game3_voiceTH) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game3 VoiceEN') ?></th>
            <td><?= h($gamesthree->game3_voiceEN) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game3 Image') ?></th>
            <td><?= h($gamesthree->game3_image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game3 Duration') ?></th>
            <td><?= h($gamesthree->game3_duration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game') ?></th>
            <td><?= $gamesthree->has('game') ? $this->Html->link($gamesthree->game->id, ['controller' => 'Games', 'action' => 'view', $gamesthree->game->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($gamesthree->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($gamesthree->updated) ?></td>
        </tr>
    </table>
</div>
