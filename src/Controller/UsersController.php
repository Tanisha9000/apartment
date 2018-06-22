<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Cake\Routing\Router;
use Cake\Mailer\Email;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['login', 'add', 'logout', 'forgotpassword']);
    }

    public function initialize() {
        parent::initialize();
        $this->loadComponent('Upload');
    }

    public function login() {
        $this->viewBuilder()->setLayout('start');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            //print_r($user); exit;
            if ($user) {
                $this->Auth->setUser($user);
                $userdata = $this->Auth->user();
//				if ($this->Auth->user('role') == 'admin') {
                //	echo 'tanisha' ;
                $response['data'] = $this->Auth->user();
                $response['isSucess'] = "true";
                $response['msg'] = "Logged In successfully";
                $this->Flash->success(__('Logged In successfully'));

                if ($userdata['role'] == 'admin') {
                    return $this->redirect(['controller' => 'dashboard', 'action' => 'index']);
                } else if ($userdata['role'] == 'apartmentmanager') {
                    $this->Flash->success(__('You can change your password from your profile'));
                    return $this->redirect([ 'controller' => 'properties', 'action' => 'listApartmentmanager/' . $userdata['id']]);
                } else if($userdata['role'] == 'subcontractor'){
                    $this->Flash->success(__('You can change your password from your profile'));
                    return $this->redirect([ 'controller' => 'addtasks', 'action' => 'subcontractorview/' . $userdata['id']]);
                } else if($userdata['role'] == 'officeuser'){
                    $this->Flash->success(__('You can change your password from your profile'));
                    return $this->redirect([ 'controller' => 'properties', 'action' => 'officeuserview/']);
                }
            }else{
            $this->Flash->error(__('Invalid username or password, try again'));
            }
        }
    }

    public function forgotpassword() {
        $this->viewBuilder()->setLayout('start');
        if ($this->request->is('post')) {
            $query = $this->Users->findByEmail($this->request->getData('email'));
            //    debug($query);
            //    echo "<pre>" ; echo print_r($query); echo "</pre>"; exit;
            $user = $query->first();
            //    debug($user);
            //    exit;
            if (is_null($user)) {
                $this->Flash->error('Email address does not exist. Please try again');
            } else {
                $passkey = uniqid();
                $url = Router::Url(['controller' => 'users', 'action' => 'reset'], true) . '/' . $passkey;
                $timeout = time() + DAY;
                if ($this->Users->updateAll(['passkey' => $passkey, 'timeout' => $timeout], ['id' => $user->id])) {
                    $this->sendResetEmail($url, $user);
                    $this->redirect(['action' => 'login']);
                } else {
                    $this->Flash->error('Error saving reset passkey/timeout');
                }
            }
        }
    }

    private function sendResetEmail($url, $user) {
        $email = new Email();
        $email->template('resetpw');
        $email->emailFormat('both');
        $email->from('no-reply@babita.gangtask.com');
        $email->to($user->email, $user->firstname);
        $email->subject('Reset your password');
        $email->viewVars(['url' => $url, 'username' => $user->firstname]);
        if ($email->send()) {
            $this->Flash->success(__('Check your email for your reset password link'));
        } else {
            $this->Flash->error(__('Error sending email: ') . $email->smtpError);
        }
    }

    public function reset($passkey = null) {
        $this->viewBuilder()->setLayout('start');
        if ($passkey) {
            $query = $this->Users->find('all', ['conditions' => ['passkey' => $passkey, 'timeout >' => time()]]);
            $user = $query->first();
            if ($user) {
                if (!empty($this->request->data)) {
                    $this->request->data['passkey'] = null;
                    $this->request->data['timeout'] = null;
                    $user = $this->Users->patchEntity($user, $this->request->data);
                    if ($this->Users->save($user)) {
                        $this->Flash->set(__('Your password has been updated.'));
                        return $this->redirect(array('action' => 'login'));
                    } else {
                        $this->Flash->error(__('The password could not be updated. Please, try again.'));
                    }
                }
            } else {
                $this->Flash->error('Invalid or expired passkey. Please check your email or try again');
                $this->redirect(['action' => 'forgotpassword']);
            }
            unset($user->password);
            $this->set(compact('user'));
        } else {
            $this->redirect('/');
        }
    }

    public function logout() {
        $this->Auth->logout();
        return $this->redirect(['action' => 'login']);
        //  return $this->redirect($this->Auth->logout());
    }

    public function index() {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $user = $this->Users->get($id);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $this->viewBuilder()->setLayout('start');

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
//			debug($user);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.Router::Url(['controller' => 'users', 'action' => 'reset'], true) . '/' . $passkey;
     */
    public function edit($id = null) {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['controller' => 'users', 'action' => 'list_office_user']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {

        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
            return $this->redirect(['controller' => 'users', 'action' => 'list_office_user']);
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function addOfficeUser() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            // Prior to 3.4.0 $this->request->data() was used.
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user['role'] = "officeuser";
            // You could also do the following
            //$newData = ['user_id' => $this->Auth->user('id')];
            //$article = $this->Articles->patchEntity($article, $newData);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Office user has been saved.'));
                return $this->redirect(['controller' => 'users', 'action' => 'list_office_user']);
            }
            $this->Flash->error(__('Unable to add office user.'));
        }
        $this->set('user', $user);
    }

    public function listOfficeUser() {
        $userdata = $this->Auth->user();
        $this->set('loggeduser', $userdata);
        $query = $this->Users->find('all')
                ->where(['Users.role =' => 'officeuser'])
                ->order(['Users.created' => 'DESC']);
        $users = $this->paginate($query);
        $this->set(compact('users'));
    }

    public function addApartmentManager() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            // Prior to 3.4.0 $this->request->data() was used.
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user['role'] = "apartmentmanager";
            // You could also do the following
            //$newData = ['user_id' => $this->Auth->user('id')];
            //$article = $this->Articles->patchEntity($article, $newData);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Apartment manager has been saved.'));
                return $this->redirect(['controller' => 'users', 'action' => 'list_apartment_manager']);
            }
            $this->Flash->error(__('Unable to add apartment manager.'));
        }
        $this->set('user', $user);
    }

    public function listApartmentManager() {
        $query = $this->Users->find('all')
                ->where(['Users.role =' => 'apartmentmanager'])
                ->order(['Users.created' => 'DESC']);

        $users = $this->paginate($query);
        $this->set(compact('users'));
    }

    public function addSubContractor() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user['role'] = "subcontractor";
            $uploadPath = 'img/users/';
            $fileupload = $this->request->getData('fileupload');
            if ($fileupload['error'] != 4) {
                $filedata_response = $this->uploadFile($fileupload, $uploadPath);
                if ($filedata_response != false) {
                    $user->fileupload = $filedata_response;
                }
            }
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Sub contractor has been saved.'));
                return $this->redirect(['controller' => 'users', 'action' => 'list_sub_contractor']);
            }
            $this->Flash->error(__('Unable to add sub contractor.'));
        }
        $this->set('user', $user);
    }

    private function uploadFile($fileupload, $uploadPath) {
        if ($fileupload['error'] > 0) {
            return false;
            //die('An error ocurred when uploading.');
        } else if ($fileupload['size'] > 500000) {
            return false;
            //die('File uploaded exceeds maximum upload size.');
        } else {
            $fileName = $fileupload['name'];
            $fileName = str_replace(' ', '_', $fileName);
            $fileName = date('mdYhis') . $fileName;
            // $uploadPath = 'files/pdf/';
            $uploadFile = $uploadPath . $fileName;
            //debug($uploadFile);
            if (move_uploaded_file($fileupload['tmp_name'], $uploadFile)) {
                return $uploadFile;
                //$pdf->file = $uploadFile;
            } else {
                return false;
            }
        }
    }

    public function listSubContractor() {
        $query = $this->Users->find('all')
                ->where(['Users.role =' => 'subcontractor'])
                ->order(['Users.created' => 'DESC']);

        $users = $this->paginate($query);
        $this->set(compact('users'));
    }

    public function addGeneralContractor() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            //       echo "<pre>" ; echo print_r($this->request->getData()) ; echo "</pre>" ; exit; 
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user['role'] = "generalcontractor";
            $mm_dir = new Folder(WWW_ROOT . 'img/upload_dir', true, 0755);
            $target_path = $mm_dir->pwd() . DS . $this->request->getData('image.name');
            move_uploaded_file($this->request->getData('image.tmp_name'), $target_path);
            $user->image = $this->request->getData('image.name');
            if ($this->Users->save($user)) {
                $this->Flash->success(__('General contractor has been saved.'));
                return $this->redirect(['controller' => 'users', 'action' => 'list_general_contractor']);
            }
            $this->Flash->error(__('Unable to add general contractor.'));
        }
        $this->set('user', $user);
    }

    public function listGeneralContractor() {
        $query = $this->Users->find('all')
                ->where(['Users.role =' => 'generalcontractor'])
                ->order(['Users.created' => 'DESC']);

        $users = $this->paginate($query);
        $this->set(compact('users'));
    }

    public function viewSubcontractor($id = null) {
        $user = $this->Users->get($id);

        $this->set('user', $user);
    }

    public function viewGeneralcontractor($id = null) {
        $user = $this->Users->get($id);

        $this->set('user', $user);
    }

    public function viewApartmentmanager($id = null) {
        $user = $this->Users->get($id);

        $this->set('user', $user);
    }

    public function editSubcontractor($id = null) {
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $uploadPath = 'img/users/';
            $fileupload = $this->request->getData('fileupload');
//            if ($fileupload['error'] != 4) {
//                $filedata_response = $this->uploadFile($fileupload, $uploadPath);
//                if ($filedata_response != false) {
//                    $user->fileupload = $filedata_response;
//                }
//            }
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['controller' => 'users', 'action' => 'listSubContractor']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function editProfile($id = null) {
        $user = $this->Users->get($id);

        $data = $this->request->getData();
//            $user->image
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usera = $this->Users->get($id);
            if ($data['image']['error'] == 4) {
                if ($usera['image'] != '') {
                    $user = $this->Users->patchEntity($user, $this->request->getData());
                    $user->image = $usera['image'];
                    if ($this->Users->save($user)) {
                        $userdata = $this->Users->get($user->id);
                        $this->Auth->setUser($userdata);
                        $userdateg = $this->Auth->user();
                        $this->set('loggeduser', $userdateg);
                        $this->Flash->success(__('The user has been saved.'));
                        if ($userdata['role'] == 'apartmentmanager') {
                            return $this->redirect([ 'controller' => 'properties', 'action' => 'listApartmentmanager/' . $userdata['id']]);
                        }
                        //echo "<script type='text/javascript'>alert('The user has been saved.');</script>";
                        //return $this->redirect(['controller' => 'users', 'action' => 'list_office_user']);
                    } else {
                        $this->Flash->error(__('The user could not be saved. Please, try again.'));
                    }
                } else {
                    $user = $this->Users->patchEntity($user, $this->request->getData());
                    if ($this->Users->save($user)) {
                        $userdata = $this->Users->get($user->id);
                        $this->Auth->setUser($userdata);
                        $userdateg = $this->Auth->user();
                        $this->set('loggeduser', $userdateg);
                        $this->Flash->success(__('The user has been saved.'));
                        if ($userdata['role'] == 'apartmentmanager') {
                            return $this->redirect([ 'controller' => 'properties', 'action' => 'listApartmentmanager/' . $userdata['id']]);
                        }
                        //echo "<script type='text/javascript'>alert('The user has been saved.');</script>";
                        //return $this->redirect(['controller' => 'users', 'action' => 'list_office_user']);
                    } else {
                        $this->Flash->error(__('The user could not be saved. Please, try again.'));
                    }
                }
            } else {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                $mm_dir = new Folder(WWW_ROOT . 'img/upload_dir', true, 0755);
                $validextensions = array("jpeg", "jpg", "png");
                $ext = explode('.', basename($data['image']['name']));
                $file_extension = end($ext);
                $unique = md5(uniqid());
                $target_path = $mm_dir->pwd() . DS . $unique . $data['image']['name'];
                move_uploaded_file($data['image']['tmp_name'], $target_path);
                $user->image = $unique . $data['image']['name'];
                if ($this->Users->save($user)) {
                    $userdata = $this->Users->get($user->id);
                    $this->Auth->setUser($userdata);
                    $userdateg = $this->Auth->user();
                    $this->set('loggeduser', $userdateg);


                    $this->Flash->success(__('The user has been saved.'));
                    if ($userdata['role'] == 'apartmentmanager') {
                        return $this->redirect([ 'controller' => 'properties', 'action' => 'listApartmentmanager/' . $userdata['id']]);
                    }
                    //echo "<script type='text/javascript'>alert('The user has been saved.');</script>";
                    //return $this->redirect(['controller' => 'users', 'action' => 'list_office_user']);
                } else {
                    $this->Flash->error(__('The user could not be saved. Please, try again.'));
                }
            }
        }
        //      $taxes = $this->Users->Taxes->find('list', ['limit' => 200]);
        $this->set(compact('user'));
    }

    public function editApartmentmanager($id = null) {
        $user = $this->Users->get($id);
//         print_r($user);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['controller' => 'users', 'action' => 'listApartmentManager']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        //      $taxes = $this->Users->Taxes->find('list', ['limit' => 200]);
        $this->set(compact('user'));
    }

    public function editGeneralcontractor($id = null) {
        $user = $this->Users->get($id);
//         print_r($user);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if (empty($this->request->data['image']['name']) && !empty($this->request->data['old_image'])) {
                $this->request->data['image'] = $this->request->data['old_image'];
                $user->image = $this->request->data['image'];
            } else if (!empty($this->request->data['image']['name']) && !empty($this->request->data['old_image'])) {

                $mm_dir = new Folder(WWW_ROOT . 'img/upload_dir', true, 0755);
                $target_path = $mm_dir->pwd() . DS . $this->request->data('image.name');

                move_uploaded_file($this->request->data('image.tmp_name'), $target_path);
                $user->image = $this->request->data('image.name');
            } else if (!empty($this->request->data('image.tmp_name')) && empty($this->request->data['old_image'])) {

                $mm_dir = new Folder(WWW_ROOT . 'salon_dir', true, 0755);
                $target_path = $mm_dir->pwd() . DS . $this->request->data('image.name');

                move_uploaded_file($this->request->data('image.tmp_name'), $target_path);
                $user->image = $this->request->data('image.name');
            }
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['controller' => 'users', 'action' => 'listGeneralContractor']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        //      $taxes = $this->Users->Taxes->find('list', ['limit' => 200]);
        $this->set(compact('user'));
    }

    public function deleteSubcontractor($id = null) {

        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
            return $this->redirect(['controller' => 'users', 'action' => 'listSubContractor']);
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function deleteGeneralcontractor($id = null) {

        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($user->image) {
            $img = $user['image'];
            $url = WWW_ROOT . 'img/upload_dir/' . $img;
            //    echo "<pre>" ; echo print_r($url); echo "</pre>"; exit;
            unlink($url);
        }
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
            return $this->redirect(['controller' => 'users', 'action' => 'listGeneralContractor']);
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function deleteApartmentmanager($id = null) {

        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
            return $this->redirect(['controller' => 'users', 'action' => 'listApartmentManager']);
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function changepassword($id = null) {
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->get($this->Auth->user('id'));
            if (!empty($this->request->getData())) {
                if ($this->request->getData('password1') == $this->request->getData('password2')) {
                    if ((new DefaultPasswordHasher)->check($this->request->getData('old_password'), $user->password)) {
                        $user = $this->Users->patchEntity($user, [
                            'password' => $this->request->getData('password1'),
                                ]);
                        if ($this->Users->save($user)) {
                            $this->Flash->success('The password is successfully changed');
                            $this->redirect('/users/login');
                        } else {
                            $this->Flash->error('There was an error during the save!');
                        }
                    } else {
                        $this->Flash->error('Old Password not matched');
                    }
                } else {
                    // $this->request->getData('password2')='';
                    $this->Flash->error('Confirm Password not matched with New Password');
                }
            }
            $this->set('user', $user);
        }
        //      $taxes = $this->Users->Taxes->find('list', ['limit' => 200]);
//        $this->set(compact('user'));
    }

}
