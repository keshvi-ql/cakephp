<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Category'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="categories view content">
            <h3><?= h($category->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($category->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($category->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($category->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($category->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Blog Posts') ?></h4>
                <?php if (!empty($category->blog_posts)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Meta Fields') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($category->blog_posts as $blogPosts) : ?>
                        <tr>
                            <td><?= h($blogPosts->id) ?></td>
                            <td><?= h($blogPosts->name) ?></td>
                            <td>
                                <?php if($blogPosts->meta_fields): ?>
                                <ul>
                                    <?php foreach($blogPosts->meta_fields as $meta_field):?>
                                        <li><?= $meta_field->meta_key ?>:<?= $meta_field->meta_value ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <?php endif; ?>
                            </td>

                            <td><?= h($blogPosts->created) ?></td>
                            <td><?= h($blogPosts->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'BlogPosts', 'action' => 'view', $blogPosts->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'BlogPosts', 'action' => 'edit', $blogPosts->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'BlogPosts', 'action' => 'delete', $blogPosts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blogPosts->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
