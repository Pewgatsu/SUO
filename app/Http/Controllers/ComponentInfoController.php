<?php

namespace App\Http\Controllers;
use App\Models;
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
use Illuminate\Support\Facades\DB;

class ComponentInfoController extends Controller
{
    public function index($component_id)
    {
        //dd($product);
        $component_info = Component::findOrFail($component_id);
        //dd($component_info);
        //$specific_details = null;
        //dd($details);

        //dd($details);
        $profile_path = null;
        switch ($component_info->type) {
            case "Motherboard":
                $specific_details = Motherboard::with('memory_speeds')->where('component_id',$component_info->id)->first();
                $profile_path = 'images/components/motherboards/';
                break;
            case "CPU":
                $specific_details = CPU::where('component_id',$component_info->id)->first();
                $profile_path = 'images/components/cpus/';
                break;
            case "CPU Cooler":
                $specific_details = CPUCooler::with('cpu_sockets')->where('component_id',$component_info->id)->first();
                $profile_path = 'images/components/cpu_coolers/';
                break;
            case "Graphics Card":
                $specific_details = GraphicsCard::where('component_id',$component_info->id)->first();
                $profile_path = 'images/components/graphics_cards/';
                break;
            case "RAM":
                $specific_details = RAM::where('component_id',$component_info->id)->first();
                $profile_path = 'images/components/rams/';
                break;
            case "Storage":
                $specific_details = Storage::where('component_id',$component_info->id)->first();
                $profile_path = 'images/components/storages/';
                break;
            case "PSU":
                $specific_details = PSU::where('component_id',$component_info->id)->first();
                $profile_path = 'images/components/psus/';
                break;
            case "Computer Case":
                $specific_details = ComputerCase::with('mobo_form_factors')->where('component_id',$component_info->id)->first();
                $profile_path = 'images/components/computer_cases/';
                break;
        }
        //dd($specific_details);

        return view('componentinfo.componentinfo',['component_infos'=>$component_info, 'specific_details'=>$specific_details,'profile_path'=> $profile_path ]);
    }

}
