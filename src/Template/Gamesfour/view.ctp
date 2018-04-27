<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Gamesfour'), ['action' => 'edit', $gamesfour->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Gamesfour'), ['action' => 'delete', $gamesfour->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gamesfour->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Gamesfour'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gamesfour'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Games'), ['controller' => 'Games', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Game'), ['controller' => 'Games', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="gamesfour view large-9 medium-8 columns content">
    <h3><?= h($gamesfour->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($gamesfour->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game4 NameTH') ?></th>
            <td><?= h($gamesfour->game4_nameTH) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game4 NameEN') ?></th>
            <td><?= h($gamesfour->game4_nameEN) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game4 VoiceTH') ?></th>
            <td><?= h($gamesfour->game4_voiceTH) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game4 VoiceEN') ?></th>
            <td><?= h($gamesfour->game4_voiceEN) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game4 Image') ?></th>
            <td><?= h($gamesfour->game4_image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game4 Color') ?></th>
            <td><?= h($gamesfour->game4_color) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game') ?></th>
            <td><?= $gamesfour->has('game') ? $this->Html->link($gamesfour->game->id, ['controller' => 'Games', 'action' => 'view', $gamesfour->game->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($gamesfour->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($gamesfour->updated) ?></td>
        </tr>
    </table>
</div>
