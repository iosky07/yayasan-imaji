<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Peraturan Baru') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Peraturan</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.regulation.index') }}">Buat Peraturan Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-regulation action="create"/>
    </div>
</x-app-layout>
