<div class="x_content">
    <div class="table-responsive">
        <table class="table table-compact table stripped" id="tbl-detail_transaksi">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Transaksi ID</th>
                    <th>Menu ID</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Tools</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($detail_transaksi  as $p)
            <tr>
                <td>{{ $i = !isset ($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->transaksi_id }}</td>
                <td>{{ $p->menu_id }}</td>
                <td>{{ $p->jumlah }}</td>
                <td>{{ $p->subtotal }}</td>
                <td>
                    <button class="btn text-warning" data-toggle="modal" data-target="#modalFormJenis" data-mode="edit"
                        data-id="{{ $p->id }}" data-transaksi_id="{{ $p->transaksi_id }}" data-menu_id="{{ $p->menu_id }}" data-jumlah="{{ $p->jumlah }}" data-subtotal="{{ $p->subtotal }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form method="post" action="{{ route('jenis.destroy', $p->id) }}" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn text-danger delete-data" data-nama="{{ $p->transaksi_id }}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
        </table>
    </div>
</div>
