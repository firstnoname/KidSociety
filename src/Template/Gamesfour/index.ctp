<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Gamesfour'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Games'), ['controller' => 'Games', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Game'), ['controller' => 'Games', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="gamesfour index large-9 medium-8 columns content">
    <h3><?= __('Gamesfour') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game4_nameTH') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game4_nameEN') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game4_voiceTH') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game4_voiceEN') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game4_image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game4_color') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($gamesfour as $gamesfour): ?>
            <tr>
                <td><?= h($gamesfour->id) ?></td>
                <td><?= h($gamesfour->game4_nameTH) ?></td>
                <td><?= h($gamesfour->game4_nameEN) ?></td>
                <td><?= h($gamesfour->game4_voiceTH) ?></td>
                <td><?= h($gamesfour->game4_voiceEN) ?></td>
                <td><?= h($gamesfour->game4_image) ?></td>
                <td><?= h($gamesfour->game4_color) ?></td>
                <td><?= $gamesfour->has('game') ? $this->Html->link($gamesfour->game->id, ['controller' => 'Games', 'action' => 'view', $gamesfour->game->id]) : '' ?></td>
                <td><?= h($gamesfour->created) ?></td>
                <td><?= h($gamesfour->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $gamesfour->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $gamesfour->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $gamesfour->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gamesfour->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
