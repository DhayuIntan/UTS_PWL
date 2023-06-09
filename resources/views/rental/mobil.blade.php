@extends('layouts.template')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Mobil</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Mobil</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">RENTAL MOBIL MALANG</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <form action="/mobil" method="GET" class="d-flex" role="search">
                <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <div class="card-body">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
            <a href="{{url('mobil/create')}}" class="btn btn-sm btn-success my-2">Tambah Data</a>
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Plat Nomor</th>
                        <th>Merk</th>
                        <th>Tipe Mobil</th>
                        <th>Status</th>
                        <th>action</th>

                    </tr>
                    @foreach ($mobil as $id => $mb)
                    <tr>
                        <td>{{$id + $mobil->firstItem()}}</td>
                        <td>{{$mb->plat_nomor}}</td>
                        <td>{{$mb->merk}}</td>
                        <td>{{$mb->tipe_mobil}}</td>
                        <td>{{$mb->status}}</td>
                        <td>
                        <!-- Bikin tombol edit dan delete -->
                        <a href="{{ url('/mobil/'. $mb->id.'/edit') }}" class="btn btn-sm btn-warning">edit</a>

                        <form method="POST" action="{{ url('/mobil/'.$mb->id) }}" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                {{-- onclick="confirmDelete()" >hapus</button> --}}
                                onclick="return confirm('Apakah Anda yakin? Data {{$mb->merk}} akan dihapus. Apakah Anda ingin melanjutkan?')">Hapus</button>
                        </form>
                        </td>
                     </tr>


                    @endforeach
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
        {{ $mobil->links() }}
    </section>
    <!-- /.content -->
</div>
@endsection

@push('custom_js')
    {{-- <script>
  alert('Halaman Home')
</script> --}}

    <script>
        function confirmDelete() {
            if (confirm('Apakah Anda yakin? Data akan dihapus. Apakah Anda ingin melanjutkan?')) {
                document.getElementById('form').submit();
            } else {
                event.preventDefault()
            }
        }
    </script>
@endpush


