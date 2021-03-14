<div>
    <x-data-table :data="$data" :model="$finances">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('title')" role="button" href="#">
                    Judul
                    @include('components.sort-icon', ['field' => 'title'])
                </a></th>
                <th><a wire:click.prevent="sortBy('type_id')" role="button" href="#">
                    Tipe
                    @include('components.sort-icon', ['field' => 'type_id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('money')" role="button" href="#">
                    Anggaran
                    @include('components.sort-icon', ['field' => 'money'])
                </a></th>
                <th><a wire:click.prevent="sortBy('pic_internal')" role="button" href="#">
                    PIC(Internal)
                    @include('components.sort-icon', ['field' => 'pic_internal'])
                </a></th>
                <th><a wire:click.prevent="sortBy('pic_external')" role="button" href="#">
                    PIC(Eksternal)
                    @include('components.sort-icon', ['field' => 'pic_external'])
                </a></th>
                <th><a wire:click.prevent="sortBy('publish_date')" role="button" href="#">
                    Tanggal Acara
                    @include('components.sort-icon', ['field' => 'publish_date'])
                </a></th>
                <th><a wire:click.prevent="sortBy('note')" role="button" href="#">
                    Note
                    @include('components.sort-icon', ['field' => 'note'])
                </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($finances as $m)
                <tr x-data="window.__controller.dataTableController({{ $m->id }})">
                    <td>{{ $m->id }}</td>
                    <td>{{ $m->title }}</td>
                    <td>{{ $m->type_id }}</td>
                    <td>{{ $m->money }}</td>
                    <td>{{ $m->pic_internal }}</td>
                    <td>{{ $m->pic_external }}</td>
                    <td>{{ $m->publish_date}}</td>
                    <td>{{ $m->note }}</td>
{{--                    <td>{{ $m->created_at->format('d M Y H:i') }}</td>--}}
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="{{route('admin.finance.edit', $m->id)}}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
