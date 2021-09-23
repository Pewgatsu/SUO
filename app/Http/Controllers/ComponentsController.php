<?php

namespace App\Http\Controllers;

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

class ComponentsController extends Controller
{
    public function index_motherboards()
    {
        $motherboards = Motherboard::with('component')->paginate(10);
        return view('admin.components.index', [
            'motherboards' => $motherboards
        ]);
    }

    public function index_cpus()
    {
        $cpus = CPU::with('component')->paginate(10);
        return view('admin.components.index', [
            'cpus' => $cpus
        ]);
    }

    public function index_cpu_coolers()
    {
        $cpu_coolers = CPUCooler::with('component')->paginate(10);
        return view('admin.components.index', [
            'cpu_coolers' => $cpu_coolers
        ]);
    }

    public function index_graphics_cards()
    {
        $graphics_cards = GraphicsCard::with('component')->paginate(10);
        return view('admin.components.index', [
            'graphics_cards' => $graphics_cards
        ]);
    }

    public function index_rams()
    {
        $rams = RAM::with('component')->paginate(10);
        return view('admin.components.index', [
            'rams' => $rams
        ]);
    }

    public function index_storages()
    {
        $storages = Storage::with('component')->paginate(10);
        return view('admin.components.index', [
            'storages' => $storages
        ]);
    }

    public function index_psus()
    {
        $psus = PSU::with('component')->paginate(10);
        return view('admin.components.index', [
            'psus' => $psus
        ]);
    }

    public function index_computer_cases()
    {
        $computer_cases = ComputerCase::with('component')->paginate(10);
        return view('admin.components.index', [
            'computer_cases' => $computer_cases
        ]);
    }

    public function delete_component(Component $component)
    {
        $component->delete();
        return back();
    }
}
