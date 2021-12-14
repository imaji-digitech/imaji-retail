<div>
    <x-data-table :data="$data" :model="$users">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                        ID
                        @include('components.sort-icon', ['field' => 'id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('name')" role="button" href="#">
                        Name
                        @include('components.sort-icon', ['field' => 'name'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('no_phone')" role="button" href="#">
                        No HP
                        @include('components.sort-icon', ['field' => 'no_phone'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('address')" role="button" href="#">
                        Alamat
                        @include('components.sort-icon', ['field' => 'address'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                        Tanggal bergabung
                        @include('components.sort-icon', ['field' => 'created_at'])
                    </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($users as $user)
                <tr x-data="window.__controller.dataTableController({{ $user->id }})">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->no_phone }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->created_at->format('d M Y H:i') }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        @if(auth()->user()->role!=3)
                            <a role="button" href="{{ route('admin.customer.edit',$user->id) }}" class="mr-3"><i
                                    class="fa fa-16px fa-pen"></i></a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
