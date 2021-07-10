<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data jenis anggaran') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Jenis Anggaran</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.project-budget.index') }}">Data jenis anggaran</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="project-budget" :model="$pbud" />
    </div>
</x-app-layout>
