<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Component;
use App\Models\ComputerCase;
use App\Models\CPU;
use App\Models\CPUCooler;
use App\Models\GraphicsCard;
use App\Models\Motherboard;
use App\Models\PSU;
use App\Models\RAM;
use App\Models\Storage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $accounts = Account::latest()->get();
        $components = Component::latest()->get();
        $motherboards = Motherboard::get();
        $cpus = CPU::get();
        $cpu_coolers = CPUCooler::get();
        $graphics_cards = GraphicsCard::get();
        $rams = RAM::get();
        $storages = Storage::get();
        $psus = PSU::get();
        $computer_cases = ComputerCase::get();

        return view('dashboard.index',[
            'accounts' => $accounts,
            'components' => $components,
            'motherboards' => $motherboards,
            'cpus' => $cpus,
            'cpu_coolers' => $cpu_coolers,
            'graphics_cards' => $graphics_cards,
            'rams' => $rams,
            'storages' => $storages,
            'psus' => $psus,
            'computer_cases' => $computer_cases
        ]);
    }

    public function add_motherboard(){

    }

    public function add_cpu(){

    }

    public function add_cpu_cooler(){

    }

    public function add_graphics_card(){

    }

    public function add_ram(){

    }

    public function add_storage(){

    }

    public function add_psu(){

    }

    public function add_computer_case(){

    }
}
