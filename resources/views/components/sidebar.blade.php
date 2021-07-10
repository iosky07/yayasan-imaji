@php
    if (auth()->user()->role==1){
    $links = [
        [
            "href" => [
                [
                    "section_text" => "User",
                    "section_icon" => "fa fa-users",
                    "section_list" => [
                        ["href" => "admin.user", "text" => "Data user"],
                        ["href" => "admin.user.new", "text" => "Buat user"]
                    ]
                ],
                [
                    "section_text" => "Konten",
                    "section_icon" => "fa fa-blog",
                    "section_list" => [
                        ["href" => "admin.content.index", "text" => "Data konten"],
                        ["href" => "admin.content.create", "text" => "Buat konten"]
                    ]
                ],
                [
                    "section_text" => "Galeri",
                    "section_icon" => "fa fa-image",
                    "section_list" => [
                        ["href" => "admin.gallery.index", "text" => "Data galeri"],
                        ["href" => "admin.gallery.create", "text" => "Tambah foto galeri"]
                    ]
                ],
                [
                    "section_text" => "Tag",
                    "section_icon" => "fa fa-tag",
                    "section_list" => [
                        ["href" => "admin.tag.index", "text" => "Data tag"],
                        ["href" => "admin.tag.create", "text" => "Tambah tag"]
                    ]
                ],
                [
                    "section_text" => "Tipe Konten",
                    "section_icon" => "fa fa-tag",
                    "section_list" => [
                        ["href" => "admin.content-type.index", "text" => "Data tipe konten"],
                        ["href" => "admin.content-type.create", "text" => "Tambah tipe konten"]
                    ]
                ],
                [
                    "section_text" => "Faq",
                    "section_icon" => "fa fa-question",
                    "section_list" => [
                        ["href" => "admin.faq.index", "text" => "Data Faq"],
                        ["href" => "admin.faq.create", "text" => "Tambah Faq"]
                    ]
                ],
                            [
                    "section_text" => "Instagram",
                    "section_icon" => "fa fa-instagram",
                    "section_list" => [
                        ["href" => "admin.instagram.index", "text" => "Data Instagram"],
                        ["href" => "admin.instagram.create", "text" => "Tambah Instagram"]
                    ]
                ],
            ],
            "text" => "Manajemen Website",
            "is_multi" => true,
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
                "section_text" => "Instagram",
                "section_icon" => "fa fa-file",
                "section_list" => [
                    ["href" => "admin.instagram.index", "text" => "Data Instagram"],
                    ["href" => "admin.instagram.create", "text" => "Tambah Instagram"]
                ]
            ],
            [
                "section_text" => "Subscriber",
                "section_icon" => "fa fa-file",
                "section_list" => [
                    ["href" => "admin.subscribe.index", "text" => "Data Subscriber"],
                ]
            ],
        ],
    ];
}else{
    $links = [
        [
            "href" => [

                [
                    "section_text" => "Konten",
                    "section_icon" => "fa fa-blog",
                    "section_list" => [
                        ["href" => "admin.content.index", "text" => "Data konten"],
                        ["href" => "admin.content.create", "text" => "Buat konten"]
                    ]
                ],
                [
                    "section_text" => "Galeri",
                    "section_icon" => "fa fa-image",
                    "section_list" => [
                        ["href" => "admin.gallery.index", "text" => "Data galeri"],
                        ["href" => "admin.gallery.create", "text" => "Tambah foto galeri"]
                    ]
                ],
                [
                    "section_text" => "Tag",
                    "section_icon" => "fa fa-tag",
                    "section_list" => [
                        ["href" => "admin.tag.index", "text" => "Data tag"],
                        ["href" => "admin.tag.create", "text" => "Tambah tag"]
                    ]
                ],
                [
                    "section_text" => "Tipe Konten",
                    "section_icon" => "fa fa-tag",
                    "section_list" => [
                        ["href" => "admin.content-type.index", "text" => "Data tipe konten"],
                        ["href" => "admin.content-type.create", "text" => "Tambah tipe konten"]
                    ]
                ],
                [
                    "section_text" => "Faq",
                    "section_icon" => "fa fa-question",
                    "section_list" => [
                        ["href" => "admin.faq.index", "text" => "Data Faq"],
                        ["href" => "admin.faq.create", "text" => "Tambah Faq"]
                    ]
                ],

            ],
            "text" => "Manajemen Website",
            "is_multi" => true,
        ],
            [
            "href" => [
                [
                    "section_text" => "Pelaporan",
                    "section_icon" => "fa fa-file",
                    "section_list" => [
                        ["href" => "admin.report.index", "text" => "Data laporan"],
                        ["href" => "admin.report.create", "text" => "Tambah laporan"]
                    ]
                ],


                [
                    "section_text" => "RAB",
                    "section_icon" => "fa fa-file",
                    "section_list" => [
                        ["href" => "admin.finance.index", "text" => "Data RAB"],
                        ["href" => "admin.finance.create", "text" => "Tambah RAB"]
                    ]
                ],
                 [
                    "section_text" => "SPJ",
                    "section_icon" => "fa fa-file",
                    "section_list" => [
                        ["href" => "admin.spj.index", "text" => "Data SPJ"],
                        ["href" => "admin.spj.create", "text" => "Tambah SPJ"]
                    ]
                ],
            ],
            "text" => "Manajemen Laporan",
            "is_multi" => true,
        ],
    ];
}
    $navigation_links = array_to_object($links)
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
                        <a class="nav-link" href="{{ route($link->href) }}"><i
                                class="fas fa-fire"></i><span>Dashboard</span></a>
                    </li>
                @else
                    @foreach ($link->href as $section)
                        @php
                            $routes = collect($section->section_list)->map(function ($child) {
                                return Request::routeIs($child->href);
                            })->toArray();

                            $is_active = in_array(true, $routes)
                        @endphp

                        <li class="dropdown {{ ($is_active) ? 'active' : '' }}">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                    class="{{ $section->section_icon }}"></i> <span>{{ $section->section_text }}</span></a>
                            <ul class="dropdown-menu">
                                @foreach ($section->section_list as $child)
                                    <li class="{{ Request::routeIs($child->href) ? 'active' : '' }}"><a class="nav-link"
                                                                                                        href="{{ route($child->href) }}">{{ $child->text }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                @endif
            </ul>
        @endforeach
    </aside>
</div>
