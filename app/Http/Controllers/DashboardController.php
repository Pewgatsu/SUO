<?php

namespace App\Http\Controllers;

use App\Models\Account;
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

class DashboardController extends Controller
{
    public function index()
    {
        $accounts_count = Account::count();
        $components_count = Component::count();
        $motherboards_count = Motherboard::count();
        $cpus_count = CPU::count();
        $cpu_coolers_count = CPUCooler::count();
        $graphics_cards_count = GraphicsCard::count();
        $rams_count = RAM::count();
        $storages_count = Storage::count();
        $psus_count = PSU::count();
        $computer_cases_count = ComputerCase::count();
        $recent_accounts = Account::latest()->limit(5)->get();
        $recent_components = Component::latest()->limit(5)->get();

        $cpu_sockets = CPUSocket::all();
        $mobo_form_factors = MOBOFormFactor::all();
        $memory_speeds = MemorySpeed::all();

        return view('dashboard.index', [
            'accounts_count' => $accounts_count,
            'components_count' => $components_count,
            'motherboards_count' => $motherboards_count,
            'cpus_count' => $cpus_count,
            'cpu_coolers_count' => $cpu_coolers_count,
            'graphics_cards_count' => $graphics_cards_count,
            'rams_count' => $rams_count,
            'storages_count' => $storages_count,
            'psus_count' => $psus_count,
            'computer_cases_count' => $computer_cases_count,
            'recent_accounts' => $recent_accounts,
            'recent_components' => $recent_components,
            'cpu_sockets' => $cpu_sockets,
            'mobo_form_factors' => $mobo_form_factors,
            'memory_speeds' => $memory_speeds
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
            'mobo_mem_speed_support' => 'nullable|array',
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

        if (isset($request->mobo_image)){
            // Image Upload
            $mobo_image_filename = time() . '-' . $request->mobo_name . '.' . $request->mobo_image->extension();
            $request->mobo_image->move(public_path('images/motherboards'), $mobo_image_filename);
        }

        // Store
        $component = Component::create([
            'image_path' => $mobo_image_filename ?? null,
            'name' => $request->mobo_name,
            'type' => 'Motherboard',
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

        foreach ($request->mobo_mem_speed_support as $memory_speed_id) {
            MOBOMemorySpeed::create([
                'component_id' => $component->id,
                'memory_speed_id' => $memory_speed_id
            ]);
        }

        return redirect()->route('admin.dashboard');
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

        if (isset($request->cpu_image)){
            // Image Upload
            $cpu_image_filename = time() . '-' . $request->cpu_name . '.' . $request->cpu_image->extension();
            $request->cpu_image->move(public_path('images/cpus'), $cpu_image_filename);
        }

        // Store
        $component = Component::create([
            'image_path' => $cpu_image_filename ?? null,
            'name' => $request->cpu_name,
            'type' => 'CPU',
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

        return redirect()->route('admin.dashboard');
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
            'cpu_cooler_cpu_socket' => 'required|array',
            'cpu_cooler_fan_speed' => 'nullable',
            'cpu_cooler_noise_level' => 'nullable',
            'cpu_cooler_water_cooled' => 'nullable|string'
        ]);

        if (isset($request->cpu_cooler_image)) {
            // Image Upload
            $cpu_cooler_image_filename = time() . '-' . $request->cpu_cooler_name . '.' . $request->cpu_cooler_image->extension();
            $request->cpu_cooler_image->move(public_path('images/cpu_coolers'), $cpu_cooler_image_filename);
        }

        // Store
        $component = Component::create([
            'image_path' => $cpu_cooler_image_filename ?? null,
            'name' => $request->cpu_cooler_name,
            'type' => 'CPU Cooler',
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
            'fan_speed' => $request->cpu_cooler_fan_speed,
            'noise_level' => $request->cpu_cooler_noise_level,
            'water_cooled_support' => $request->cpu_cooler_water_cooled
        ]);

        foreach ($request->cpu_cooler_cpu_socket as $cpu_socket_id) {
            SocketCooler::create([
                'component_id' => $component->id,
                'cpu_socket_id' => $cpu_socket_id
            ]);
        }

        return redirect()->route('admin.dashboard');
    }

    public function add_graphics_card(Request $request)
    {
        // validate
        $this->validate($request, [
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

        if (isset($request->graphics_card_image)){
            // Image Upload
            $graphics_card_image_filename = time() . '-' . $request->graphics_card_name . '.' . $request->graphics_card_image->extension();
            $request->graphics_card_image->move(public_path('images/graphics_cards'), $graphics_card_image_filename);
        }

        // Store
        $component = Component::create([
            'image_path' => $graphics_card_image_filename ?? null,
            'name' => $request->graphics_card_name,
            'type' => 'Graphics Card',
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

        return redirect()->route('admin.dashboard');
    }

    public function add_ram(Request $request)
    {
        // validate
        $this->validate($request, [
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

        if (isset($request->ram_image)){
            // Image Upload
            $ram_image_filename = time() . '-' . $request->ram_name . '.' . $request->ram_image->extension();
            $request->ram_image->move(public_path('images/rams'), $ram_image_filename);
        }

        // Store
        $component = Component::create([
            'image_path' => $ram_image_filename ?? null,
            'name' => $request->ram_name,
            'type' => 'RAM',
            'manufacturer' => $request->ram_manufacturer,
            'series' => $request->ram_series,
            'model' => $request->ram_model,
            'color' => $request->ram_color,
            'length' => $request->ram_length,
            'width' => $request->ram_width,
            'height' => $request->ram_height
        ]);

        RAM::create([
            'component_id' => $component->id,
            'memory_type' => $request->ram_memory_type,
            'memory_speed' => $request->ram_memory_speed,
            'memory_capacity' => $request->ram_memory_capacity,
            'memory_form_factor' => $request->ram_form_factor,
            'modules' => $request->ram_modules,
            'memory_voltage' => $request->ram_voltage,
            'memory_timings' => $request->ram_timings,
            'ecc' => $request->ram_ecc_memory,
            'registered' => $request->ram_registered_memory,
            'heat_spreader' => $request->ram_heat_spreader
        ]);

        return redirect()->route('admin.dashboard');
    }

    public function add_storage(Request $request)
    {
        // validate
        $this->validate($request, [
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

        if (isset($request->storage_image)){
            // Image Upload
            $storage_image_filename = time() . '-' . $request->storage_name . '.' . $request->storage_image->extension();
            $request->storage_image->move(public_path('images/storages'), $storage_image_filename);
        }

        // Store
        $component = Component::create([
            'image_path' => $storage_image_filename ?? null,
            'name' => $request->storage_name,
            'type' => 'Storage',
            'manufacturer' => $request->storage_manufacturer,
            'series' => $request->storage_series,
            'model' => $request->storage_model,
            'color' => $request->storage_color,
            'length' => $request->storage_length,
            'width' => $request->storage_width,
            'height' => $request->storage_height
        ]);

        Storage::create([
            'component_id' => $component->id,
            'storage_type' => $request->storage_type,
            'storage_capacity' => $request->storage_capacity,
            'interface' => $request->storage_interface,
            'storage_form_factor' => $request->storage_form_factor,
            'storage_cache' => $request->storage_cache,
            'nvme' => $request->storage_nvme
        ]);

        return redirect()->route('admin.dashboard');
    }

    public function add_psu(Request $request)
    {
        // validate
        $this->validate($request, [
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

        if (isset($request->psu_image)){
            // Image Upload
            $psu_image_filename = time() . '-' . $request->psu_name . '.' . $request->psu_image->extension();
            $request->psu_image->move(public_path('images/psus'), $psu_image_filename);
        }

        // Store
        $component = Component::create([
            'image_path' => $psu_image_filename ?? null,
            'name' => $request->psu_name,
            'type' => 'PSU',
            'manufacturer' => $request->psu_manufacturer,
            'series' => $request->psu_series,
            'model' => $request->psu_model,
            'color' => $request->psu_color,
            'length' => $request->psu_length,
            'width' => $request->psu_width,
            'height' => $request->psu_height
        ]);

        PSU::create([
            'component_id' => $component->id,
            'psu_form_factor' => $request->psu_form_factor,
            'wattage' => $request->psu_wattage,
            'efficiency_rating' => $request->psu_efficiency_rating,
            'modular' => $request->psu_modular,
            'atx_connector' => $request->psu_atx_connector,
            'eps_connector' => $request->psu_eps_connector,
            'sata_connector' => $request->psu_sata_connector,
            'molex_4pin_connector' => $request->psu_molex_connector,
            'pcie_8pin_connector' => $request->psu_pcie_8pin_connector,
            'pcie_6+2pin_connector' => $request->psu_pcie_62pin_connector,
            'pcie_6pin_connector' => $request->psu_pcie_6pin_connector
        ]);

        return redirect()->route('admin.dashboard');
    }

    public function add_computer_case(Request $request)
    {
        // validate
        $this->validate($request, [
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
            'case_mobo_form_factor' => 'required|array',
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

        if (isset($request->case_image)){
            // Image Upload
            $case_image_filename = time() . '-' . $request->case_name . '.' . $request->case_image->extension();
            $request->case_image->move(public_path('images/computer_cases'), $case_image_filename);
        }

        // Store
        $component = Component::create([
            'image_path' => $case_image_filename ?? null,
            'name' => $request->case_name,
            'type' => 'Computer Case',
            'manufacturer' => $request->case_manufacturer,
            'series' => $request->case_series,
            'model' => $request->case_model,
            'color' => $request->case_color,
            'length' => $request->case_length,
            'width' => $request->case_width,
            'height' => $request->case_height
        ]);

        ComputerCase::create([
            'component_id' => $component->id,
            'case_type' => $request->case_type,
            'power_supply' => $request->case_power_supply,
            'power_supply_shroud' => $request->case_power_supply_shroud,
            'side_panel_window' => $request->case_side_panel_window,
            'water_cooled_support' => $request->case_water_cooled_support,
            'cooler_clearance' => $request->case_cooler_clearance,
            'graphics_clearance' => $request->case_graphics_clearance,
            'psu_clearance' => $request->case_psu_clearance,
            'full_height_e_slot' => $request->case_full_height_e_slot,
            'half_height_e_slot' => $request->case_half_height_e_slot,
            'external_525_bay' => $request->case_external_525_bay,
            'external_350_bay' => $request->case_external_350_bay,
            'internal_350_bay' => $request->case_internal_350_bay,
            'internal_250_bay' => $request->case_internal_250_bay
        ]);

        foreach ($request->case_mobo_form_factor as $mobo_form_factor_id) {
            MOBOCase::create([
                'component_id' => $component->id,
                'mobo_form_factor_id' => $mobo_form_factor_id
            ]);
        }

        return redirect()->route('admin.dashboard');
    }
}
