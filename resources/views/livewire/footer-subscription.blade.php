<div class="subscribe_box mt-15">
    @if($success)
        <p class="text-white fs-18 fw-500 success-msg">Thank you for subscribing!</p>
    @else
        <form wire:submit.prevent="submit" method="post">
            <div class="footer_subscribe_inner">
            <input type="email" wire:model="email" placeholder="Enter your email address" class="subscribe_input @error('email') border-red-500 @enderror">
                <button  class="subscribe_btn" type="submit" wire:loading.attr="disabled">
                    <div class="img__wrap" wire:loading.remove>
                        <img class="img-fluid" src="{{ asset('assets/images/mail-send-icon.svg') }}" alt="">
                    </div>
                    <div wire:loading>
                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                </button>
            </div>
        </form>
        @error('email')
            <p class="text-secondary fs-12 mt-10">{{ $message }}</p>
        @enderror
    @endif
</div>
