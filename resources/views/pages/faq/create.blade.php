<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat data FAQ') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">FAQ</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.faq.index') }}">Buat data FAQ</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-faq action="create" :type="1"/>
    </div>
</x-app-layout>
