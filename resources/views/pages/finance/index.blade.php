<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data RAB') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">RAB</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.finance.index') }}">Data RAB</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="finance" :model="$finn" />
    </div>
</x-app-layout>
