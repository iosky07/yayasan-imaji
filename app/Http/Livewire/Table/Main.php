<?php

namespace App\Http\Livewire\Table;

use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;

    public $model;
    public $name;

    public $perPage;
    public $sortField = "id";
    public $sortAsc = false;
    public $search = '';

    protected $listeners = [ "deleteItem" => "delete_item" ];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function get_pagination_data ()
    {
        switch ($this->name) {
            case 'user':
                $users = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.user',
                    "users" => $users,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.user.new'),
                            'create_new_text' => 'Buat User Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];

            case 'content':
                $contents = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.content',
                    "contents" => $contents,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.content.create'),
                            'create_new_text' => 'Buat Konten Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'regulation':
                $regulations = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.regulation',
                    "regulations" => $regulations,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.regulation.create'),
                            'create_new_text' => 'Buat Peraturan Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'gallery':
                $galleries = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.gallery',
                    "galleries" => $galleries,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.gallery.create'),
                            'create_new_text' => 'Tambah Foto Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'tag':
                $tags = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.tag',
                    "tags" => $tags,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.tag.create'),
                            'create_new_text' => 'Buat Tag Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'content-type':
                $contentTypes = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.content-type',
                    "contentTypes" => $contentTypes,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.content-type.create'),
                            'create_new_text' => 'Buat Tipe Konten Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'status-budget':
                $statusBudgets = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.status-budget',
                    "statusBudgets" => $statusBudgets,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.status-budget.create'),
                            'create_new_text' => 'Buat Status Anggaran Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'project-budget':
                $projectBudgets = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.project-budget',
                    "projectBudgets" => $projectBudgets,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.project-budget.create'),
                            'create_new_text' => 'Buat Proyek Anggaran Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'type-budget':
                $typeBudgets = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.type-budget',
                    "typeBudgets" => $typeBudgets,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.type-budget.create'),
                            'create_new_text' => 'Buat Tipe Anggaran Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'faq':
                $faqs = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.faq',
                    "faqs" => $faqs,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.faq.create'),
                            'create_new_text' => 'Buat QnA Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'budget':
                $budgets = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.budget',
                    "budgets" => $budgets,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.budget.create'),
                            'create_new_text' => 'Buat Budget Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'report':
                $reports = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.report',
                    "reports" => $reports,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.report.create'),
                            'create_new_text' => 'Buat Laporan Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'finance':
                $finances = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.finance',
                    "finances" => $finances,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.finance.create'),
                            'create_new_text' => 'Buat Keuangan Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'spj':
                $spjs = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.spj',
                    "spjs" => $spjs,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.spj.create'),
                            'create_new_text' => 'Buat SPJ Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'instagram':
                $instagrams = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.instagram',
                    "instagrams" => $instagrams,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.instagram.create'),
                            'create_new_text' => 'Buat Instagram Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'subscribe':
                $subscribes = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.subscribe',
                    "subscribes" => $subscribes,
                    //"data" => array_to_object([
                        //'href' => [
                            //'create_new' => route('admin.instagram.create'),
                            //'create_new_text' => 'Buat Instagram Baru',
                            //'export' => '#',
                            //'export_text' => 'Export'
                        //]
                    //])
                ];
                break;

            default:
                # code...
                break;
        }
    }

    public function delete_item ($id)
    {
        $data = $this->model::find($id);

        if (!$data) {
            $this->emit("deleteResult", [
                "status" => false,
                "message" => "Gagal menghapus data " . $this->name
            ]);
            return;
        }

        $data->delete();
        $this->emit("deleteResult", [
            "status" => true,
            "message" => "Data " . $this->name . " berhasil dihapus!"
        ]);
    }

    public function render()
    {
        $data = $this->get_pagination_data();

        return view($data['view'], $data);
    }
}
