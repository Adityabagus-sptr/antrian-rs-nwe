@extends('layouts.guest')

@section('content')
    <div class="min-h-screen flex bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 relative overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-blue-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob"></div>
            <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-purple-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-indigo-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-4000"></div>
        </div>
        
        <!-- Left Side - Branding -->
        <div class="hidden lg:flex lg:w-1/2 xl:w-3/5 bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 p-8 xl:p-12 flex-col justify-between relative overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full -translate-x-1/2 -translate-y-1/2 animate-pulse"></div>
                <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/2 translate-y-1/2 animate-pulse animation-delay-1000"></div>
                <div class="absolute top-1/2 left-1/4 w-64 h-64 bg-white rounded-full -translate-x-1/2 -translate-y-1/2 animate-pulse animation-delay-2000"></div>
            </div>
            
            <div class="relative z-10">
                <div class="flex items-center space-x-3 mb-8">
                    <div class="bg-white rounded-xl p-3 shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-white">Sehat Selalu</h1>
                        <p class="text-blue-200 text-sm">Hospital Management</p>
                    </div>
                </div>
            </div>
            
            <div class="relative z-10">
                <h2 class="text-4xl font-bold text-white mb-6 leading-tight">
                    Sistem Antrian<br>Digital Terpadu
                </h2>
                <p class="text-blue-100 text-lg mb-8">
                    Kelola antrian pasien dengan efisien dan profesional. Tingkatkan kualitas pelayanan rumah sakit Anda.
                </p>
                
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="bg-blue-500 rounded-lg p-2">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="text-white">Manajemen loket yang mudah</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="bg-blue-500 rounded-lg p-2">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="text-white">Real-time monitoring antrian</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="bg-blue-500 rounded-lg p-2">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="text-white">Laporan dan analitik lengkap</span>
                    </div>
                </div>
            </div>
            
            <div class="relative z-10 text-blue-200 text-sm">
                © 2025 Rumah Sakit Sehat Selalu. All rights reserved.
            </div>
        </div>
        
        <!-- Right Side - Login Form -->
        <div class="flex-1 flex items-center justify-center p-4 sm:p-6 lg:p-8 relative z-10">
            <div class="max-w-md w-full animate-fade-in-up">
                <!-- Mobile Logo -->
                <div class="lg:hidden text-center mb-6 sm:mb-8">
                    <div class="inline-flex items-center space-x-3 mb-4 bg-white rounded-2xl shadow-lg px-4 py-3">
                        <div class="bg-gradient-to-br from-blue-600 to-indigo-600 rounded-xl p-2.5 shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 sm:h-8 sm:w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <span class="text-xl sm:text-2xl font-bold text-gray-800 block">Sehat Selalu</span>
                            <span class="text-xs text-gray-500">Hospital Management</span>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white/80 backdrop-blur-lg rounded-2xl sm:rounded-3xl shadow-2xl p-6 sm:p-8 border border-white/20">
                    <div class="mb-6 sm:mb-8">
                        <h3 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">Selamat Datang Kembali! 👋</h3>
                        <p class="text-sm sm:text-base text-gray-600">Silakan login untuk mengakses dashboard petugas</p>
                    </div>
                    
                    <form class="space-y-6" action="{{ route('login') }}" method="POST">
                        @csrf
                        
                        @if (session('status'))
                            <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-lg">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <p class="text-green-700 text-sm font-medium">{{ session('status') }}</p>
                                </div>
                            </div>
                        @endif
                        
                        @if ($errors->any())
                            <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-lg">
                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-red-500 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                    </svg>
                                    <ul class="text-red-700 text-sm space-y-1">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                        
                        <!-- Email Input -->
                        <div class="space-y-2">
                            <label for="email" class="block text-xs sm:text-sm font-semibold text-gray-700">Alamat Email</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                    <svg class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400 group-focus-within:text-blue-600 transition-colors duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <input id="email" name="email" type="email" autocomplete="email" required 
                                    class="block w-full pl-10 sm:pl-12 pr-3 sm:pr-4 py-3 sm:py-3.5 text-sm sm:text-base border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 text-gray-900 placeholder-gray-400 hover:border-gray-400" 
                                    placeholder="petugas@sehatselalalu.com" value="{{ old('email') }}">
                            </div>
                        </div>
                        
                        <!-- Password Input -->
                        <div class="space-y-2">
                            <label for="password" class="block text-xs sm:text-sm font-semibold text-gray-700">Kata Sandi</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                    <svg class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400 group-focus-within:text-blue-600 transition-colors duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <input id="password" name="password" type="password" autocomplete="current-password" required 
                                    class="block w-full pl-10 sm:pl-12 pr-3 sm:pr-4 py-3 sm:py-3.5 text-sm sm:text-base border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 text-gray-900 placeholder-gray-400 hover:border-gray-400" 
                                    placeholder="Masukkan kata sandi">
                            </div>
                        </div>
                        
                        <!-- Remember Me -->
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 sm:gap-0">
                            <div class="flex items-center">
                                <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded transition-colors cursor-pointer">
                                <label for="remember_me" class="ml-2 block text-xs sm:text-sm text-gray-700 font-medium cursor-pointer">
                                    Ingat saya
                                </label>
                            </div>
                            <a href="#" class="text-xs sm:text-sm font-medium text-blue-600 hover:text-blue-700 transition-colors hover:underline">
                                Lupa password?
                            </a>
                        </div>
                        
                        <!-- Login Button -->
                        <button type="submit" class="w-full flex justify-center items-center py-3 sm:py-3.5 px-4 border border-transparent rounded-xl shadow-lg text-sm sm:text-base font-semibold text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 active:scale-95 transform hover:scale-[1.02] transition-all duration-200">
                            <svg class="h-4 w-4 sm:h-5 sm:w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                            Masuk ke Dashboard
                        </button>
                    </form>
                    
                    <!-- Divider -->
                    <div class="relative my-6 sm:my-8">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-200"></div>
                        </div>
                        <div class="relative flex justify-center text-xs sm:text-sm">
                            <span class="px-3 sm:px-4 bg-white text-gray-500 font-medium">Atau login dengan</span>
                        </div>
                    </div>
                    
                    <!-- Google Login Button -->
                    <a href="{{ route('google.login') }}" class="w-full flex justify-center items-center py-3 sm:py-3.5 px-4 border-2 border-gray-200 rounded-xl shadow-sm text-sm sm:text-base font-semibold text-gray-700 bg-white hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 active:scale-95 transform hover:scale-[1.02] transition-all duration-200 group">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 sm:mr-3 group-hover:scale-110 transition-transform duration-200" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                        </svg>
                        <span class="hidden sm:inline">Lanjutkan dengan Google</span>
                        <span class="sm:hidden">Login dengan Google</span>
                    </a>
                    
                    <!-- Footer Info -->
                    <div class="mt-6 sm:mt-8 pt-4 sm:pt-6 border-t border-gray-100 text-center">
                        <p class="text-xs text-gray-500">
                            Dengan masuk, Anda menyetujui <a href="#" class="text-blue-600 hover:underline transition-colors">Syarat & Ketentuan</a><br class="hidden sm:inline">
                            <span class="sm:hidden"> dan </span>dan <a href="#" class="text-blue-600 hover:underline transition-colors">Kebijakan Privasi</a> kami
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Custom Animations -->
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
        
        .animate-blob {
            animation: blob 7s infinite;
        }
        
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        
        .animation-delay-4000 {
            animation-delay: 4s;
        }
        
        .animation-delay-1000 {
            animation-delay: 1s;
        }
        
        .animate-fade-in-up {
            animation: fade-in-up 0.6s ease-out;
        }
        
        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }
        
        /* Custom focus styles */
        input:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        /* Backdrop blur fallback */
        @supports not (backdrop-filter: blur(10px)) {
            .backdrop-blur-lg {
                background-color: rgba(255, 255, 255, 0.95);
            }
        }
    </style>
@endsection