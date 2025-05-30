<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\MetaField> $metaFields
 */
?>
<div class="metaFields index content">
    <?= $this->Html->link(__('New Meta Field'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Meta Fields') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('meta_key') ?></th>
                    <th><?= $this->Paginator->sort('blog_post_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($metaFields as $metaField): ?>
                <tr>
                    <td><?= $this->Number->format($metaField->id) ?></td>
                    <td><?= h($metaField->meta_key) ?></td>
                    <td><?= $metaField->has('blog_post') ? $this->Html->link($metaField->blog_post->name, ['controller' => 'BlogPosts', 'action' => 'view', $metaField->blog_post->id]) : '' ?></td>
                    <td><?= h($metaField->created) ?></td>
                    <td><?= h($metaField->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $metaField->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $metaField->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $metaField->id], ['confirm' => __('Are you sure you want to delete # {0}?', $metaField->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
