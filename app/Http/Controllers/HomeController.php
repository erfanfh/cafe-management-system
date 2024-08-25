<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request): View|Factory|Application
    {
        $tables = Table::all();

        return view('home', ['tables' => $tables]);
    }
}
