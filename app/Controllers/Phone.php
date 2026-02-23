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