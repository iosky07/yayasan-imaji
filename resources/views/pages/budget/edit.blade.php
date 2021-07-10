<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Ubah data keuangan ') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Keuangan</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.budget.index') }}">Ubah data keuangan</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-budget action="update" dataId="{{$id}}"/>
    </div>
</x-app-layout>
