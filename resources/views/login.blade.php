@extends('layouts.app')

@section('title', 'Login')

@section('content')
   
<div class="w-full max-w-sm">

    <div class="bg-black/75 backdrop-blur-xl p-6 rounded-2xl shadow-2xl border border-white/10">

        <!-- Logo -->
        <div class="text-center mb-6">
            <img 
                src="{{ asset('Logo.png') }}" 
                alt="Logo" 
                class="w-56 mx-auto drop-shadow-xl"
            >
        </div>

        <form method="POST" action="#" class="space-y-4">
            @csrf

            <div>
                <label class="block text-xs text-gray-400 mb-1">
                    Email
                </label>
                <input 
                    type="email"
                    name="email"
                    placeholder="seu@email.com"
                    class="w-full px-4 py-2.5 rounded-lg bg-white/10 text-white placeholder-gray-500 border border-white/10 focus:outline-none focus:ring-2 focus:ring-red-500 transition text-sm"
                >
            </div>

            
            <div>
                <label class="block text-xs text-gray-400 mb-1">
                    Senha
                </label>
                <input 
                    type="password"
                    name="password"
                    placeholder="••••••••"
                    class="w-full px-4 py-2.5 rounded-lg bg-white/10 text-white placeholder-gray-500 border border-white/10 focus:outline-none focus:ring-2 focus:ring-red-500 transition text-sm"
                >
            </div>

        
            <div class="flex items-center justify-between text-xs">
                <label class="flex items-center text-gray-400 space-x-2">
                    <input type="checkbox" class="accent-red-600 scale-90">
                    <span>Lembrar-me</span>
                </label>

                
            </div>

            
            <button 
                type="submit"
                class="w-full py-2.5 rounded-lg bg-red-600 hover:bg-red-700 transition duration-300 text-white font-semibold shadow-lg text-sm tracking-wide"
            >
                Entrar
            </button>
        </form>

    </div>

</div>


@endsection