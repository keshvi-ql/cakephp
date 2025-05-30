<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\View\JsonView;
// use Cake\View\XmlView;
/**
 * BlogPosts Controller
 *
 * @property \App\Model\Table\BlogPostsTable $BlogPosts
 * @method \App\Model\Entity\BlogPost[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BlogPostsController extends AppController
{

    public function viewClasses(): array
    {
        return [JsonView::class];
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $blogPosts = $this->paginate($this->BlogPosts, ['limit' => 3]);

        $this->set(compact('blogPosts'));
        // $this->viewBuilder()->setOption('serialize', 'blogPosts');
    }

    /**
     * View method
     *
     * @param string|null $id Blog Post id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $blogPost = $this->BlogPosts->get($id, [
            'contain' => ['Categories', 'MetaFields'],
        ]);

        $this->set(compact('blogPost'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $blogPost = $this->BlogPosts->newEmptyEntity();
        if ($this->request->is('post')) {
            $blogPost = $this->BlogPosts->patchEntity($blogPost, $this->request->getData());
            if ($this->BlogPosts->save($blogPost)) {
                $this->Flash->success(__('The blog post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The blog post could not be saved. Please, try again.'));
        }
        $categories = $this->BlogPosts->Categories->find('list', ['limit' => 200])->all();
        $this->set(compact('blogPost', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Blog Post id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
{
    // Retrieve the blog post along with its categories and meta_fields (if related model)
    $blogPost = $this->BlogPosts->get($id, [
        'contain' => ['Categories', 'MetaFields'] // Add MetaFields to contain
    ]);

    // Handle form submission
    if ($this->request->is(['patch', 'post', 'put'])) {
        // Patch the incoming data to the blogPost entity
        $blogPost = $this->BlogPosts->patchEntity($blogPost, $this->request->getData());

        // Save the entity
        if ($this->BlogPosts->save($blogPost)) {
            $this->Flash->success(__('The blog post has been saved.'));
            return $this->redirect(['action' => 'index']);
        }

        // Error handling if the save fails
        $this->Flash->error(__('The blog post could not be saved. Please, try again.'));
    }

    // Retrieve categories for the dropdown
    $categories = $this->BlogPosts->Categories->find('list', ['limit' => 200])->all();
    $this->set(compact('blogPost', 'categories'));
}


    /**
     * Delete method
     *
     * @param string|null $id Blog Post id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $blogPost = $this->BlogPosts->get($id);
        if ($this->BlogPosts->delete($blogPost)) {
            $this->Flash->success(__('The blog post has been deleted.'));
        } else {
            $this->Flash->error(__('The blog post could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
