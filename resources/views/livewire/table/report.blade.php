<div>
    <x-data-table :data="$data" :model="$reports">
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
                <th><a wire:click.prevent="sortBy('content')" role="button" href="#">
                    Konten
                    @include('components.sort-icon', ['field' => 'content'])
                </a></th>
                <th><a wire:click.prevent="sortBy('thumbnail')" role="button" href="#">
                    Gambar
                    @include('components.sort-icon', ['field' => 'thumbnail'])
                </a></th>
                <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                    Tanggal Dibuat
                    @include('components.sort-icon', ['field' => 'created_at'])
                </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($reports as $m)
                <tr x-data="window.__controller.dataTableController({{ $m->id }})">
                    <td>{{ $m->id }}</td>
                    <td>{{ $m->title }}</td>
                    <td>{{ $m->content }}</td>
                    <td><img src="{{ asset('storage/thumbnail/report/'.$m->thumbnail) }}" alt="" style="width: 200px"></td>
                    <td>{{ $m->created_at->format('d M Y H:i') }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="{{route('admin.report.edit', $m->id)}}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>