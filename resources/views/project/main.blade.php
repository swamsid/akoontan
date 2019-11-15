
<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>akoontan | @yield('title')</title>
        <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
            @yield('extra_style')

    </head>

    <body>
        <div id="wrapper">
            @include('project.partials._sidebar')

            <div id="page-wrapper" class="gray-bg">
                @include('project.partials._navbar')

                <div class="wrapper wrapper-content">
                    @yield('content')
                </div>

                @include('project.partials._footer')

            </div>

            @include('project.partials._rightsidebar')

        </div>

        <script src="{{ asset('public/js/app.js') }}"></script>
        
        <script>
            function humanizeDate(e){
                return e.split('-')[2]+'/'+e.split('-')[1]+'/'+e.split('-')[0];
            }

            function humanizeTime(e) {
                return e.split(':')[0]+':'+e.split(':')[1];
            }

            function humanizePrice(alpha){
                var val = alpha.toString().replace(/[^0-9.]/g,'');

                var parts = val.split('.');
                var result = parts.slice(0,-1).join('') + '.' + parts.slice(-1);
                result = result.replace(/^\./, '');
                result = result.replace(/\.$/, '');

                var bilangan = result.toString();
                var commas = '00';

                if(bilangan.split('.').length > 1){
                    commas = bilangan.split('.')[1];
                    bilangan = bilangan.split('.')[0];
                }

                var number_string = bilangan.toString(),
                sisa  = number_string.length % 3;
                rupiah  = number_string.substr(0, sisa);
                rupiah = isNaN(rupiah) ? '' : rupiah;
                ribuan  = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? ',' : '';
                    rupiah += separator + ribuan.join(',');
                }

                if(alpha.toString().charAt(0) == '-'){
                    return '(' + rupiah + '.' + commas + ')';
                }

                // Cetak hasil
                return rupiah + '.' + commas // Hasil: 23.456.789
            }
        </script>
            @yield('extra_script')
    </body>
</html>
