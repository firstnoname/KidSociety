<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Gamesthree'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Games'), ['controller' => 'Games', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Game'), ['controller' => 'Games', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="gamesthree index large-9 medium-8 columns content">
    <h3><?= __('Gamesthree') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game3_nameTH') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game3_nameEN') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game3_voiceTH') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game3_voiceEN') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game3_image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game3_duration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($gamesthree as $gamesthree): ?>
            <tr>
                <td><?= h($gamesthree->id) ?></td>
                <td><?= h($gamesthree->game3_nameTH) ?></td>
                <td><?= h($gamesthree->game3_nameEN) ?></td>
                <td><?= h($gamesthree->game3_voiceTH) ?></td>
                <td><?= h($gamesthree->game3_voiceEN) ?></td>
                <td><?= h($gamesthree->game3_image) ?></td>
                <td><?= h($gamesthree->game3_duration) ?></td>
                <td><?= $gamesthree->has('game') ? $this->Html->link($gamesthree->game->id, ['controller' => 'Games', 'action' => 'view', $gamesthree->game->id]) : '' ?></td>
                <td><?= h($gamesthree->created) ?></td>
                <td><?= h($gamesthree->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $gamesthree->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $gamesthree->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $gamesthree->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gamesthree->id)]) ?>
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
