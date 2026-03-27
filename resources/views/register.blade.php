@extends('layouts.app')

@section('title', 'Registro')

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
            <p class="text-gray-400 text-xs mt-2 tracking-wide">
                Criar Conta
            </p>
        </div>

        <!-- Form -->
        <form method="POST" action="#" class="space-y-4">
            @csrf

            <!-- Nome -->
            <div>
                <label class="block text-xs text-gray-400 mb-1">
                    Nome
                </label>
                <input 
                    type="text"
                    name="name"
                    placeholder="Seu nome completo"
                    class="w-full px-4 py-2.5 rounded-lg bg-white/10 text-white placeholder-gray-500 border border-white/10 focus:outline-none focus:ring-2 focus:ring-red-500 transition text-sm"
                >
            </div>

            <!-- Email -->
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

            <!-- Senha -->
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

            <!-- Confirmar Senha -->
            <div>
                <label class="block text-xs text-gray-400 mb-1">
                    Confirmar Senha
                </label>
                <input 
                    type="password"
                    name="password_confirmation"
                    placeholder="••••••••"
                    class="w-full px-4 py-2.5 rounded-lg bg-white/10 text-white placeholder-gray-500 border border-white/10 focus:outline-none focus:ring-2 focus:ring-red-500 transition text-sm"
                >
            </div>

            <!-- Botão -->
            <button 
                type="submit"
                class="w-full py-2.5 rounded-lg bg-red-600 hover:bg-red-700 transition duration-300 text-white font-semibold shadow-lg text-sm tracking-wide"
            >
                Criar Conta
            </button>

            <!-- Link Login -->
            <p class="text-center text-xs text-gray-400 mt-4">
                Já possui conta?
                <a href="{{ route('login') }}" class="text-red-500 hover:text-red-400 transition">
                    Entrar
                </a>
            </p>

        </form>

    </div>

</div>

@endsection
