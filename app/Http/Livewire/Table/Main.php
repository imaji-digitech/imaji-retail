<?php

namespace App\Http\Livewire\Table;

use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;

    public $model;
    public $name;
    public $dataId;

    public $perPage = 10;
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
                break;
            case 'customer':
                $users = $this->model::customer($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.customer',
                    "users" => $users,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.customer.create'),
                            'create_new_text' => 'Buat Customer Baru',
                        ]
                    ])
                ];
                break;
            case 'finance':
                $finances = $this->model::search($this->search,$this->dataId)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.finance',
                    "finances" => $finances,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.finance.create',$this->dataId),
                            'create_new_text' => 'Buat keuangan baru',
                        ]
                    ])
                ];
                break;
            case 'finance-note':
                $finances = $this->model::whereFinanceId($this->dataId,$this->dataId)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                return [
                    "view" => 'livewire.table.finance-note',
                    "finances" => $finances,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.finance.note.create',$this->dataId),
                            'create_new_text' => 'Tambah nota baru',
                            'export' => route('admin.finance.note.submit',$this->dataId),
                            'export_text' => 'Ajukan SPJ'
                        ]
                    ])
                ];
                break;
            case 'asset':
                $assets = $this->model::search($this->search,$this->dataId)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                return [
                    "view" => 'livewire.table.asset',
                    "assets" => $assets,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.asset.create',$this->dataId),
                            'create_new_text' => 'Tambah asset baru',
                        ]
                    ])
                ];
                break;
            case 'cash-book':
                $cashBooks = $this->model::search($this->dataId)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate(9999);

                return [
                    "view" => 'livewire.table.cash-book',
                    "cashBooks" => $cashBooks,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.cash-book.create',$this->dataId),
                            'create_new_text' => 'Tambah data kas baru',
                        ]
                    ])
                ];
                break;
            case 'cash-note':
                $cashNotes = $this->model::search($this->search,$this->dataId)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.cash-note',
                    "cashNotes" => $cashNotes,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.cash-note.create',$this->dataId),
                            'create_new_text' => 'Buka dan tutup buku',
                        ]
                    ])
                ];
                break;
            case 'product':
                $products = $this->model::search($this->search,$this->dataId)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.product',
                    "products" => $products,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.product.create',$this->dataId),
                            'create_new_text' => 'Tambah produk baru',
                        ]
                    ])
                ];
                break;
            case 'product-history':
                $products = $this->model::productSearch($this->search,$this->dataId)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.history-product',
                    "products" => $products,
                    "data" => array_to_object([
                        'href' => [
//                            'create_new' => route('admin.product.create'),
//                            'create_new_text' => 'Tambah produk baru',
                        ]
                    ])
                ];
                break;
            case 'product-type':
                $productTypes = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                return [
                    "view" => 'livewire.table.product-type',
                    "productTypes" => $productTypes,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.product-type.create'),
                            'create_new_text' => 'Tambah UMKM baru',
                        ]
                    ])
                ];
                break;
            case 'transaction-history':
                $transactions = $this->model::search($this->search,[3],$this->dataId)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.transaction-history',
                    "transactions" => $transactions,
                    "data" => array_to_object([
                        'href' => [

                        ]
                    ])
                ];
                break;
            case 'transaction-active':
                $transactions = $this->model::search($this->search,[1,2],$this->dataId)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.transaction-active',
                    "transactions" => $transactions,
                    "data" => array_to_object([
                        'href' => [

                        ]
                    ])
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
