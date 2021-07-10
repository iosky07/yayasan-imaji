<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat data tipe konten') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Tipe Konten</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.content-type.index') }}">Buat data tipe konten</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-content-type action="create" :type="1"/>
    </div>
</x-app-layout>
