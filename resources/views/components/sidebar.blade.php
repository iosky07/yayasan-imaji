@php
$links = [
    [
        "href" => "admin.dashboard",
        "text" => "Dashboard",
        "is_multi" => false,
    ],
    [
        "href" => [
            [
                "section_text" => "User",
                "section_icon" => "fa fa-users",
                "section_list" => [
                    ["href" => "admin.user", "text" => "Data User"],
                    ["href" => "admin.user.new", "text" => "Buat User"]
                ]
            ],
            [
                "section_text" => "Konten",
                "section_icon" => "fa fa-file",
                "section_list" => [
                    ["href" => "admin.content.index", "text" => "Data Konten"],
                    ["href" => "admin.content.create", "text" => "Buat Konten"]
                ]
            ],
            [
                "section_text" => "Galeri",
                "section_icon" => "fa fa-user",
                "section_list" => [
                    ["href" => "admin.gallery.index", "text" => "Data Galeri"],
                    ["href" => "admin.gallery.create", "text" => "Tambah Foto"]
                ]
            ],
            [
                "section_text" => "Tag",
                "section_icon" => "fa fa-file",
                "section_list" => [
                    ["href" => "admin.tag.index", "text" => "Data Tag"],
                    ["href" => "admin.tag.create", "text" => "Tambah Tag"]
                ]
            ],
            [
                "section_text" => "Tipe Konten",
                "section_icon" => "fa fa-file",
                "section_list" => [
                    ["href" => "admin.content-type.index", "text" => "Data Tipe Konten"],
                    ["href" => "admin.content-type.create", "text" => "Tambah Tipe Konten"]
                ]
            ],
            [
                "section_text" => "Status Anggaran",
                "section_icon" => "fa fa-file",
                "section_list" => [
                    ["href" => "admin.status-budget.index", "text" => "Data Status Anggaran"],
                    ["href" => "admin.status-budget.create", "text" => "Tambah Status Anggaran"]
                ]
            ],
            [
                "section_text" => "Projek Anggaran",
                "section_icon" => "fa fa-file",
                "section_list" => [
                    ["href" => "admin.project-budget.index", "text" => "Data Projek Anggaran"],
                    ["href" => "admin.project-budget.create", "text" => "Tambah Projek Anggaran"]
                ]
            ],
            [
                "section_text" => "Tipe Anggaran",
                "section_icon" => "fa fa-file",
                "section_list" => [
                    ["href" => "admin.type-budget.index", "text" => "Data Tipe Anggaran"],
                    ["href" => "admin.type-budget.create", "text" => "Tambah Tipe Anggaran"]
                ]
            ],
            [
                "section_text" => "Tipe Finansial",
                "section_icon" => "fa fa-file",
                "section_list" => [
                    ["href" => "admin.type-finance.index", "text" => "Data Tipe Finansial"],
                    ["href" => "admin.type-finance.create", "text" => "Tambah Tipe Finansial"]
                ]
            ],
            [
                "section_text" => "Faq",
                "section_icon" => "fa fa-file",
                "section_list" => [
                    ["href" => "admin.faq.index", "text" => "Data Faq"],
                    ["href" => "admin.faq.create", "text" => "Tambah Faq"]
                ]
            ],
            [
                "section_text" => "Budget",
                "section_icon" => "fa fa-file",
                "section_list" => [
                    ["href" => "admin.budget.index", "text" => "Data Budget"],
                    ["href" => "admin.budget.create", "text" => "Tambah Budget"]
                ]
            ],
            [
                "section_text" => "Report",
                "section_icon" => "fa fa-file",
                "section_list" => [
                    ["href" => "admin.report.index", "text" => "Data Laporan"],
                    ["href" => "admin.report.create", "text" => "Tambah Laporan"]
                ]
            ],
            [
                "section_text" => "Finance",
                "section_icon" => "fa fa-file",
                "section_list" => [
                    ["href" => "admin.finance.index", "text" => "Data Keuangan"],
                    ["href" => "admin.finance.create", "text" => "Tambah Keuangan"]
                ]
            ],
        ],
        "text" => "Manajemen Website",
        "is_multi" => true,
    ],
];
$navigation_links = array_to_object($links);
@endphp

<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">
                <img class="d-inline-block" width="32px" height="30.61px" src="" alt="">
            </a>
        </div>
        @foreach ($navigation_links as $link)
        <ul class="sidebar-menu">
            <li class="menu-header">{{ $link->text }}</li>
            @if (!$link->is_multi)
            <li class="{{ Request::routeIs($link->href) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route($link->href) }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            @else
                @foreach ($link->href as $section)
                    @php
                    $routes = collect($section->section_list)->map(function ($child) {
                        return Request::routeIs($child->href);
                    })->toArray();

                    $is_active = in_array(true, $routes);
                    @endphp

                    <li class="dropdown {{ ($is_active) ? 'active' : '' }}">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="{{ $section->section_icon }}"></i> <span>{{ $section->section_text }}</span></a>
                        <ul class="dropdown-menu">
                            @foreach ($section->section_list as $child)
                                <li class="{{ Request::routeIs($child->href) ? 'active' : '' }}"><a class="nav-link" href="{{ route($child->href) }}">{{ $child->text }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            @endif
        </ul>
        @endforeach
    </aside>
</div>
