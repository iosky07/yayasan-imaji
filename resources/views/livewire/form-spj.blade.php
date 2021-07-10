<div id="form-create" class=" card p-4">
    <form wire:submit.prevent="{{ $action }}">

        <x-input type="text" title="Judul SPJ" model="spj.title"/>

        <x-input type="number" title="Nominal" model="spj.money"/>

        <x-input type="file" title="File" model="file"/>
        <div wire:loading wire:target="file">
            Proses upload...
        </div>
        @if(auth()->user()->role==1)
            <x-select :options="$optionStatus" :selected="$spj['status']" title="Status" model="spj.status"/>
        @endif
        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>

    </form>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        window.livewire.on('redirect', () => {
            setTimeout(function () {
                window.location.href = "{{route('admin.spj.index')}}"; //will redirect to your blog page (an ex: blog.html)
            }, 2000); //will call the function after 2 secs.
        });
    });
</script>
