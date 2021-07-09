<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Subscriber') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Subscribe</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.subscribe.index') }}">Data Subscriber</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="subscribe" :model="$subs" />
    </div>
</x-app-layout>
