@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="form-group">
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah
                </button>
            </div>

            <div class="card">
                <div class="card-header">{{ __('Instansi') }}</div>

                <div class="card-body">
                    <form action="{{ route('home') }}" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Filter</label>
                                    <input type="text" name="filter" class="form-control" id="filter"
                                        placeholder="Tuliskan " value="{{ $request->filter ?? '' }}" autocomplete="off">
                                    @error('filter')
                                        <div class="small text-danger">{{ message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col">
                                <label for="">
                                    &nbsp;
                                </label>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Search</button>
                                </div>

                            </div>
                        </div>
                    </form>

                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Aksi</th>
                                <th>Intansi</th>
                                <th>Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $i => $d)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>
                                        <button type="submit" class="btn btn-primary btn-sm edit"
                                            data-id="{{ $d->id }}">Edit</button>
                                        {{-- <a href="" class="btn btn-primary btn-sm">Edit</a> --}}
                                        <a href="{{ route('delete', $d->id) }}" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                    <td>{{ $d->instansi }}</td>
                                    <td>{{ $d->deskripsi }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Instansi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Instansi</label>
                                    <input type="text" name="instansi" class="form-control" id="instansi"
                                        placeholder="Tuliskan " value="" autocomplete="off">
                                    @error('instansi')
                                        <div class="small text-danger">{{ message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" id="deskripsi" cols="30" rows="5"></textarea>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="editmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editmodalLabel">Edit Instansi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="idedit" value="">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Instansi</label>
                                    <input type="text" name="instansi" class="form-control" id="instansi"
                                        placeholder="Tuliskan " value="" autocomplete="off">
                                    @error('instansi')
                                        <div class="small text-danger">{{ message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" id="deskripsi" cols="30" rows="5"></textarea>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.edit').click(function() {
            var id = $(this).data('id');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "{{ route('edit') }}",
                data: {
                    id: id
                },
                success: function(data) {
                    $('[name="idedit"]').val(data.id);
                    $('[name="instansi"]').val(data.instansi);
                    $('[name="deskripsi"]').val(data.deskripsi);
                    $('#editmodal').modal('show');
                }
            })
        })
    </script>
@endsection
