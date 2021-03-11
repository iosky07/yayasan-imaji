<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Report Baru') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Report</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.report.index') }}">Buat Report Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="report" :model="$repo" />
    </div>
</x-app-layout>
