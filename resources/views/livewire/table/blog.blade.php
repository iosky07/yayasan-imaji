<div>
    <x-data-table :data="$data" :model="$blogs">
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
                <th><a wire:click.prevent="sortBy('status')" role="button" href="#">
                    Status
                    @include('components.sort-icon', ['field' => 'status'])
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
            @foreach ($blogs as $b)
                <tr x-data="window.__controller.dataTableController({{ $b->id }})">
                    <td>{{ $b->id }}</td>
                    <td>{{ $b->title }}</td>
                    <td>{{ $b->status }}</td>
                    <td><img src="{{ asset('storage/thumbnail/'.$b->thumbnail) }}" alt="" style="width: 200px"></td>
                    <td>{{ $b->created_at->format('d M Y H:i') }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="{{route('admin.blog.edit', $b->id)}}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
