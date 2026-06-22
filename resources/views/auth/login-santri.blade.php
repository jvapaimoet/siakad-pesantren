<x-guest-layout>
    <div class="text-center mb-6">
        <div class="flex items-center justify-center mb-4">
            <i class="fas fa-graduation-cap text-5xl text-purple-700"></i>
        </div>
        <h2 class="text-2xl font-bold">Login Santri</h2>
        <p class="text-gray-600 text-sm">Masuk sebagai siswa</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="hidden" name="role" value="santri">

        <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email"
                name="email"
                value="{{ old('email') }}"
                class="w-full rounded-lg border-gray-300 mt-1 @error('email') border-red-500 @enderror">
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password"
                name="password"
                class="w-full rounded-lg border-gray-300 mt-1 @error('password') border-red-500 @enderror">
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
            class="w-full mt-6 bg-purple-700 hover:bg-purple-800 text-white py-2 rounded-lg font-semibold transition">
            Masuk
        </button>

        <div class="mt-4 text-center">
            <a href="{{ route('role-selector') }}" class="text-sm text-blue-600 hover:text-blue-900">
                ← Kembali ke Pilihan Akun
            </a>
        </div>

        <div class="mt-4 text-center text-sm text-gray-600">
            Belum punya akun?
            <a href="{{ route('register') }}" class="font-semibold text-green-700 hover:text-green-900">
                Daftar akun baru
            </a>
        </div>
    </form>
</x-guest-layout>
