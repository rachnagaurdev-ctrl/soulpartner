<div>
    @if($success)
        <div class="success-message" style="padding: 30px; background-color: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 15px; text-align: center;">
            <div style="display: flex; justify-content: center; margin-bottom: 16px;">
                <div style="width: 50px; height: 50px; background-color: #dcfce7; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #16a34a;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width: 24px; height: 24px;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                </div>
            </div>
            <h3 style="font-size: 22px; font-weight: 600; color: #166534; margin: 0 0 10px 0;">Success!</h3>
            <p style="color: #15803d; margin: 0;">{{ $formModel->settings['success_message'] ?? 'Your submission has been received.' }}</p>
            <button wire:click="$set('success', false)" style="margin-top: 20px; font-size: 15px; font-weight: 500; color: #E91E63; text-decoration: underline; background: none; border: none; cursor: pointer;">
                Send another message
            </button>
        </div>
    @else
        <form wire:submit.prevent="submit" class="contact-form">
            <!-- First Row: Full Name & Email -->
            <div class="form-row-2col" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 12px; margin-bottom: 12px;">
                @foreach($formModel->fields as $field)
                    @if(in_array($field['data']['name'], ['full_name', 'email']))
                        @php
                            $type = $field['type'];
                            $config = $field['data'];
                            $name = $config['name'];
                            $label = $config['label'];
                            $placeholder = $config['placeholder'] ?? '';
                            $required = $config['required'] ?? false;
                        @endphp
                        <div class="form-group">
                            <label for="{{ $name }}" class="form-label">
                                {{ $label }} @if($required)<span class="required-star">*</span>@endif
                            </label>
                            <input type="{{ $type }}" 
                                   wire:model="data.{{ $name }}" 
                                   id="{{ $name }}"
                                   placeholder="{{ $placeholder }}"
                                   class="form-input @error('data.'.$name) error @enderror">
                            @error('data.'.$name)
                                <p class="text-secondary" style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</p>
                            @enderror
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Other Fields -->
            @foreach($formModel->fields as $field)
                @if(!in_array($field['data']['name'], ['full_name', 'email']))
                    @php
                        $type = $field['type'];
                        $config = $field['data'];
                        $name = $config['name'];
                        $label = $config['label'];
                        $placeholder = $config['placeholder'] ?? '';
                        $required = $config['required'] ?? false;
                    @endphp

                    <div class="form-group" style="margin-bottom: 12px;">
                        @if($type !== 'checkbox')
                            <label for="{{ $name }}" class="form-label">
                                {{ $label }} @if($required)<span class="required-star">*</span>@endif
                            </label>
                        @endif

                        @if($type === 'text' || $type === 'email')
                            <input type="{{ $type }}" 
                                   wire:model="data.{{ $name }}" 
                                   id="{{ $name }}"
                                   placeholder="{{ $placeholder }}"
                                   class="form-input @error('data.'.$name) error @enderror">
                        
                        @elseif($type === 'textarea')
                            <textarea wire:model="data.{{ $name }}" 
                                      id="{{ $name }}" 
                                      rows="4"
                                      placeholder="{{ $placeholder }}"
                                      class="form-textarea @error('data.'.$name) error @enderror"></textarea>

                        @elseif($type === 'select')
                            <select wire:model="data.{{ $name }}" 
                                    id="{{ $name }}"
                                    class="form-select @error('data.'.$name) error @enderror">
                                <option value="">Select an option</option>
                                @foreach($config['options'] as $option)
                                    <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
                                @endforeach
                            </select>

                        @elseif($type === 'checkbox')
                            <div class="form-checkbox-row">
                                <input type="checkbox" 
                                       wire:model="data.{{ $name }}" 
                                       id="{{ $name }}"
                                       class="custom-checkbox @error('data.'.$name) error @enderror">
                                <label for="{{ $name }}" class="checkbox-label">
                                    {!! $label !!} @if($required)<span class="required-star">*</span>@endif
                                </label>
                            </div>
                        @endif

                        @error('data.'.$name)
                            <p class="text-secondary" style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</p>
                        @enderror
                    </div>
                @endif
            @endforeach

            <button type="submit" 
                    class="btn-submit-contact"
                    id="submitBtn"
                    wire:loading.attr="disabled">
                <div wire:loading.remove>
                    <svg class="send-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block; vertical-align:middle; width: 20px; height: 20px; margin-right: 8px;">
                        <line x1="22" y1="2" x2="11" y2="13"></line>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                    </svg>
                    <span style="vertical-align:middle;">{{ $formModel->settings['submit_button_text'] ?? 'Send Message' }}</span>
                </div>
                <div wire:loading>
                    <span style="vertical-align:middle;">Processing...</span>
                </div>
            </button>
        </form>
    @endif
</div>
