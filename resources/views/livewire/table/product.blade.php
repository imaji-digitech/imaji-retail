<div>

    <x-data-table :data="$data" :model="$products">
        <x-slot name="head">
            <tr>
                <th style="padding:5px;margin:5px; width: 20px">#</th>
                <th style="padding:0;margin:0; !important;">
                    <a wire:click.prevent="sortBy('title')" role="button" href="#">
                        Nama  @include('components.sort-icon', ['field' => 'title'])
                    </a>
                </th>
                <th style="padding:0;margin:0;width: 100px!important;">
                    <a wire:click.prevent="sortBy('status_id')" role="button" href="#">
                        SKU
                        @include('components.sort-icon', ['field' => 'code'])
                    </a>
                </th>
                <th style="padding:0;margin:0;width: 100px !important;">
                    <a wire:click.prevent="sortBy('price')" role="button" href="#">
                        Harga
                        @include('components.sort-icon', ['field' => 'price'])
                    </a>
                </th>
                <th style="padding:0;margin:0;width: 100px !important;">
                    <a wire:click.prevent="sortBy('hpp')" role="button" href="#">
                        HPP
                        @include('components.sort-icon', ['field' => 'hpp'])
                    </a>
                </th>
                <th style="padding:0;margin:0;width: 100px !important;">
                    <a wire:click.prevent="sortBy('hpp')" role="button" href="#">
                        Profit
                        @include('components.sort-icon', ['field' => 'hpp'])
                    </a>
                </th>
                <th style="padding:0;margin:0;width: 50px !important;">
                    <a wire:click.prevent="sortBy('stock')" role="button" href="#">
                        <i class="fa fa-16px fa-files-o text-blue-500"></i>
                        @include('components.sort-icon', ['field' => 'stock'])
                    </a>
                </th>
                <th style="padding:0;margin:0;width: 50px !important;">
                    <i class="fa fa-16px fa-shopping-cart text-blue-500"></i>
                </th>
                <th style="padding:0;margin:0; width: 50px !important;">
                    <i class="fa fa-16px fa-shopping-cart text-blue-500 mr-1"></i>
                    <i class="fa fa-16px fa-calendar text-blue-500"></i>
                </th>
                <th style="padding:0;margin:0;width: 150px">
                    Aksi
                </th>
            </tr>
        </x-slot>

        <x-slot name="body">
            <form action="{{route('admin.product.graph',$dataId)}}" method="post">
                @csrf
                @foreach ($products as $product)
                    <tr x-data="window.__controller.dataTableController({{ $product->id }})" style="">
                        <td style="padding:0;margin:0;height: 10px !important;">
                            <input type="checkbox" value="{{$product->id}}" name="productId[]">
                        </td>
                        <td style="padding:0;margin:0;height: 10px !important;">{{ $product->title }}</td>
                        <td style="padding:0;margin:0;height: 10px !important;">{{ $product->code }}</td>
                        <td style="padding:0;margin:0;height: 10px !important;">Rp {{ number_format($product->price,0,",",".") }}</td>
                        <td style="padding:0;margin:0;height: 10px !important;">Rp {{ number_format($product->hpp,0,",",".") }}</td>
                        <td style="padding:0;margin:0;height: 10px !important;">
                            Rp {{ number_format($product->price-$product->hpp,0,",",".") }}</td>
                        <td style="padding:0;margin:0;height: 10px !important;">{{ $product->stock }}</td>
                        @php($tp=0)
                        @foreach($product->transactionDetails as $td)
                            @if($td->created_at->month== \Carbon\Carbon::now()->month)
                            @php($tp+=$td->quantity)
                            @endif
                        @endforeach
                        <td style="padding:0;margin:0;height: 10px !important;">{{ $product->transactionDetails->sum('quantity') }}</td>

                        <td style="padding:0;margin:0;height: 10px !important;">{{ $tp }}</td>
                        {{--                        <td style="padding:0;margin:0;height: 10px !important;">{{ $product->updated_at?$product->updated_at->format('d M Y'):'' }}</td>--}}
                        <td style="padding:0;margin:0;height: 10px !important;" class="whitespace-no-wrap row-action--icon">
                            <a role="button"
                               href="{{ route('admin.product.manufacture',[$product->product_type_id,$product->id]) }}"
                               class="mr-3">
                                <i class="fa fa-16px fa-money text-blue-500"></i>
                            </a>
                            <a role="button"
                               href="{{ route('admin.product.edit',[$product->product_type_id,$product->id]) }}"
                               class="mr-3">
                                <i class="fa fa-16px fa-pen text-blue-500"></i>
                            </a>

                            <a role="button"
                               href="{{ route('admin.product.show',[$product->product_type_id,$product->id]) }}"
                               class="mr-3"
                               target="_blank">
                                <i class="fa fa-16px fa-bar-chart text-blue-500"></i>
                            </a>
                            <br>
                            <a role="button"
                               href="{{ route('admin.product.export',[$product->product_type_id,$product->id]) }}"
                               class="mr-3"
                               target="_blank">
                                <i class="fa fa-16px fa-download text-danger">PDF</i>
                            </a>
                            <a role="button"
                               href="{{ route('admin.product.stock',[$product->product_type_id,$product->id]) }}"
                               class="mr-3"
                               target="_blank">
                                <i class="fa fa-16px fa-plus text-blue-500">STOCK</i>
                            </a>
                            <br>
                            <a role="button"
                               href="{{ route('admin.product.history',[$product->product_type_id,$product->id]) }}"
                               class="mr-3"
                               target="_blank">
                                <i class="fa fa-16px fa-copy text-blue-500">History</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                <br>
                <button class="btn btn-primary mt-3 mb-3">Bandingkan</button>
            </form>
        </x-slot>

    </x-data-table>


</div>
