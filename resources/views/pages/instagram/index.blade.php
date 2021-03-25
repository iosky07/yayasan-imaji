<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Konten Baru') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Konten</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.content.index') }}">Buat Konten Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="instagram" :model="$ig" />
    </div>
</x-app-layout>
