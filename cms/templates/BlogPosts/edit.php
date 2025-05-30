<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BlogPost $blogPost
 * @var string[]|\Cake\Collection\CollectionInterface $categories
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $blogPost->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $blogPost->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Blog Posts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="blogPosts form content">
            <?= $this->Form->create($blogPost) ?>
            <fieldset>
                <legend><?= __('Edit Blog Post') ?></legend>
                <?php
                    // Form control for blog post name
                    echo $this->Form->control('name');
                    echo $this->Form->control('categories._ids', ['options' => $categories]);

                    // Update only one meta key and value
                    if (isset($blogPost->meta_fields) && !empty($blogPost->meta_fields)) {
                        $metaField = $blogPost->meta_fields[0]; // Assume we're updating the first meta field

                        // Meta Key field (Edit the first meta key)
                        echo $this->Form->control('meta_fields.0.meta_key', [
                            'value' => $metaField->meta_key, // Pre-fill with the stored value
                            'label' => __("Meta Key")
                        ]);

                        // Meta Value field (Edit the first meta value)
                        echo $this->Form->control('meta_fields.0.meta_value', [
                            'value' => $metaField->meta_value, // Pre-fill with the stored value
                            'label' => __("Meta Value")
                        ]);
                    }
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
