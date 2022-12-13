@extends('front.layouts.master')
@section('title',"Renk Kodu Yönetim")
@section('status_active',"active")
@section('content')
    @include('front.status.content.main')
@endsection
@section("script")
    <script>
        var status_table_ajax_url = "{{route('status_table_ajax')}}";
        function statusUpdate(id){
            $.ajax({
                type:'POST',
                url:`{{route('get_status')}}`,
                data:{id},
                dataType:'json',
                success:function(response){
                    console.log(response);
                    $('#status_update_detail').val(response.detail);
                    $("#update_name_input").val(response.name);
                    //$('.status_update_type_select').select2("val",type_id);
                    // $('.status_update_type_select').val(response.type_id).trigger('change');
                    $('#status_update_id').val(response.id);
                }
            });
        }
        function statusDelete(id){
            $.ajax({
                type:'POST',
                url:`{{route('get_status')}}`,
                data:{id},
                dataType:'json',
                success:function(response){
                    console.log(response);
                    $('#status_delete_detail').html(response.detail);
                    $('#status_delete_type').text(response.name);
                    $('#status_delete_id').val(response.id);
                }
            });
        }
        function statusCreateShowType(){
            var new_type    =   $('#status_create_new_type');
            var type_select =   $('.status_create_type_select');
            new_type.val('');
            new_type.prop('required',false);
            new_type.prop('disabled',true);
            new_type.hide();
            type_select.select2({
                dropdownParent: $('#statusCreateModal')
            });
            type_select.prop('required',true);
            type_select.prop('disabled',false);
            type_select.show();
        }
        function statusCreateNewType(){
            var new_type    =   $('#status_create_new_type');
            var type_select =   $('.status_create_type_select');
            type_select.select2('destroy');
            type_select.prop('required',false);
            type_select.prop('disabled',true);
            type_select.hide();
            new_type.prop('required',true);
            new_type.prop('disabled',false);
            new_type.show();
        }
        function statusUpdateShowType(){
            var new_type    =   $('#status_update_new_type');
            var type_select =   $('.status_update_type_select');
            new_type.val('');
            new_type.prop('required',false);
            new_type.prop('disabled',true);
            new_type.hide();
            type_select.select2({
                dropdownParent: $('#statusUpdateModal')
            });
            type_select.prop('required',true);
            type_select.prop('disabled',false);
            type_select.show();
        }
        function statusUpdateNewType(){
            var new_type    =   $('#status_update_new_type');
            var type_select =   $('.status_update_type_select');
            type_select.select2('destroy');
            type_select.prop('required',false);
            type_select.prop('disabled',true);
            type_select.hide();
            new_type.prop('required',true);
            new_type.prop('disabled',false);
            new_type.show();
        }
        $(document).ready(function(){
            $('.status_create_type_select').select2({
                dropdownParent: $('#statusCreateModal')
            });
            $('.status_update_type_select').select2({
                dropdownParent: $('#statusUpdateModal')
            });
        });
    </script>
    <script src="{{ asset('js/status/main_table.js') }}"></script>
@endsection
