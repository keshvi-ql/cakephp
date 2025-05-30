<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\BlogPost> $blogPosts
 */

foreach ($blogPosts as $blogPosts) {
   unset($blogPosts->modified);
}
echo json_encode(compact('blogPosts'));

?>