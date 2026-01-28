<div class="flex items-center justify-center w-full grow">
    <div class="w-full max-w-[400px] p-6 bg-white dark:bg-[#161615] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-lg">
        
        <div class="mb-6">
            <h1 class="text-lg font-medium dark:text-white">Create an account</h1>
            <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Join us by filling out the details below.</p>
        </div>

        <form wire:submit="register" class="flex flex-col gap-4">
            <div>
                <label class="block text-[13px] mb-1 font-medium dark:text-[#EDEDEC]">Full Name</label>
                <input wire:model="name" type="text" 
                    class="w-full px-3 py-2 text-sm bg-transparent border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm focus:outline-none focus:border-[#1b1b18] dark:focus:border-[#eeeeec] dark:text-white" />
                @error('name') <span class="text-[12px] text-[#f53003] mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-[13px] mb-1 font-medium dark:text-[#EDEDEC]">Email Address</label>
                <input wire:model="email" type="email" 
                    class="w-full px-3 py-2 text-sm bg-transparent border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm focus:outline-none focus:border-[#1b1b18] dark:focus:border-[#eeeeec] dark:text-white" />
                @error('email') <span class="text-[12px] text-[#f53003] mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-[13px] mb-1 font-medium dark:text-[#EDEDEC]">Password</label>
                <input wire:model="password" type="password" 
                    class="w-full px-3 py-2 text-sm bg-transparent border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm focus:outline-none focus:border-[#1b1b18] dark:focus:border-[#eeeeec] dark:text-white" />
                @error('password') <span class="text-[12px] text-[#f53003] mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-[13px] mb-1 font-medium dark:text-[#EDEDEC]">Confirm Password</label>
                <input wire:model="password_confirmation" type="password" 
                    class="w-full px-3 py-2 text-sm bg-transparent border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm focus:outline-none focus:border-[#1b1b18] dark:focus:border-[#eeeeec] dark:text-white" />
            </div>

            <button type="submit" 
                class="w-full mt-2 py-2 bg-[#1b1b18] dark:bg-[#eeeeec] text-white dark:text-[#1C1C1A] rounded-sm text-sm font-medium hover:opacity-90 transition-all disabled:opacity-50">
                <span wire:loading.remove>Create Account</span>
                <span wire:loading>Processing...</span>
            </button>
        </form>

        <div class="mt-6 text-center">
            <p class="text-[13px] text-[#706f6c] dark:text-[#A1A09A]">
                Already have an account? 
                <a href="{{ route('login') }}" class="text-[#1b1b18] dark:text-white underline underline-offset-4">Log in</a>
            </p>
        </div>
    </div>
</div>