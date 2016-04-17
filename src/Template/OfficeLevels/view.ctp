<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Office Level'), ['action' => 'edit', $officeLevel->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Office Level'), ['action' => 'delete', $officeLevel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $officeLevel->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Office Levels'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Office Level'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Office Levels'), ['controller' => 'OfficeLevels', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Office Level'), ['controller' => 'OfficeLevels', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Office Units'), ['controller' => 'OfficeUnits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Office Unit'), ['controller' => 'OfficeUnits', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Offices'), ['controller' => 'Offices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Office'), ['controller' => 'Offices', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="officeLevels view large-9 medium-8 columns content">
    <h3><?= h($officeLevel->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Parent Office Level') ?></th>
            <td><?= $officeLevel->has('parent_office_level') ? $this->Html->link($officeLevel->parent_office_level->id, ['controller' => 'OfficeLevels', 'action' => 'view', $officeLevel->parent_office_level->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name Bn') ?></th>
            <td><?= h($officeLevel->name_bn) ?></td>
        </tr>
        <tr>
            <th><?= __('Name En') ?></th>
            <td><?= h($officeLevel->name_en) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($officeLevel->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Level') ?></th>
            <td><?= $this->Number->format($officeLevel->level) ?></td>
        </tr>
        <tr>
            <th><?= __('Sequence') ?></th>
            <td><?= $this->Number->format($officeLevel->sequence) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $this->Number->format($officeLevel->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Create Time') ?></th>
            <td><?= $this->Number->format($officeLevel->create_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Update Time') ?></th>
            <td><?= $this->Number->format($officeLevel->update_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Create By') ?></th>
            <td><?= $this->Number->format($officeLevel->create_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Update By') ?></th>
            <td><?= $this->Number->format($officeLevel->update_by) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Office Levels') ?></h4>
        <?php if (!empty($officeLevel->child_office_levels)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Parent Id') ?></th>
                <th><?= __('Name Bn') ?></th>
                <th><?= __('Name En') ?></th>
                <th><?= __('Level') ?></th>
                <th><?= __('Sequence') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Create Time') ?></th>
                <th><?= __('Update Time') ?></th>
                <th><?= __('Create By') ?></th>
                <th><?= __('Update By') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($officeLevel->child_office_levels as $childOfficeLevels): ?>
            <tr>
                <td><?= h($childOfficeLevels->id) ?></td>
                <td><?= h($childOfficeLevels->parent_id) ?></td>
                <td><?= h($childOfficeLevels->name_bn) ?></td>
                <td><?= h($childOfficeLevels->name_en) ?></td>
                <td><?= h($childOfficeLevels->level) ?></td>
                <td><?= h($childOfficeLevels->sequence) ?></td>
                <td><?= h($childOfficeLevels->status) ?></td>
                <td><?= h($childOfficeLevels->create_time) ?></td>
                <td><?= h($childOfficeLevels->update_time) ?></td>
                <td><?= h($childOfficeLevels->create_by) ?></td>
                <td><?= h($childOfficeLevels->update_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OfficeLevels', 'action' => 'view', $childOfficeLevels->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'OfficeLevels', 'action' => 'edit', $childOfficeLevels->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OfficeLevels', 'action' => 'delete', $childOfficeLevels->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childOfficeLevels->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Office Units') ?></h4>
        <?php if (!empty($officeLevel->office_units)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Parent Id') ?></th>
                <th><?= __('Office Level Id') ?></th>
                <th><?= __('Office Unit Category Id') ?></th>
                <th><?= __('Office Id') ?></th>
                <th><?= __('Name Bn') ?></th>
                <th><?= __('Name En') ?></th>
                <th><?= __('Unit Nothi Code') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Created By') ?></th>
                <th><?= __('Update By') ?></th>
                <th><?= __('Create Time') ?></th>
                <th><?= __('Update Time') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($officeLevel->office_units as $officeUnits): ?>
            <tr>
                <td><?= h($officeUnits->id) ?></td>
                <td><?= h($officeUnits->parent_id) ?></td>
                <td><?= h($officeUnits->office_level_id) ?></td>
                <td><?= h($officeUnits->office_unit_category_id) ?></td>
                <td><?= h($officeUnits->office_id) ?></td>
                <td><?= h($officeUnits->name_bn) ?></td>
                <td><?= h($officeUnits->name_en) ?></td>
                <td><?= h($officeUnits->unit_nothi_code) ?></td>
                <td><?= h($officeUnits->status) ?></td>
                <td><?= h($officeUnits->created_by) ?></td>
                <td><?= h($officeUnits->update_by) ?></td>
                <td><?= h($officeUnits->create_time) ?></td>
                <td><?= h($officeUnits->update_time) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OfficeUnits', 'action' => 'view', $officeUnits->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'OfficeUnits', 'action' => 'edit', $officeUnits->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OfficeUnits', 'action' => 'delete', $officeUnits->id], ['confirm' => __('Are you sure you want to delete # {0}?', $officeUnits->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Offices') ?></h4>
        <?php if (!empty($officeLevel->offices)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Parent Id') ?></th>
                <th><?= __('Code') ?></th>
                <th><?= __('Office Level Id') ?></th>
                <th><?= __('Name Bn') ?></th>
                <th><?= __('Name En') ?></th>
                <th><?= __('Short Name Bn') ?></th>
                <th><?= __('Short Name En') ?></th>
                <th><?= __('Digital Nothi Code') ?></th>
                <th><?= __('Reference Code') ?></th>
                <th><?= __('Area Division Id') ?></th>
                <th><?= __('Area Zone Id') ?></th>
                <th><?= __('Area District Id') ?></th>
                <th><?= __('Area Upazila Id') ?></th>
                <th><?= __('Phone') ?></th>
                <th><?= __('Mobile') ?></th>
                <th><?= __('Fax') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Web Url') ?></th>
                <th><?= __('Address') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Create Time') ?></th>
                <th><?= __('Update Time') ?></th>
                <th><?= __('Create By') ?></th>
                <th><?= __('Update By') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($officeLevel->offices as $offices): ?>
            <tr>
                <td><?= h($offices->id) ?></td>
                <td><?= h($offices->parent_id) ?></td>
                <td><?= h($offices->code) ?></td>
                <td><?= h($offices->office_level_id) ?></td>
                <td><?= h($offices->name_bn) ?></td>
                <td><?= h($offices->name_en) ?></td>
                <td><?= h($offices->short_name_bn) ?></td>
                <td><?= h($offices->short_name_en) ?></td>
                <td><?= h($offices->digital_nothi_code) ?></td>
                <td><?= h($offices->reference_code) ?></td>
                <td><?= h($offices->area_division_id) ?></td>
                <td><?= h($offices->area_zone_id) ?></td>
                <td><?= h($offices->area_district_id) ?></td>
                <td><?= h($offices->area_upazila_id) ?></td>
                <td><?= h($offices->phone) ?></td>
                <td><?= h($offices->mobile) ?></td>
                <td><?= h($offices->fax) ?></td>
                <td><?= h($offices->email) ?></td>
                <td><?= h($offices->web_url) ?></td>
                <td><?= h($offices->address) ?></td>
                <td><?= h($offices->description) ?></td>
                <td><?= h($offices->status) ?></td>
                <td><?= h($offices->create_time) ?></td>
                <td><?= h($offices->update_time) ?></td>
                <td><?= h($offices->create_by) ?></td>
                <td><?= h($offices->update_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Offices', 'action' => 'view', $offices->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Offices', 'action' => 'edit', $offices->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Offices', 'action' => 'delete', $offices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offices->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
