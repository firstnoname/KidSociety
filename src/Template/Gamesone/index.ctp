<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Gamesone'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Games'), ['controller' => 'Games', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Game'), ['controller' => 'Games', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="gamesone index large-9 medium-8 columns content">
    <h3><?= __('Gamesone') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game1_nameTH') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game1_nameEN') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game1_voiceTH') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game1_voiceEN') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game1_image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($gamesone as $gamesone): ?>
            <tr>
                <td><?= h($gamesone->id) ?></td>
                <td><?= h($gamesone->game1_nameTH) ?></td>
                <td><?= h($gamesone->game1_nameEN) ?></td>
                <td><?= h($gamesone->game1_voiceTH) ?></td>
                <td><?= h($gamesone->game1_voiceEN) ?></td>
                <td><?= h($gamesone->game1_image) ?></td>
                <td><?= $gamesone->has('game') ? $this->Html->link($gamesone->game->id, ['controller' => 'Games', 'action' => 'view', $gamesone->game->id]) : '' ?></td>
                <td><?= h($gamesone->created) ?></td>
                <td><?= h($gamesone->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $gamesone->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $gamesone->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $gamesone->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gamesone->id)]) ?>
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
