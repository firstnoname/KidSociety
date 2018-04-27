<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Gamestwo'), ['action' => 'edit', $gamestwo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Gamestwo'), ['action' => 'delete', $gamestwo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gamestwo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Gamestwo'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gamestwo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Games'), ['controller' => 'Games', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Game'), ['controller' => 'Games', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="gamestwo view large-9 medium-8 columns content">
    <h3><?= h($gamestwo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($gamestwo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game2 NameTH') ?></th>
            <td><?= h($gamestwo->game2_nameTH) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game2 NameEN') ?></th>
            <td><?= h($gamestwo->game2_nameEN) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game2 VoiceTH') ?></th>
            <td><?= h($gamestwo->game2_voiceTH) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game2 VoiceEN') ?></th>
            <td><?= h($gamestwo->game2_voiceEN) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game2 Image') ?></th>
            <td><?= h($gamestwo->game2_image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game2 Size') ?></th>
            <td><?= h($gamestwo->game2_size) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game') ?></th>
            <td><?= $gamestwo->has('game') ? $this->Html->link($gamestwo->game->id, ['controller' => 'Games', 'action' => 'view', $gamestwo->game->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($gamestwo->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($gamestwo->updated) ?></td>
        </tr>
    </table>
</div>
