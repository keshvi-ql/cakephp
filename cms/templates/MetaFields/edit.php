<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MetaField $metaField
 * @var string[]|\Cake\Collection\CollectionInterface $blogPosts
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $metaField->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $metaField->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Meta Fields'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="metaFields form content">
            <?= $this->Form->create($metaField) ?>
            <fieldset>
                <legend><?= __('Edit Meta Field') ?></legend>
                <?php
                    echo $this->Form->control('meta_key');
                    echo $this->Form->control('meta_value');
                    echo $this->Form->control('blog_post_id', ['options' => $blogPosts]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
