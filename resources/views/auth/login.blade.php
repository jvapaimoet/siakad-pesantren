<x-guest-layout>
    <div class="text-center mb-6">
        <img src="{{ asset('images/sipes.jpg.jpg') }}"
             alt="Logo SIPES"
             class="w-24 h-24 mx-auto object-contain">

        <h2 class="text-2xl font-bold mt-4">
            SIPES
        </h2>

        <p class="text-gray-600">
            Sistem Informasi Pondok Pesantren
        </p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label>Tipe Akun</label>
            <select name="role" class="w-full rounded-lg border-gray-300">
                <option value="santri" @selected(old('role') === 'santri')>Santri</option>
                <option value="ustadz" @selected(old('role') === 'ustadz')>Ustadz/Ustadzah</option>
            </select>
        </div>

        <div class="mt-4">
            <label>Email</label>
            <input type="email"
                name="email"
                value="{{ old('email') }}"
                class="w-full rounded-lg border-gray-300">
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-4">
            <label>Password</label>
            <input type="password"
                name="password"
                class="w-full rounded-lg border-gray-300">
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button
            class="w-full mt-6 bg-green-700 text-white py-2 rounded-lg">
            Masuk
        </button>

        <div class="mt-4 text-center text-sm text-gray-600">
            Belum punya akun?
            <a href="{{ route('register') }}" class="font-semibold text-green-700 hover:text-green-900">
                Daftar akun baru
            </a>
        </div>
    </form>
</x-guest-layout>
