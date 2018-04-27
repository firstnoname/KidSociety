<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Score'), ['action' => 'edit', $score->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Score'), ['action' => 'delete', $score->id], ['confirm' => __('Are you sure you want to delete # {0}?', $score->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Scores'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Score'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="scores view large-9 medium-8 columns content">
    <h3><?= h($score->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($score->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($score->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($score->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Score 1') ?></th>
            <td><?= h($score->score_1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Score 2') ?></th>
            <td><?= h($score->score_2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Score 3') ?></th>
            <td><?= h($score->score_3) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Score 4') ?></th>
            <td><?= h($score->score_4) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Score') ?></th>
            <td><?= h($score->total_score) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($score->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($score->updated) ?></td>
        </tr>
    </table>
</div>
