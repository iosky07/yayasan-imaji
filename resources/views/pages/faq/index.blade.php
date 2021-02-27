<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Faq Baru') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Faq</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.faq.index') }}">Buat Faq Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="faq" :model="$faqq" />
    </div>
</x-app-layout>
