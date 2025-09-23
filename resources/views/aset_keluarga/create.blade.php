<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Aset Keluarga') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                <div class="mb-4 p-4 rounded-md bg-red-100 text-red-800">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('aset-keluarga.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-2 gap-4">
                        {{-- User --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">User</label>
                            <select name="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                <option value="">-- Pilih User --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Nama Aset --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Aset</label>
                            <div class="flex gap-2 items-center">
                                <input type="text" id="nama_aset" name="nama_aset" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Nama Aset" required>
                                <button type="button" class="btn-record px-2 py-1 bg-green-500 text-white rounded-md" data-input="nama_aset" data-level="level-nama">🎤</button>
                            </div>
                            <div id="level-nama" class="w-24 h-4 bg-gray-200 rounded overflow-hidden mt-1">
                                <div class="h-4 bg-green-500 w-0 transition-all"></div>
                            </div>
                        </div>

                        {{-- Kategori --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Kategori</label>
                            <select name="kategori" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                @foreach(['Rumah','Kendaraan','Tabungan','Usaha','Elektronik','Lainnya'] as $kategori)
                                    <option value="{{ $kategori }}">{{ $kategori }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Status Aset --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Status Aset</label>
                            <select name="status_aset" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @foreach(['Aktif','Dijual','Dipakai','Rusak','Hilangan'] as $status)
                                    <option value="{{ $status }}">{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Nilai Aset --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nilai Aset</label>
                            <div class="flex gap-2 items-center">
                                <input type="text" name="nilai_aset" id="nilai_aset" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                <button type="button" class="btn-record px-2 py-1 bg-green-500 text-white rounded-md" data-input="nilai_aset" data-level="level-nilai">🎤</button>
                            </div>
                            <div id="level-nilai" class="w-24 h-4 bg-gray-200 rounded overflow-hidden mt-1">
                                <div class="h-4 bg-green-500 w-0 transition-all"></div>
                            </div>
                        </div>

                        {{-- Tahun Perolehan --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tahun Perolehan</label>
                            <input type="number" name="tahun_perolehan" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        {{-- Deskripsi --}}
                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="deskripsi" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                        </div>

                        {{-- Dokumen --}}
                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Dokumen (ID JSON)</label>
                            <input type="text" name="dokumen_ids" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <p class="text-xs text-gray-500">Pisahkan dengan koma jika lebih dari satu</p>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end gap-2">
                        <a href="{{ route('aset-keluarga.index') }}" class="px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400">Batal</a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
if ('webkitSpeechRecognition' in window) {
    const buttons = document.querySelectorAll('.btn-record');
    let recognition, audioContext, analyser, microphone, dataArray, animationId;

    buttons.forEach(btn => {
        btn.addEventListener('click', async () => {
            const inputId = btn.dataset.input;
            const levelId = btn.dataset.level;
            const inputEl = document.getElementById(inputId);
            const levelEl = document.querySelector('#'+levelId+' div');

            if (!inputEl) return;

            // tanda rekaman aktif
            btn.classList.remove('bg-green-500');
            btn.classList.add('bg-red-600');
            btn.textContent = '🎤 Recording...';

            recognition = new webkitSpeechRecognition();
            recognition.lang = 'id-ID';
            recognition.continuous = false;
            recognition.interimResults = false;

            recognition.onstart = async () => {
                const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
                audioContext = new (window.AudioContext||window.webkitAudioContext)();
                analyser = audioContext.createAnalyser();
                microphone = audioContext.createMediaStreamSource(stream);
                microphone.connect(analyser);
                analyser.fftSize = 256;
                dataArray = new Uint8Array(analyser.frequencyBinCount);

                function draw() {
                    analyser.getByteFrequencyData(dataArray);
                    let avg = dataArray.reduce((a,b)=>a+b)/dataArray.length;
                    levelEl.style.width = Math.min(avg,100)+'%';
                    animationId = requestAnimationFrame(draw);
                }
                draw();
            };

            recognition.onresult = (event) => {
                inputEl.value = event.results[0][0].transcript;
            };

            recognition.onend = () => {
                cancelAnimationFrame(animationId);
                levelEl.style.width = '0';

                // tombol kembali normal
                btn.classList.remove('bg-red-600');
                btn.classList.add('bg-green-500');
                btn.textContent = '🎤';
            };

            recognition.start();
        });
    });
}
</script>
