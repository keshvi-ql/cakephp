<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BlogPost $blogPost
 * @var \Cake\Collection\CollectionInterface|string[] $categories
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Blog Posts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="blogPosts form content">
            <?= $this->Form->create($blogPost) ?>
            <fieldset>
                <legend><?= __('Add Blog Post') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('categories._ids', ['options' => $categories]);

                    for($i = 0; $i<2;$i++){
                        echo $this->form->control('meta_fields.' . $i . '.meta_key');
                        echo $this->form->control('meta_fields.' . $i . '.meta_value');
                    }
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
