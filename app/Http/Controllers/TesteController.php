<?php

namespace App\Http\Controllers;

use App\Models\SocioExample;
use App\Models\Socios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TesteController extends Controller
{
    public function index(){
        
        // primeiro metodo so que criando uma model
        $model = new Socios;
        $partners = $model->getPartners();
        
        // DB::insert("INSERT INTO socios VALUES(0, ?, ?, NOW(), NOW())", ['Nathalia Errado', '4784876427']);
        // DB::update("UPDATE socios SET name = ? WHERE id = ?", ['Matheus Wilberstaedt', 1]);
        // DB::delete("DELETE FROM socios WHERE id = ?", [5]);
        // $partners = DB::select("SELECT * FROM socios");
        // $countPartners = DB::select("SELECT COUNT(*) total FROM socios");
        
        // $resultado = DB::table('socios')->get(*posso passar a coluna da tabela q eu quero*)->all(); segundo metodo
        // $resultado = SocioExample::all(); traz um array com muita coisa inutil mas se eu fizer um foreach e pegar $resultado->name funciona normal, esse é o terceiro metodo eloquent orm, cirando a model atraves do artisan

        $data = [
            'show' => true,
            'message' => "Número de sócios: " . count($partners),
            'partners' => $partners
        ];

        return view('home', $data);

    }

    public function services() {
        return view('services');
    }
    
    public function galery($paginate = 1) {
        $data = [
            'paginate' => $paginate
        ];

        return view('galery', $data);
    }
    
    public function contacts() {
        return view('contacts');
    }

    public function register() {
        return view('register');
    }

    public function register_partners(Request $request) {
        $request->validate(
            [
                'name' => 'required',
                'phone' => 'required'
            ],
            [
                'name.required' => 'Nome é um campo obrigatório!',
                'phone.required' => 'Telefone é um campo obrigatório!'
            ]
        );
        $name = $request->input('name');
        $phone = $request->input('phone'); //se eu adicionar outro parametro seria o valor default

        $model = new Socios;
        $partners = $model->getPartners();
        $model->insertPartners($name, $phone);
        
        $data = [
            'show' => true,
            'message' => "Número de sócios: " . count($partners),
            'partners' => $partners
        ];

        return view('home', $data);
    }

    public function session(Request $request) {
        //criando sessao
        $request->session()->put([
            'usuario' => 'admin',
            'role' => 'admin'
        ]);

        //apresentando sessao
        echo $request->session()->get('usuario', 'default');

        //limpando sessao
        $request->session()->forget(['usuario', 'role']); //string ou array

        //global
        session()->put('usuario', 'admin');

        //flash data
        session()->flash('message', 'Dados atualizados com sucesso!'); //essa informação so vai aparecer no proximo request, apos um refresh ele limpa
    }
}

