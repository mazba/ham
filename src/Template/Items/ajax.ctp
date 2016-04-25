<?php

if ($action == 'getAssetNatures') {
    if (!empty($assetNatures)) {
        echo $this->Form->input('asset_nature_id', ['label' => '', 'class' => 'form-control asset_nature_id', 'options' => $assetNatures, 'empty' => __('Select'), 'required', 'templates' => ['inputContainer' => '<div class="form-group asset_nature {{type}}{{required}}">{{content}}</div>']]);
    }
}

if ($action == 'getAssetTypes') {
    if (!empty($assetTypes)) {
        echo $this->Form->input('asset_type_id', ['label' => '', 'class' => 'form-control asset_type_id', 'options' => $assetTypes, 'empty' => __('Select'), 'required', 'templates' => ['inputContainer' => '<div class="form-group asset_type {{type}}{{required}}">{{content}}</div>']]);
    }
}
if ($action == 'getItemCategories') {
    if (!empty($itemCategories)) {
        echo $this->Form->input('item_category_id', ['label' => '', 'class' => 'form-control item_category_id', 'options' => $itemCategories, 'empty' => __('Select'), 'required', 'templates' => ['inputContainer' => '<div class="form-group item_category {{type}}{{required}}">{{content}}</div>']]);
    }
}