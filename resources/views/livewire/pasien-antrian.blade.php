<div class="min-h-screen bg-linear-to-br from-slate-50 via-blue-50 to-indigo-50 relative overflow-hidden">
    <!-- Professional Background -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <!-- Subtle geometric patterns -->
        <div class="absolute top-0 left-0 w-full h-full opacity-5">
            <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                        <path d="M 10 0 L 0 0 0 10" fill="none" stroke="#3B82F6" stroke-width="0.5"/>
                    </pattern>
                </defs>
                <rect width="100" height="100" fill="url(#grid)" />
            </svg>
        </div>

        <!-- Floating elements -->
        <div class="absolute top-20 right-20 w-32 h-32 bg-blue-100 rounded-full opacity-20 animate-float"></div>
        <div class="absolute bottom-32 left-16 w-24 h-24 bg-indigo-100 rounded-full opacity-15 animate-float animation-delay-2000"></div>
        <div class="absolute top-1/2 left-1/4 w-20 h-20 bg-slate-200 rounded-full opacity-10 animate-float animation-delay-4000"></div>
    </div>

    <!-- Professional Header -->
    <header class="relative z-10 bg-white/95 backdrop-blur-xl border-b border-slate-200/60 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between py-6">
                <!-- Hospital Branding -->
                <div class="flex items-center space-x-6">
                    <!-- Professional Logo -->
                    <div class="bg-linear-to-br from-blue-600 to-indigo-700 rounded-xl p-3 shadow-lg border border-blue-100">
                        <svg class="h-10 w-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>

                    <!-- Hospital Info -->
                    <div class="hidden md:block">
                        <h1 class="text-2xl font-bold text-slate-900 tracking-tight">
                            RUMAH SAKIT SEHAT SELALU
                        </h1>
                        <div class="flex items-center space-x-4 text-sm text-slate-600 mt-1">
                            <div class="flex items-center space-x-1">
                                <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 10-2 0v1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                </svg>
                                <span id="current-date">Loading...</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                                <span id="current-time">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Status & Actions -->
                <div class="flex items-center space-x-4">
                    <!-- System Status -->
                    <div class="hidden sm:flex items-center space-x-2 bg-green-50 px-3 py-2 rounded-lg border border-green-200">
                        <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                        <span class="text-sm font-medium text-green-700">Sistem Aktif</span>
                    </div>

                    <!-- Mobile Menu Button (for future use) -->
                    <button class="md:hidden p-2 rounded-lg hover:bg-slate-100 transition-colors">
                        <svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Hospital Name -->
            <div class="md:hidden pb-4">
                <h1 class="text-xl font-bold text-slate-900 text-center">
                    RS SEHAT SELALU
                </h1>
                <div class="flex items-center justify-center space-x-4 text-xs text-slate-600 mt-2">
                    <span id="current-date-mobile">Loading...</span>
                    <span>|</span>
                    <span id="current-time-mobile">Loading...</span>
                </div>
            </div>
        </div>
    </header>
    
    <!-- Main Content -->
    <main class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        <!-- Welcome Section -->
       
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8 lg:gap-12">
            <!-- Service Selection Column -->
            <div class="xl:col-span-2 space-y-8">
                <!-- Quick Stats -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-8">
                    @php
                        $totalAntrian = 0;
                        foreach($lokets as $loket) {
                            $totalAntrian += \App\Models\Antrian::where('loket_id', $loket->id)
                                ->whereDate('created_at', now()->toDateString())
                                ->count();
                        }
                    @endphp
                    <div class="bg-white/80 backdrop-blur-lg rounded-xl p-4 border border-slate-200/60 shadow-sm text-center">
                        <div class="text-2xl font-bold text-blue-600">{{ $totalAntrian }}</div>
                        <div class="text-xs text-slate-600 font-medium">Antrian Hari Ini</div>
                    </div>
                    <div class="bg-white/80 backdrop-blur-lg rounded-xl p-4 border border-slate-200/60 shadow-sm text-center">
                        <div class="text-2xl font-bold text-green-600">{{ $lokets->count() }}</div>
                        <div class="text-xs text-slate-600 font-medium">Layanan Tersedia</div>
                    </div>
                    <div class="bg-white/80 backdrop-blur-lg rounded-xl p-4 border border-slate-200/60 shadow-sm text-center">
                        <div class="text-2xl font-bold text-purple-600">24/7</div>
                        <div class="text-xs text-slate-600 font-medium">Pelayanan</div>
                    </div>
                    <div class="bg-white/80 backdrop-blur-lg rounded-xl p-4 border border-slate-200/60 shadow-sm text-center">
                        <div class="text-2xl font-bold text-indigo-600">
                            <svg class="w-6 h-6 mx-auto text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="text-xs text-slate-600 font-medium">Sistem Aktif</div>
                    </div>
                </div>

                <!-- Service Selection Card -->
                <div class="bg-white/90 backdrop-blur-lg rounded-2xl shadow-xl border border-slate-200/60 overflow-hidden">
                    <div class="bg-linear-to-r from-blue-600 to-indigo-700 px-6 py-4">
                        <div class="flex items-center space-x-3">
                            <div class="p-2 bg-white/20 backdrop-blur-sm rounded-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white">Pilih Layanan Kesehatan</h3>
                                <p class="text-blue-100 text-sm">Pilih jenis pelayanan yang Anda butuhkan</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @foreach ($lokets as $loket)
                                @php
                                    $antrianCount = \App\Models\Antrian::where('loket_id', $loket->id)
                                        ->whereDate('created_at', now()->toDateString())
                                        ->count();
                                    $estimatedWait = ceil($antrianCount * 15); // Estimasi 15 menit per pasien
                                @endphp

                                <button
                                    wire:click="ambilNomor({{ $loket->id }})"
                                    class="group relative bg-white border-2 {{ $loket->nama_loket == 'PENDAFTARAN UMUM' ? 'border-blue-200 hover:border-blue-400' : ($loket->nama_loket == 'POLI GIGI' ? 'border-green-200 hover:border-green-400' : 'border-purple-200 hover:border-purple-400') }} rounded-xl p-6 transition-all duration-300 hover:shadow-lg hover:scale-[1.02] active:scale-95 overflow-hidden"
                                >
                                    <!-- Background gradient on hover -->
                                    <div class="absolute inset-0 bg-linear-to-br {{ $loket->nama_loket == 'PENDAFTARAN UMUM' ? 'from-blue-50 to-blue-100' : ($loket->nama_loket == 'POLI GIGI' ? 'from-green-50 to-green-100' : 'from-purple-50 to-purple-100') }} opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                                    <div class="relative z-10">
                                        <div class="flex items-start justify-between mb-4">
                                            <div class="flex items-center space-x-3">
                                                @if($loket->nama_loket == 'PENDAFTARAN UMUM')
                                                    <div class="p-3 bg-blue-100 rounded-xl group-hover:bg-blue-200 transition-colors">
                                                        <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                        </svg>
                                                    </div>
                                                @elseif($loket->nama_loket == 'POLI GIGI')
                                                    <div class="p-3 bg-green-100 rounded-xl group-hover:bg-green-200 transition-colors">
                                                        <svg class="h-6 w-6 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M12 2C10.34 2 9 3.34 9 5v7c0 1.1-.9 2-2 2s-2 .9-2 2v5c0 .55.45 1 1 1s1-.45 1-1v-5c0-.55.45-1 1-1s1 .45 1 1v5c0 .55.45 1 1 1s1-.45 1-1v-5c0-1.1-.9-2-2-2V5c0-.55.45-1 1-1s1 .45 1 1v7c0 1.1-.9 2-2 2s-2 .9-2 2v5c0 .55.45 1 1 1s1-.45 1-1v-5c0-.55.45-1 1-1s1 .45 1 1v5c0 .55.45 1 1 1s1-.45 1-1v-5c0-1.1-.9-2-2-2 1.1 0 2-.9 2-2V5c0-1.66-1.34-3-3-3z"/>
                                                        </svg>
                                                    </div>
                                                @elseif($loket->nama_loket == 'FARMASI')
                                                    <div class="p-3 bg-purple-100 rounded-xl group-hover:bg-purple-200 transition-colors">
                                                        <svg class="h-6 w-6 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M4 2h16c1.1 0 2 .9 2 2v16c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2zm8 2c-3.31 0-6 2.69-6 6s2.69 6 6 6 6-2.69 6-6-2.69-6-6-6zm-1 9V9h2v4h4v2h-4v4h-2v-4H7v-2h4z"/>
                                                        </svg>
                                                    </div>
                                                @else
                                                    <div class="p-3 bg-slate-100 rounded-xl group-hover:bg-slate-200 transition-colors">
                                                        <svg class="h-6 w-6 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                                        </svg>
                                                    </div>
                                                @endif

                                                <div class="text-left">
                                                    <h4 class="font-bold text-lg text-slate-900 group-hover:text-slate-800 transition-colors">{{ $loket->nama_loket }}</h4>
                                                    <p class="text-sm text-slate-600 mt-1">Klik untuk ambil nomor antrian</p>
                                                </div>
                                            </div>

                                            <!-- Queue count badge -->
                                            <div class="bg-slate-100 px-3 py-1 rounded-lg">
                                                <div class="text-sm font-bold text-slate-700">{{ $antrianCount }}</div>
                                                <div class="text-xs text-slate-500">Menunggu</div>
                                            </div>
                                        </div>

                                        <!-- Service details -->
                                        <div class="flex items-center justify-between text-sm">
                                            <div class="flex items-center space-x-4">
                                                <div class="flex items-center space-x-1 text-slate-600">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                    <span>~{{ $estimatedWait }} menit</span>
                                                </div>
                                            </div>

                                            <div class="text-slate-500 group-hover:text-slate-700 transition-colors">
                                                <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Queue Number Column -->
            <div class="bg-white/90 backdrop-blur-lg rounded-2xl shadow-xl border border-slate-200/60 overflow-hidden">
                <div class="bg-linear-to-r from-green-600 to-emerald-700 px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 bg-white/20 backdrop-blur-sm rounded-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">Nomor Antrian Anda</h3>
                            <p class="text-green-100 text-sm">Simpan dan tunjukkan nomor ini</p>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    @if ($nomorAntrian)
                        <div class="text-center">
                            <!-- Success animation -->
                            <div class="inline-flex items-center justify-center w-20 h-20 bg-green-100 rounded-full mb-6 animate-bounce">
                                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>

                            <!-- Queue number display -->
                            <div class="bg-linear-to-br from-slate-50 to-slate-100 border-4 border-slate-200 rounded-2xl p-8 mb-6 shadow-inner">
                                <p class="text-sm font-semibold text-slate-600 mb-2 uppercase tracking-wide">Nomor Antrian</p>
                                <div class="text-6xl sm:text-7xl font-black text-slate-900 mb-4 tracking-wider animate-pulse-slow">{{ $nomorAntrian }}</div>

                                <div class="flex items-center justify-center space-x-3 mb-4">
                                    <svg class="w-6 h-6 text-slate-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-lg font-bold text-slate-700">{{ $lokets->where('id', $selectedLoket)->first()->nama_loket }}</span>
                                </div>

                                <div class="text-xs text-slate-500">
                                    Dibuat pada {{ now()->format('d/m/Y H:i') }}
                                </div>
                            </div>

                            <!-- Instructions -->
                            <div class="bg-amber-50 border border-amber-200 rounded-xl p-4 mb-6">
                                <div class="flex items-start space-x-3">
                                    <svg class="w-5 h-5 text-amber-600 mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                    </svg>
                                    <div class="text-sm text-amber-800">
                                        <p class="font-medium mb-1">Petunjuk Penting:</p>
                                        <ul class="list-disc list-inside space-y-1 text-xs">
                                            <li>Mohon menunggu di ruang tunggu</li>
                                            <li>Nomor antrian akan dipanggil melalui layar display</li>
                                            <li>Siapkan kartu identitas saat dipanggil</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Print button -->
                            <button class="w-full bg-linear-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white py-4 px-6 rounded-xl flex items-center justify-center transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105 active:scale-95">
                                <svg class="h-6 w-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                                </svg>
                                <span class="font-bold text-lg">Cetak Nomor Antrian</span>
                            </button>
                        </div>
                    @else
                        <div class="text-center py-12">
                            <div class="inline-flex items-center justify-center w-20 h-20 bg-slate-100 rounded-full mb-6">
                                <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <h4 class="text-xl font-bold text-slate-700 mb-2">Belum Ada Nomor Antrian</h4>
                            <p class="text-slate-600 text-sm leading-relaxed">
                                Pilih layanan kesehatan di sebelah kiri untuk mendapatkan nomor antrian Anda.
                                Sistem akan memberikan estimasi waktu tunggu yang akurat.
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
    </main>
    

    <!-- Custom Styles -->
    <style>
        /* Professional animations */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        @keyframes fade-in-up {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse-slow {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.95; transform: scale(1.01); }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.8s ease-out;
        }

        .animate-pulse-slow {
            animation: pulse-slow 3s ease-in-out infinite;
        }

        /* Professional scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>

    <!-- JavaScript for Real-time Updates -->
    <script>
        // Update time and date in real-time
        function updateDateTime() {
            const now = new Date();
            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };

            // Update header dates
            const dateElements = [
                'current-date',
                'current-date-mobile',
                'footer-current-date'
            ];

            dateElements.forEach(id => {
                const element = document.getElementById(id);
                if (element) {
                    element.textContent = now.toLocaleDateString('id-ID', options);
                }
            });

            // Update time elements
            const timeElements = [
                'current-time',
                'current-time-mobile',
                'footer-current-time'
            ];

            timeElements.forEach(id => {
                const element = document.getElementById(id);
                if (element) {
                    element.textContent = now.toLocaleTimeString('id-ID', {
                        hour: '2-digit',
                        minute: '2-digit',
                        second: '2-digit'
                    });
                }
            });
        }

        // Update every second
        updateDateTime();
        setInterval(updateDateTime, 1000);

        // Smooth scroll for mobile menu (if needed)
        document.addEventListener('DOMContentLoaded', function() {
            // Add any additional interactive features here
            console.log('Rumah Sakit Sehat Selalu - Sistem Antrian Digital Loaded');
        });
    </script>
