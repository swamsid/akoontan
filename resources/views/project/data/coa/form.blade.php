@extends('project.main')

@section('title', 'Chart of Account')

@section('content')

<div class="row tooltip-demo" id="vue">
    <div class="col-md-5">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Form Data Akun Keuangan</h5>
                <div class="ibox-tools">
                    <span v-if="stat == 'standby'" v-cloak>
                        <small class="show-on-big"><i class="fa fa-exclamation"></i> &nbsp; @{{ statMessage }}</small>            
                    </span>

                    <div class="loader" v-if="stat == 'loading'" v-cloak>
                        <div class="loading"></div> &nbsp; <small class="show-on-big">@{{ statMessage }}</small>
                    </div>
                </div>
            </div>
            <div class="ibox-content" v-cloak>
                <form id="data-form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" readonly>
                    <input type="hidden" name="ak_id" v-model="single.ak_id" readonly="true">

                    <div class="row">
                        <div class="col-md-12" style="background: none; border-right: 0px solid #eee;">
                            <div class="col-md-12" style="padding: 0px;">

                                <div class="row form-title">
                                    <div class="col-md-12 text-center">
                                        <i class="fa fa-pencil-square-o"></i> &nbsp; Informasi Tentang Akun
                                    </div>
                                </div>

                                <div class="row form-content">
                                    <div class="col-md-4 label-form">
                                        Kode Akun :
                                    </div>

                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">@{{ single.ak_numberaddon }}</span>

                                            <input type="text" class="form-control"  placeholder="Contoh : 001" name="ak_nomor" title="Tidak Boleh Kosong" v-model="single.ak_nomor" id="ak_nomor" :disabled="single.ak_akun_utama">

                                            <span class="input-group-addon">
                                                <template v-if="flag == 'insert'">
                                                        <i class="fa fa-exclamation-circle" data-toggle="tooltip" data-placement="top" title="Tekan 'F7' Untuk Mengedit Data"></i>
                                                </template>

                                                <template v-if="flag == 'update'">
                                                        <i class="fa fa-times" @click="reset"></i>
                                                </template>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-content">
                                    <div class="col-md-4 label-form">
                                        Klasifikasi Akun :
                                    </div>

                                    <div class="col-md-8">
                                        <vue-select :name="'ak_klasifikasi'" :id="'ak_klasifikasi'" :options="klasifikasi" :search="false" @option-change="klasifikasiChange" :disabled="single.ak_akun_utama" v-model="single.klasifikasi" :placeholders="'pilih klasifikasi COA ...'"></vue-select>
                                    </div>
                                </div>

                                <div class="row form-content">
                                    <div class="col-md-4 label-form">
                                        Kelompok Akun :
                                    </div>

                                    <div class="col-md-8">
                                        <vue-select :name="'ak_group'" :id="'ak_group'" :options="ak_group" :search="false" @option-change="groupChange" :disabled="single.ak_akun_utama" v-model="single.kelompok" :placeholders="'pilih kelompok COA ..'"></vue-select>
                                    </div>
                                </div>

                                <div class="row form-content">
                                    <div class="col-md-4 label-form">
                                        Nama Akun :
                                    </div>

                                    <div class="col-md-8">
                                        <input type="text" name="ak_nama" class="form-control" placeholder="contoh: Kas Kecil Perusahaan" v-model="single.ak_nama" :disabled="single.ak_akun_utama">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12" style="padding: 0px; margin-top: 10px;">

                                <div class="row form-title m-t">
                                    <div class="col-md-12 text-center">
                                        <i class="fa fa-pencil-square-o"></i> &nbsp; Informasi General Ledger
                                    </div>
                                </div>

                                <div class="row form-content">
                                    <div class="col-md-4 label-form">
                                        Posisi Debet/Kredit :
                                    </div>

                                    <div class="col-md-5">
                                        <vue-select :name="'ak_posisi'" :id="'ak_posisi'" :options="ak_position" :search="false" :disabled="single.ak_akun_utama" v-model="single.dk"></vue-select>
                                    </div>
                                </div>

                                <div class="row form-content">
                                    <div class="col-md-4 label-form">
                                        Saldo Pembukaan :
                                    </div>

                                    <div class="col-md-8">
                                        <vue-inputmask :name="'ak_saldo'" :id="'ak_saldo'" :style="'background: white;'" v-model="single.ak_saldo" :minus="false"></vue-inputmask>
                                    </div>
                                </div>

                                <div class="row form-content" style="margin-top: 10px;">
                                    <div class="col-md-12" style="background: none;  text-align: left; padding: 0px 0px 0px 10px;">
                                        <template v-if="flag == 'insert'">
                                            <table width="100%" style="margin-bottom: 5px; font-size: 8pt">
                                                <tbody>
                                                    <tr>
                                                        <td width="5%" style="text-align: center;">
                                                            <input type="checkbox" name="setara_kas" v-model="single.setara_kas">
                                                        </td>

                                                        <td width="40%" style="text-align: left;">
                                                            <span>
                                                                &nbsp;Termasuk Akun Setara Kas ?
                                                            </span>
                                                        </td>

                                                        <td width="5%" style="text-align: center;">
                                                            <input type="checkbox" name="utama" v-model="single.utama">
                                                        </td>

                                                        <td style="text-align: left;">
                                                            <span>
                                                                &nbsp;Termasuk Akun Utama ?
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </template>
                                        
                                        <template v-if="flag == 'insert'">
                                            <span style="font-size: 8pt; font-style: italic;" class="text-muted">
                                                Untuk Selanjutnya, informasi ini tidak bisa diganti. Pastikan anda memilih dengan benar.
                                            </span>
                                        </template>

                                        <template v-if="flag == 'update'">
                                            <span style="font-size: 8pt; font-style: italic;" v-if="single.ak_akun_utama">
                                                Akun ini termasuk Akun utama, sehingga Beberapa informasi terkait dari coa ini tidak bisa diubah.
                                            </span>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 form-button">
                            <div class="row">
                                <div class="col-md-5 col-xs-2 text-left" v-cloak>
                                    <button type="button" class="btn btn-info btn-sm" @click="search" :disabled="disabledButton">
                                        <i class="fa fa-pencil-square-o"></i> <span class="hide-on-small-screen">&nbsp; Edit Data (F7)</span>
                                    </button>
                                </div>

                                <div class="col-md-7 col-xs-10 text-right">
                                    <template v-if="flag == 'insert'">
                                        <button type="button" id="btn-tambah" class="btn btn-primary btn-sm" @click="tambah" :disabled="disabledButton">
                                            <i class="fa fa-floppy-o"></i> <span>&nbsp; Simpan (F9)</span>
                                        </button>
                                    </template>

                                    <template v-if="flag == 'update'">
                                        <button type="button" id="btn-edit" class="btn btn-primary btn-sm" @click="edit" :disabled="disabledButton">Simpan Perubahan (F9)</button>

                                        <button type="button" class="btn btn-danger btn-sm" @click="status" :disabled="disabledButton" v-if="single.ak_isactive == '1'">Nonaktifkan</button>

                                        <button type="button" class="btn btn-success btn-sm" @click="status" :disabled="disabledButton" v-if="single.ak_isactive != '1'">Aktifkan</button>
                                    </template>

                                    <!-- <button class="btn btn-primary btn-xs" @click="reset" :disabled="disabledButton">reset</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-7">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5> <i class="fa fa-arrow-right"></i> &nbsp;Data Akun Yang Sudah Disimpan <small>- Sesuai Dengan kelompok Akun Yang Dipilih</small></h5>
                
            </div>
            <div class="ibox-content" v-cloak>
                <!-- <vue-datatable-v2 :config="rightTableConfig"></vue-datatable-v2> -->
            </div>
        </div>
    </div>
</div>

@endsection

@section('extra_script')

    <script>
        var vue = new Vue({
            el: '#vue',
            data: {
                stat: 'standby',
                flag: 'insert',
                statMessage: 'Pastikan data terisi dengan benar',
                disabledButton: false,

                ak_position: [
                    {
                      id: 'D',
                      text: "Debet"
                    },
                    {
                      id: 'K',
                      text: "Kredit"
                    },
                ],

                klasifikasi: [],
                ak_group: [],

                single: {
                    
                }
            },

            mounted: function(){
                
            },

            methods: {
                search: function(e){
                    alert('search');
                },

                klasifikasiChange: function(e){
                    alert('klasifikasiChange');
                },

                groupChange: function(e){
                    alert('groupChange');
                },

                tambah: function(e){
                    alert('tambah');
                }
            }
        })
    </script>

@endsection