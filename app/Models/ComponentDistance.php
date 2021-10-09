<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComponentDistance extends Model
{
    use HasFactory;

    protected $table = 'component_distances';

    protected $primaryKey = 'component_id_1';

    protected $fillable = [
        'component_id_1',
        'component_id_2',
        'distance'
    ];

    public function component_id_1()
    {
        $this->belongsTo(Component::class, 'id', 'component_id_1');
    }

    public function component_id_2()
    {
        $this->belongsTo(Component::class, 'id', 'component_id_2');
    }

    public static function isDistanceExist(Product $product_1, Product $product_2)
    {
        if (ComponentDistance::where('component_id_1', $product_1->component_id)->where('component_id_2', $product_2->component_id)->get()->isEmpty() &&
            ComponentDistance::where('component_id_1', $product_2->component_id)->where('component_id_2', $product_1->component_id)->get()->isEmpty()) {
            return false;
        }
        return true;
    }

    public static function getDistance(Product $product_1, Product $product_2)
    {
        $distance = ComponentDistance::where('component_id_1', $product_1->component_id)->where('component_id_2', $product_2->component_id)->get();
        if ($distance->isNotEmpty()) return $distance;
        $distance = ComponentDistance::where('component_id_1', $product_2->component_id)->where('component_id_2', $product_1->component_id)->get();
        if ($distance->isNotEmpty()) return $distance;
        return null;
    }

    public static function ComputeDistance(Product $product_1, Product $product_2)
    {
        $product_type_1 = $product_1->type;
        $product_type_2 = $product_2->type;
        $product_type = $product_type_1 . ' - ' . $product_type_2;

        switch ($product_type) {
            case 'Motherboard - CPU':
            case 'CPU - Motherboard':
                $distance = self::Motherboard_CPU($product_1->component, $product_2->component);
                break;
            case 'Motherboard - CPU Cooler':
            case 'CPU Cooler - Motherboard':
                $distance = self::Motherboard_CPUCooler($product_1->component, $product_2->component);
                break;
            case 'Motherboard - Graphics Card':
            case 'Graphics Card - Motherboard':
                $distance = self::Motherboard_GraphicsCard($product_1->component, $product_2->component);
                break;
            case 'Motherboard - RAM':
            case 'RAM - Motherboard':
                $distance = self::Motherboard_RAM($product_1->component, $product_2->component);
                break;
            case 'Motherboard - Storage':
            case 'Storage - Motherboard':
                $distance = self::Motherboard_Storage($product_1->component, $product_2->component);
                break;
            case 'Motherboard - PSU':
            case 'PSU - Motherboard':
                $distance = self::Motherboard_PSU($product_1->component, $product_2->component);
                break;
            case 'Motherboard - Computer Case':
            case 'Computer Case - Motherboard':
                $distance = self::Motherboard_ComputerCase($product_1->component, $product_2->component);
                break;
            case 'CPU - CPU Cooler':
            case 'CPU Cooler - CPU':
                $distance = self::CPU_CPUCooler($product_1->component, $product_2->component);
                break;
            case 'CPU - Graphics Card':
            case 'Graphics Card - CPU':
                $distance = self::CPU_GraphicsCard($product_1->component, $product_2->component);
                break;
            case 'CPU - RAM':
            case 'RAM - CPU':
                $distance = self::CPU_RAM($product_1->component, $product_2->component);
                break;
            case 'CPU - Storage':
            case 'Storage - CPU':
                $distance = self::CPU_Storage($product_1->component, $product_2->component);
                break;
            case 'CPU - PSU':
            case 'PSU - CPU':
                $distance = self::CPU_PSU($product_1->component, $product_2->component);
                break;
            case 'CPU - Computer Case':
            case 'Computer Case - CPU':
                $distance = self::CPU_ComputerCase($product_1->component, $product_2->component);
                break;
            case 'CPU Cooler - Graphics Card':
            case 'Graphics Card - CPU Cooler':
                $distance = self::CPUCooler_GraphicsCard($product_1->component, $product_2->component);
                break;
            case 'CPU Cooler - RAM':
            case 'RAM - CPU Cooler':
                $distance = self::CPUCooler_RAM($product_1->component, $product_2->component);
                break;
            case 'CPU Cooler - Storage':
            case 'Storage - CPU Cooler':
                $distance = self::CPUCooler_Storage($product_1->component, $product_2->component);
                break;
            case 'CPU Cooler - PSU':
            case 'PSU - CPU Cooler':
                $distance = self::CPUCooler_PSU($product_1->component, $product_2->component);
                break;
            case 'CPU Cooler - Computer Case':
            case 'Computer Case - CPU Cooler':
                $distance = self::CPUCooler_ComputerCase($product_1->component, $product_2->component);
                break;
            case 'Graphics Card - RAM':
            case 'RAM - Graphics Card':
                $distance = self::GraphicsCard_RAM($product_1->component, $product_2->component);
                break;
            case 'Graphics Card - Storage':
            case 'Storage - Graphics Card':
                $distance = self::GraphicsCard_Storage($product_1->component, $product_2->component);
                break;
            case 'Graphics Card - PSU':
            case 'PSU - Graphics Card':
                $distance = self::GraphicsCard_PSU($product_1->component, $product_2->component);
                break;
            case 'Graphics Card - Computer Case':
            case 'Computer Case - Graphics Card':
                $distance = self::GraphicsCard_ComputerCase($product_1->component, $product_2->component);
                break;
            case 'RAM - Storage':
            case 'Storage - RAM':
                $distance = self::RAM_Storage($product_1->component, $product_2->component);
                break;
            case 'RAM - PSU':
            case 'PSU - RAM':
                $distance = self::RAM_PSU($product_1->component, $product_2->component);
                break;
            case 'RAM - Computer Case':
            case 'Computer Case - RAM':
                $distance = self::RAM_ComputerCase($product_1->component, $product_2->component);
                break;
            case 'Storage - PSU':
            case 'PSU - Storage':
                $distance = self::Storage_PSU($product_1->component, $product_2->component);
                break;
            case 'Storage - Computer Case':
            case 'Computer Case - Storage':
                $distance = self::Storage_ComputerCase($product_1->component, $product_2->component);
                break;
            case 'PSU - Computer Case':
            case 'Computer Case - PSU':
                $distance = self::PSU_ComputerCase($product_1->component, $product_2->component);
                break;
            default:
                $distance = null;
        }

        ComponentDistance::create([
            'component_id_1' => $product_1->component_id,
            'component_id_2' => $product_2->component_id,
            'distance' => $distance
        ]);

        return $distance;
    }

    private static function ComponentSimilarity(Component $component_1, Component $component_2)
    {
        $component_weights = [
            'id' => 0,
            'image_path' => 0,
            'name' => 0.5,
            'type' => 0,
            'manufacturer' => 0.2,
            'series' => 0.2,
            'model' => 0.2,
            'color' => 0.1,
            'length' => 0.1,
            'width' => 0.1,
            'height' => 0.1,
            'created_at' => 0.1,
            'updated_at' => 0.1
        ];

        $component_distances = array();

        foreach ($component_weights as $component_column => $component_weight) {
            if (is_numeric($component_1->{$component_column}) || is_numeric($component_2->{$component_column})) {
                $component_distances["$component_column"] = $component_weight * (($component_1->{$component_column} - $component_2->{$component_column}) ** 2);
            } elseif (($component_time_1 = strtotime($component_1->{$component_column})) && ($component_time_2 = strtotime($component_2->{$component_column}))) {
                $component_distances["$component_column"] = $component_weight * (($component_time_1 - $component_time_2) ** 2);
            } else {
                $component_distances["$component_column"] = $component_weight * (levenshtein($component_1->{$component_column}, $component_2->{$component_column}) ** 2);
            }
        }

        return $component_distances;
    }

    private static function Motherboard_CPU(Component $component_1, Component $component_2)
    {
        $motherboard = $component_1->type == 'Motherboard' ? $component_1 : $component_2;
        $cpu = $component_1->type == 'CPU' ? $component_1 : $component_2;

        $distances = self::ComponentSimilarity($motherboard,$cpu);

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function Motherboard_CPUCooler(Component $component_1, Component $component_2)
    {
        $motherboard = $component_1->type == 'Motherboard' ? $component_1 : $component_2;
        $cpu_cooler = $component_1->type == 'CPU Cooler' ? $component_1 : $component_2;

        $distances = self::ComponentSimilarity($motherboard,$cpu_cooler);

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function Motherboard_GraphicsCard(Component $component_1, Component $component_2)
    {
        $motherboard = $component_1->type == 'Motherboard' ? $component_1 : $component_2;
        $graphics_card = $component_1->type == 'Graphics Card' ? $component_1 : $component_2;

        $distances = self::ComponentSimilarity($motherboard,$graphics_card);

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function Motherboard_RAM(Component $component_1, Component $component_2)
    {
        $motherboard = $component_1->type == 'Motherboard' ? $component_1 : $component_2;
        $ram = $component_1->type == 'RAM' ? $component_1 : $component_2;

        $distances = self::ComponentSimilarity($motherboard,$ram);

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function Motherboard_Storage(Component $component_1, Component $component_2)
    {
        $motherboard = $component_1->type == 'Motherboard' ? $component_1 : $component_2;
        $storage = $component_1->type == 'Storage' ? $component_1 : $component_2;

        $distances = self::ComponentSimilarity($motherboard,$storage);

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function Motherboard_PSU(Component $component_1, Component $component_2)
    {
        $motherboard = $component_1->type == 'Motherboard' ? $component_1 : $component_2;
        $psu = $component_1->type == 'PSU' ? $component_1 : $component_2;

        $distances = self::ComponentSimilarity($motherboard,$psu);

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function Motherboard_ComputerCase(Component $component_1, Component $component_2)
    {
        $motherboard = $component_1->type == 'Motherboard' ? $component_1 : $component_2;
        $computer_case = $component_1->type == 'Computer Case' ? $component_1 : $component_2;

        $distances = self::ComponentSimilarity($motherboard,$computer_case);

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function CPU_CPUCooler(Component $component_1, Component $component_2)
    {
        $cpu = $component_1->type == 'CPU' ? $component_1 : $component_2;
        $cpu_cooler = $component_1->type == 'CPU Cooler' ? $component_1 : $component_2;

        $distances = self::ComponentSimilarity($cpu,$cpu_cooler);

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function CPU_GraphicsCard(Component $component_1, Component $component_2)
    {
        $cpu = $component_1->type == 'CPU' ? $component_1 : $component_2;
        $graphics_card = $component_1->type == 'Graphics Card' ? $component_1 : $component_2;

        $distances = self::ComponentSimilarity($cpu,$graphics_card);

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function CPU_RAM(Component $component_1, Component $component_2)
    {
        $cpu = $component_1->type == 'CPU' ? $component_1 : $component_2;
        $ram = $component_1->type == 'RAM' ? $component_1 : $component_2;

        $distances = self::ComponentSimilarity($cpu,$ram);

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function CPU_Storage(Component $component_1, Component $component_2)
    {
        $cpu = $component_1->type == 'CPU' ? $component_1 : $component_2;
        $storage = $component_1->type == 'Storage' ? $component_1 : $component_2;

        $distances = self::ComponentSimilarity($cpu,$storage);

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function CPU_PSU(Component $component_1, Component $component_2)
    {
        $cpu = $component_1->type == 'CPU' ? $component_1 : $component_2;
        $psu = $component_1->type == 'PSU' ? $component_1 : $component_2;

        $distances = self::ComponentSimilarity($cpu,$psu);

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function CPU_ComputerCase(Component $component_1, Component $component_2)
    {
        $cpu = $component_1->type == 'CPU' ? $component_1 : $component_2;
        $computer_case = $component_1->type == 'Computer Case' ? $component_1 : $component_2;

        $distances = self::ComponentSimilarity($cpu,$computer_case);

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function CPUCooler_GraphicsCard(Component $component_1, Component $component_2)
    {
        $cpu_cooler = $component_1->type == 'CPU Cooler' ? $component_1 : $component_2;
        $graphics_card = $component_1->type == 'Graphics Card' ? $component_1 : $component_2;

        $distances = self::ComponentSimilarity($cpu_cooler,$graphics_card);

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function CPUCooler_RAM(Component $component_1, Component $component_2)
    {
        $cpu_cooler = $component_1->type == 'CPU Cooler' ? $component_1 : $component_2;
        $ram = $component_1->type == 'RAM' ? $component_1 : $component_2;

        $distances = self::ComponentSimilarity($cpu_cooler,$ram);

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function CPUCooler_Storage(Component $component_1, Component $component_2)
    {
        $cpu_cooler = $component_1->type == 'CPU Cooler' ? $component_1 : $component_2;
        $storage = $component_1->type == 'Storage' ? $component_1 : $component_2;

        $distances = self::ComponentSimilarity($cpu_cooler,$storage);

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function CPUCooler_PSU(Component $component_1, Component $component_2)
    {
        $cpu_cooler = $component_1->type == 'CPU Cooler' ? $component_1 : $component_2;
        $psu = $component_1->type == 'PSU' ? $component_1 : $component_2;

        $distances = self::ComponentSimilarity($cpu_cooler,$psu);

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function CPUCooler_ComputerCase(Component $component_1, Component $component_2)
    {
        $cpu_cooler = $component_1->type == 'CPU Cooler' ? $component_1 : $component_2;
        $computer_case = $component_1->type == 'Computer Case' ? $component_1 : $component_2;

        $distances = self::ComponentSimilarity($cpu_cooler,$computer_case);

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function GraphicsCard_RAM(Component $component_1, Component $component_2)
    {
        $graphics_card = $component_1->type == 'Graphics Card' ? $component_1 : $component_2;
        $ram = $component_1->type == 'RAM' ? $component_1 : $component_2;

        $distances = self::ComponentSimilarity($graphics_card,$ram);

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function GraphicsCard_Storage(Component $component_1, Component $component_2)
    {
        $graphics_card = $component_1->type == 'Graphics Card' ? $component_1 : $component_2;
        $storage = $component_1->type == 'Storage' ? $component_1 : $component_2;

        $distances = self::ComponentSimilarity($graphics_card,$storage);

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function GraphicsCard_PSU(Component $component_1, Component $component_2)
    {
        $graphics_card = $component_1->type == 'Graphics Card' ? $component_1 : $component_2;
        $psu = $component_1->type == 'PSU' ? $component_1 : $component_2;

        $distances = self::ComponentSimilarity($graphics_card,$psu);

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function GraphicsCard_ComputerCase(Component $component_1, Component $component_2)
    {
        $graphics_card = $component_1->type == 'Graphics Card' ? $component_1 : $component_2;
        $computer_case = $component_1->type == 'Computer Case' ? $component_1 : $component_2;

        $distances = self::ComponentSimilarity($graphics_card,$computer_case);

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function RAM_Storage(Component $component_1, Component $component_2)
    {
        $ram = $component_1->type == 'RAM' ? $component_1 : $component_2;
        $storage = $component_1->type == 'Storage' ? $component_1 : $component_2;

        $distances = self::ComponentSimilarity($ram,$storage);

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function RAM_PSU(Component $component_1, Component $component_2)
    {
        $ram = $component_1->type == 'RAM' ? $component_1 : $component_2;
        $psu = $component_1->type == 'PSU' ? $component_1 : $component_2;

        $distances = self::ComponentSimilarity($ram,$psu);

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function RAM_ComputerCase(Component $component_1, Component $component_2)
    {
        $ram = $component_1->type == 'RAM' ? $component_1 : $component_2;
        $computer_case = $component_1->type == 'Computer Case' ? $component_1 : $component_2;

        $distances = self::ComponentSimilarity($ram,$computer_case);

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function Storage_PSU(Component $component_1, Component $component_2)
    {
        $storage = $component_1->type == 'Storage' ? $component_1 : $component_2;
        $psu = $component_1->type == 'PSU' ? $component_1 : $component_2;

        $distances = self::ComponentSimilarity($storage,$psu);

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function Storage_ComputerCase(Component $component_1, Component $component_2)
    {
        $storage = $component_1->type == 'Storage' ? $component_1 : $component_2;
        $computer_case = $component_1->type == 'Computer Case' ? $component_1 : $component_2;

        $distances = self::ComponentSimilarity($storage,$computer_case);

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function PSU_ComputerCase(Component $component_1, Component $component_2)
    {
        $psu = $component_1->type == 'PSU' ? $component_1 : $component_2;
        $computer_case = $component_1->type == 'Computer Case' ? $component_1 : $component_2;

        $distances = self::ComponentSimilarity($psu,$computer_case);

        $result = sqrt(array_sum($distances));

        return $result;
    }
}
