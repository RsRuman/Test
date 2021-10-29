#<meta name="csrf-token" content="{{ csrf_token() }}">

$.ajaxSetup({
headers: {
    'X-XSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}})
