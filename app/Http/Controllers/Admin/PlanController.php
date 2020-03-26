<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\StoreUpdatePlan;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;


class PlanController extends Controller
{
    private $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }



    public function create()
    {
        return view('admin.pages.plans.create');
    }

    public function store( StoreUpdatePlan $request)
    {
        $data = $request->all();
        $data['url'] = Str::kebab($request->name);
        $this->repository->create($data);

        return redirect()->route('plans.index');
    }

    public function index()
    {
        $plans = $this->repository->latest()->paginate(12);

        return view('admin.pages.plans.index', [
            'plans' => $plans,
        ]);
    }

    public function show($url)
    {
        $plan = $this->repository->where('url', $url)->first();//Pegar no banco o plano pelo ID na URL da pagina
        if (!$plan)// se der errado, ( nao tiver encontrado nada no $plan
        {
            return redirect()->back();
        }//retorna para pagina anterior

        return view('admin.pages.plans.show', [
            'plan' => $plan
        ]);
    }

    public function destroy($url)
    {
        $plan = $this->repository->where('url', $url)->first();//Pegar no banco o plano pelo ID na URL da pagina

        if (!$plan)// se der errado, ( nao tiver encontrado nada no $plan
        {
            return redirect()->back();
        }//retorna para pagina anterior

        $plan->delete();
        return redirect()->route('plans.index');
    }


    public function update( StoreUpdatePlan $request, $url)
    {
        $plan = $this->repository->where('url', $url)->first();
    dd($plan);
    die;
        if (!$plan) {
            return redirect()->back();
        }

        $plan->update($request->all());
        return redirect()->route('plans.index');
    }

    public function search(Request $request)
    {

        $filters = $request->except('_token');

        $plans = $this->repository->search($request->filter);
        return view('admin.pages.plans.index', [
            'plans' => $plans,
            'filters' => $filters,
        ]);
    }

    public function edit($url)
    {
        $plan = $this->repository->where('url',
            $url)->first(); //Buscar pela URL no banco de ddos e armazenar dentro de $plan

        if (!$plan) {
            return redirect()->back();
        }

        return view('admin.pages.plans.edit', [
            'plan' => $plan
        ]);
    }
}
