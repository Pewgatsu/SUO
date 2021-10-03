<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\ComputerCase;
use App\Models\CPU;
use App\Models\CPUCooler;
use App\Models\CPUSocket;
use App\Models\GraphicsCard;
use App\Models\MemorySpeed;
use App\Models\MOBOCase;
use App\Models\MOBOFormFactor;
use App\Models\MOBOMemorySpeed;
use App\Models\Motherboard;
use App\Models\PSU;
use App\Models\RAM;
use App\Models\SocketCooler;
use App\Models\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComponentsController extends Controller
{
    public function index_motherboards()
    {
        $motherboards = Motherboard::with(['component', 'memory_speeds'])->paginate(10);
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
        $cpu_coolers = CPUCooler::with(['component', 'cpu_sockets'])->paginate(10);
        $cpu_sockets = CPUSocket::all();

        return view('admin.components.index', [
            'cpu_coolers' => $cpu_coolers,
            'cpu_sockets' => $cpu_sockets
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
        $computer_cases = ComputerCase::with(['component', 'mobo_form_factors'])->paginate(10);
        $mobo_form_factors = MOBOFormFactor::all();

        return view('admin.components.index', [
            'computer_cases' => $computer_cases,
            'mobo_form_factors' => $mobo_form_factors
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
            // Remove Old Image
            if (isset($component->image_path) && file_exists(public_path('images/components/motherboards/' . $component->image_path))) {
                unlink(public_path('images/components/motherboards/' . $component->image_path));
            }

            // Image Upload
            $mobo_image_filename = time() . '-' . $request->mobo_name . '.' . $request->mobo_image->extension();
            $request->mobo_image->move(public_path('images/components/motherboards'), $mobo_image_filename);
        }

        // Component Attributes
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

        // Motherboard Attributes
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

        $component_speeds = MOBOMemorySpeed::where('component_id', $component->id)->get();
        $speeds = array();
        foreach ($component_speeds as $component_speed) {
            $speeds[] = $component_speed->memory_speed_id;
        }

        // Memory Speeds
        if ($speeds != $request->input('mobo_mem_speed_support_' . $component->id)) {
            if ($request->input('mobo_mem_speed_support_' . $component->id) === null) {
                MOBOMemorySpeed::where('component_id', $component->id)->delete();
            } else {
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
        }

        return back();
    }

    public function edit_cpu(Component $component, Request $request)
    {
        // validate
        $validator = Validator::make($request->all(), [
            // General Attributes
            'cpu_image' => 'nullable|image|max:5048',
            'cpu_name' => 'required|string',
            'cpu_manufacturer' => 'nullable|string',
            'cpu_series' => 'nullable|string',
            'cpu_model' => 'nullable|string',
            'cpu_color' => 'nullable|string',
            'cpu_length' => 'nullable|numeric|min:0',
            'cpu_width' => 'nullable|numeric|min:0',
            'cpu_height' => 'nullable|numeric|min:0',
            // Specific Attributes
            'cpu_socket' => 'required|string',
            'cpu_microarchitecture' => 'required|string',
            'cpu_core_count' => 'required|numeric|integer|min:0',
            'cpu_thread_count' => 'required|numeric|integer|min:0',
            'cpu_base_clock' => 'required|numeric|min:0',
            'cpu_boost_clock' => 'nullable|numeric|min:0',
            'cpu_max_mem_support' => 'nullable|numeric|min:0',
            'cpu_tdp' => 'required|numeric|min:0',
            'cpu_smt_support' => 'required|boolean',
            'cpu_ecc_support' => 'required|boolean',
            'cpu_integrated_graphics' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return back()->with('modal_id', 'edit_cpu_' . $component->id)->withErrors($validator)->withInput();
        }

        $validator->validate();

        if (isset($request->cpu_image)) {
            // Remove Old Image
            if (isset($component->image_path) && file_exists(public_path('images/components/cpus/' . $component->image_path))) {
                unlink(public_path('images/components/cpus/' . $component->image_path));
            }

            // Image Upload
            $cpu_image_filename = time() . '-' . $request->cpu_name . '.' . $request->cpu_image->extension();
            $request->cpu_image->move(public_path('images/components/cpus'), $cpu_image_filename);
        }

        // Component Attributes
        $component->image_path = $cpu_image_filename ?? $component->image_path ?? null;
        $component->name = $request->cpu_name;
        $component->type = 'CPU';
        $component->manufacturer = $request->cpu_manufacturer;
        $component->series = $request->cpu_series;
        $component->model = $request->cpu_model;
        $component->color = $request->cpu_color;
        $component->length = $request->cpu_length;
        $component->width = $request->cpu_width;
        $component->height = $request->cpu_height;

        if ($component->isDirty()) {
            $component->save();
        }

        // CPU Attributes
        $component->cpu->cpu_socket = $request->cpu_socket;
        $component->cpu->microarchitecture = $request->cpu_microarchitecture;
        $component->cpu->core_count = $request->cpu_core_count;
        $component->cpu->thread_count = $request->cpu_thread_count;
        $component->cpu->base_clock = $request->cpu_base_clock;
        $component->cpu->boost_clock = $request->cpu_boost_clock;
        $component->cpu->max_mem_support = $request->cpu_max_mem_support;
        $component->cpu->tdp = $request->cpu_tdp;
        $component->cpu->smt_support = $request->cpu_smt_support;
        $component->cpu->ecc_support = $request->cpu_ecc_support;
        $component->cpu->integrated_graphics = $request->cpu_integrated_graphics;

        if ($component->cpu->isDirty()) {
            $component->cpu->save();
        }

        return back();
    }

    public function edit_cpu_cooler(Component $component, Request $request)
    {
        // validate
        $validator = Validator::make($request->all(), [
            // General Attributes
            'cpu_cooler_image' => 'nullable|image|max:5048',
            'cpu_cooler_name' => 'required|string',
            'cpu_cooler_manufacturer' => 'nullable|string',
            'cpu_cooler_series' => 'nullable|string',
            'cpu_cooler_model' => 'nullable|string',
            'cpu_cooler_color' => 'nullable|string',
            'cpu_cooler_length' => 'nullable|numeric|min:0',
            'cpu_cooler_width' => 'nullable|numeric|min:0',
            'cpu_cooler_height' => 'nullable|numeric|min:0',
            // Specific Attributes
            'cpu_cooler_cpu_socket_' . $component->id => 'required|array',
            'cpu_cooler_fan_speed' => 'nullable',
            'cpu_cooler_noise_level' => 'nullable',
            'cpu_cooler_water_cooled' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return back()->with('modal_id', 'edit_cpu_cooler_' . $component->id)->withErrors($validator)->withInput();
        }

        $validator->validate();

        if (isset($request->cpu_cooler_image)) {
            // Remove Old Image
            if (isset($component->image_path) && file_exists(public_path('images/components/cpu_coolers/' . $component->image_path))) {
                unlink(public_path('images/components/cpu_coolers/' . $component->image_path));
            }

            // Image Upload
            $cpu_cooler_image_filename = time() . '-' . $request->cpu_cooler_name . '.' . $request->cpu_cooler_image->extension();
            $request->cpu_cooler_image->move(public_path('images/components/cpu_coolers'), $cpu_cooler_image_filename);
        }

        // Component Attributes
        $component->image_path = $cpu_cooler_image_filename ?? $component->image_path ?? null;
        $component->name = $request->cpu_cooler_name;
        $component->type = 'CPU Cooler';
        $component->manufacturer = $request->cpu_cooler_manufacturer;
        $component->series = $request->cpu_cooler_series;
        $component->model = $request->cpu_cooler_model;
        $component->color = $request->cpu_cooler_color;
        $component->length = $request->cpu_cooler_length;
        $component->width = $request->cpu_cooler_width;
        $component->height = $request->cpu_cooler_height;

        if ($component->isDirty()) {
            $component->save();
        }

        // CPU Cooler Attributes
        $component->cpu_cooler->fan_speed = $request->cpu_cooler_fan_speed;
        $component->cpu_cooler->noise_level = $request->cpu_cooler_noise_level;
        $component->cpu_cooler->water_cooled_support = $request->cpu_cooler_water_cooled;

        if ($component->cpu_cooler->isDirty()) {
            $component->cpu_cooler->save();
        }

        $component_sockets = SocketCooler::where('component_id', $component->id)->get();
        $sockets = array();
        foreach ($component_sockets as $component_socket) {
            $sockets[] = $component_socket->cpu_socket_id;
        }

        // CPU Sockets
        if ($sockets != $request->input('cpu_cooler_cpu_socket_' . $component->id)) {
            SocketCooler::where('component_id', $component->id)->delete();
            foreach ($request->input('cpu_cooler_cpu_socket_' . $component->id) as $cpu_socket) {
                $cpu_socket_id = $cpu_socket;
                if (!filter_var($cpu_socket, FILTER_VALIDATE_INT)) {
                    $cpu_socket_row = CPUSocket::create([
                        'name' => $cpu_socket
                    ]);
                    $cpu_socket_id = $cpu_socket_row->id;
                }
                SocketCooler::create([
                    'component_id' => $component->id,
                    'cpu_socket_id' => $cpu_socket_id
                ]);
            }
        }

        return back();
    }

    public function edit_graphics_card(Component $component, Request $request){
        // validate
        $validator = Validator::make($request->all(), [
            // General Attributes
            'graphics_card_image' => 'nullable|image|max:5048',
            'graphics_card_name' => 'required|string',
            'graphics_card_manufacturer' => 'nullable|string',
            'graphics_card_series' => 'nullable|string',
            'graphics_card_model' => 'nullable|string',
            'graphics_card_color' => 'nullable|string',
            'graphics_card_length' => 'nullable|numeric|min:0',
            'graphics_card_width' => 'nullable|numeric|min:0',
            'graphics_card_height' => 'nullable|numeric|min:0',
            // Specific Attributes
            'graphics_card_chipset' => 'required|string',
            'graphics_card_memory' => 'required|numeric|min:0',
            'graphics_card_memory_type' => 'required|string',
            'graphics_card_base_clock' => 'required|numeric|min:0',
            'graphics_card_boost_clock' => 'nullable|numeric|min:0',
            'graphics_card_interface' => 'required|string',
            'graphics_card_tdp' => 'required|numeric|integer|min:0',
            'graphics_card_multigraphics_support' => 'nullable|string',
            'graphics_card_frame_sync' => 'nullable|string',
            'graphics_card_dvi_port' => 'nullable|numeric|min:0|max:8',
            'graphics_card_hdmi_port' => 'nullable|numeric|min:0|max:8',
            'graphics_card_mini_hdmi_port' => 'nullable|numeric|min:0|max:8',
            'graphics_card_displayport_port' => 'nullable|numeric|min:0|max:8',
            'graphics_card_mini_displayport_port' => 'nullable|numeric|min:0|max:8',
            'graphics_card_e_slot_width' => 'nullable|numeric|min:0|max:8',
            'graphics_card_external_power' => 'nullable|string',
            'graphics_card_cooling' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return back()->with('modal_id', 'edit_graphics_card_' . $component->id)->withErrors($validator)->withInput();
        }

        $validator->validate();

        if (isset($request->graphics_card_image)) {
            // Remove Old Image
            if (isset($component->image_path) && file_exists(public_path('images/components/graphics_cards/' . $component->image_path))) {
                unlink(public_path('images/components/graphics_cards/' . $component->image_path));
            }

            // Image Upload
            $graphics_card_image_filename = time() . '-' . $request->graphics_card_name . '.' . $request->graphics_card_image->extension();
            $request->graphics_card_image->move(public_path('images/components/graphics_cards'), $graphics_card_image_filename);
        }

        // Component Attributes
        $component->image_path = $graphics_card_image_filename ?? $component->image_path ?? null;
        $component->name = $request->graphics_card_name;
        $component->type = 'Graphics Card';
        $component->manufacturer = $request->graphics_card_manufacturer;
        $component->series = $request->graphics_card_series;
        $component->model = $request->graphics_card_model;
        $component->color = $request->graphics_card_color;
        $component->length = $request->graphics_card_length;
        $component->width = $request->graphics_card_width;
        $component->height = $request->graphics_card_height;

        if ($component->isDirty()) {
            $component->save();
        }

        // Graphics Card Attributes
        $component->graphics_card->gpu_chipset = $request->graphics_card_chipset;
        $component->graphics_card->gpu_memory = $request->graphics_card_memory;
        $component->graphics_card->gpu_memory_type = $request->graphics_card_memory_type;
        $component->graphics_card->base_clock = $request->graphics_card_base_clock;
        $component->graphics_card->boost_clock = $request->graphics_card_boost_clock;
        $component->graphics_card->interface = $request->graphics_card_interface;
        $component->graphics_card->tdp = $request->graphics_card_tdp;
        $component->graphics_card->multigraphics_support = $request->graphics_card_multigraphics_support;
        $component->graphics_card->frame_sync = $request->graphics_card_frame_sync;
        $component->graphics_card->dvi_port = $request->graphics_card_dvi_port;
        $component->graphics_card->hdmi_port = $request->graphics_card_hdmi_port;
        $component->graphics_card->mini_hdmi_port = $request->graphics_card_mini_hdmi_port;
        $component->graphics_card->displayport_port = $request->graphics_card_displayport_port;
        $component->graphics_card->mini_displayport_port = $request->graphics_card_mini_displayport_port;
        $component->graphics_card->e_slot_width = $request->graphics_card_e_slot_width;
        $component->graphics_card->external_power = $request->graphics_card_external_power;
        $component->graphics_card->cooling = $request->graphics_card_cooling;

        if ($component->graphics_card->isDirty()) {
            $component->graphics_card->save();
        }

        return back();
    }

    public function edit_ram(Component $component, Request $request){
        // validate
        $validator = Validator::make($request->all(), [
            // General Attributes
            'ram_image' => 'nullable|image|max:5048',
            'ram_name' => 'required|string',
            'ram_manufacturer' => 'nullable|string',
            'ram_series' => 'nullable|string',
            'ram_model' => 'nullable|string',
            'ram_color' => 'nullable|string',
            'ram_length' => 'nullable|numeric|min:0',
            'ram_width' => 'nullable|numeric|min:0',
            'ram_height' => 'nullable|numeric|min:0',
            // Specific Attributes
            'ram_memory_type' => 'required|string',
            'ram_memory_speed' => 'required|numeric|min:0',
            'ram_memory_capacity' => 'required|numeric|min:0',
            'ram_form_factor' => 'required|string',
            'ram_modules' => 'nullable|string',
            'ram_voltage' => 'nullable|numeric|min:0',
            'ram_timings' => 'nullable|string',
            'ram_ecc_memory' => 'required|boolean',
            'ram_registered_memory' => 'required|boolean',
            'ram_heat_spreader' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return back()->with('modal_id', 'edit_ram_' . $component->id)->withErrors($validator)->withInput();
        }

        $validator->validate();

        if (isset($request->ram_image)) {
            // Remove Old Image
            if (isset($component->image_path) && file_exists(public_path('images/components/rams/' . $component->image_path))) {
                unlink(public_path('images/components/rams/' . $component->image_path));
            }

            // Image Upload
            $ram_image_filename = time() . '-' . $request->ram_name . '.' . $request->ram_image->extension();
            $request->ram_image->move(public_path('images/components/rams'), $ram_image_filename);
        }

        // Component Attributes
        $component->image_path = $ram_image_filename ?? $component->image_path ?? null;
        $component->name = $request->ram_name;
        $component->type = 'RAM';
        $component->manufacturer = $request->ram_manufacturer;
        $component->series = $request->ram_series;
        $component->model = $request->ram_model;
        $component->color = $request->ram_color;
        $component->length = $request->ram_length;
        $component->width = $request->ram_width;
        $component->height = $request->ram_height;

        if ($component->isDirty()) {
            $component->save();
        }

        // RAM Attributes
        $component->ram->memory_type = $request->ram_memory_type;
        $component->ram->memory_speed = $request->ram_memory_speed;
        $component->ram->memory_capacity = $request->ram_memory_capacity;
        $component->ram->memory_form_factor = $request->ram_form_factor;
        $component->ram->modules = $request->ram_modules;
        $component->ram->memory_voltage = $request->ram_voltage;
        $component->ram->memory_timings = $request->ram_timings;
        $component->ram->ecc = $request->ram_ecc_memory;
        $component->ram->registered = $request->ram_registered_memory;
        $component->ram->heat_spreader = $request->ram_heat_spreader;

        if ($component->ram->isDirty()) {
            $component->ram->save();
        }

        return back();
    }

    public function edit_storage(Component $component, Request $request){
        // validate
        $validator = Validator::make($request->all(), [
            // General Attributes
            'storage_image' => 'nullable|image|max:5048',
            'storage_name' => 'required|string',
            'storage_manufacturer' => 'nullable|string',
            'storage_series' => 'nullable|string',
            'storage_model' => 'nullable|string',
            'storage_color' => 'nullable|string',
            'storage_length' => 'nullable|numeric|min:0',
            'storage_width' => 'nullable|numeric|min:0',
            'storage_height' => 'nullable|numeric|min:0',
            // Specific Attributes
            'storage_type' => 'required|string',
            'storage_capacity' => 'required|numeric|min:0',
            'storage_interface' => 'required|string',
            'storage_form_factor' => 'required|string',
            'storage_cache' => 'nullable|numeric|min:0',
            'storage_nvme' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return back()->with('modal_id', 'edit_storage_' . $component->id)->withErrors($validator)->withInput();
        }

        $validator->validate();

        if (isset($request->storage_image)) {
            // Remove Old Image
            if (isset($component->image_path) && file_exists(public_path('images/components/storages/' . $component->image_path))) {
                unlink(public_path('images/components/storages/' . $component->image_path));
            }

            // Image Upload
            $storage_image_filename = time() . '-' . $request->storage_name . '.' . $request->storage_image->extension();
            $request->storage_image->move(public_path('images/components/storages'), $storage_image_filename);
        }

        // Component Attributes
        $component->image_path = $storage_image_filename ?? $component->image_path ?? null;
        $component->name = $request->storage_name;
        $component->type = 'Storage';
        $component->manufacturer = $request->storage_manufacturer;
        $component->series = $request->storage_series;
        $component->model = $request->storage_model;
        $component->color = $request->storage_color;
        $component->length = $request->storage_length;
        $component->width = $request->storage_width;
        $component->height = $request->storage_height;

        if ($component->isDirty()) {
            $component->save();
        }

        // Storage Attributes
        $component->storage->storage_type = $request->storage_type;
        $component->storage->storage_capacity = $request->storage_capacity;
        $component->storage->interface = $request->storage_interface;
        $component->storage->storage_form_factor = $request->storage_form_factor;
        $component->storage->storage_cache = $request->storage_cache;
        $component->storage->nvme = $request->storage_nvme;

        if ($component->storage->isDirty()) {
            $component->storage->save();
        }

        return back();
    }

    public function edit_psu(Component $component, Request $request){
        // validate
        $validator = Validator::make($request->all(), [
            // General Attributes
            'psu_image' => 'nullable|image|max:5048',
            'psu_name' => 'required|string',
            'psu_manufacturer' => 'nullable|string',
            'psu_series' => 'nullable|string',
            'psu_model' => 'nullable|string',
            'psu_color' => 'nullable|string',
            'psu_length' => 'nullable|numeric|min:0',
            'psu_width' => 'nullable|numeric|min:0',
            'psu_height' => 'nullable|numeric|min:0',
            // Specific Attributes
            'psu_form_factor' => 'required|string',
            'psu_wattage' => 'required|numeric|min:0',
            'psu_efficiency_rating' => 'required|string',
            'psu_modular' => 'required|string',
            'psu_atx_connector' => 'nullable|numeric|min:0|max:16',
            'psu_eps_connector' => 'nullable|numeric|min:0|max:16',
            'psu_sata_connector' => 'nullable|numeric|min:0|max:16',
            'psu_molex_connector' => 'nullable|numeric|min:0|max:16',
            'psu_pcie_8pin_connector' => 'nullable|numeric|min:0|max:16',
            'psu_pcie_62pin_connector' => 'nullable|numeric|min:0|max:16',
            'psu_pcie_6pin_connector' => 'nullable|numeric|min:0|max:16'
        ]);

        if ($validator->fails()) {
            return back()->with('modal_id', 'edit_psu_' . $component->id)->withErrors($validator)->withInput();
        }

        $validator->validate();

        if (isset($request->psu_image)) {
            // Remove Old Image
            if (isset($component->image_path) && file_exists(public_path('images/components/psus/' . $component->image_path))) {
                unlink(public_path('images/components/psus/' . $component->image_path));
            }

            // Image Upload
            $psu_image_filename = time() . '-' . $request->psu_name . '.' . $request->psu_image->extension();
            $request->psu_image->move(public_path('images/components/psus'), $psu_image_filename);
        }

        // Component Attributes
        $component->image_path = $psu_image_filename ?? $component->image_path ?? null;
        $component->name = $request->psu_name;
        $component->type = 'PSU';
        $component->manufacturer = $request->psu_manufacturer;
        $component->series = $request->psu_series;
        $component->model = $request->psu_model;
        $component->color = $request->psu_color;
        $component->length = $request->psu_length;
        $component->width = $request->psu_width;
        $component->height = $request->psu_height;

        if ($component->isDirty()) {
            $component->save();
        }

        // PSU Attributes
        $component->psu->psu_form_factor = $request->psu_form_factor;
        $component->psu->wattage = $request->psu_wattage;
        $component->psu->efficiency_rating = $request->psu_efficiency_rating;
        $component->psu->modular = $request->psu_modular;
        $component->psu->atx_connector = $request->psu_atx_connector;
        $component->psu->eps_connector = $request->psu_eps_connector;
        $component->psu->sata_connector = $request->psu_sata_connector;
        $component->psu->molex_4pin_connector = $request->psu_molex_connector;
        $component->psu->pcie_8pin_connector = $request->psu_pcie_8pin_connector;
        $component->psu->{'pcie_6+2pin_connector'} = $request->psu_pcie_62pin_connector;
        $component->psu->pcie_6pin_connector = $request->psu_pcie_6pin_connector;

        if ($component->psu->isDirty()) {
            $component->psu->save();
        }

        return back();
    }

    public function edit_computer_case(Component $component, Request $request){
        // validate
        $validator = Validator::make($request->all(), [
            // General Attributes
            'case_image' => 'nullable|image|max:5048',
            'case_name' => 'required|string',
            'case_manufacturer' => 'nullable|string',
            'case_series' => 'nullable|string',
            'case_model' => 'nullable|string',
            'case_color' => 'nullable|string',
            'case_length' => 'nullable|numeric|min:0',
            'case_width' => 'nullable|numeric|min:0',
            'case_height' => 'nullable|numeric|min:0',
            // Specific Attributes
            'case_type' => 'required|string',
            'case_mobo_form_factor_' . $component->id => 'required|array',
            'case_power_supply' => 'nullable|string',
            'case_power_supply_shroud' => 'required|boolean',
            'case_side_panel_window' => 'nullable|string',
            'case_water_cooled_support' => 'nullable|boolean',
            'case_cooler_clearance' => 'nullable|numeric|min:0',
            'case_graphics_clearance' => 'nullable|numeric|min:0',
            'case_psu_clearance' => 'nullable|numeric|min:0',
            'case_full_height_e_slot' => 'nullable|numeric|min:0|max:16',
            'case_half_height_e_slot' => 'nullable|numeric|min:0|max:16',
            'case_external_525_bay' => 'nullable|numeric|min:0|max:16',
            'case_external_350_bay' => 'nullable|numeric|min:0|max:16',
            'case_internal_350_bay' => 'nullable|numeric|min:0|max:16',
            'case_internal_250_bay' => 'nullable|numeric|min:0|max:16'
        ]);

        if ($validator->fails()) {
            return back()->with('modal_id', 'edit_computer_case_' . $component->id)->withErrors($validator)->withInput();
        }

        $validator->validate();

        if (isset($request->case_image)) {
            // Remove Old Image
            if (isset($component->image_path) && file_exists(public_path('images/components/computer_cases/' . $component->image_path))) {
                unlink(public_path('images/components/computer_cases/' . $component->image_path));
            }

            // Image Upload
            $case_image_filename = time() . '-' . $request->case_name . '.' . $request->case_image->extension();
            $request->case_image->move(public_path('images/components/computer_cases'), $case_image_filename);
        }

        // Component Attributes
        $component->image_path = $case_image_filename ?? $component->image_path ?? null;
        $component->name = $request->case_name;
        $component->type = 'Computer Case';
        $component->manufacturer = $request->case_manufacturer;
        $component->series = $request->case_series;
        $component->model = $request->case_model;
        $component->color = $request->case_color;
        $component->length = $request->case_length;
        $component->width = $request->case_width;
        $component->height = $request->case_height;

        if ($component->isDirty()) {
            $component->save();
        }

        // Computer Case Attributes
        $component->computer_case->case_type = $request->case_type;
        $component->computer_case->power_supply = $request->case_power_supply;
        $component->computer_case->power_supply_shroud = $request->case_power_supply_shroud;
        $component->computer_case->side_panel_window = $request->case_side_panel_window;
        $component->computer_case->water_cooled_support = $request->case_water_cooled_support;
        $component->computer_case->cooler_clearance = $request->case_cooler_clearance;
        $component->computer_case->graphics_clearance = $request->case_graphics_clearance;
        $component->computer_case->psu_clearance = $request->case_psu_clearance;
        $component->computer_case->full_height_e_slot = $request->case_full_height_e_slot;
        $component->computer_case->half_height_e_slot = $request->case_half_height_e_slot;
        $component->computer_case->external_525_bay = $request->case_external_525_bay;
        $component->computer_case->external_350_bay = $request->case_external_350_bay;
        $component->computer_case->internal_350_bay = $request->case_internal_350_bay;
        $component->computer_case->internal_250_bay = $request->case_internal_250_bay;

        if ($component->computer_case->isDirty()) {
            $component->computer_case->save();
        }

        $component_form_factors = MOBOCase::where('component_id', $component->id)->get();
        $form_factors = array();
        foreach ($component_form_factors as $component_form_factor) {
            $form_factors[] = $component_form_factor->mobo_form_factor_id;
        }

        // MOBO Form Factors
        if ($form_factors != $request->input('case_mobo_form_factor_' . $component->id)) {
            MOBOCase::where('component_id', $component->id)->delete();
            foreach ($request->input('case_mobo_form_factor_' . $component->id) as $mobo_form_factor) {
                $mobo_form_factor_id = $mobo_form_factor;
                if (!filter_var($mobo_form_factor, FILTER_VALIDATE_INT)) {
                    $mobo_form_factor_row = MOBOFormFactor::create([
                        'name' => $mobo_form_factor
                    ]);
                    $mobo_form_factor_id = $mobo_form_factor_row->id;
                }
                MOBOCase::create([
                    'component_id' => $component->id,
                    'mobo_form_factor_id' => $mobo_form_factor_id
                ]);
            }
        }

        return back();
    }

    public function delete_component(Component $component)
    {
        $profile_path = '';
        switch ($component->type) {
            case 'Motherboard':
                $profile_path = 'images/components/motherboards/';
                break;
            case 'CPU':
                $profile_path = 'images/components/cpus/';
                break;
            case 'CPU Cooler':
                $profile_path = 'images/components/cpu_coolers/';
                break;
            case 'Graphics Card':
                $profile_path = 'images/components/graphics_cards/';
                break;
            case 'RAM':
                $profile_path = 'images/components/rams/';
                break;
            case 'Storage':
                $profile_path = 'images/components/storages/';
                break;
            case 'PSU':
                $profile_path = 'images/components/psus/';
                break;
            case 'Computer Case':
                $profile_path = 'images/components/computer_cases/';
                break;
            default:
                $profile_path = null;
        }

        // Delete Image
        if (isset($component->image_path) && file_exists(public_path($profile_path . $component->image_path))) {
            unlink(public_path($profile_path . $component->image_path));
        }

        $component->delete();

        return back();
    }
}
