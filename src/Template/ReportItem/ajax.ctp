<?php

if ($action == 'getItemCategories') {
    if (!empty($itemCategories)) {
        echo $this->Form->input('item_category_id', ['label' => '', 'class' => 'form-control item_category_id', 'options' => $itemCategories, 'empty' => __('Select'), 'required', 'templates' => ['inputContainer' => '<div class="form-group item_category {{type}}{{required}}">{{content}}</div>']]);
    }
}