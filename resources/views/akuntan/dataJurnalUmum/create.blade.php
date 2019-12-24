@extends('layouts.master')

        @section('content')

        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
              <div class="section-body">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                            <div style="width:100%;">
                                <td>
                                    <a href="/dataJurnalUmum" class="btn btn-warning"><i class="fa fa-arrow-left" style="margin-right: 5px;"></i>Kembali</a>
                                </td>
                                <hr />
                                <!-- <br> -->
                                <h4 style="margin-top:10px;">Tambah Jurnal Umum</h4>
                            </div>
                            <!-- <div style="width:100%;">
                                <h4>Tambah Jurnal Penyesuaian</h4>
                            </div> -->
                      </div>
                      <div class="card-body">
                        <form action="/dataJurnalPenyesuaian/cari" method="get" role="form" autocomplete="off">
                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label>Tanggal Pembuatan</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="tanggal" id="tanggal_pembuatan" autocomplete="off">
                                    </div>
                                    @if($errors->has('tanggal'))
                                        <div class="text-danger" style="padding: 5px;">
                                            {{ $errors->first('tanggal')}}
                                        </div>
                                    @endif
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <label>No Jurnal Umum</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="sampai-tanggal" name="no_jurnal_umum" autocomplete="off">
                                        </div>
                                        <small id="passwordHelpBlock" class="form-text text-muted">
                                            Contoh: JU-DEC19
                                        </small>
                                        @if($errors->has('no_jurnal_umum'))
                                            <div class="text-danger" style="padding: 5px;">
                                                {{ $errors->first('no_jurnal_umum')}}
                                            </div>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-5">
                                        <div class="form-group">
                                            <label>Nama Jurnal Umum</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="nm_jurnal_umum" autocomplete="off">
                                            </div>
                                            <small id="passwordHelpBlock" class="form-text text-muted">
                                                Contoh: Jurnal Umum Desember 2019
                                            </small>
                                            @if($errors->has('nm_jurnal_umum'))
                                                <div class="text-danger" style="padding: 5px;">
                                                    {{ $errors->first('nm_jurnal_umum')}}
                                                </div>
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-body">
                        <td>
                            <a href="javascript::void(0)" onclick="tambah_akun();" class="btn btn-success"><i class="fa fa-plus" style="margin-right: 5px;"></i>Tambah Akun</a>
                        </td>
                        <hr />
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama Akun</th>
                                        <th>No. Akun</th>
                                        <th>Nominal Debit</th>
                                        <th>Nominal Kredit</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="input-jurnal-umum">
                                    <tr id="baris-akun">
                                        <td>
                                            <div class="input-group">
                                                <!-- <input type="text" class="form-control" name="nm_akun" autocomplete="off"> -->
                                                <select class="form-control" name="nm_akun">
                                                    @foreach($DataAkun as $dpo)
                                                        <option value="{{$dpo->nm_akun}}">{{$dpo->nm_akun}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td width="125px;">
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="no_akun" autocomplete="off" readonly="readonly">
                                            </div>
                                        </td>
                                        <td width="200px;">
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="nominal_debit" autocomplete="off">
                                            </div>
                                        </td>
                                        <td width="200px;">
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="nominal_kredit" autocomplete="off">
                                            </div>
                                        </td>
                                        <td>
                                            <a href="javascript::void(0)" onclick="hapus_akun(this)" class="btn btn-danger hapus-akun">Hapus</a>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td style="text-align: right;font-weight: bold;">Total</td>
                                        <td width="200px;">
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="total_debit" autocomplete="off" readonly="readonly">
                                            </div>
                                        </td>
                                        <td width="200px;">
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="total_kredit" autocomplete="off" readonly="readonly">
                                            </div>
                                        </td>
                                        <td>
                                            <span style="color: green;">Balance</span><br>
                                            <span style="color: red;">Belum Balance</span>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <a href="javascript::void(0)" class="btn btn-success" style="width: 100%;">Simpan</a>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header">
                        <h4>Data Transaksi</h4>
                      </div>
                      <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#home2" role="tab" aria-controls="home" aria-selected="true">Pemasukan</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#profile2" role="tab" aria-controls="profile" aria-selected="false">Pengeluaran</a>
                          </li>
                        </ul>
                        <br>
                        <div class="tab-content" id="myTab3Content">
                          <div class="tab-pane fade show active" id="home2" role="tabpanel" aria-labelledby="home-tab2">
                            <div class="table-responsive">
                              <table class="table table-striped" id="data-pemasukan">
                                  <thead>
                                        <tr>
                                          <th>Tanggal Transaksi</th>
                                          <th>Deskripsi Transaksi</th>
                                          <th>Nominal</th>
                                          <th>Jenis Pembayaran</th>
                                          
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach($transaksiPemasukan as $index => $dok)
                                      <tr>
                                          <td style="color: #000000;">{{ Carbon\Carbon::parse($dok->tgl_transaksi)->formatLocalized('%d %B %Y') }}</td>
                                          <td><span style="color: #000000;">{{$dok->deskripsi}} </span></td>
                                          <td><span style="color: #000000;">Rp. {{ number_format($dok->nominal_transaksi, 0, ',', '.') }} </span></td>
                                          <td><span style="color: #000000;">{{$dok->jenis}} </span></td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                            </div>
                          </div>
                          <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile-tab2">
                            <div class="table-responsive">
                              <table class="table table-striped" id="data-pengeluaran">
                                  <thead>
                                        <tr>
                                          <th>Tanggal Transaksi</th>
                                          <th>Deskripsi Transaksi</th>
                                          <th>Nominal</th>
                                          <th>Jenis Pembayaran</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach($transaksiPengeluaran as $index => $dok)
                                      <tr>
                                          <td style="color: #000000;">{{ Carbon\Carbon::parse($dok->tgl_transaksi)->formatLocalized('%d %B %Y') }}</td>
                                          <td><span style="color: #000000;">{{$dok->deskripsi}} </span></td>
                                          <td><span style="color: #000000;">Rp. {{ number_format($dok->nominal_transaksi, 0, ',', '.') }} </span></td>
                                          <td><span style="color: #000000;">{{$dok->jenis}} </span></td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
        </div>
    </div>
</div>
<!-- /.modal -->
<!-- End Row -->
<script>

    var i = 1;
    function tambah_akun() {   
        i++; 
        document.getElementById("input-jurnal-umum").insertRow(0).innerHTML = '<tr id="baris-akun"><td><select class="form-control" name="nm_akun">@foreach($DataAkun as $dpo)<option value="{{$dpo->nm_akun}}">{{$dpo->nm_akun}}</option>@endforeach</select></td><td width="125px;"><input id="no_akun'+i+'" class="form-control" name="no_akun" type="number" autocomplete="off" readonly="readonly"></td><td width="200px;"><input id="nominal_debit'+i+'" class="form-control" name="nominal_debit" type="number" autocomplete="off"></td><td width="200px;"><input id="nominal_kredit'+i+'" class="form-control" name="nominal_kredit" type="number" autocomplete="off"></td><td><a href="javascript::void(0)" onclick="hapus_akun(this)" class="btn btn-danger hapus-akun">Hapus</a></td></tr>';
    }

    console.log(i);

    function hapus_akun(o) {
        //no clue what to put here?
        var p=o.parentNode.parentNode;
        p.parentNode.removeChild(p);
    }
</script>
@endsection