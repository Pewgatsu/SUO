<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\ComputerCase;
use App\Models\CPU;
use App\Models\CPUCooler;
use App\Models\GraphicsCard;
use App\Models\MemorySpeed;
use App\Models\MOBOMemorySpeed;
use App\Models\Motherboard;
use App\Models\PSU;
use App\Models\RAM;
use App\Models\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComponentsController extends Controller
{
    public function index_motherboards()
    {
        $motherboards = Motherboard::with(['component','memory_speeds'])->paginate(10);
        $memory_speeds = MemorySpeed::all();

        return view('admin.components.index', [
            'motherboards' => $motherboards,
            'memory_speeds' => $memory_speeds
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

    public function edit_motherboard(Component $component, Request $request)
    {
        // validate
        $validator = Validator::make($request->all(), [
            // General Attributes
            'mobo_image' => 'nullable|image|max:5048',
            'mobo_name' => 'required|string',
            'mobo_manufacturer' => 'nullable|string',
            'mobo_series' => 'nullable|string',
            'mobo_model' => 'nullable|string',
            'mobo_color' => 'nullable|string',
            'mobo_length' => 'nullable|numeric|min:0',
            'mobo_width' => 'nullable|numeric|min:0',
            'mobo_height' => 'nullable|numeric|min:0',
            // Specific Attributes
            'mobo_cpu_socket' => 'required|string',
            'mobo_form_factor' => 'required|string',
            'mobo_chipset' => 'required|string',
            'mobo_memory_slot' => 'required|numeric|min:0|max:16',
            'mobo_memory_type' => 'required|string',
            'mobo_max_mem_support' => 'nullable|numeric|min:0',
            'mobo_mem_speed_support_' . $component->id => 'nullable|array',
            'mobo_pcie_x16_slot' => 'nullable|numeric|min:0|max:16',
            'mobo_pcie_x8_slot' => 'nullable|numeric|min:0|max:16',
            'mobo_pcie_x4_slot' => 'nullable|numeric|min:0|max:16',
            'mobo_pcie_x1_slot' => 'nullable|numeric|min:0|max:16',
            'mobo_pci_slot' => 'nullable|numeric|min:0|max:16',
            'mobo_m2_slot' => 'nullable|numeric|min:0|max:16',
            'mobo_sata_6gb_slot' => 'nullable|numeric|min:0|max:16',
            'mobo_sata_3gb_slot' => 'nullable|numeric|min:0|max:16',
            'mobo_multigraphics_support' => 'nullable|string',
            'mobo_ecc_support' => 'required|boolean',
            'mobo_raid_support' => 'required|boolean',
            'mobo_wireless_support' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return back()->with('modal_id', 'edit_motherboard_' . $component->id)->withErrors($validator)->withInput();
        }

        $validator->validate();

        if (isset($request->mobo_image)) {
            // Image Upload
            $mobo_image_filename = time() . '-' . $request->mobo_name . '.' . $request->mobo_image->extension();
            $request->mobo_image->move(public_path('images/motherboards'), $mobo_image_filename);
        }

        $component->image_path = $mobo_image_filename ?? $component->image_path ?? null;
        $component->name = $request->mobo_name;
        $component->type = 'Motherboard';
        $component->manufacturer = $request->mobo_manufacturer;
        $component->series = $request->mobo_series;
        $component->model = $request->mobo_model;
        $component->color = $request->mobo_color;
        $component->length = $request->mobo_length;
        $component->width = $request->mobo_width;
        $component->height = $request->mobo_height;

        if ($component->isDirty()) {
            $component->save();
        }

        $component->motherboard->cpu_socket = $request->mobo_cpu_socket;
        $component->motherboard->mobo_form_factor = $request->mobo_form_factor;
        $component->motherboard->mobo_chipset = $request->mobo_chipset;
        $component->motherboard->memory_slot = $request->mobo_memory_slot;
        $component->motherboard->memory_type = $request->mobo_memory_type;
        $component->motherboard->max_mem_support = $request->mobo_max_mem_support;
        $component->motherboard->pcie_x16_slot = $request->mobo_pcie_x16_slot;
        $component->motherboard->pcie_x8_slot = $request->mobo_pcie_x8_slot;
        $component->motherboard->pcie_x4_slot = $request->mobo_pcie_x4_slot;
        $component->motherboard->pcie_x1_slot = $request->mobo_pcie_x1_slot;
        $component->motherboard->pci_slot = $request->mobo_pci_slot;
        $component->motherboard->m2_slot = $request->mobo_m2_slot;
        $component->motherboard->sata_6gb_slot = $request->mobo_sata_6gb_slot;
        $component->motherboard->sata_3gb_slot = $request->mobo_sata_3gb_slot;
        $component->motherboard->multigraphics_support = $request->mobo_multigraphics_support;
        $component->motherboard->ecc_support = $request->mobo_ecc_support;
        $component->motherboard->raid_support = $request->mobo_raid_support;
        $component->motherboard->wireless_support = $request->mobo_wireless_support;

        if ($component->motherboard->isDirty()) {
            $component->motherboard->save();
        }

        if (MOBOMemorySpeed::find($component->id) === null &&
            $request->input('mobo_mem_speed_support_' . $component->id) === null) {
            // Do Nothing
        } elseif (MOBOMemorySpeed::find($component->id) !== null &&
            $request->input('mobo_mem_speed_support_' . $component->id) === null) {
            MOBOMemorySpeed::where('component_id', $component->id)->delete();
        } elseif ($request->input('mobo_mem_speed_support_' . $component->id) !== null) {
            MOBOMemorySpeed::where('component_id', $component->id)->delete();
            foreach ($request->input('mobo_mem_speed_support_' . $component->id) as $memory_speed) {
                $memory_speed_id = $memory_speed;
                if (!filter_var($memory_speed, FILTER_VALIDATE_INT)) {
                    $memory_speed_row = MemorySpeed::create([
                        'name' => $memory_speed
                    ]);
                    $memory_speed_id = $memory_speed_row->id;
                }
                MOBOMemorySpeed::create([
                    'component_id' => $component->id,
                    'memory_speed_id' => $memory_speed_id
                ]);
            }
        }

        return back();
    }

    public function delete_component(Component $component)
    {
        $component->delete();
        return back();
    }
}
