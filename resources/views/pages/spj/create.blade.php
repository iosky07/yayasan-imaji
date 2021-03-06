<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat data SPJ') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">SPJ</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.spj.index') }}">Buat data SPJ</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-spj action="create" :type="1"/>
    </div>
</x-app-layout>
