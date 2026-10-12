<x-layouts.app>
    <x-slot:title>Masuk Petugas Administrasi - SIGAP KB</x-slot:title>

    <div class="py-16 sm:py-24 bg-slate-50 flex items-center justify-center">
        <div class="w-full max-w-md px-4 sm:px-6">

            <div class="bg-white rounded-3xl border border-slate-200 shadow-xl p-8 space-y-6">
                <!-- Header -->
                <div class="text-center space-y-2">
                    <div class="w-12 h-12 rounded-2xl bg-teal-100 text-teal-700 flex items-center justify-center mx-auto">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <h1 class="text-2xl font-black text-slate-900 tracking-tight">Login Petugas KB</h1>
                    <p class="text-xs text-slate-500">Masuk untuk mengelola data pasien, laporan, dan QR Code.</p>
                </div>

                <form method="POST" action="{{ route('login.post') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label for="email" class="block text-xs font-bold text-slate-700 mb-1">Alamat Email Petugas</label>
                        <input type="email" id="email" name="email" value="{{ old('email', 'admin@sigapkb.test') }}" required autofocus placeholder="admin@sigapkb.test" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-teal-600 focus:ring-2 focus:ring-teal-500/20 text-sm transition-colors @error('email') border-rose-400 @enderror">
                        @error('email')
                            <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-1">
                            <label for="password" class="block text-xs font-bold text-slate-700">Kata Sandi (Password)</label>
                        </div>
                        <input type="password" id="password" name="password" value="password" required placeholder="••••••••" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-teal-600 focus:ring-2 focus:ring-teal-500/20 text-sm transition-colors @error('password') border-rose-400 @enderror">
                        @error('password')
                            <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between text-xs">
                        <label class="flex items-center gap-2 cursor-pointer text-slate-600">
                            <input type="checkbox" name="remember" class="rounded text-teal-600 focus:ring-teal-500 h-4 w-4">
                            <span>Ingat saya</span>
                        </label>
                    </div>

                    <button type="submit" class="w-full py-3.5 rounded-xl text-sm font-bold text-white bg-teal-600 hover:bg-teal-700 shadow-md shadow-teal-600/20 transition-colors">
                        Masuk ke Panel Admin &rarr;
                    </button>
                </form>

                <!-- Demo helper box -->
                <!-- <div class="p-4 rounded-2xl bg-teal-50/70 border border-teal-100 text-xs text-teal-900 space-y-1">
                    <span class="font-bold flex items-center gap-1.5 text-teal-800">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Akun Administrator Default:
                    </span>
                    <p class="font-mono text-[11px] text-teal-700">Email: <strong>admin@sigapkb.test</strong></p>
                    <p class="font-mono text-[11px] text-teal-700">Password: <strong>password</strong></p>
                </div> -->
            </div>

        </div>
    </div>
</x-layouts.app>
