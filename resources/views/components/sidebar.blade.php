<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        {{--        @if(auth()->id()!=22)--}}
        @if(auth()->user()->role==1 or auth()->user()->role==2)
            <div class="sidebar-brand">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
                <a href="{{ route('admin.dashboard') }}">
                    <img class="d-inline-block" width="32px" height="30.61px" src="" alt="">
                </a>
            </div>

            <ul class="sidebar-menu">
                <li class="menu-header">Dashboard</li>
                <li class="">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}"><i
                            class="fas fa-fire"></i><span>Dashboard</span></a>
                </li>
                <li class="menu-header">Managemen Kas</li>
                @php($productTypes = \App\Models\ProductType::get())
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                        <span>Laporan kas</span></a>
                    <ul class="dropdown-menu">
                        @foreach($productTypes as $productType)
                            <li><a class="nav-link"
                                   href="{{route('admin.cash-note.index',$productType->id)}}">{{ $productType->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                        <span>Buku kas</span></a>
                    <ul class="dropdown-menu">
                        @foreach($productTypes as $productType)
                            <li><a class="nav-link"
                                   href="{{route('admin.cash-book.index',$productType->id)}}">{{ $productType->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="menu-header">Managemen Produk</li>
                <li class="">
                    <a class="nav-link" href="{{route('admin.product-type.index')}}">
                        <i class="fas fa-fire"></i><span>UMKM</span>
                    </a>
                </li>

                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                        <span>Product</span></a>
                    <ul class="dropdown-menu">
                        @foreach($productTypes as $productType)
                            <li class="">
                                <a class="nav-link" href="{{route('admin.product.index',$productType->id)}}">
                                    {{ $productType->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li class="menu-header">Asset</li>
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                        <span>Asset</span></a>
                    <ul class="dropdown-menu">
                        @foreach($productTypes as $productType)
                            <li class="">
                                <a class="nav-link" href="{{route('admin.asset.index',$productType->id)}}">
                                    {{ $productType->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li class="menu-header">Keuangan</li>
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                        <span>Keuangan</span></a>
                    <ul class="dropdown-menu">
                        @foreach($productTypes as $productType)
                            <li>
                                <a class="nav-link" href="{{route('admin.finance.index',$productType->id)}}">
                                    {{ $productType->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="menu-header">Transaksi</li>
                <li class="">
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                        <span>Buat Transaksi</span></a>
                    <ul class="dropdown-menu">
                        @foreach($productTypes as $productType)
                            <li>
                                <a class="nav-link" href="{{route('admin.transaction.create',$productType->id)}}">
                                    {{ $productType->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                        <span>Transaksi Histori</span></a>
                    <ul class="dropdown-menu">
                        @foreach($productTypes as $productType)
                            <li>
                                <a class="nav-link" href="{{route('admin.transaction.history',$productType->id)}}">
                                    {{ $productType->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                        <span>Transaksi Aktif</span></a>
                    <ul class="dropdown-menu">
                        @foreach($productTypes as $productType)
                            <li>
                                <a class="nav-link" href="{{route('admin.transaction.active',$productType->id)}}">
                                    {{ $productType->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="">
                    <a class="nav-link" href="{{route('admin.customer.index')}}"><i class="fas fa-fire"></i><span>Customer</span></a>
                </li>
                @if(auth()->user()->role==1)
                    <li class="">
                        <a class="nav-link" href="{{route('admin.user')}}"><i
                                class="fas fa-fire"></i><span>User</span></a>
                    </li>
                @endif
            </ul>
        @else
            <div class="sidebar-brand">
                <a href="{{ route('umkm.dashboard') }}">Dashboard</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
                <a href="{{ route('umkm.dashboard') }}">
                    <img class="d-inline-block" width="32px" height="30.61px" src="" alt="">
                </a>
            </div>

            <ul class="sidebar-menu">
                <li class="menu-header">Dashboard</li>
                <li class="">
                    <a class="nav-link" href=""><i class="fas fa-fire"></i><span>Dashboard</span></a>
                </li>
{{--                <li class="menu-header">Managemen Produk</li>--}}
{{--                <li class="">--}}
{{--                    <a class="nav-link" href="{{route('umkm.product-type.index')}}">--}}
{{--                        <i class="fas fa-fire"></i><span>UMKM</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li class="">
                    <a class="nav-link" href="{{route('umkm.product.index')}}">
                        <i class="fas fa-fire"></i><span>Produk</span>
                    </a>
                </li>
                <li class="menu-header">Asset</li>
                <li class="">
                    <a class="nav-link" href="{{route('umkm.asset.index')}}">
                        <i class="fas fa-fire"></i><span>Asset</span>
                    </a>
                </li>
{{--                <li class="menu-header">Keuangan</li>--}}
{{--                <li class="">--}}
{{--                    <a class="nav-link" href="{{route('umkm.finance.index')}}">--}}
{{--                        <i class="fas fa-fire"></i><span>Finance</span></a>--}}
{{--                </li>--}}
                <li class="menu-header">Transaksi</li>
                <li class="">
                    <a class="nav-link" href="{{route('umkm.transaction.create')}}">
                        <i class="fas fa-fire"></i><span>Buat transaksi</span>
                    </a>
                </li>
                <li class="">
                    <a class="nav-link" href="{{route('umkm.transaction.history')}}">
                        <i class="fas fa-fire"></i><span>Riwayat transaksi</span>
                    </a>
                </li>
                <li class="">
                    <a class="nav-link" href="{{route('umkm.transaction.active')}}"><i
                            class="fas fa-fire"></i><span>Transaksi aktif</span></a>
                </li>
                <li class="">
                    <a class="nav-link" href="{{route('admin.customer.index')}}"><i class="fas fa-fire"></i><span>Customer</span></a>
                </li>
            </ul>
        @endif

        {{--        @else--}}
        {{--            <div class="sidebar-brand">--}}
        {{--                <a href="{{ route('admin.asset.index') }}">Dashboard</a>--}}
        {{--            </div>--}}
        {{--            <div class="sidebar-brand sidebar-brand-sm">--}}
        {{--                <a href="{{ route('admin.asset.index') }}">--}}
        {{--                    <img class="d-inline-block" width="32px" height="30.61px" src="" alt="">--}}
        {{--                </a>--}}
        {{--            </div>--}}

        {{--            <ul class="sidebar-menu">--}}
        {{--                <li class="menu-header">Asset</li>--}}
        {{--                <li class="">--}}
        {{--                    <a class="nav-link" href="{{route('admin.asset.index')}}"><i--}}
        {{--                            class="fas fa-fire"></i><span>Asset</span></a>--}}
        {{--                </li>--}}
        {{--            </ul>--}}
        {{--        @endif--}}
    </aside>
</div>
