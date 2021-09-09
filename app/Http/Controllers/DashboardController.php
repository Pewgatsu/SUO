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

        return view('dashboard.index', [
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

    public function add_motherboard(Request $request)
    {
        // validate
        $this->validate($request, [
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
            'mobo_mem_speed_support' => 'nullable|string',
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

        // Image Upload
        $mobo_image_filename = time().'-'.$request->mobo_name.'.'.$request->mobo_image->extension();

        $request->mobo_image->move(public_path('images/motherboards'), $mobo_image_filename);

        // Store
        $component = Component::create([
            'image_path' => $mobo_image_filename,
            'name' => $request->mobo_name,
            'manufacturer' => $request->mobo_manufacturer,
            'series' => $request->mobo_series,
            'model' => $request->mobo_model,
            'color' => $request->mobo_color,
            'length' => $request->mobo_length,
            'width' => $request->mobo_width,
            'height' => $request->mobo_height
        ]);

        Motherboard::create([
            'component_id' => $component->id,
            'cpu_socket' => $request->mobo_cpu_socket,
            'mobo_form_factor' => $request->mobo_form_factor,
            'mobo_chipset' => $request->mobo_chipset,
            'memory_slot' => $request->mobo_memory_slot,
            'memory_type' => $request->mobo_memory_type,
            'max_mem_support' => $request->mobo_max_mem_support,
            'mem_speed_support' => $request->mobo_mem_speed_support,
            'pcie_x16_slot' => $request->mobo_pcie_x16_slot,
            'pcie_x8_slot' => $request->mobo_pcie_x8_slot,
            'pcie_x4_slot' => $request->mobo_pcie_x4_slot,
            'pcie_x1_slot' => $request->mobo_pcie_x1_slot,
            'pci_slot' => $request->mobo_pci_slot,
            'm2_slot' => $request->mobo_m2_slot,
            'sata_6gb_slot' => $request->mobo_sata_6gb_slot,
            'sata_3gb_slot' => $request->mobo_sata_3gb_slot,
            'multigraphics_support' => $request->mobo_multigraphics_support,
            'ecc_support' => $request->mobo_ecc_support,
            'raid_support' => $request->mobo_raid_support,
            'wireless_support' => $request->mobo_wireless_support
        ]);

        return redirect()->route('dashboard');
    }

    public function add_cpu(Request $request)
    {
        // validate
        $this->validate($request, [
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

        // Image Upload
        $cpu_image_filename = time().'-'.$request->cpu_name.'.'.$request->cpu_image->extension();

        $request->cpu_image->move(public_path('images/cpus'), $cpu_image_filename);

        // Store
        $component = Component::create([
            'image_path' => $cpu_image_filename,
            'name' => $request->cpu_name,
            'manufacturer' => $request->cpu_manufacturer,
            'series' => $request->cpu_series,
            'model' => $request->cpu_model,
            'color' => $request->cpu_color,
            'length' => $request->cpu_length,
            'width' => $request->cpu_width,
            'height' => $request->cpu_height
        ]);

        CPU::create([
            'component_id' => $component->id,
            'cpu_socket' => $request->cpu_socket,
            'microarchitecture' => $request->cpu_microarchitecture,
            'core_count' => $request->cpu_core_count,
            'thread_count' => $request->cpu_thread_count,
            'base_clock' => $request->cpu_base_clock,
            'boost_clock' => $request->cpu_boost_clock,
            'max_mem_support' => $request->cpu_max_mem_support,
            'tdp' => $request->cpu_tdp,
            'smt_support' => $request->cpu_smt_support,
            'ecc_support' => $request->cpu_ecc_support,
            'integrated_graphics' => $request->cpu_integrated_graphics
        ]);

        return redirect()->route('dashboard');
    }

    public function add_cpu_cooler(Request $request)
    {
        // validate
        $this->validate($request, [
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
            'cpu_cooler_cpu_socket' => 'required|string',
            'cpu_cooler_fan_speed' => 'nullable',
            'cpu_cooler_noise_level' => 'nullable',
            'cpu_cooler_water_cooled' => 'nullable|string'
        ]);

        // Image Upload
        $cpu_cooler_image_filename = time().'-'.$request->cpu_cooler_name.'.'.$request->cpu_cooler_image->extension();

        $request->cpu_cooler_image->move(public_path('images/cpu_coolers'), $cpu_cooler_image_filename);

        // Store
        $component = Component::create([
            'image_path' => $cpu_cooler_image_filename,
            'name' => $request->cpu_cooler_name,
            'manufacturer' => $request->cpu_cooler_manufacturer,
            'series' => $request->cpu_cooler_series,
            'model' => $request->cpu_cooler_model,
            'color' => $request->cpu_cooler_color,
            'length' => $request->cpu_cooler_length,
            'width' => $request->cpu_cooler_width,
            'height' => $request->cpu_cooler_height
        ]);

        CPUCooler::create([
            'component_id' => $component->id,
            'cpu_socket' => $request->cpu_cooler_cpu_socket,
            'fan_speed' => $request->cpu_cooler_fan_speed,
            'noise_level' => $request->cpu_cooler_noise_level,
            'water_cooled_support' => $request->cpu_cooler_water_cooled
        ]);

        return redirect()->route('dashboard');
    }

    public function add_graphics_card(Request $request)
    {
        // validate
        $this->validate($request, [
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

        // Image Upload
        $graphics_card_image_filename = time().'-'.$request->graphics_card_name.'.'.$request->graphics_card_image->extension();

        $request->graphics_card_image->move(public_path('images/graphics_cards'), $graphics_card_image_filename);

        // Store
        $component = Component::create([
            'image_path' => $graphics_card_image_filename,
            'name' => $request->graphics_card_name,
            'manufacturer' => $request->graphics_card_manufacturer,
            'series' => $request->graphics_card_series,
            'model' => $request->graphics_card_model,
            'color' => $request->graphics_card_color,
            'length' => $request->graphics_card_length,
            'width' => $request->graphics_card_width,
            'height' => $request->graphics_card_height
        ]);

        GraphicsCard::create([
            'component_id' => $component->id,
            'gpu_chipset' => $request->graphics_card_chipset,
            'gpu_memory' => $request->graphics_card_memory,
            'gpu_memory_type' => $request->graphics_card_memory_type,
            'base_clock' => $request->graphics_card_base_clock,
            'boost_clock' => $request->graphics_card_boost_clock,
            'interface' => $request->graphics_card_interface,
            'tdp' => $request->graphics_card_tdp,
            'multigraphics_support' => $request->graphics_card_multigraphics_support,
            'frame_sync' => $request->graphics_card_frame_sync,
            'dvi_port' => $request->graphics_card_dvi_port,
            'hdmi_port' => $request->graphics_card_hdmi_port,
            'mini_hdmi_port' => $request->graphics_card_mini_hdmi_port,
            'displayport_port' => $request->graphics_card_displayport_port,
            'mini_displayport_port' => $request->graphics_card_mini_displayport_port,
            'e_slot_width' => $request->graphics_card_e_slot_width,
            'external_power' => $request->graphics_card_external_power,
            'cooling' => $request->graphics_card_cooling
        ]);

        return redirect()->route('dashboard');
    }

    public function add_ram(Request $request)
    {

    }

    public function add_storage(Request $request)
    {

    }

    public function add_psu(Request $request)
    {

    }

    public function add_computer_case(Request $request)
    {

    }
}
