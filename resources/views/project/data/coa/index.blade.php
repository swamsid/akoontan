@extends('project.main')

@section('title', 'Chart of Account')

@section('content')

<div class="row tooltip-demo" id="vue">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Data COA keuangan yang sudah tersimpan</h5>
                <div class="ibox-tools">
                    <a class="btn btn-dark btn-sm" href="{{ Route('data.coa.create') }}" style="color: white;">
                        <i class="fa fa-plus"></i> &nbsp;Tambah Data COA
                    </a>
                </div>
            </div>
            <div class="ibox-content" v-cloak>
                <vue-datatable :config="datatable_config"></vue-datatable>
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
                datatable_config: {
                    feeder: {
                        column: [
                            {text: 'Nomor Coa ', conteks: 'nomor_akun', childStyle: 'text-align: center', style: 'width: 15%'},
                            {text: 'Nama Coa', conteks: 'ak_nama', childStyle: 'text-align: center', style: 'width: 21%', 
                                overide: function(e){
                                    return '<span style="font-weight: bold">'+e+'</span>';
                                }
                            },
                            {text: 'Kelompok', conteks: 'hd_nama', childStyle: 'text-align: center', style: 'width: 18%'},
                            {text: 'Tanggal Dibuat', conteks: 'tanggal_buat', childStyle: 'text-align: center', style: 'width: 18%', 
                                overide: function(e){
                                    return humanizeDate(e);
                                }
                            },
                            {text: 'Saldo Opening', conteks: 'ak_opening', childStyle: 'text-align: center', style: 'width: 18%', 
                                overide: function(e){
                                    return humanizePrice(e);
                                }
                            },
                        ],

                        data: []
                    },

                    addition: {
                        columnButton: {
                            show: true,
                            width: "10%",
                            content: [
                                {
                                    html: '<button class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Tampilkan Detail"><i class="fa fa-folder-open fa-fw"></i></button>',
                                    onClick: function(dataClicked){
                                        // console.log(dataClicked);
                                        // vue.showRekap(null, dataClicked.ro_token);
                                    }
                                },

                                {
                                    html: '&nbsp;<button class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Print Dokumen"><i class="fa fa-print fa-fw"></i></button>',
                                    onClick: function(dataClicked){
                                        // console.log(dataClicked);
                                        // vue.printNota(null, dataClicked.ro_token);
                                    }
                                },
                            ]
                        },
                    },

                    config: {
                        dataPerPage: 10,
                    }
                }
            },

            mounted: function(){
                axios.get('{{ Route('api.data.coa.resource') }}')
                        .then((response) => {
                            console.log(response.data);

                            this.datatable_config.feeder.data = response.data.data;

                        }).catch((err) => {
                            alert('error '+err)
                        })
            },
        })
    </script>

@endsection