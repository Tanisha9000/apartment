<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Buildings Controller
 *
 * @property \App\Model\Table\BillingsTable $Billings
 *
 * @method \App\Model\Entity\Billing[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BillingsController extends AppController {

    public function initialize() {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function index() {
        $billings = $this->Paginator->paginate($this->Billings->find());
        $this->set(compact('billings'));
    }

    public function view($id) {
        $billing = $this->Billings->findById($id);
        $this->set(compact('billing'));
    }

    public function add() {

        $this->Tasks = TableRegistry::get('Tasks');
        $this->Billings = TableRegistry::get('Billings');

        $billing = $this->Billings->find('all',[
            'contain' => ['Tasks']
        ])->toArray();
   //     echo "<pre>"; echo print_r($billing); echo "</pre>"; exit;

        if ($this->request->is(['post', 'put', 'patch'])) {
            $bill = $this->request->getData();

            $datat = array_combine($bill['id'], $bill['task_id']);

            $datat111 = array_combine($bill['billrate'], $bill['payrate']);

            $myarray = [];
            $iii = 0;

            foreach ($datat as $key => $val) {
                $myarray[$iii]['id'] = $key;
                $myarray[$iii]['task_id'] = $val;
                $iii++;
            }

            $iiis = 0;
            foreach ($datat111 as $key => $val) {
                $myarray[$iiis]['billrate'] = $key;
                $myarray[$iiis]['payrate'] = $val;
                $iiis++;
            }

            $flash = 0;
            $flashset = 0;

            foreach ($myarray as $ke => $arraybval) {
                if (array_key_exists('billrate', $arraybval) && array_key_exists('payrate', $arraybval)) {
                    $this->Billings->updateAll(['billrate' => $arraybval['billrate'], 'payrate' => $arraybval['payrate']], ['id' => $arraybval['id']]);
                }

                if ($ke == $flash) {
                    $flashset = 1;
                }

                $flash++;
            }

            if ($flashset == 1) {
                $this->Flash->success(__('Data has been saved.'));
            }
            return $this->redirect(['action' => 'add']);
        }
        $tasks = $this->Tasks->find('all');
        $task = $this->paginate($tasks);

        $this->set(compact('billing', 'task'));
    }

}
