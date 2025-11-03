<div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-blue-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-purple-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-indigo-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-4000"></div>
    </div>
    
    <!-- Header -->
    <div class="relative z-10 bg-white/80 backdrop-blur-lg border-b border-white/20 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex items-center justify-center space-x-4">
                <div class="bg-gradient-to-br from-blue-600 to-indigo-600 rounded-2xl p-3 shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <div class="text-center">
                    <h1 class="text-3xl sm:text-4xl font-bold text-gray-900">Rumah Sakit Sehat Selalu</h1>
                    <p class="text-sm sm:text-base text-gray-600 mt-1">Sistem Antrian Digital - Ambil Nomor Antrian Anda</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Kolom Kiri: Pilih Loket -->
            <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-2xl p-6 sm:p-8 border border-white/20 animate-fade-in-up">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="p-2 bg-blue-100 rounded-lg">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Pilih Layanan</h2>
                        <p class="text-sm text-gray-500">Klik untuk mengambil nomor antrian</p>
                    </div>
                </div>
                <div class="space-y-4">
                    @foreach ($lokets as $loket)
                        <button 
                            wire:click="ambilNomor({{ $loket->id }})" 
                            class="group w-full bg-gradient-to-r {{ $loket->nama_loket == 'PENDAFTARAN UMUM' ? 'from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700' : ($loket->nama_loket == 'POLI GIGI' ? 'from-green-500 to-green-600 hover:from-green-600 hover:to-green-700' : 'from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700') }} text-white py-6 px-6 rounded-2xl flex items-center justify-between transition-all duration-200 shadow-lg hover:shadow-2xl transform hover:scale-[1.02] active:scale-95"
                        >
                            <div class="flex items-center space-x-4">
                                @if($loket->nama_loket == 'PENDAFTARAN UMUM')
                                    <div class="bg-white/20 backdrop-blur-sm p-3 rounded-xl group-hover:bg-white/30 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                @elseif($loket->nama_loket == 'POLI GIGI')
                                    <div class="bg-white/20 backdrop-blur-sm p-3 rounded-xl group-hover:bg-white/30 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2C10.34 2 9 3.34 9 5v7c0 1.1-.9 2-2 2s-2 .9-2 2v5c0 .55.45 1 1 1s1-.45 1-1v-5c0-.55.45-1 1-1s1 .45 1 1v5c0 .55.45 1 1 1s1-.45 1-1v-5c0-1.1-.9-2-2-2V5c0-.55.45-1 1-1s1 .45 1 1v7c0 1.1-.9 2-2 2s-2 .9-2 2v5c0 .55.45 1 1 1s1-.45 1-1v-5c0-.55.45-1 1-1s1 .45 1 1v5c0 .55.45 1 1 1s1-.45 1-1v-5c0-1.1-.9-2-2-2 1.1 0 2-.9 2-2V5c0-1.66-1.34-3-3-3z"/>
                                        </svg>
                                    </div>
                                @elseif($loket->nama_loket == 'FARMASI')
                                    <div class="bg-white/20 backdrop-blur-sm p-3 rounded-xl group-hover:bg-white/30 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M4 2h16c1.1 0 2 .9 2 2v16c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2zm8 2c-3.31 0-6 2.69-6 6s2.69 6 6 6 6-2.69 6-6-2.69-6-6-6zm-1 9V9h2v4h4v2h-4v4h-2v-4H7v-2h4z"/>
                                        </svg>
                                    </div>
                                @else
                                    <div class="bg-white/20 backdrop-blur-sm p-3 rounded-xl group-hover:bg-white/30 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                    </div>
                                @endif
                                <div class="text-left">
                                    <span class="font-bold text-xl block">{{ $loket->nama_loket }}</span>
                                    <span class="text-sm text-white/80">Klik untuk ambil nomor</span>
                                </div>
                            </div>
                            <svg class="w-6 h-6 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    @endforeach
                </div>
            </div>
            
            <!-- Kolom Kanan: Nomor Antrian -->
            <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-2xl p-6 sm:p-8 border border-white/20 animate-fade-in-up animation-delay-200">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="p-2 bg-green-100 rounded-lg">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Nomor Antrian</h2>
                        <p class="text-sm text-gray-500">Simpan nomor Anda</p>
                    </div>
                </div>
                
                @if ($nomorAntrian)
                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 border-2 border-green-200 rounded-2xl p-8 sm:p-12 text-center shadow-inner">
                        <div class="inline-flex items-center justify-center w-24 h-24 bg-green-600 text-white rounded-2xl mb-6 shadow-lg">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        
                        <p class="text-sm text-gray-600 mb-2 font-medium">Nomor Antrian Anda</p>
                        <div class="text-7xl sm:text-8xl font-black text-gray-900 mb-6 tracking-wider animate-pulse-slow">{{ $nomorAntrian }}</div>
                        
                        <div class="inline-flex items-center space-x-2 px-6 py-3 bg-white rounded-xl shadow-md mb-6">
                            <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-base font-bold text-gray-700">{{ $lokets->where('id', $selectedLoket)->first()->nama_loket }}</span>
                        </div>
                        
                        <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4 mb-6">
                            <div class="flex items-center justify-center space-x-2 text-yellow-800">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-sm font-medium">Mohon menunggu panggilan di ruang tunggu</span>
                            </div>
                        </div>
                        
                        <button class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white py-4 px-6 rounded-xl flex items-center justify-center transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105 active:scale-95">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                            </svg>
                            <span class="font-bold text-lg">Cetak Nomor Antrian</span>
                        </button>
                    </div>
                @else
                    <div class="bg-gray-50 border-2 border-dashed border-gray-300 rounded-2xl p-12 sm:p-16 text-center">
                        <div class="inline-flex items-center justify-center w-24 h-24 bg-gray-200 rounded-full mb-6">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-700 mb-2">Belum Ada Nomor Antrian</h3>
                        <p class="text-gray-500">Pilih layanan di sebelah kiri untuk mendapatkan nomor antrian Anda</p>
                    </div>
                @endif
            </div>
        </div>
        
        <!-- Alert Messages -->
        @if ($message)
            <div class="mt-8 p-4 rounded-xl border-l-4 {{ $messageType === 'success' ? 'bg-green-50 border-green-500' : 'bg-red-50 border-red-500' }} animate-fade-in">
                <div class="flex items-center">
                    @if($messageType === 'success')
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    @else
                        <svg class="w-5 h-5 text-red-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                    @endif
                    <p class="font-medium {{ $messageType === 'success' ? 'text-green-800' : 'text-red-800' }}">{{ $message }}</p>
                </div>
            </div>
        @endif
    </div>
    
    <!-- Footer -->
    <div class="relative z-10 mt-8 pb-8 text-center">
        <p class="text-sm text-gray-600">© 2025 Rumah Sakit Sehat Selalu - Sistem Antrian Digital</p>
    </div>
    
    <!-- Custom Styles -->
    <style>
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        
        @keyframes fade-in-up {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes pulse-slow {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }
        
        .animate-blob {
            animation: blob 7s infinite;
        }
        
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        
        .animation-delay-4000 {
            animation-delay: 4s;
        }
        
        .animation-delay-200 {
            animation-delay: 0.2s;
        }
        
        .animate-fade-in-up {
            animation: fade-in-up 0.6s ease-out;
        }
        
        .animate-pulse-slow {
            animation: pulse-slow 2s ease-in-out infinite;
        }
        
        .animate-fade-in {
            animation: fade-in-up 0.3s ease-out;
        }
    </style>
</div>
