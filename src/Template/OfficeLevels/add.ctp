<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Office Levels'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Parent Office Levels'), ['controller' => 'OfficeLevels', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parent Office Level'), ['controller' => 'OfficeLevels', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Office Units'), ['controller' => 'OfficeUnits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Office Unit'), ['controller' => 'OfficeUnits', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Offices'), ['controller' => 'Offices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Office'), ['controller' => 'Offices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="officeLevels form large-9 medium-8 columns content">
    <?= $this->Form->create($officeLevel) ?>
    <fieldset>
        <legend><?= __('Add Office Level') ?></legend>
        <?php
            echo $this->Form->input('parent_id', ['options' => $parentOfficeLevels, 'empty' => true]);
            echo $this->Form->input('name_bn');
            echo $this->Form->input('name_en');
            echo $this->Form->input('level');
            echo $this->Form->input('sequence');
            echo $this->Form->input('status');
            echo $this->Form->input('create_time');
            echo $this->Form->input('update_time');
            echo $this->Form->input('create_by');
            echo $this->Form->input('update_by');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
