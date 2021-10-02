<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute must be accepted.',
    'accepted_if' => 'The :attribute must be accepted when :other is :value.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute must only contain letters.',
    'alpha_dash' => 'The :attribute must only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute must only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'current_password' => 'The password is incorrect.',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'The :attribute must be a valid email address.',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'The :attribute must not be greater than :max.',
        'file' => 'The :attribute must not be greater than :max kilobytes.',
        'string' => 'The :attribute must not be greater than :max characters.',
        'array' => 'The :attribute must not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'The :attribute must be at least :min characters.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'multiple_of' => 'The :attribute must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'password' => 'The password is incorrect.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid timezone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute must be a valid URL.',
    'uuid' => 'The :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        // Motherboard
        'mobo_image' => 'Component Image',
        'mobo_name' => 'Component Name',
        'mobo_manufacturer' => 'Manufacturer',
        'mobo_series' => 'Series',
        'mobo_model' => 'Model',
        'mobo_color' => 'Color',
        'mobo_length' => 'Length',
        'mobo_width' => 'Width',
        'mobo_height' => 'Height',

        'mobo_cpu_socket' => 'CPU Socket',
        'mobo_form_factor' => 'Form Factor',
        'mobo_chipset' => 'Chipset',
        'mobo_memory_slot' => 'Memory Slot',
        'mobo_memory_type' => 'Memory Type',
        'mobo_max_mem_support' => 'Maximum Memory Support',
        'mobo_mem_speed_support' => 'Memory Speed Support',
        'mobo_pcie_x16_slot' => 'PCIe x16 Slot',
        'mobo_pcie_x8_slot' => 'PCIe x8 Slot',
        'mobo_pcie_x4_slot' => 'PCIe x4 Slot',
        'mobo_pcie_x1_slot' => 'PCIe x1 Slot',
        'mobo_pci_slot' => 'PCI Slot',
        'mobo_m2_slot' => 'M.2 Slot',
        'mobo_sata_6gb_slot' => 'SATA 6 Gb/s Slot',
        'mobo_sata_3gb_slot' => 'SATA 3 Gb/s Slot',
        'mobo_multigraphics_support' => 'Multigraphics Support',
        'mobo_ecc_support' => 'ECC Support',
        'mobo_raid_support' => 'RAID Support',
        'mobo_wireless_support' => 'Wireless Support',

        // CPU
        'cpu_image' => 'Component Image',
        'cpu_name' => 'Component Name',
        'cpu_manufacturer' => 'Manufacturer',
        'cpu_series' => 'Series',
        'cpu_model' => 'Model',
        'cpu_color' => 'Color',
        'cpu_length' => 'Length',
        'cpu_width' => 'Width',
        'cpu_height' => 'Height',

        'cpu_socket' => 'CPU Socket',
        'cpu_microarchitecture' => 'Microarchitecture',
        'cpu_core_count' => 'Core Count',
        'cpu_thread_count' => 'Thread Count',
        'cpu_base_clock' => 'Base Clock',
        'cpu_boost_clock' => 'Boost Clock',
        'cpu_max_mem_support' => 'Maximum Memory Support',
        'cpu_tdp' => 'TDP',
        'cpu_smt_support' => 'SMT Support',
        'cpu_ecc_support' => 'ECC Support',
        'cpu_integrated_graphics' => 'Integrated Graphics',

        // CPU Cooler
        'cpu_cooler_image' => 'Component Image',
        'cpu_cooler_name' => 'Component Name',
        'cpu_cooler_manufacturer' => 'Manufacturer',
        'cpu_cooler_series' => 'Series',
        'cpu_cooler_model' => 'Model',
        'cpu_cooler_color' => 'Color',
        'cpu_cooler_length' => 'Length',
        'cpu_cooler_width' => 'Width',
        'cpu_cooler_height' => 'Height',

        'cpu_cooler_cpu_socket' => 'CPU Socket',
        'cpu_cooler_fan_speed' => 'Fan Speed',
        'cpu_cooler_noise_level' => 'Noise Level',
        'cpu_cooler_water_cooled' => 'Water Cooled Support',

        // Graphics Card
        'graphics_card_image' => 'Component Image',
        'graphics_card_name' => 'Component Name',
        'graphics_card_manufacturer' => 'Manufacturer',
        'graphics_card_series' => 'Series',
        'graphics_card_model' => 'Model',
        'graphics_card_color' => 'Color',
        'graphics_card_length' => 'Length',
        'graphics_card_width' => 'Width',
        'graphics_card_height' => 'Height',

        'graphics_card_chipset' => 'GPU Chipset',
        'graphics_card_memory' => 'GPU Memory',
        'graphics_card_memory_type' => 'GPU Memory Type',
        'graphics_card_base_clock' => 'Base Clock',
        'graphics_card_boost_clock' => 'Boost Clock',
        'graphics_card_interface' => 'Interface',
        'graphics_card_tdp' => 'TDP',
        'graphics_card_multigraphics_support' => 'Multigraphics Support',
        'graphics_card_frame_sync' => 'Frame Sync',
        'graphics_card_dvi_port' => 'DVI Port',
        'graphics_card_hdmi_port' => 'HDMI Port',
        'graphics_card_mini_hdmi_port' => 'Mini-HDMI Port',
        'graphics_card_displayport_port' => 'DisplayPort Port',
        'graphics_card_mini_displayport_port' => 'Mini-DisplayPort Port',
        'graphics_card_e_slot_width' => 'Expansion Slot Width',
        'graphics_card_external_power' => 'External Power',
        'graphics_card_cooling' => 'Cooling',

        // RAM
        'ram_image' => 'Component Image',
        'ram_name' => 'Component Name',
        'ram_manufacturer' => 'Manufacturer',
        'ram_series' => 'Series',
        'ram_model' => 'Model',
        'ram_color' => 'Color',
        'ram_length' => 'Length',
        'ram_width' => 'Width',
        'ram_height' => 'Height',

        'ram_memory_type' => 'Memory Type',
        'ram_memory_speed' => 'Memory Speed',
        'ram_memory_capacity' => 'Memory Capacity',
        'ram_form_factor' => 'Form Factor',
        'ram_modules' => 'Modules',
        'ram_voltage' => 'Voltage',
        'ram_timings' => 'Memory Timings',
        'ram_ecc_memory' => 'ECC Memory',
        'ram_registered_memory' => 'Registered Memory',
        'ram_heat_spreader' => 'Heat Spreader',

        // Storage
        'storage_image' => 'Component Image',
        'storage_name' => 'Component Name',
        'storage_manufacturer' => 'Manufacturer',
        'storage_series' => 'Series',
        'storage_model' => 'Model',
        'storage_color' => 'Color',
        'storage_length' => 'Length',
        'storage_width' => 'Width',
        'storage_height' => 'Height',

        'storage_type' => 'Storage Type',
        'storage_capacity' => 'Storage Capacity',
        'storage_interface' => 'Interface',
        'storage_form_factor' => 'Form Factor',
        'storage_cache' => 'Storage Cache',
        'storage_nvme' => 'NVMe',

        // PSU
        'psu_image' => 'Component Image',
        'psu_name' => 'Component Name',
        'psu_manufacturer' => 'Manufacturer',
        'psu_series' => 'Series',
        'psu_model' => 'Model',
        'psu_color' => 'Color',
        'psu_length' => 'Length',
        'psu_width' => 'Width',
        'psu_height' => 'Height',

        'psu_form_factor' => 'Form Factor',
        'psu_wattage' => 'Wattage',
        'psu_efficiency_rating' => 'Efficiency Rating',
        'psu_modular' => 'Modular',
        'psu_atx_connector' => 'ATX Connector',
        'psu_eps_connector'=> 'EPS Connector',
        'psu_sata_connector' => 'SATA Connector',
        'psu_molex_connector' => 'Molex 4-pin Connector',
        'psu_pcie_8pin_connector' => 'PCIe 8-pin Connector',
        'psu_pcie_62pin_connector' => 'PCIe 6+2-pin Connector',
        'psu_pcie_6pin_connector' => 'PCIe 6-pin Connector',

        // Computer Case
        'case_image' => 'Component Image',
        'case_name' => 'Component Name',
        'case_manufacturer' => 'Manufacturer',
        'case_series' => 'Series',
        'case_model' => 'Model',
        'case_color' => 'Color',
        'case_length' => 'Length',
        'case_width' => 'Width',
        'case_height' => 'Height',

        'case_type' => 'Computer Case Type',
        'case_mobo_form_factor' => 'Motherboard Form Factor',
        'case_power_supply' => 'Power Supply',
        'case_power_supply_shroud' => 'Power Supply Shroud',
        'case_side_panel_window' => 'Side Panel Window',
        'case_water_cooled_support' => 'Water Cooled Support',
        'case_cooler_clearance' => 'Cooler Clearance',
        'case_graphics_clearance' => 'Graphics Card Clearance',
        'case_psu_clearance' => 'PSU Clearance',
        'case_full_height_e_slot' => 'Full-Height Expansion Slot',
        'case_half_height_e_slot' => 'Half-Height Expansion Slot',
        'case_external_525_bay' => 'External 5.25" Bay',
        'case_external_350_bay' => 'External 3.5" Bay',
        'case_internal_350_bay' => 'Internal 3.5" Bay',
        'case_internal_250_bay' => 'Internal 2.5" Bay',



        'storeBanner' => 'Banner ',
        'storeName' => 'Store Name ',
        'storeLocation' => 'Store Location ',
        'storeAddress' => 'Store Address',
        'storeDescription' => 'Store Description ',

        'buildName' => ' Build Name',
        'buildDescription' => 'Build Description',


    ],

];
