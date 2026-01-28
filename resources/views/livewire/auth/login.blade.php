c<div class="flex flex-col items-center justify-center min-h-screen w-full bg-[#fafafa]  p-4">
    
    <div class="w-full max-w-[400px] p-8 bg-white dark:bg-[#1C1C1A] shadow-sm border border-[#e3e3e0] dark:border-[#2e2e2b] rounded-xl">
        
        <div class="mb-8 text-center">
            <h1 class="text-2xl font-semibold tracking-tight dark:text-white">Welcome back</h1>
            <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] mt-2">Please enter your details to sign in.</p>
        </div>

        @if (session()->has('status'))
            <div class="mb-4 p-3 text-sm font-medium text-green-600 bg-green-50 dark:bg-green-900/20 rounded-lg">
                {{ session('status') }}
            </div>
        @endif

        <form wire:submit="authenticate" class="space-y-5">
            <div>
                <label for="email" class="block text-sm mb-1.5 font-medium dark:text-[#EDEDEC]">Email Address</label>
                <input wire:model="email" type="email" id="email" placeholder=""
                    class="w-full px-3 py-2.5 text-sm bg-transparent border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-lg focus:ring-2 focus:ring-[#1b1b18] focus:border-transparent dark:focus:ring-[#eeeeec] outline-none transition-all dark:text-white" />
                @error('email') <span class="text-[12px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <div class="flex justify-between items-center mb-1.5">
                    <label for="password" class="block text-sm font-medium dark:text-[#EDEDEC]">Password</label>
                    <a href="#" class="text-xs text-[#706f6c] hover:text-black dark:hover:text-white">Forgot?</a>
                </div>
                <input wire:model="password" type="password" id="password" placeholder=""
                    class="w-full px-3 py-2.5 text-sm bg-transparent border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-lg focus:ring-2 focus:ring-[#1b1b18] focus:border-transparent dark:focus:ring-[#eeeeec] outline-none transition-all dark:text-white" />
                @error('password') <span class="text-[12px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div class="flex items-center gap-2">
                <input wire:model="remember" type="checkbox" id="remember" 
                    class="w-4 h-4 rounded border-[#e3e3e0] text-[#1b1b18] focus:ring-[#1b1b18]">
                <label for="remember" class="text-sm text-[#706f6c] dark:text-[#A1A09A] cursor-pointer">Remember me</label>
            </div>

            <button type="submit" 
                class="w-full py-2.5 bg-[#1b1b18] dark:bg-[#eeeeec] text-white dark:text-[#1C1C1A] rounded-lg text-sm font-semibold hover:opacity-90 active:scale-[0.98] transition-all shadow-sm">
                Sign in
            </button>
        </form>

        <div class="mt-8 pt-6 border-t border-[#f0f0ee] dark:border-[#2e2e2b] text-center">
            <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">
                Don't have an account? 
                <a href="{{ route('register') }}" class="text-[#1b1b18] dark:text-white font-medium hover:underline underline-offset-4">Create account</a>
            </p>
        </div>
    </div>
</div>