<?php

namespace App\Controllers;

use App\Models\StudentsModel;

class StudentController extends BaseController
{
    private  $studentsModel;

    public function __construct()
    {
        helper(['url', 'Form', 'Image']);
        $this->studentsModel = new StudentsModel();
    }

    public function index()
    {
        return view('welcome_message');
    }

    public function list()
    {
        $students = $this->studentsModel->paginate(6);
        $data = [
            'students' => $students,
            'pager' => $this->studentsModel->pager
        ];
        return view('students/list', $data);
    }

    // cadastrar aluno
    public function create()
    {
        return view('students/create');
    }

    // ação de salvar
    public function save()
    {
        // vamos validar o request
        $validation = $this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'O campo nome è obrigatorio'
                ]
            ],
            'address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'O campo endereço è obrigatorio',
                ]
            ],
        ]);

        if (!$validation) {
            return view('students/create', ['validation' => $this->validator]);
        } else {
            //salvar o usuario
            $name = ucwords($this->request->getPost('name'));
            $address = ucwords($this->request->getPost('address'));
            $nameFile = 'default.jpeg';

            $file = $this->request->getFile('imagen');

            if ($file->isValid() && !$file->hasMoved()) {
                $path = './uploads/images/';
                $nameFile = $file->getName();
                $file->move($path);
            }


            $values = [
                'name' => $name,
                'address' => $address,
                'imagen' => $nameFile
            ];
            $studentModel = new StudentsModel();
            $query = $studentModel->insert($values);

            if (!$query) {
                return redirect()->back()->with('fail', 'Não é possivél criar o usuario');
            } else {
                return redirect()->back()->with('success', 'Cadastrado com successo ');
            }
        }
    }

    // chamar a view para editar
    public function edit($id)
    {
        $student = $this->studentsModel->find($id);
        $data = [
            'student' =>  $student
        ];
        return view('students/edit', $data);
    }

    // ação de editar
    public function editAction()
    {

        $values = [];
        $foto = $this->request->getFile('imagen');
        $validation = $this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'O campo nome è obrigatorio'
                ]
            ],
            'address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'O campo endereço è obrigatorio',
                ]
            ],
        ]);

        if (!$validation) {
            return view('students/edit', ['validation' => $this->validator]);
        } else {
            //salvar o usuario
            $name =  ucwords($this->request->getPost('name'));
            $address = ucwords($this->request->getPost('address'));
            $file = $this->request->getFile('imagen');
            $id = $this->request->getPost('idStudent');

            $values = [
                'name' => $name,
                'address' => $address,
            ];

            if ($file != '') {
                if ($file->isValid() && !$file->hasMoved()) {
                    $path = './uploads/images/';
                    $nameFile = $file->getName();
                    $file->move($path);
                }
                $values['imagen'] = $nameFile;
            }

            $studentModel = new StudentsModel();

            $query = $studentModel->update($id, $values);

            if (!$query) {
                return redirect()->back()->with('fail', 'Não é possivél criar o usuario');
            } else {
                return redirect()->back()->with('success', 'Atualizado com successo ');
            }
        }
    }

    // excluir aluno
    public function delete($id)
    {
        $student = $this->studentsModel->find($id);
        if ($student) {
            $this->studentsModel->delete($id);
            return redirect()->back()->with('success', 'deletado com successo ');
        } else {
            return redirect()->back()->with('fail', 'Não é deleta o registro');
        }
    }
}
