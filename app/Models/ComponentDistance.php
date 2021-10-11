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

    public static function getDistanceIfExist(Product $product_1, Product $product_2)
    {
        $distance = ComponentDistance::where('component_id_1', $product_1->component_id)->where('component_id_2', $product_2->component_id)->get();
        if ($distance->isNotEmpty()) return $distance->first()->distance;
        $distance = ComponentDistance::where('component_id_1', $product_2->component_id)->where('component_id_2', $product_1->component_id)->get();
        if ($distance->isNotEmpty()) return $distance->first()->distance;
        return false;
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
            'name' => 1,
            'type' => 0,
            'manufacturer' => 1,
            'series' => 1,
            'model' => 1,
            'color' => 1,
            'length' => 0,
            'width' => 0,
            'height' => 0,
            'created_at' => 0,
            'updated_at' => 0
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
        $distances = self::ComponentSimilarity($component_1, $component_2);

        $motherboard = $component_1->type == 'Motherboard' ? $component_1->motherboard : $component_2->motherboard;
        $cpu = $component_1->type == 'CPU' ? $component_1->cpu : $component_2->cpu;

        $specific_weights = [
            'cpu_socket' => 10,
            'max_mem_support' => 0.1,
        ];

        foreach ($specific_weights as $specific_column => $specific_weight) {
            if (is_numeric($motherboard->{$specific_column}) || is_numeric($cpu->{$specific_column})) {
                $distances["$specific_column"] = $specific_weight * (($motherboard->{$specific_column} - $cpu->{$specific_column}) ** 2);
            } else {
                $distances["$specific_column"] = $specific_weight * (levenshtein($motherboard->{$specific_column}, $cpu->{$specific_column}) ** 2);
            }
        }

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function Motherboard_CPUCooler(Component $component_1, Component $component_2)
    {
        $distances = self::ComponentSimilarity($component_1, $component_2);

        $motherboard = $component_1->type == 'Motherboard' ? $component_1->motherboard : $component_2->motherboard;
        $cpu_cooler = $component_1->type == 'CPU Cooler' ? $component_1->cpu_cooler : $component_2->cpu_cooler;

        $specific_weights = [
            'cpu_socket' => 10
        ];

        foreach ($specific_weights as $specific_column => $specific_weight) {
            if ($specific_column == 'cpu_socket') {

                $cpu_sockets = array();
                foreach ($cpu_cooler->cpu_sockets as $cpu_socket) {
                    $cpu_sockets[] = $cpu_socket->name;
                }

                if (empty($cpu_sockets)) {
                    $distances["$specific_column"] = $specific_weight * 10;
                } elseif (in_array($motherboard->cpu_socket, $cpu_sockets)) {
                    $distances["$specific_column"] = 0;
                } else {
                    $cpu_socket_distances = array();
                    foreach ($cpu_sockets as $cpu_socket) {
                        $cpu_socket_distances[] = levenshtein($motherboard->cpu_socket, $cpu_socket);
                    }
                    $cpu_socket_distance = min($cpu_socket_distances);
                    $distances["$specific_column"] = $specific_weight * ($cpu_socket_distance ** 2);
                }

            } elseif (is_numeric($motherboard->{$specific_column}) || is_numeric($cpu_cooler->{$specific_column})) {
                $distances["$specific_column"] = $specific_weight * (($motherboard->{$specific_column} - $cpu_cooler->{$specific_column}) ** 2);
            } else {
                $distances["$specific_column"] = $specific_weight * (levenshtein($motherboard->{$specific_column}, $cpu_cooler->{$specific_column}) ** 2);
            }
        }

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function Motherboard_GraphicsCard(Component $component_1, Component $component_2)
    {
        $distances = self::ComponentSimilarity($component_1, $component_2);

        $motherboard = $component_1->type == 'Motherboard' ? $component_1->motherboard : $component_2->motherboard;
        $graphics_card = $component_1->type == 'Graphics Card' ? $component_1->graphics_card : $component_2->graphics_card;

        $specific_weights = [
            'interface' => 10
        ];

        foreach ($specific_weights as $specific_column => $specific_weight) {
            if ($specific_column == 'interface') {

                $graphics_card_interface = str_replace(' ', '_', strtolower($graphics_card->interface)) . '_slot';

                $slot_quantity = $motherboard->{$graphics_card_interface} ?? null;

                if ($slot_quantity != 0) $distances["$specific_column"] = 0;
                else $distances["$specific_column"] = $specific_weight * 10;

            } elseif (is_numeric($motherboard->{$specific_column}) || is_numeric($graphics_card->{$specific_column})) {
                $distances["$specific_column"] = $specific_weight * (($motherboard->{$specific_column} - $graphics_card->{$specific_column}) ** 2);
            } else {
                $distances["$specific_column"] = $specific_weight * (levenshtein($motherboard->{$specific_column}, $graphics_card->{$specific_column}) ** 2);
            }
        }

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function Motherboard_RAM(Component $component_1, Component $component_2)
    {
        $distances = self::ComponentSimilarity($component_1, $component_2);

        $motherboard = $component_1->type == 'Motherboard' ? $component_1->motherboard : $component_2->motherboard;
        $ram = $component_1->type == 'RAM' ? $component_1->ram : $component_2->ram;

        $specific_weights = [
            'memory_slot' => 5,
            'memory_type' => 10,
            'memory_speed' => 10,
            'max_memory_support' => 0.1,
            'ecc_support' => 10
        ];

        foreach ($specific_weights as $specific_column => $specific_weight) {
            if ($specific_column == 'memory_speed') {

                $memory_speeds = array();
                foreach ($motherboard->memory_speeds as $memory_speed) {
                    $memory_speeds[] = substr($memory_speed->name, -4);
                }

                if (empty($memory_speeds)) {
                    $distances["$specific_column"] = $specific_weight * 10;
                } elseif (in_array($ram->memory_speed, $memory_speeds)) {
                    $distances["$specific_column"] = 0;
                } else {
                    $memory_speed_distances = array();
                    foreach ($memory_speeds as $memory_speed) {
                        $memory_speed_distances[] = levenshtein($ram->memory_speed, $memory_speed);
                    }
                    $memory_speed_distance = min($memory_speed_distances);
                    $distances["$specific_column"] = $specific_weight * ($memory_speed_distance ** 2);
                }

            } elseif ($specific_column == 'memory_slot') {
                $distances["$specific_column"] = $specific_weight * (($motherboard->{$specific_column} - $ram->modules) ** 2);

            } elseif ($specific_column == 'max_memory_support') {
                $distances["$specific_column"] = $specific_weight * (($motherboard->{$specific_column} - $ram->memory_capacity) ** 2);

            } elseif ($specific_column == 'ecc_support') {
                $distances["$specific_column"] = $specific_weight * (($motherboard->{$specific_column} - $ram->ecc) ** 2);

            } elseif (is_numeric($motherboard->{$specific_column}) || is_numeric($ram->{$specific_column})) {
                $distances["$specific_column"] = $specific_weight * (($motherboard->{$specific_column} - $ram->{$specific_column}) ** 2);

            } else {
                $distances["$specific_column"] = $specific_weight * (levenshtein($motherboard->{$specific_column}, $ram->{$specific_column}) ** 2);
            }
        }

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function Motherboard_Storage(Component $component_1, Component $component_2)
    {
        $distances = self::ComponentSimilarity($component_1, $component_2);

        $motherboard = $component_1->type == 'Motherboard' ? $component_1->motherboard : $component_2->motherboard;
        $storage = $component_1->type == 'Storage' ? $component_1->storage : $component_2->storage;

        $specific_weights = [
            'interface' => 10
        ];

        foreach ($specific_weights as $specific_column => $specific_weight) {
            if ($specific_column == 'interface') {

                $interface = strtolower($storage->interface);

                if (strpos($interface, ' gb/s')) {
                    $storage_interface = str_replace(' ', '_', str_replace(' gb/s', 'gb', $interface)) . '_slot';
                } elseif ($interface == 'm.2') {
                    $storage_interface = 'm2_slot';
                } else {
                    $storage_interface = str_replace(' ', '_', $interface) . '_slot';
                }

                $slot_quantity = $motherboard->{$storage_interface} ?? null;

                if ($slot_quantity != 0) $distances["$specific_column"] = 0;
                else $distances["$specific_column"] = $specific_weight * 10;

            } elseif (is_numeric($motherboard->{$specific_column}) || is_numeric($storage->{$specific_column})) {
                $distances["$specific_column"] = $specific_weight * (($motherboard->{$specific_column} - $storage->{$specific_column}) ** 2);
            } else {
                $distances["$specific_column"] = $specific_weight * (levenshtein($motherboard->{$specific_column}, $storage->{$specific_column}) ** 2);
            }
        }

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function Motherboard_PSU(Component $component_1, Component $component_2)
    {
        $distances = self::ComponentSimilarity($component_1, $component_2);

        $motherboard = $component_1->type == 'Motherboard' ? $component_1->motherboard : $component_2->motherboard;
        $psu = $component_1->type == 'PSU' ? $component_1->psu : $component_2->psu;

        $specific_weights = [

        ];

        foreach ($specific_weights as $specific_column => $specific_weight) {
            if (is_numeric($motherboard->{$specific_column}) || is_numeric($psu->{$specific_column})) {
                $distances["$specific_column"] = $specific_weight * (($motherboard->{$specific_column} - $psu->{$specific_column}) ** 2);
            } else {
                $distances["$specific_column"] = $specific_weight * (levenshtein($motherboard->{$specific_column}, $psu->{$specific_column}) ** 2);
            }
        }

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function Motherboard_ComputerCase(Component $component_1, Component $component_2)
    {
        $distances = self::ComponentSimilarity($component_1, $component_2);

        $motherboard = $component_1->type == 'Motherboard' ? $component_1->motherboard : $component_2->motherboard;
        $computer_case = $component_1->type == 'Computer Case' ? $component_1->computer_case : $component_2->computer_case;

        $specific_weights = [
            'mobo_form_factor' => 10
        ];

        foreach ($specific_weights as $specific_column => $specific_weight) {
            if ($specific_column == 'mobo_form_factor') {

                $form_factors = array();
                foreach ($computer_case->mobo_form_factors as $form_factor) {
                    $form_factors[] = $form_factor->name;
                }

                if (empty($form_factors)) {
                    $distances["$specific_column"] = $specific_weight * 10;
                } elseif (in_array($motherboard->mobo_form_factor, $form_factors)) {
                    $distances["$specific_column"] = 0;
                } else {
                    $form_factor_distances = array();
                    foreach ($form_factors as $form_factor) {
                        $form_factor_distances[] = levenshtein($motherboard->cpu_socket, $form_factor);
                    }
                    $form_factor_distance = min($form_factor_distances);
                    $distances["$specific_column"] = $specific_weight * ($form_factor_distance ** 2);
                }

            } elseif (is_numeric($motherboard->{$specific_column}) || is_numeric($computer_case->{$specific_column})) {
                $distances["$specific_column"] = $specific_weight * (($motherboard->{$specific_column} - $computer_case->{$specific_column}) ** 2);
            } else {
                $distances["$specific_column"] = $specific_weight * (levenshtein($motherboard->{$specific_column}, $computer_case->{$specific_column}) ** 2);
            }
        }

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function CPU_CPUCooler(Component $component_1, Component $component_2)
    {
        $distances = self::ComponentSimilarity($component_1, $component_2);

        $cpu = $component_1->type == 'CPU' ? $component_1->cpu : $component_2->cpu;
        $cpu_cooler = $component_1->type == 'CPU Cooler' ? $component_1->cpu_cooler : $component_2->cpu_cooler;

        $specific_weights = [
            'cpu_socket' => 10
        ];

        foreach ($specific_weights as $specific_column => $specific_weight) {
            if ($specific_column == 'cpu_socket') {

                $cpu_sockets = array();
                foreach ($cpu_cooler->cpu_sockets as $cpu_socket) {
                    $cpu_sockets[] = $cpu_socket->name;
                }

                if (empty($cpu_sockets)) {
                    $distances["$specific_column"] = $specific_weight * 10;
                } elseif (in_array($cpu->cpu_socket, $cpu_sockets)) {
                    $distances["$specific_column"] = 0;
                } else {
                    $cpu_socket_distances = array();
                    foreach ($cpu_sockets as $cpu_socket) {
                        $cpu_socket_distances[] = levenshtein($cpu->cpu_socket, $cpu_socket);
                    }
                    $cpu_socket_distance = min($cpu_socket_distances);
                    $distances["$specific_column"] = $specific_weight * ($cpu_socket_distance ** 2);
                }

            } elseif (is_numeric($cpu->{$specific_column}) || is_numeric($cpu_cooler->{$specific_column})) {
                $distances["$specific_column"] = $specific_weight * (($cpu->{$specific_column} - $cpu_cooler->{$specific_column}) ** 2);
            } else {
                $distances["$specific_column"] = $specific_weight * (levenshtein($cpu->{$specific_column}, $cpu_cooler->{$specific_column}) ** 2);
            }
        }

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function CPU_GraphicsCard(Component $component_1, Component $component_2)
    {
        $distances = self::ComponentSimilarity($component_1, $component_2);

        $cpu = $component_1->type == 'CPU' ? $component_1->cpu : $component_2->cpu;
        $graphics_card = $component_1->type == 'Graphics Card' ? $component_1->graphics_card : $component_2->graphics_card;

        $specific_weights = [

        ];

        foreach ($specific_weights as $specific_column => $specific_weight) {
            if (is_numeric($cpu->{$specific_column}) || is_numeric($graphics_card->{$specific_column})) {
                $distances["$specific_column"] = $specific_weight * (($cpu->{$specific_column} - $graphics_card->{$specific_column}) ** 2);
            } else {
                $distances["$specific_column"] = $specific_weight * (levenshtein($cpu->{$specific_column}, $graphics_card->{$specific_column}) ** 2);
            }
        }

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function CPU_RAM(Component $component_1, Component $component_2)
    {
        $distances = self::ComponentSimilarity($component_1, $component_2);

        $cpu = $component_1->type == 'CPU' ? $component_1->cpu : $component_2->cpu;
        $ram = $component_1->type == 'RAM' ? $component_1->ram : $component_2->ram;

        $specific_weights = [
            'max_memory_support' => 0.1
        ];

        foreach ($specific_weights as $specific_column => $specific_weight) {
            if ($specific_column == 'max_memory_support') {
                $distances["$specific_column"] = $specific_weight * (($cpu->{$specific_column} - $ram->memory_capacity) ** 2);

            } elseif (is_numeric($cpu->{$specific_column}) || is_numeric($ram->{$specific_column})) {
                $distances["$specific_column"] = $specific_weight * (($cpu->{$specific_column} - $ram->{$specific_column}) ** 2);

            } else {
                $distances["$specific_column"] = $specific_weight * (levenshtein($cpu->{$specific_column}, $ram->{$specific_column}) ** 2);
            }
        }

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function CPU_Storage(Component $component_1, Component $component_2)
    {
        $distances = self::ComponentSimilarity($component_1, $component_2);

        $cpu = $component_1->type == 'CPU' ? $component_1->cpu : $component_2->cpu;
        $storage = $component_1->type == 'Storage' ? $component_1->storage : $component_2->storage;

        $specific_weights = [

        ];

        foreach ($specific_weights as $specific_column => $specific_weight) {
            if (is_numeric($cpu->{$specific_column}) || is_numeric($storage->{$specific_column})) {
                $distances["$specific_column"] = $specific_weight * (($cpu->{$specific_column} - $storage->{$specific_column}) ** 2);
            } else {
                $distances["$specific_column"] = $specific_weight * (levenshtein($cpu->{$specific_column}, $storage->{$specific_column}) ** 2);
            }
        }

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function CPU_PSU(Component $component_1, Component $component_2)
    {
        $distances = self::ComponentSimilarity($component_1, $component_2);

        $cpu = $component_1->type == 'CPU' ? $component_1->cpu : $component_2->cpu;
        $psu = $component_1->type == 'PSU' ? $component_1->psu : $component_2->psu;

        $specific_weights = [

        ];

        foreach ($specific_weights as $specific_column => $specific_weight) {
            if (is_numeric($cpu->{$specific_column}) || is_numeric($psu->{$specific_column})) {
                $distances["$specific_column"] = $specific_weight * (($cpu->{$specific_column} - $psu->{$specific_column}) ** 2);
            } else {
                $distances["$specific_column"] = $specific_weight * (levenshtein($cpu->{$specific_column}, $psu->{$specific_column}) ** 2);
            }
        }

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function CPU_ComputerCase(Component $component_1, Component $component_2)
    {
        $distances = self::ComponentSimilarity($component_1, $component_2);

        $cpu = $component_1->type == 'CPU' ? $component_1->cpu : $component_2->cpu;
        $computer_case = $component_1->type == 'Computer Case' ? $component_1->computer_case : $component_2->computer_case;

        $specific_weights = [

        ];

        foreach ($specific_weights as $specific_column => $specific_weight) {
            if (is_numeric($cpu->{$specific_column}) || is_numeric($computer_case->{$specific_column})) {
                $distances["$specific_column"] = $specific_weight * (($cpu->{$specific_column} - $computer_case->{$specific_column}) ** 2);
            } else {
                $distances["$specific_column"] = $specific_weight * (levenshtein($cpu->{$specific_column}, $computer_case->{$specific_column}) ** 2);
            }
        }

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function CPUCooler_GraphicsCard(Component $component_1, Component $component_2)
    {
        $distances = self::ComponentSimilarity($component_1, $component_2);

        $cpu_cooler = $component_1->type == 'CPU Cooler' ? $component_1->cpu_cooler : $component_2->cpu_cooler;
        $graphics_card = $component_1->type == 'Graphics Card' ? $component_1->graphics_card : $component_2->graphics_card;

        $specific_weights = [

        ];

        foreach ($specific_weights as $specific_column => $specific_weight) {
            if (is_numeric($cpu_cooler->{$specific_column}) || is_numeric($graphics_card->{$specific_column})) {
                $distances["$specific_column"] = $specific_weight * (($cpu_cooler->{$specific_column} - $graphics_card->{$specific_column}) ** 2);
            } else {
                $distances["$specific_column"] = $specific_weight * (levenshtein($cpu_cooler->{$specific_column}, $graphics_card->{$specific_column}) ** 2);
            }
        }

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function CPUCooler_RAM(Component $component_1, Component $component_2)
    {
        $distances = self::ComponentSimilarity($component_1, $component_2);

        $cpu_cooler = $component_1->type == 'CPU Cooler' ? $component_1->cpu_cooler : $component_2->cpu_cooler;
        $ram = $component_1->type == 'RAM' ? $component_1->ram : $component_2->ram;

        $specific_weights = [

        ];

        foreach ($specific_weights as $specific_column => $specific_weight) {
            if (is_numeric($cpu_cooler->{$specific_column}) || is_numeric($ram->{$specific_column})) {
                $distances["$specific_column"] = $specific_weight * (($cpu_cooler->{$specific_column} - $ram->{$specific_column}) ** 2);
            } else {
                $distances["$specific_column"] = $specific_weight * (levenshtein($cpu_cooler->{$specific_column}, $ram->{$specific_column}) ** 2);
            }
        }

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function CPUCooler_Storage(Component $component_1, Component $component_2)
    {
        $distances = self::ComponentSimilarity($component_1, $component_2);

        $cpu_cooler = $component_1->type == 'CPU Cooler' ? $component_1->cpu_cooler : $component_2->cpu_cooler;
        $storage = $component_1->type == 'Storage' ? $component_1->ram : $component_2->ram;

        $specific_weights = [

        ];

        foreach ($specific_weights as $specific_column => $specific_weight) {
            if (is_numeric($cpu_cooler->{$specific_column}) || is_numeric($storage->{$specific_column})) {
                $distances["$specific_column"] = $specific_weight * (($cpu_cooler->{$specific_column} - $storage->{$specific_column}) ** 2);
            } else {
                $distances["$specific_column"] = $specific_weight * (levenshtein($cpu_cooler->{$specific_column}, $storage->{$specific_column}) ** 2);
            }
        }

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function CPUCooler_PSU(Component $component_1, Component $component_2)
    {
        $cpu_cooler = $component_1->type == 'CPU Cooler' ? $component_1 : $component_2;
        $psu = $component_1->type == 'PSU' ? $component_1 : $component_2;

        $distances = self::ComponentSimilarity($cpu_cooler, $psu);

        $specific_weights = [

        ];

        foreach ($specific_weights as $specific_column => $specific_weight) {
            if (is_numeric($cpu_cooler->{$specific_column}) || is_numeric($psu->{$specific_column})) {
                $distances["$specific_column"] = $specific_weight * (($cpu_cooler->{$specific_column} - $psu->{$specific_column}) ** 2);
            } else {
                $distances["$specific_column"] = $specific_weight * (levenshtein($cpu_cooler->{$specific_column}, $psu->{$specific_column}) ** 2);
            }
        }

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function CPUCooler_ComputerCase(Component $component_1, Component $component_2)
    {
        $distances = self::ComponentSimilarity($component_1, $component_2);

        $cpu_cooler = $component_1->type == 'CPU Cooler' ? $component_1->cpu_cooler : $component_2->cpu_cooler;
        $computer_case = $component_1->type == 'Computer Case' ? $component_1->computer_case : $component_2->computer_case;

        $specific_weights = [
            'water_cooled_support' => 10,
            'cooler_clearance' => 0.1
        ];

        foreach ($specific_weights as $specific_column => $specific_weight) {
            if ($specific_column == 'water_cooled_support') {
                if ($computer_case->water_cooled_support && strpos($cpu_cooler->water_cooled_support, 'Yes'))
                    $distances["$specific_column"] = 0;
                else
                    $distances["$specific_column"] = $specific_weight * 10;

            } elseif ($specific_column == 'cooler_clearance' && isset($cpu_cooler->component->height)) {
                $distances["$specific_column"] = $specific_weight * (($cpu_cooler->component->height - $computer_case->{$specific_column}) ** 2);

            } elseif (is_numeric($cpu_cooler->{$specific_column}) || is_numeric($computer_case->{$specific_column})) {
                $distances["$specific_column"] = $specific_weight * (($cpu_cooler->{$specific_column} - $computer_case->{$specific_column}) ** 2);

            } else {
                $distances["$specific_column"] = $specific_weight * (levenshtein($cpu_cooler->{$specific_column}, $computer_case->{$specific_column}) ** 2);
            }
        }

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function GraphicsCard_RAM(Component $component_1, Component $component_2)
    {
        $distances = self::ComponentSimilarity($component_1, $component_2);

        $graphics_card = $component_1->type == 'Graphics Card' ? $component_1->graphics_card : $component_2->graphics_card;
        $ram = $component_1->type == 'RAM' ? $component_1->ram : $component_2->ram;

        $specific_weights = [

        ];

        foreach ($specific_weights as $specific_column => $specific_weight) {
            if (is_numeric($graphics_card->{$specific_column}) || is_numeric($ram->{$specific_column})) {
                $distances["$specific_column"] = $specific_weight * (($graphics_card->{$specific_column} - $ram->{$specific_column}) ** 2);
            } else {
                $distances["$specific_column"] = $specific_weight * (levenshtein($graphics_card->{$specific_column}, $ram->{$specific_column}) ** 2);
            }
        }

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function GraphicsCard_Storage(Component $component_1, Component $component_2)
    {
        $distances = self::ComponentSimilarity($component_1, $component_2);

        $graphics_card = $component_1->type == 'Graphics Card' ? $component_1->graphics_card : $component_2->graphics_card;
        $storage = $component_1->type == 'Storage' ? $component_1->storage : $component_2->storage;

        $specific_weights = [

        ];

        foreach ($specific_weights as $specific_column => $specific_weight) {
            if (is_numeric($graphics_card->{$specific_column}) || is_numeric($storage->{$specific_column})) {
                $distances["$specific_column"] = $specific_weight * (($graphics_card->{$specific_column} - $storage->{$specific_column}) ** 2);
            } else {
                $distances["$specific_column"] = $specific_weight * (levenshtein($graphics_card->{$specific_column}, $storage->{$specific_column}) ** 2);
            }
        }

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function GraphicsCard_PSU(Component $component_1, Component $component_2)
    {
        $distances = self::ComponentSimilarity($component_1, $component_2);

        $graphics_card = $component_1->type == 'Graphics Card' ? $component_1->graphics_card : $component_2->graphics_card;
        $psu = $component_1->type == 'PSU' ? $component_1->psu : $component_2->psu;

        $specific_weights = [

        ];

        foreach ($specific_weights as $specific_column => $specific_weight) {
            if (is_numeric($graphics_card->{$specific_column}) || is_numeric($psu->{$specific_column})) {
                $distances["$specific_column"] = $specific_weight * (($graphics_card->{$specific_column} - $psu->{$specific_column}) ** 2);
            } else {
                $distances["$specific_column"] = $specific_weight * (levenshtein($graphics_card->{$specific_column}, $psu->{$specific_column}) ** 2);
            }
        }

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function GraphicsCard_ComputerCase(Component $component_1, Component $component_2)
    {
        $distances = self::ComponentSimilarity($component_1, $component_2);

        $graphics_card = $component_1->type == 'Graphics Card' ? $component_1->graphics_card : $component_2->graphics_card;
        $computer_case = $component_1->type == 'Computer Case' ? $component_1->computer_case : $component_2->computer_case;

        $specific_weights = [
            'graphics_clearance' => 0.1
        ];

        foreach ($specific_weights as $specific_column => $specific_weight) {
            if ($specific_column == 'graphics_clearance' && isset($graphics_card->component->height)) {
                $distances["$specific_column"] = $specific_weight * (($graphics_card->component->height - $computer_case->{$specific_column}) ** 2);

            } elseif (is_numeric($graphics_card->{$specific_column}) || is_numeric($computer_case->{$specific_column})) {
                $distances["$specific_column"] = $specific_weight * (($graphics_card->{$specific_column} - $computer_case->{$specific_column}) ** 2);
            } else {
                $distances["$specific_column"] = $specific_weight * (levenshtein($graphics_card->{$specific_column}, $computer_case->{$specific_column}) ** 2);
            }
        }

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function RAM_Storage(Component $component_1, Component $component_2)
    {
        $distances = self::ComponentSimilarity($component_1, $component_2);

        $ram = $component_1->type == 'RAM' ? $component_1->ram : $component_2->ram;
        $storage = $component_1->type == 'Storage' ? $component_1->storage : $component_2->storage;

        $specific_weights = [

        ];

        foreach ($specific_weights as $specific_column => $specific_weight) {
            if (is_numeric($ram->{$specific_column}) || is_numeric($storage->{$specific_column})) {
                $distances["$specific_column"] = $specific_weight * (($ram->{$specific_column} - $storage->{$specific_column}) ** 2);
            } else {
                $distances["$specific_column"] = $specific_weight * (levenshtein($ram->{$specific_column}, $storage->{$specific_column}) ** 2);
            }
        }

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function RAM_PSU(Component $component_1, Component $component_2)
    {
        $distances = self::ComponentSimilarity($component_1, $component_2);

        $ram = $component_1->type == 'RAM' ? $component_1->ram : $component_2->ram;
        $psu = $component_1->type == 'PSU' ? $component_1->psu : $component_2->psu;

        $specific_weights = [

        ];

        foreach ($specific_weights as $specific_column => $specific_weight) {
            if (is_numeric($ram->{$specific_column}) || is_numeric($psu->{$specific_column})) {
                $distances["$specific_column"] = $specific_weight * (($ram->{$specific_column} - $psu->{$specific_column}) ** 2);
            } else {
                $distances["$specific_column"] = $specific_weight * (levenshtein($ram->{$specific_column}, $psu->{$specific_column}) ** 2);
            }
        }

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function RAM_ComputerCase(Component $component_1, Component $component_2)
    {
        $distances = self::ComponentSimilarity($component_1, $component_2);

        $ram = $component_1->type == 'RAM' ? $component_1->ram : $component_2->ram;
        $computer_case = $component_1->type == 'Computer Case' ? $component_1->computer_case : $component_2->computer_case;

        $specific_weights = [

        ];

        foreach ($specific_weights as $specific_column => $specific_weight) {
            if (is_numeric($ram->{$specific_column}) || is_numeric($computer_case->{$specific_column})) {
                $distances["$specific_column"] = $specific_weight * (($ram->{$specific_column} - $computer_case->{$specific_column}) ** 2);
            } else {
                $distances["$specific_column"] = $specific_weight * (levenshtein($ram->{$specific_column}, $computer_case->{$specific_column}) ** 2);
            }
        }

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function Storage_PSU(Component $component_1, Component $component_2)
    {
        $distances = self::ComponentSimilarity($component_1, $component_2);

        $storage = $component_1->type == 'Storage' ? $component_1->storage : $component_2->storage;
        $psu = $component_1->type == 'PSU' ? $component_1->psu : $component_2->psu;

        $specific_weights = [

        ];

        foreach ($specific_weights as $specific_column => $specific_weight) {
            if (is_numeric($storage->{$specific_column}) || is_numeric($psu->{$specific_column})) {
                $distances["$specific_column"] = $specific_weight * (($storage->{$specific_column} - $psu->{$specific_column}) ** 2);
            } else {
                $distances["$specific_column"] = $specific_weight * (levenshtein($storage->{$specific_column}, $psu->{$specific_column}) ** 2);
            }
        }

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function Storage_ComputerCase(Component $component_1, Component $component_2)
    {
        $distances = self::ComponentSimilarity($component_1, $component_2);

        $storage = $component_1->type == 'Storage' ? $component_1->storage : $component_2->storage;
        $computer_case = $component_1->type == 'Computer Case' ? $component_1->computer_case : $component_2->computer_case;

        $specific_weights = [
            'storage_form_factor' => 10
        ];

        foreach ($specific_weights as $specific_column => $specific_weight) {
            if ($specific_column == 'storage_form_factor' && ($storage->storage_form_factor == '2.5' || $storage->storage_form_factor == '3.5')) {

                $internal_bay = 'internal_' . str_replace('.5', '50', $storage->storage_form_factor) . '_bay';
                $internal_bays = $computer_case->{$internal_bay};

                if ($internal_bays != 0) $distances["$specific_column"] = 0;
                else $distances["$specific_column"] = $specific_weight * 10;

            } elseif (is_numeric($storage->{$specific_column}) || is_numeric($computer_case->{$specific_column})) {
                $distances["$specific_column"] = $specific_weight * (($storage->{$specific_column} - $computer_case->{$specific_column}) ** 2);
            } else {
                $distances["$specific_column"] = $specific_weight * (levenshtein($storage->{$specific_column}, $computer_case->{$specific_column}) ** 2);
            }
        }

        $result = sqrt(array_sum($distances));

        return $result;
    }

    private static function PSU_ComputerCase(Component $component_1, Component $component_2)
    {
        $distances = self::ComponentSimilarity($component_1, $component_2);

        $psu = $component_1->type == 'PSU' ? $component_1->psu : $component_2->psu;
        $computer_case = $component_1->type == 'Computer Case' ? $component_1->computer_case : $component_2->computer_case;

        $specific_weights = [
            'psu_clearance' => 0.1
        ];

        foreach ($specific_weights as $specific_column => $specific_weight) {
            if ($specific_column == 'psu_clearance' && isset($psu->component->height)) {
                $distances["$specific_column"] = $specific_weight * (($psu->component->height - $computer_case->{$specific_column}) ** 2);
            } elseif (is_numeric($psu->{$specific_column}) || is_numeric($computer_case->{$specific_column})) {
                $distances["$specific_column"] = $specific_weight * (($psu->{$specific_column} - $computer_case->{$specific_column}) ** 2);
            } else {
                $distances["$specific_column"] = $specific_weight * (levenshtein($psu->{$specific_column}, $computer_case->{$specific_column}) ** 2);
            }
        }

        $result = sqrt(array_sum($distances));

        return $result;
    }
}
