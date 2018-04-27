<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Gamestwo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Games'), ['controller' => 'Games', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Game'), ['controller' => 'Games', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="gamestwo index large-9 medium-8 columns content">
    <h3><?= __('Gamestwo') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game2_nameTH') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game2_nameEN') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game2_voiceTH') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game2_voiceEN') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game2_image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game2_size') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($gamestwo as $gamestwo): ?>
            <tr>
                <td><?= h($gamestwo->id) ?></td>
                <td><?= h($gamestwo->game2_nameTH) ?></td>
                <td><?= h($gamestwo->game2_nameEN) ?></td>
                <td><?= h($gamestwo->game2_voiceTH) ?></td>
                <td><?= h($gamestwo->game2_voiceEN) ?></td>
                <td><?= h($gamestwo->game2_image) ?></td>
                <td><?= h($gamestwo->game2_size) ?></td>
                <td><?= $gamestwo->has('game') ? $this->Html->link($gamestwo->game->id, ['controller' => 'Games', 'action' => 'view', $gamestwo->game->id]) : '' ?></td>
                <td><?= h($gamestwo->created) ?></td>
                <td><?= h($gamestwo->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $gamestwo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $gamestwo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $gamestwo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gamestwo->id)]) ?>
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
