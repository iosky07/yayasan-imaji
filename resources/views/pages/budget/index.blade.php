<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data keuangan') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Keuangan</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.budget.index') }}">Data keuangan</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="budget" :model="$budg" />
    </div>
</x-app-layout>
