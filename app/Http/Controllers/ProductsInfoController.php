<?php

namespace App\Http\Controllers;

use App\Models\ComputerCase;
use App\Models\CPU;
use App\Models\CPUCooler;
use App\Models\GraphicsCard;
use App\Models\Motherboard;
use App\Models\Product;
use App\Models\PSU;
use App\Models\RAM;
use App\Models\Storage;
use Illuminate\Http\Request;

class ProductsInfoController extends Controller
{
    public function index($product_id)
        {
            //dd($product);
            $details = Product::with('component','store')->findOrFail($product_id);
            $specific_details = null;
            //dd($details);

            //dd($details);
            $profile_path = null;
            switch ($details->type) {
                case "Motherboard":
                    $specific_details = Motherboard::where('component_id',$details->component->id)->first();
                    $profile_path = 'images/components/motherboards/';
                    break;
                case "CPU":
                    $specific_details = CPU::where('component_id',$details->component->id)->first();
                    $profile_path = 'images/components/cpus/';
                    break;
                case "CPU Cooler":
                    $specific_details = CPUCooler::where('component_id',$details->component->id)->first();
                    $profile_path = 'images/components/cpu_coolers/';
                    break;
                case "Graphics Card":
                    $specific_details = GraphicsCard::where('component_id',$details->component->id)->first();
                    $profile_path = 'images/components/graphics_cards/';
                    break;
                case "RAM":
                    $specific_details = RAM::where('component_id',$details->component->id)->first();
                    $profile_path = 'images/components/rams/';
                    break;
                case "Storage":
                    $specific_details = Storage::where('component_id',$details->component->id)->first();
                    $profile_path = 'images/components/storages/';
                    break;
                case "PSU":
                    $specific_details = PSU::where('component_id',$details->component->id)->first();
                    $profile_path = 'images/components/psus/';
                    break;
                case "Computer Case":
                    $specific_details = ComputerCase::where('component_id',$details->component->id)->first();
                    $profile_path = 'images/components/computer_cases/';
                    break;
            }
            //dd($specific_details);



            //
            //dd($details->store);

            return view('products.index',['product_infos'=>$details, 'specific_details'=>$specific_details,'profile_path'=> $profile_path ]);
        }
}
