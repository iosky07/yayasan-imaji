<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data laporan') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Laporan</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.report.index') }}">Data laporan</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="report" :model="$repo" />
    </div>
</x-app-layout>
