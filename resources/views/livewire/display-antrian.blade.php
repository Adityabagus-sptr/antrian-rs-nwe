<div class="min-h-screen bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 relative overflow-hidden" wire:poll.1s>
    <!-- Animated Background -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
    </div>
    
    <!-- Header -->
    <div class="relative z-10 bg-gradient-to-r from-blue-600 via-blue-700 to-indigo-700 text-white shadow-2xl">
        <div class="container mx-auto px-6 py-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-3 shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-black tracking-tight">RUMAH SAKIT SEHAT SELALU</h1>
                        <p class="text-blue-200 text-sm font-medium">Layar Pemanggilan Antrian Digital</p>
                    </div>
                </div>
                <div class="flex items-center space-x-3 bg-white/10 backdrop-blur-sm px-4 py-2 rounded-xl">
                    <div class="relative flex h-3 w-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                    </div>
                    <span class="text-sm font-medium">LIVE</span>
                </div>
            </div>
        </div>
    </div>
    
    <div class="relative z-10 container mx-auto py-8 px-4 lg:px-8">
        <!-- Antrian yang Sedang Dipanggil -->
        <div class="bg-white/95 backdrop-blur-lg rounded-3xl shadow-2xl p-8 lg:p-12 mb-8 border-4 border-yellow-400 animate-fade-in">
            <div class="text-center mb-8">
                <div class="inline-flex items-center space-x-3 bg-gradient-to-r from-red-500 to-red-600 text-white px-6 py-3 rounded-full shadow-lg">
                    <div class="relative flex h-4 w-4">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-4 w-4 bg-white"></span>
                    </div>
                    <span class="text-lg font-black tracking-wider">SEDANG DIPANGGIL</span>
                </div>
            </div>
            
            @if(count($antrianDipanggil) > 0)
                @foreach($antrianDipanggil as $antrian)
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-8 lg:p-12 border-2 border-blue-200 shadow-inner">
                        <div class="text-center">
                            <p class="text-xl text-gray-600 font-semibold mb-4">NOMOR ANTRIAN</p>
                            <div class="text-9xl lg:text-[12rem] font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600 mb-6 animate-pulse-slow tracking-wider drop-shadow-lg">
                                {{ $antrian['nomor_antrian'] }}
                            </div>
                            <div class="inline-flex items-center space-x-3 bg-white px-8 py-4 rounded-2xl shadow-lg border-2 border-blue-200">
                                <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                </svg>
                                <div class="text-left">
                                    <p class="text-sm text-gray-500 font-medium">SILAKAN MENUJU</p>
                                    <p class="text-2xl font-black text-blue-600">{{ $antrian['loket']['nama_loket'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="bg-gray-50 rounded-2xl p-12 lg:p-16 border-2 border-dashed border-gray-300">
                    <div class="text-center">
                        <div class="inline-flex items-center justify-center w-24 h-24 bg-gray-200 rounded-full mb-6">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                            </svg>
                        </div>
                        <div class="text-6xl font-black text-gray-300 mb-4">- - -</div>
                        <div class="text-xl text-gray-400 font-medium">Tidak ada antrian yang dipanggil</div>
                    </div>
                </div>
            @endif
        </div>
        
        <!-- Antrian Berikutnya -->
        <div class="bg-white/95 backdrop-blur-lg rounded-3xl shadow-2xl p-6 lg:p-8 border border-white/20 animate-fade-in animation-delay-200">
            <div class="text-center mb-6">
                <div class="inline-flex items-center space-x-3 bg-gradient-to-r from-green-500 to-emerald-600 text-white px-6 py-3 rounded-full shadow-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="text-lg font-black tracking-wider">ANTRIAN BERIKUTNYA</span>
                </div>
            </div>
            
            @if(count($antrianMenunggu) > 0)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach($antrianMenunggu as $index => $antrian)
                        @if($index < 6)
                            <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-6 rounded-2xl border-2 border-blue-200 shadow-md hover:shadow-xl transition-all duration-200 transform hover:scale-105">
                                <div class="text-center">
                                    <div class="inline-flex items-center justify-center w-12 h-12 bg-blue-600 text-white rounded-xl font-bold text-lg mb-3 shadow-md">
                                        {{ $index + 1 }}
                                    </div>
                                    <div class="text-4xl font-black text-gray-900 mb-2">{{ $antrian['nomor_antrian'] }}</div>
                                    <div class="inline-flex items-center space-x-2 bg-white px-3 py-1.5 rounded-lg shadow-sm">
                                        <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-xs font-bold text-gray-700">{{ $antrian['loket']['nama_loket'] }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="bg-gray-50 rounded-2xl p-12 border-2 border-dashed border-gray-300">
                    <div class="text-center">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                        </svg>
                        <p class="text-gray-400 font-medium">Tidak ada antrian berikutnya</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
    
    <!-- Footer -->
    <div class="relative z-10 text-center text-white py-6">
        <div class="inline-flex items-center space-x-2 bg-white/10 backdrop-blur-sm px-4 py-2 rounded-lg">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
            </svg>
            <span class="text-sm font-medium">Auto-refresh setiap 1 detik</span>
        </div>
        <p class="text-xs text-blue-200 mt-2">© 2025 Rumah Sakit Sehat Selalu</p>
    </div>
    
    <!-- Custom Styles -->
    <style>
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        
        @keyframes fade-in {
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
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.9; transform: scale(1.02); }
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
        
        .animate-fade-in {
            animation: fade-in 0.6s ease-out;
        }
        
        .animate-pulse-slow {
            animation: pulse-slow 3s ease-in-out infinite;
        }
    </style>
</div>
