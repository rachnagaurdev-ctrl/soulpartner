<div>
    @if($success)
        <div class="success-message p-6 bg-green-50 border border-green-200 rounded-xl text-center">
            <div class="flex justify-center mb-4">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                </div>
            </div>
            <h3 class="text-xl font-semibold text-green-800 mb-2">Success!</h3>
            <p class="text-green-700">{{ $formModel->settings['success_message'] ?? 'Your submission has been received.' }}</p>
            <button wire:click="$set('success', false)" class="mt-4 text-sm font-medium text-green-600 hover:text-green-500 underline">
                Send another message
            </button>
        </div>
    @else
        <form wire:submit.prevent="submit" class="space-y-6">
            <div class="grid grid-cols-1 gap-6">
                @foreach($formModel->fields as $field)
                    @php
                        $type = $field['type'];
                        $config = $field['data'];
                        $name = $config['name'];
                        $label = $config['label'];
                        $placeholder = $config['placeholder'] ?? '';
                        $required = $config['required'] ?? false;
                    @endphp

                    <div class="form-group">
                        <label for="{{ $name }}" class="block text-sm font-semibold text-primary mb-2">
                            {{ $label }} @if($required)<span class="text-secondary">*</span>@endif
                        </label>

                        @if($type === 'text' || $type === 'email')
                            <input type="{{ $type }}" 
                                   wire:model="data.{{ $name }}" 
                                   id="{{ $name }}"
                                   placeholder="{{ $placeholder }}"
                                   class="w-full px-4 py-3 bg-white border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-200 @error('data.'.$name) border-red-500 @enderror">
                        
                        @elseif($type === 'textarea')
                            <textarea wire:model="data.{{ $name }}" 
                                      id="{{ $name }}" 
                                      rows="4"
                                      placeholder="{{ $placeholder }}"
                                      class="w-full px-4 py-3 bg-white border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-200 @error('data.'.$name) border-red-500 @enderror"></textarea>

                        @elseif($type === 'select')
                            <select wire:model="data.{{ $name }}" 
                                    id="{{ $name }}"
                                    class="w-full px-4 py-3 bg-white border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-200 @error('data.'.$name) border-red-500 @enderror">
                                <option value="">Select an option</option>
                                @foreach($config['options'] as $option)
                                    <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
                                @endforeach
                            </select>

                        @elseif($type === 'checkbox')
                            <div class="flex items-center">
                                <input type="checkbox" 
                                       wire:model="data.{{ $name }}" 
                                       id="{{ $name }}"
                                       class="w-5 h-5 text-primary border-gray-300 rounded focus:ring-primary @error('data.'.$name) border-red-500 @enderror">
                                <label for="{{ $name }}" class="ml-3 text-sm text-gray-600">
                                    {{ $label }}
                                </label>
                            </div>
                        @endif

                        @error('data.'.$name)
                            <p class="mt-1 text-xs text-secondary">{{ $message }}</p>
                        @enderror
                    </div>
                @endforeach
            </div>

            <div class="pt-4">
                <button type="submit" 
                        class="primary_btn w-full justify-center py-4 text-lg font-bold group"
                        wire:loading.attr="disabled">
                    <span class="primary_btn_text" wire:loading.remove>
                        {{ $formModel->settings['submit_button_text'] ?? 'Submit' }}
                        <div class="arrow_main">
                            <span class="primary_btn_icon primary_btn_top">
                                <img class="img-fluid" src="{{ asset('assets/images/arrow-icon-white.svg') }}" alt="">
                            </span>  
                            <span class="primary_btn_icon primary_btn_bottom">
                                <img class="img-fluid" src="{{ asset('assets/images/arrow-icon-white.svg') }}" alt="">
                            </span>
                        </div>
                    </span>
                    <span wire:loading class="flex items-center gap-2">
                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Processing...
                    </span>
                </button>
            </div>
        </form>
    @endif
</div>
