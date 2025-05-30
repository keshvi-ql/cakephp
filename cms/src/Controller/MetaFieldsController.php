<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * MetaFields Controller
 *
 * @property \App\Model\Table\MetaFieldsTable $MetaFields
 * @method \App\Model\Entity\MetaField[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MetaFieldsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['BlogPosts'],
        ];
        $metaFields = $this->paginate($this->MetaFields , ['limit' => 3]);

        $this->set(compact('metaFields'));
    }

    /**
     * View method
     *
     * @param string|null $id Meta Field id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $metaField = $this->MetaFields->get($id, [
            'contain' => ['BlogPosts'],
        ]);

        $this->set(compact('metaField'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $metaField = $this->MetaFields->newEmptyEntity();
        if ($this->request->is('post')) {
            $metaField = $this->MetaFields->patchEntity($metaField, $this->request->getData());
            if ($this->MetaFields->save($metaField)) {
                $this->Flash->success(__('The meta field has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The meta field could not be saved. Please, try again.'));
        }
        $blogPosts = $this->MetaFields->BlogPosts->find('list', ['limit' => 200])->all();
        $this->set(compact('metaField', 'blogPosts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Meta Field id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $metaField = $this->MetaFields->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $metaField = $this->MetaFields->patchEntity($metaField, $this->request->getData());
            if ($this->MetaFields->save($metaField)) {
                $this->Flash->success(__('The meta field has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The meta field could not be saved. Please, try again.'));
        }
        $blogPosts = $this->MetaFields->BlogPosts->find('list', ['limit' => 200])->all();
        $this->set(compact('metaField', 'blogPosts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Meta Field id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $metaField = $this->MetaFields->get($id);
        if ($this->MetaFields->delete($metaField)) {
            $this->Flash->success(__('The meta field has been deleted.'));
        } else {
            $this->Flash->error(__('The meta field could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
