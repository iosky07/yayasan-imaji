<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Tambah Foto Baru') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Galeri</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.gallery.index') }}">Tambah Foto Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-gallery action="create"/>
    </div>
</x-app-layout>
