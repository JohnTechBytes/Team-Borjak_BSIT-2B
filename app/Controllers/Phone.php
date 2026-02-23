<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\LogModel;
use App\Models\PhoneModel;


class Phone extends Controller
{
   public function index() {
        $model = new PhoneModel();
        $data['phone'] = $model->findAll();
        return view('phone/index', $data);
    }

     public function save() {
      
        $name     = $this->request->getPost('name');
        $brand    = $this->request->getPost('brand');
        $color = $this->request->getPost('color');
        $userModel = new PhoneModel();
        $logModel = new LogModel();


        $data = [
            'name'       => $name,
            'color'      => $color,
            'brand'       => $brand
        ];

        if ($userModel->insert($data)) {
            $logModel->addLog('New User added: ' . $name, 'ADD');
            return $this->response->setJSON(['status' => 'success']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to save user']);
        }
    }

     public function update() {
        $model = new PhoneModel();
        $logModel = new LogModel();

        $userId   = $this->request->getPost('id');
        $name     = $this->request->getPost('name');
        $brand    = $this->request->getPost('brand');
        $color = $this->request->getPost('color');
       
        $userData = [
            'name'       => $name,
            'brand'      => $brand,
            'color'       => $color,
      
        ];

        if (!empty($password)) {
            $userData['password'] = password_hash('password', 'PASSWORD_BCRYPT');
        }

        if ($model->update($userId, $userData)) {
            $logModel->addLog('User updated: ' . $name, 'UPDATED');
            return $this->response->setJSON(['success' => true, 'message' => 'User updated successfully.']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Error updating user.']);
        }
    }

    public function edit($id) {
        $model = new PhoneModel();
        $user = $model->find($id);

        if ($user) {
            return $this->response->setJSON(['data' => $user]);
        } else {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'User not found']);
        }
    }

     public function delete($id) {
        $model = new PhoneModel();
        $logModel = new LogModel();

        if ($model->delete($id)) {
            $logModel->addLog('Deleted user ID: ' . $id, 'DELETED');
            return $this->response->setJSON(['success' => true, 'message' => 'User deleted successfully.']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to delete user.']);
        }
    }

    
      public function fetchRecords() {
        $request = service('request');
        $model = new PhoneModel();

        $start = $request->getPost('start') ?? 0;
        $length = $request->getPost('length') ?? 10;
        $searchValue = $request->getPost('search')['value'] ?? '';

        $totalRecords = $model->countAll();
        $result = $model->getRecords($start, $length, $searchValue);

        $data = [];
        $counter = $start + 1;
        foreach ($result['data'] as $row) {
            $data[] = [
                'row_number' => $counter++,
                'id'         => $row['id'],
                'name'       => $row['name'] ?? '',
                'brand'      => $row['brand'] ?? '',
                'color'      => $row['color'] ?? '',
           
            ];
        }

        return $this->response->setJSON([
            'draw'            => intval($request->getPost('draw')),
            'recordsTotal'    => $totalRecords,
            'recordsFiltered' => $result['filtered'],
            'data'            => $data,
        ]);
    }
  
}