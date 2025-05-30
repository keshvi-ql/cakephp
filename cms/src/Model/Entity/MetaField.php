<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MetaField Entity
 *
 * @property int $id
 * @property string $meta_key
 * @property string $meta_value
 * @property int $blog_post_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\BlogPost $blog_post
 */
class MetaField extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'meta_key' => true,
        'meta_value' => true,
        'blog_post_id' => true,
        'created' => true,
        'modified' => true,
        'blog_post' => true,
    ];
}
