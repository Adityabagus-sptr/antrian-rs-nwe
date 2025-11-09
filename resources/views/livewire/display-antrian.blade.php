<div class="fixed inset-0 bg-linear-to-br from-blue-900 via-purple-900 to-indigo-900 overflow-hidden" wire:poll.1s style="width: 100vw; height: 100vh; margin: 0; padding: 0;">
    <!-- Dynamic Animated Background -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <!-- Floating orbs -->
        <div class="absolute top-0 left-0 w-72 h-72 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
        <div class="absolute top-0 right-0 w-72 h-72 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-0 left-1/4 w-72 h-72 bg-indigo-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000"></div>
        <div class="absolute bottom-0 right-1/4 w-72 h-72 bg-pink-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-6000"></div>
        
        <!-- Gradient overlay -->
        <div class="absolute inset-0 bg-linear-to-br from-transparent via-blue-900/20 to-purple-900/20"></div>
        
        <!-- Animated particles -->
        <div class="absolute inset-0">
            @for($i = 0; $i < 20; $i++)
                <div class="absolute w-1 h-1 bg-white/20 rounded-full animate-ping" style="left: {{ rand(0, 100) }}%; top: {{ rand(0, 100) }}%; animation-delay: {{ $i * 0.5 }}s; animation-duration: {{ rand(3, 8) }}s;"></div>
            @endfor
        </div>
    </div>
    
    <div class="relative z-10 w-full h-full flex flex-col">
        <!-- Header -->
        <div class="bg-linear-to-r from-blue-600 via-blue-700 to-indigo-700 text-white shadow-2xl shrink-0">
            <div class="px-6 py-6">
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
                        
                        <!-- Speaking Indicator -->
                        <div id="speaking-indicator" class="hidden items-center space-x-2 bg-green-500/20 backdrop-blur-sm px-3 py-1 rounded-lg border border-green-400/30">
                            <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-xs font-medium text-green-400">SEDANG BERBICARA</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Main Content Area -->
        <div class="flex-1 p-4 lg:p-6">
            <!-- Main Layout - SEDANG DIPANGGIL lebih besar -->
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-6 h-full">
                <!-- Antrian yang Sedang Dipanggil - Left Side (3/5) -->
                <div class="col-span-1 lg:col-span-3 bg-white/95 backdrop-blur-lg rounded-3xl shadow-2xl p-4 lg:p-6 border-4 border-yellow-400 animate-fade-in flex flex-col justify-center">
                    <div class="text-center mb-6">
                        <div class="inline-flex items-center space-x-3 bg-linear-to-r from-red-500 to-red-600 text-white px-6 py-3 rounded-full shadow-lg">
                            <div class="relative flex h-4 w-4">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-4 w-4 bg-white"></span>
                            </div>
                            <span class="text-lg font-black tracking-wider">SEDANG DIPANGGIL</span>
                        </div>
                    </div>
                    
                    @if(count($antrianDipanggil) > 0)
                        <div class="grid grid-cols-1 gap-4 h-full {{ count($antrianDipanggil) >= 3 ? 'grid-rows-3' : (count($antrianDipanggil) == 2 ? 'grid-rows-2' : 'grid-rows-1') }}">
                            @foreach($antrianDipanggil as $index => $antrian)
                                @if($index < 3)
                                    <div class="bg-linear-to-br from-white/95 via-blue-50/95 to-indigo-50/95 backdrop-blur-lg rounded-3xl p-6 lg:p-8 border-2 border-blue-200/50 shadow-2xl flex items-center justify-center transform transition-all duration-500 hover:scale-105 animate-fade-in" data-called-queue style="animation-delay: {{ $index * 0.2 }}s;">
                                        <div class="text-center relative w-full">
                                            <!-- Glow effect -->
                                            <div class="absolute inset-0 bg-linear-to-r from-blue-400/20 to-purple-400/20 rounded-3xl blur-xl animate-pulse"></div>
                                            
                                            <p class="text-lg text-gray-700 font-semibold mb-4 relative z-10">NOMOR ANTRIAN {{ $index + 1 }}</p>
                                            
                                            <!-- Number with enhanced gradient and animation - Bigger size -->
                                            <div class="text-7xl lg:text-8xl xl:text-9xl font-black text-transparent bg-clip-text bg-linear-to-r from-blue-600 via-purple-600 to-indigo-600 mb-4 animate-pulse-slow tracking-wider drop-shadow-lg relative z-10 animate-bounce-once" data-queue-number style="line-height: 0.9;">
                                                {{ $antrian['nomor_antrian'] }}
                                            </div>
                                            
                                            <!-- Counter info with enhanced styling -->
                                            <div class="inline-flex items-center space-x-4 bg-white/90 backdrop-blur-sm px-6 py-4 rounded-2xl shadow-xl border-2 border-blue-200/50 relative z-10">
                                                <div class="flex items-center space-x-3">
                                                    <div class="w-10 h-10 bg-linear-to-r from-blue-500 to-purple-500 rounded-xl flex items-center justify-center shadow-lg">
                                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                                        </svg>
                                                    </div>
                                                    <div class="text-left">
                                                        <p class="text-xs text-gray-600 font-medium uppercase tracking-wide">SILAKAN MENUJU</p>
                                                        <p class="text-xl font-black text-blue-600" data-counter-name>{{ $antrian['loket']['nama_loket'] }}</p>
                                                    </div>
                                                </div>
                                                
                                                <!-- Speaker icon to indicate voice announcement -->
                                                <div class="flex items-center space-x-2 text-green-600">
                                                    <svg class="w-5 h-5 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z" clip-rule="evenodd"/>
                                                    </svg>
                                                    <span class="text-xs font-medium">SUARA</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @else
                        <div class="bg-gray-50 rounded-2xl p-12 lg:p-16 border-2 border-dashed border-gray-300 flex-1 flex items-center justify-center">
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
                
                <!-- Antrian Berikutnya - Right Side (2/5) -->
                <div class="col-span-1 lg:col-span-2 bg-white/95 backdrop-blur-lg rounded-3xl shadow-2xl p-4 lg:p-6 border border-white/20 animate-fade-in animation-delay-200 flex flex-col">
                    <div class="text-center mb-6">
                        <div class="inline-flex items-center space-x-3 bg-linear-to-r from-green-500 to-emerald-600 text-white px-6 py-3 rounded-full shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="text-lg font-black tracking-wider">ANTRIAN BERIKUTNYA</span>
                        </div>
                    </div>
                
                @if(count($antrianMenunggu) > 0)
                    <div class="flex-1 flex flex-col gap-3 overflow-y-auto p-2">
                        @foreach($antrianMenunggu as $index => $antrian)
                            @if($index < 10)
                                <div class="bg-linear-to-br from-blue-50 to-indigo-50 p-4 rounded-2xl border-2 border-blue-200 shadow-md hover:shadow-xl transition-all duration-200 transform hover:scale-105">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-4">
                                            <div class="inline-flex items-center justify-center w-12 h-12 bg-blue-600 text-white rounded-2xl font-bold text-xl shadow-md">
                                                {{ $index + 1 }}
                                            </div>
                                            <div>
                                                <div class="text-3xl font-black text-gray-900 mb-1">{{ $antrian['nomor_antrian'] }}</div>
                                                <div class="inline-flex items-center space-x-2 bg-white px-4 py-2 rounded-xl shadow-sm">
                                                    <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                                    </svg>
                                                    <span class="text-lg font-bold text-gray-700">{{ $antrian['loket']['nama_loket'] }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @else
                    <div class="bg-gray-50 rounded-2xl p-8 border-2 border-dashed border-gray-300 flex-1 flex items-center justify-center">
                        <div class="text-center">
                            <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                            </svg>
                            <p class="text-gray-400 font-medium text-lg">Tidak ada antrian berikutnya</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <div class="bg-linear-to-r from-blue-600 via-blue-700 to-indigo-700 text-white py-4 px-6 shrink-0">
        <div class="text-center">
            <div class="inline-flex items-center space-x-2 bg-white/10 backdrop-blur-sm px-4 py-2 rounded-lg">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                </svg>
                <span class="text-sm font-medium">Auto-refresh setiap 1 detik</span>
            </div>
            <p class="text-xs text-blue-200 mt-2"> 2025 Rumah Sakit Sehat Selalu</p>
        </div>
    </div>
    
    <!-- Custom Styles -->
    <style>
        /* Force fullscreen */
        html, body {
            margin: 0 !important;
            padding: 0 !important;
            width: 100vw !important;
            height: 100vh !important;
            overflow: hidden !important;
        }

        /* Ensure no scroll */
        * {
            box-sizing: border-box;
        }

        body {
            overscroll-behavior: none;
        }

        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        
        @keyframes bounce-once {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }
        
        @keyframes glow {
            0%, 100% { opacity: 0.5; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.05); }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .animate-bounce-once {
            animation: bounce-once 2s ease-in-out;
        }
        
        .animate-glow {
            animation: glow 3s ease-in-out infinite;
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
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

        .animate-bounce {
            animation: bounce 1s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }
    </style>

    <!-- JavaScript for Sound -->
    <script>
        // Function to play beep sound
        function playBeep() {
            try {
                const audioContext = new (window.AudioContext || window.webkitAudioContext)();
                const oscillator = audioContext.createOscillator();
                const gainNode = audioContext.createGain();

                oscillator.connect(gainNode);
                gainNode.connect(audioContext.destination);

                oscillator.frequency.setValueAtTime(800, audioContext.currentTime); // Frequency in Hz
                oscillator.type = 'sine'; // Waveform type

                gainNode.gain.setValueAtTime(0.3, audioContext.currentTime); // Volume
                gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.5); // Fade out

                oscillator.start(audioContext.currentTime);
                oscillator.stop(audioContext.currentTime + 0.5); // Duration
            } catch (e) {
                console.log('Audio play failed:', e);
            }
        }

        // Function to speak queue number and counter
        function speakQueue(queueNumber, counterName) {
            if ('speechSynthesis' in window) {
                // Show speaking indicator
                showSpeakingIndicator(true);
                
                const utterance = new SpeechSynthesisUtterance();
                utterance.text = `Antrian nomor ${queueNumber}, silakan menuju ${counterName}`;
                utterance.lang = 'id-ID'; // Indonesian language
                utterance.volume = 1;
                utterance.rate = 0.8;
                utterance.pitch = 1;

                // Get available voices
                const voices = speechSynthesis.getVoices();
                const indonesianVoice = voices.find(voice => voice.lang === 'id-ID' || voice.lang.startsWith('id'));
                if (indonesianVoice) {
                    utterance.voice = indonesianVoice;
                }

                utterance.onend = function() {
                    showSpeakingIndicator(false);
                };

                utterance.onerror = function() {
                    showSpeakingIndicator(false);
                    console.log('Speech synthesis error');
                };

                speechSynthesis.speak(utterance);
            } else {
                console.log('Speech synthesis not supported');
            }
        }

        // Function to show/hide speaking indicator
        function showSpeakingIndicator(show) {
            const indicator = document.getElementById('speaking-indicator');
            if (indicator) {
                if (show) {
                    indicator.classList.remove('hidden');
                    indicator.classList.add('flex', 'animate-pulse');
                } else {
                    indicator.classList.add('hidden');
                    indicator.classList.remove('flex', 'animate-pulse');
                }
            }
        }

        document.addEventListener('livewire:updated', function () {
            // Check if there's a new called queue
            const calledQueues = document.querySelectorAll('[data-called-queue]');
            if (calledQueues.length > 0) {
                // Play beep sound 3 times with delay
                playBeep();
                setTimeout(playBeep, 300);
                setTimeout(playBeep, 600);

                // Add animation class to the called number
                calledQueues.forEach((queue, index) => {
                    queue.classList.add('animate-bounce');
                    setTimeout(() => {
                        queue.classList.remove('animate-bounce');
                    }, 3000);

                    // Speak the queue number and counter name with delay for each
                    const queueNumber = queue.querySelector('[data-queue-number]');
                    const counterName = queue.querySelector('[data-counter-name]');
                    if (queueNumber && counterName) {
                        setTimeout(() => {
                            speakQueue(queueNumber.textContent.trim(), counterName.textContent.trim());
                        }, 1000 + (index * 2000)); // Stagger speech by 2 seconds each
                    }
                });
            }
        });
    </script>
</div>
