<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
    <thead>
        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
            <th class="w-10px pe-2">No</th>
            <th class="min-w-200px">Nama Customer</th>
            <th class="text-end min-w-100px">Nama Produk</th>
            <th class="text-end min-w-100px">Kode Pesanan</th>
            <th class="text-end min-w-100px">Total Harga</th>
            <th class="text-end min-w-100px">Status</th>
            <th class="text-end min-w-70px">Actions</th>
        </tr>
    </thead>
    <tbody class="fw-bold text-gray-600">
        @foreach($collection as $item)
        <tr>
            <td>
                {{$loop->iteration}}
            </td>
            <td class="text-end pe-0">
                <span class="fw-bolder text-dark">{{ $item->name }}</span>
            </td>
            <td>
                <div class="d-flex align-items-center">
                    <span class="symbol symbol-50px">
                        <span class="symbol-label" style="background-image:url('{{ asset('storage/'.$item->image_product) }}');"></span>
                    </span>
                    <div class="ms-5">
                        {{ $item->name_product}}
                    </div>
                </div>
            </td>
            <td class="text-end pe-0">
                <span class="fw-bolder text-dark">{{ $item->order_number }}</span>
            </td>
            <td class="text-end pe-0">
                <span class="fw-bolder text-dark">{{ $item->total_price }}</span>
            </td>
            <td class="text-end pe-0">
                <span class="fw-bolder text-dark">{{ $item->status }}</span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $collection->links('theme.web.pagination') }}