<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Anggota Baru') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Anggota</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.gallery.index') }}">Buat Peraturan Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="gallery" :model="$mem" />
    </div>
</x-app-layout>
