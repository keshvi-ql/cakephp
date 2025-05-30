<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MetaField $metaField
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Meta Field'), ['action' => 'edit', $metaField->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Meta Field'), ['action' => 'delete', $metaField->id], ['confirm' => __('Are you sure you want to delete # {0}?', $metaField->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Meta Fields'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Meta Field'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="metaFields view content">
            <h3><?= h($metaField->meta_key) ?></h3>
            <table>
                <tr>
                    <th><?= __('Meta Key') ?></th>
                    <td><?= h($metaField->meta_key) ?></td>
                </tr>
                <tr>
                    <th><?= __('Blog Post') ?></th>
                    <td><?= $metaField->has('blog_post') ? $this->Html->link($metaField->blog_post->name, ['controller' => 'BlogPosts', 'action' => 'view', $metaField->blog_post->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($metaField->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($metaField->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($metaField->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Meta Value') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($metaField->meta_value)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
