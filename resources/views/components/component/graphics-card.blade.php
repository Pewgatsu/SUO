<div class="modal fade text-start" id="{{ $setID() }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="{{ $setID() }}_label" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ $setRoute() }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="{{ $setID() }}_label">{{ $setTitle() }} Graphics Card</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Component Attributes -->

                    <div class="mb-3">
                        @if($mode === 'edit' && isset($graphicsCard) && isset($graphicsCard->component->image_path))
                            <img class="img-fluid rounded mx-auto d-block mb-2"
                                 src="{{ asset('images/components/graphics_cards/' . $graphicsCard->component->image_path) }}"
                                 alt="">
                        @endif
                        <label for="graphics_card_image" class="form-label">Component Image</label>
                        <input class="form-control @error('graphics_card_image') is-invalid @enderror" type="file"
                               id="graphics_card_image" name="graphics_card_image">
                        @error('graphics_card_image')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('graphics_card_name') is-invalid @enderror"
                               id="graphics_card_name" name="graphics_card_name"
                               placeholder="Component Name" value="{{ old('graphics_card_name') ?? $oldField('graphics_card_name') }}">
                        <label for="graphics_card_name">Component Name</label>
                        @error('graphics_card_name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text"
                               class="form-control @error('graphics_card_manufacturer') is-invalid @enderror"
                               id="graphics_card_manufacturer"
                               name="graphics_card_manufacturer"
                               placeholder="Manufacturer" value="{{ old('graphics_card_manufacturer') ?? $oldField('graphics_card_manufacturer') }}">
                        <label for="graphics_card_manufacturer">Manufacturer</label>
                        @error('graphics_card_manufacturer')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('graphics_card_series') is-invalid @enderror"
                               id="graphics_card_series"
                               name="graphics_card_series" placeholder="Series"
                               value="{{ old('graphics_card_series') ?? $oldField('graphics_card_series') }}">
                        <label for="graphics_card_series">Series</label>
                        @error('graphics_card_series')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('graphics_card_model') is-invalid @enderror"
                               id="graphics_card_model" name="graphics_card_model"
                               placeholder="Model" value="{{ old('graphics_card_model') ?? $oldField('graphics_card_model') }}">
                        <label for="graphics_card_model">Model</label>
                        @error('graphics_card_model')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('graphics_card_color') is-invalid @enderror"
                               id="graphics_card_color" name="graphics_card_color"
                               placeholder="Color" value="{{ old('graphics_card_color') ?? $oldField('graphics_card_color') }}">
                        <label for="graphics_card_color">Color</label>
                        @error('graphics_card_color')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text"
                                       class="form-control @error('graphics_card_length') is-invalid @enderror"
                                       id="graphics_card_length"
                                       name="graphics_card_length"
                                       placeholder="Length (mm)" value="{{ old('graphics_card_length') ?? $oldField('graphics_card_length') }}">
                                <label for="graphics_card_length">Length (mm)</label>
                                @error('graphics_card_length')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text"
                                       class="form-control @error('graphics_card_width') is-invalid @enderror"
                                       id="graphics_card_width"
                                       name="graphics_card_width"
                                       placeholder="Width (mm)" value="{{ old('graphics_card_width') ?? $oldField('graphics_card_width') }}">
                                <label for="graphics_card_width">Width (mm)</label>
                                @error('graphics_card_width')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text"
                                       class="form-control @error('graphics_card_height') is-invalid @enderror"
                                       id="graphics_card_height"
                                       name="graphics_card_height"
                                       placeholder="Height (mm)" value="{{ old('graphics_card_height') ?? $oldField('graphics_card_height') }}">
                                <label for="graphics_card_height">Height (mm)</label>
                                @error('graphics_card_height')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Graphics Card Attributes -->

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('graphics_card_chipset') is-invalid @enderror"
                               id="graphics_card_chipset"
                               name="graphics_card_chipset"
                               placeholder="GPU Chipset" value="{{ old('graphics_card_chipset') ?? $oldField('graphics_card_chipset') }}">
                        <label for="graphics_card_chipset">GPU Chipset</label>
                        @error('graphics_card_chipset')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('graphics_card_memory') is-invalid @enderror"
                               id="graphics_card_memory"
                               name="graphics_card_memory" placeholder="GPU Memory"
                               value="{{ old('graphics_card_memory') ?? $oldField('graphics_card_memory') }}">
                        <label for="graphics_card_memory">GPU Memory (GB)</label>
                        @error('graphics_card_memory')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text"
                               class="form-control @error('graphics_card_memory_type') is-invalid @enderror"
                               id="graphics_card_memory_type"
                               name="graphics_card_memory_type"
                               placeholder="GPU Memory Type" value="{{ old('graphics_card_memory_type') ?? $oldField('graphics_card_memory_type') }}">
                        <label for="graphics_card_memory_type">GPU Memory Type</label>
                        @error('graphics_card_memory_type')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text"
                               class="form-control @error('graphics_card_base_clock') is-invalid @enderror"
                               id="graphics_card_base_clock"
                               name="graphics_card_base_clock"
                               placeholder="Base Clock (MHz)" value="{{ old('graphics_card_base_clock') ?? $oldField('graphics_card_base_clock') }}">
                        <label for="graphics_card_base_clock">Base Clock (MHz)</label>
                        @error('graphics_card_base_clock')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text"
                               class="form-control @error('graphics_card_boost_clock') is-invalid @enderror"
                               id="graphics_card_boost_clock"
                               name="graphics_card_boost_clock"
                               placeholder="Boost Clock (MHz)" value="{{ old('graphics_card_boost_clock') ?? $oldField('graphics_card_boost_clock') }}">
                        <label for="graphics_card_boost_clock">Boost Clock (MHz)</label>
                        @error('graphics_card_boost_clock')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text"
                               class="form-control @error('graphics_card_interface') is-invalid @enderror"
                               id="graphics_card_interface"
                               name="graphics_card_interface"
                               placeholder="Interface" value="{{ old('graphics_card_interface') ?? $oldField('graphics_card_interface') }}">
                        <label for="graphics_card_interface">Interface</label>
                        @error('graphics_card_interface')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('graphics_card_tdp') is-invalid @enderror"
                               id="graphics_card_tdp" name="graphics_card_tdp"
                               placeholder="TDP (W)" value="{{ old('graphics_card_tdp') ?? $oldField('graphics_card_tdp') }}">
                        <label for="graphics_card_tdp">TDP (W)</label>
                        @error('graphics_card_tdp')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text"
                               class="form-control @error('graphics_card_multigraphics_support') is-invalid @enderror"
                               id="graphics_card_multigraphics_support"
                               name="graphics_card_multigraphics_support"
                               placeholder="Multigraphics Support"
                               value="{{ old('graphics_card_multigraphics_support') ?? $oldField('graphics_card_multigraphics_support') }}">
                        <label for="graphics_card_multigraphics_support">Multigraphics Support</label>
                        @error('graphics_card_multigraphics_support')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text"
                               class="form-control @error('graphics_card_frame_sync') is-invalid @enderror"
                               id="graphics_card_frame_sync"
                               name="graphics_card_frame_sync"
                               placeholder="Frame Sync" value="{{ old('graphics_card_frame_sync') ?? $oldField('graphics_card_frame_sync') }}">
                        <label for="graphics_card_frame_sync">Frame Sync</label>
                        @error('graphics_card_frame_sync')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number"
                               class="form-control @error('graphics_card_dvi_port') is-invalid @enderror"
                               id="graphics_card_dvi_port"
                               name="graphics_card_dvi_port" min="0"
                               max="8"
                               placeholder="DVI Port" value="{{ old('graphics_card_dvi_port') ?? $oldField('graphics_card_dvi_port') }}">
                        <label for="graphics_card_dvi_port">DVI Port</label>
                        @error('graphics_card_dvi_port')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number"
                               class="form-control @error('graphics_card_hdmi_port') is-invalid @enderror"
                               id="graphics_card_hdmi_port"
                               name="graphics_card_hdmi_port" min="0"
                               max="8"
                               placeholder="HDMI Port" value="{{ old('graphics_card_hdmi_port') ?? $oldField('graphics_card_hdmi_port') }}">
                        <label for="graphics_card_hdmi_port">HDMI Port</label>
                        @error('graphics_card_hdmi_port')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number"
                               class="form-control @error('graphics_card_mini_hdmi_port') is-invalid @enderror"
                               id="graphics_card_mini_hdmi_port"
                               name="graphics_card_mini_hdmi_port" min="0"
                               max="8"
                               placeholder="Mini-HDMI Port" value="{{ old('graphics_card_mini_hdmi_port') ?? $oldField('graphics_card_mini_hdmi_port') }}">
                        <label for="graphics_card_mini_hdmi_port">Mini-HDMI Port</label>
                        @error('graphics_card_mini_hdmi_port')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number"
                               class="form-control @error('graphics_card_displayport_port') is-invalid @enderror"
                               id="graphics_card_displayport_port"
                               name="graphics_card_displayport_port" min="0"
                               max="8"
                               placeholder="DisplayPort Port" value="{{ old('graphics_card_displayport_port') ?? $oldField('graphics_card_displayport_port') }}">
                        <label for="graphics_card_displayport_port">DisplayPort Port</label>
                        @error('graphics_card_displayport_port')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number"
                               class="form-control @error('graphics_card_mini_displayport_port') is-invalid @enderror"
                               id="graphics_card_mini_displayport_port"
                               name="graphics_card_mini_displayport_port" min="0"
                               max="8"
                               placeholder="Mini-DisplayPort Port"
                               value="{{ old('graphics_card_mini_displayport_port') ?? $oldField('graphics_card_mini_displayport_port') }}">
                        <label for="graphics_card_mini_displayport_port">Mini-DisplayPort Port</label>
                        @error('graphics_card_mini_displayport_port')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number"
                               class="form-control @error('graphics_card_e_slot_width') is-invalid @enderror"
                               id="graphics_card_e_slot_width"
                               name="graphics_card_e_slot_width" min="0"
                               max="8"
                               placeholder="Expansion Slot Width" value="{{ old('graphics_card_e_slot_width') ?? $oldField('graphics_card_e_slot_width') }}">
                        <label for="graphics_card_e_slot_width">Expansion Slot Width</label>
                        @error('graphics_card_e_slot_width')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text"
                               class="form-control @error('graphics_card_external_power') is-invalid @enderror"
                               id="graphics_card_external_power"
                               name="graphics_card_external_power"
                               placeholder="External Power" value="{{ old('graphics_card_external_power') ?? $oldField('graphics_card_external_power') }}">
                        <label for="graphics_card_external_power">External Power</label>
                        @error('graphics_card_external_power')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('graphics_card_cooling') is-invalid @enderror"
                               id="graphics_card_cooling"
                               name="graphics_card_cooling" placeholder="Cooling"
                               value="{{ old('graphics_card_cooling') ?? $oldField('graphics_card_cooling') }}">
                        <label for="graphics_card_cooling">Cooling</label>
                        @error('graphics_card_cooling')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">{{ $setTitle() }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
