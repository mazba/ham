<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Office Level'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Office Units'), ['controller' => 'OfficeUnits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Office Unit'), ['controller' => 'OfficeUnits', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Offices'), ['controller' => 'Offices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Office'), ['controller' => 'Offices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="officeLevels index large-9 medium-8 columns content">
    <h3><?= __('Office Levels') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('parent_id') ?></th>
                <th><?= $this->Paginator->sort('name_bn') ?></th>
                <th><?= $this->Paginator->sort('level') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($officeLevels as $officeLevel): ?>
            <tr>
                <td><?= $this->Number->format($officeLevel->id) ?></td>
                <td><?= $officeLevel->has('parent_office_level') ? $this->Html->link($officeLevel->parent_office_level->name_bn, ['controller' => 'OfficeLevels', 'action' => 'view', $officeLevel->parent_office_level->id]) : __('Own') ?></td>
                <td><?= h($officeLevel->name_bn) ?></td>
                <td><?= $this->Number->format($officeLevel->level) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $officeLevel->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $officeLevel->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $officeLevel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $officeLevel->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
