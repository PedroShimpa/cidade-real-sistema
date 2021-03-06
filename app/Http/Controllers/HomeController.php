<?php

namespace App\Http\Controllers;

use App\Models\Eventos\EventosModel;
use App\Models\Staff\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     * 
     */

    protected $eventos;
    protected $user;

    public function __construct(EventosModel $eventos, User $user)
    {
        $this->middleware('auth');
        $this->eventos = $eventos;
        $this->user = $user;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usersCount = $this->user->count();
        $eventosCount = $this->eventos->where('status', 1)->count();
        $eventosToday = $this->eventos->whereDate('created_at', Carbon::today())->count();
        $usuariosAtivos = $this->user->whereDate('ultimo_login',Carbon::today())->count();
        $usuariosAtivosNow = $this->user->getAtivosAgora();
        $eventosDoMes = $this->eventos->getCountEventosDoMes();
        $data = compact('eventosCount', 'usersCount', 'eventosToday', 'usuariosAtivos', 'eventosDoMes', 'usuariosAtivosNow');
        return view('home', compact('data'));
    }
}
