<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data konten') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Konten</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.content.index') }}">Data konten</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="content" :model="$con" />
    </div>
</x-app-layout>
