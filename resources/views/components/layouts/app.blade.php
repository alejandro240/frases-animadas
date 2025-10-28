<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
    @if(isset($title))
        <title>{{ $title }} - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif
    <style>
        .user-dropdown {
            position: relative;
            display: inline-block;
        }
        
        .user-dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            margin-top: 0.5rem;
            background: #27272a;
            border: 1px solid #3f3f46;
            border-radius: 0.5rem;
            min-width: 250px;
            box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.3);
            z-index: 50;
        }
        
        .user-dropdown:hover .user-dropdown-menu {
            display: block;
        }
        
        .user-dropdown-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            color: #e4e4e7;
            text-decoration: none;
            transition: background-color 0.2s;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
            font-size: 14px;
        }
        
        .user-dropdown-item:hover {
            background-color: #3f3f46;
        }
        
        .user-dropdown-separator {
            height: 1px;
            background-color: #3f3f46;
            margin: 0.25rem 0;
        }
        
        .user-profile-button {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem 1rem;
            background: #3f3f46;
            border: 1px solid #52525b;
            border-radius: 0.5rem;
            color: white;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .user-profile-button:hover {
            background: #52525b;
        }
        
        .user-initials {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 2rem;
            height: 2rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 0.375rem;
            font-weight: bold;
            font-size: 0.875rem;
        }
    </style>
</head>
<body class="min-h-screen bg-zinc-900">
    <flux:header container class="border-b border-zinc-700 bg-zinc-900">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <flux:brand href="{{ route('frases.index') }}" logo="{{ asset('images/logo.svg') }}" name="{{ config('app.name') }}" class="max-lg:hidden dark:hidden" />
        <flux:brand href="{{ route('frases.index') }}" logo="{{ asset('images/logo.svg') }}" name="{{ config('app.name') }}" class="max-lg:!hidden hidden dark:flex" />

        <flux:navbar class="-mb-px max-lg:hidden">
            <flux:navbar.item icon="sparkles" :href="route('frases.index')" :current="request()->routeIs('frases.index')" wire:navigate>Mis Animaciones</flux:navbar.item>
            <flux:navbar.item icon="plus-circle" :href="route('frases.create')" :current="request()->routeIs('frases.create')" wire:navigate>Nueva Animación</flux:navbar.item>
        </flux:navbar>

        <flux:spacer />

        <div class="user-dropdown">
            <div class="user-profile-button">
                <div class="user-initials">{{ auth()->user()->initials() }}</div>
                <span>{{ Str::limit(auth()->user()->name, 20) }}</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </div>
            
            <div class="user-dropdown-menu">
                <div class="user-dropdown-item" style="pointer-events: none; opacity: 0.7;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <span>{{ auth()->user()->name }}</span>
                </div>
                
                <div class="user-dropdown-item" style="pointer-events: none; opacity: 0.7;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                        <path d="m2 7 10 7 10-7"></path>
                    </svg>
                    <span>{{ auth()->user()->email }}</span>
                </div>
                
                <div class="user-dropdown-separator"></div>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="user-dropdown-item">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg>
                        <span>Cerrar Sesión</span>
                    </button>
                </form>
            </div>
        </div>
    </flux:header>

    <flux:main container>
        {{ $slot }}
    </flux:main>
</body>
</html>

