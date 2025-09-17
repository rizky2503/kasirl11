<div>
    <div class="container">
        <div class="row my-2">
            <div class="col-12">
                <button wire:click="pilihMenu('lihat')"
                    class="btn {{ $pilihanMenu=='lihat' ? 'btn-primary' : 'btn-outline-primary' }}">
                    Semua produk
                </button>
                <button wire:click="pilihMenu('tambah')"
                    class="btn {{ $pilihanMenu=='tambah' ? 'btn-primary' : 'btn-outline-primary' }}">
                    Tambah produk
                </button>
                <button wire:click="pilihMenu('excel')"
                    class="btn {{ $pilihanMenu=='excel' ? 'btn-primary' : 'btn-outline-primary' }}">
                    Impor produk
                </button>
                <button wire:loading class="btn btn-info">
                    Loading ...
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-12">

                {{-- ===== LIHAT PRODUK ===== --}}
                @if($pilihanMenu=='lihat')
                <div class="card border-primary">
                    <div class="card-header">Semua produk</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach($semuaProduk as $produk)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $produk->kode }}</td>
                                    <td>{{ $produk->nama }}</td>
                                    <td>{{ $produk->harga }}</td>
                                    <td>{{ $produk->stok }}</td>
                                    <td>
                                        <button wire:click="pilihEdit({{ $produk->id }})"
                                            class="btn btn-sm btn-outline-primary">
                                            Edit
                                        </button>
                                        <button wire:click="pilihHapus({{ $produk->id }})"
                                            class="btn btn-sm btn-outline-danger">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- ===== TAMBAH PRODUK ===== --}}
                @elseif($pilihanMenu=='tambah')
                <div class="card border-primary">
                    <div class="card-header">Tambah produk</div>
                    <div class="card-body">
                        <form wire:submit.prevent='simpan'>
                            <label>Nama</label>
                            <input type="text" class="form-control" wire:model='nama' />
                            @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                            <br />

                            <label>Kode / Barcode</label>
                            <input type="text" class="form-control" wire:model='kode' />
                            @error('kode') <span class="text-danger">{{ $message }}</span> @enderror
                            <br />

                            <label>Harga</label>
                            <input type="number" class="form-control" wire:model='harga' />
                            @error('harga') <span class="text-danger">{{ $message }}</span> @enderror
                            <br />

                            <label>Stok</label>
                            <input type="number" class="form-control" wire:model='stok' />
                            @error('stok') <span class="text-danger">{{ $message }}</span> @enderror
                            <br />

                            <button type="submit" class="btn btn-primary mt-3">SIMPAN</button>
                            <button type="button" wire:click='batal' class="btn btn-secondary mt-3">BATAL</button>
                        </form>
                    </div>
                </div>

                {{-- ===== EDIT PRODUK ===== --}}
                @elseif($pilihanMenu=='edit')
                <div class="card border-primary">
                    <div class="card-header">Edit produk</div>
                    <div class="card-body">
                        <form wire:submit.prevent='simpanEdit'>
                            <label>Nama</label>
                            <input type="text" class="form-control" wire:model='nama' />
                            @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                            <br />

                            <label>Kode / Barcode</label>
                            <input type="text" class="form-control" wire:model='kode' />
                            @error('kode') <span class="text-danger">{{ $message }}</span> @enderror
                            <br />

                            <label>Harga</label>
                            <input type="number" class="form-control" wire:model='harga' />
                            @error('harga') <span class="text-danger">{{ $message }}</span> @enderror
                            <br />

                            <label>Stok</label>
                            <input type="number" class="form-control" wire:model='stok' />
                            @error('stok') <span class="text-danger">{{ $message }}</span> @enderror
                            <br />

                            <button type="submit" class="btn btn-primary mt-3">SIMPAN</button>
                            <button type="button" wire:click='batal' class="btn btn-secondary mt-3">BATAL</button>
                        </form>
                    </div>
                </div>

                {{-- ===== HAPUS PRODUK ===== --}}
                @elseif($pilihanMenu=='hapus')
                <div class="card border-primary">
                    <div class="card-header">Hapus produk</div>
                    <div class="card-body">
                        Anda yakin akan menghapus produk ini?
                        <p>Nama : {{ $produkTerpilih->nama ?? '' }}</p>
                        <button class="btn btn-danger" wire:click='hapus'>HAPUS</button>
                        <button class="btn btn-secondary" wire:click='batal'>BATAL</button>
                    </div>
                </div>

                {{-- ===== IMPOR PRODUK ===== --}}
                @elseif($pilihanMenu=='excel')
                <div class="card border-primary">
                    <div class="card-header bg-primary text-white">Impor produk</div>
                    <div class="card-body">
                        {{-- <form wire:submit.prevent="imporExcel" enctype="multipart/form-data">
                            <input type="file" wire:model="fileExcel">
                            <button type="submit">Kirim</button>
                        </form> --}}

                        <form wire:submit.prevent="imporExcel">
                            <input type="file" class="form-control" wire:model="fileExcel">
                            @error('fileExcel') <span class="text-danger">{{ $message }}</span> @enderror
                            <br>
                            <button type="submit" class="btn btn-primary">KIRIM</button>
                            <button type="button" wire:click="batal" class="btn btn-secondary">BATAL</button>
                        </form>
                        
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
