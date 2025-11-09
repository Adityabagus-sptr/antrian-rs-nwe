<div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
    <!-- Header -->
    <div class="bg-white border-b border-gray-200 shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <!-- Logo & Title -->
                <div class="flex items-center space-x-3">
                    <div class="bg-gradient-to-br from-blue-600 to-indigo-600 rounded-xl p-2.5 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-gray-900">Dashboard Petugas</h1>
                        <p class="text-xs text-gray-500">Rumah Sakit Sehat Selalu</p>
                    </div>
                </div>
                
                <!-- User Info & Logout -->
                <div class="flex items-center space-x-4">
                    <div class="hidden sm:block text-right">
                        <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name ?? 'Petugas' }}</p>
                        <p class="text-xs text-gray-500">{{ auth()->user()->email ?? 'admin@gmail.com' }}</p>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="flex items-center space-x-2 px-4 py-2 bg-red-50 text-red-600 hover:bg-red-100 rounded-lg transition-colors duration-200 border border-red-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span class="hidden sm:inline font-medium">Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        
        <!-- Alert Messages -->
        @if ($message)
            <div class="mb-6 p-4 rounded-xl border-l-4 {{ $messageType === 'success' ? 'bg-green-50 border-green-500' : 'bg-red-50 border-red-500' }} animate-fade-in">
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
        
        <!-- Pilih Loket Section -->
        <div class="bg-white/80 backdrop-blur-lg rounded-2xl shadow-xl p-6 mb-6 border border-white/20">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">Pilih Loket Anda</h2>
                    <p class="text-sm text-gray-500 mt-1">Pilih loket tempat Anda bertugas hari ini</p>
                </div>
                @if($selectedLoket)
                    <div class="flex items-center space-x-2 px-4 py-2 bg-green-100 text-green-700 rounded-lg">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-medium text-sm">Loket Aktif</span>
                    </div>
                @endif
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($lokets as $loket)
                    <button 
                        wire:click="pilihLoket({{ $loket->id }})" 
                        class="group relative p-6 rounded-xl text-left transition-all duration-200 transform hover:scale-105 {{ $selectedLoket == $loket->id ? 'bg-gradient-to-br from-green-500 to-green-600 text-white shadow-2xl ring-4 ring-green-200' : 'bg-gradient-to-br from-gray-50 to-gray-100 hover:from-gray-100 hover:to-gray-200 text-gray-800 shadow-md hover:shadow-xl' }}"
                    >
                        <div class="flex items-center justify-between mb-3">
                            <div class="p-2 rounded-lg {{ $selectedLoket == $loket->id ? 'bg-white/20' : 'bg-white' }}">
                                <svg class="w-6 h-6 {{ $selectedLoket == $loket->id ? 'text-white' : 'text-green-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                            </div>
                            @if($selectedLoket == $loket->id)
                                <div class="flex items-center space-x-1">
                                    <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                                    <span class="text-xs font-medium">Aktif</span>
                                </div>
                            @endif
                        </div>
                        <h3 class="text-lg font-bold mb-1">{{ $loket->nama_loket }}</h3>
                        <p class="text-sm {{ $selectedLoket == $loket->id ? 'text-green-100' : 'text-gray-500' }}">Kode Loket: <span class="font-mono font-bold">{{ $loket->kode }}</span></p>
                    </button>
                @endforeach
            </div>
        </div>
        
        @if($selectedLoket)
        <!-- Grid Antrian -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Daftar Antrian Menunggu -->
            <div class="bg-white/80 backdrop-blur-lg rounded-2xl shadow-xl p-6 border border-white/20">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 bg-blue-100 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Antrian Menunggu</h2>
                            <p class="text-xs text-gray-500">{{ count($antrianMenunggu) }} pasien</p>
                        </div>
                    </div>
                </div>
                
                <div class="space-y-3 max-h-[500px] overflow-y-auto pr-2">
                    @if (count($antrianMenunggu) > 0)
                        @foreach ($antrianMenunggu as $index => $antrian)
                            <div class="group bg-gradient-to-r from-blue-50 to-indigo-50 hover:from-blue-100 hover:to-indigo-100 p-4 rounded-xl border border-blue-200 transition-all duration-200 transform hover:scale-[1.02]">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex items-center justify-center w-12 h-12 bg-blue-600 text-white rounded-xl font-bold text-lg shadow-md">
                                            {{ $index + 1 }}
                                        </div>
                                        <div>
                                            <p class="text-2xl font-bold text-gray-900">{{ $antrian->nomor_antrian }}</p>
                                            <p class="text-xs text-gray-500">{{ $antrian->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                    <button 
                                        wire:click="panggilAntrian({{ $antrian->id }})" 
                                        class="flex items-center space-x-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-all duration-200 transform hover:scale-105 shadow-md hover:shadow-lg"
                                    >
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                                        </svg>
                                        <span class="font-medium">Panggil</span>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center py-12">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full mb-4">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                </svg>
                            </div>
                            <p class="text-gray-500 font-medium">Tidak ada antrian yang menunggu</p>
                            <p class="text-sm text-gray-400 mt-1">Semua pasien sudah dilayani</p>
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Antrian Sedang Dipanggil -->
            <div class="bg-white/80 backdrop-blur-lg rounded-2xl shadow-xl p-6 border border-white/20">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="p-2 bg-green-100 rounded-lg">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Sedang Dipanggil</h2>
                        <p class="text-xs text-gray-500">Pasien yang sedang dilayani</p>
                    </div>
                </div>
                
                @if ($antrianDipanggil)
                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-8 rounded-2xl text-center border-2 border-green-200 shadow-inner">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-green-600 text-white rounded-2xl mb-4 shadow-lg">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <div class="text-6xl font-black text-gray-900 mb-3 tracking-wider">{{ $antrianDipanggil->nomor_antrian }}</div>
                        <div class="inline-flex items-center space-x-2 px-4 py-2 bg-white rounded-lg shadow-sm mb-6">
                            <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-sm font-semibold text-gray-700">{{ $lokets->where('id', $selectedLoket)->first()->nama_loket }}</span>
                        </div>
                        <button 
                            wire:click="selesaiAntrian({{ $antrianDipanggil->id }})" 
                            class="w-full flex items-center justify-center space-x-2 py-4 px-6 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white rounded-xl transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl font-semibold text-lg"
                        >
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>Selesai Dilayani</span>
                        </button>
                    </div>
                @else
                    <div class="bg-gray-50 p-12 rounded-2xl text-center border-2 border-dashed border-gray-300">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-gray-200 rounded-full mb-4">
                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <p class="text-gray-500 font-medium text-lg">Belum ada antrian yang dipanggil</p>
                        <p class="text-sm text-gray-400 mt-2">Klik tombol "Panggil" untuk memanggil pasien berikutnya</p>
                    </div>
                @endif
            </div>
        </div>
        @else
            <div class="bg-white/80 backdrop-blur-lg rounded-2xl shadow-xl p-12 text-center border border-white/20">
                <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-full mb-6">
                    <svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Pilih Loket Terlebih Dahulu</h3>
                <p class="text-gray-500">Silakan pilih loket di atas untuk mulai mengelola antrian pasien</p>
            </div>
        @endif
    </div>
    
    <!-- Inline Styles -->
    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fade-in {
            animation: fade-in 0.3s ease-out;
        }
        
        /* Custom scrollbar */
        .overflow-y-auto::-webkit-scrollbar {
            width: 6px;
        }
        
        .overflow-y-auto::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        .overflow-y-auto::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }
        
        .overflow-y-auto::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</div>