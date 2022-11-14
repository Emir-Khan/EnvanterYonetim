@extends('front.layouts.master')
@section('title',"Renk Kodu Yönetim")
@section('new_type_active',"active")
@section('content')
    @include('front.new_type.content.main')
@endsection
@section("script")
    <script>
        var new_type_table_ajax_url = "{{route('new_type_table_ajax')}}";
        function newTypeUpdate(id){
            $.ajax({
                type:'POST',
                url:`{{route('get_new_type')}}`,
                data:{id},
                dataType:'json',
                success:function(response){
                    console.log(response);
                    $('#new_type_update_detail').val(response.detail);
                    $("#update_name_input").val(response.name);
                    //$('.new_type_update_type_select').select2("val",type_id);
                    // $('.new_type_update_type_select').val(response.type_id).trigger('change');
                    $('#new_type_update_id').val(response.id);
                }
            });
        }
        function newTypeDelete(id){
            $.ajax({
                type:'POST',
                url:`{{route('get_new_type')}}`,
                data:{id},
                dataType:'json',
                success:function(response){
                    console.log(response);
                    $('#new_type_delete_detail').html(response.detail);
                    $('#new_type_delete_type').text(response.name);
                    $('#new_type_delete_id').val(response.id);
                }
            });
        }
        function newTypeCreateShowType(){
            var new_type    =   $('#new_type_create_new_type');
            var type_select =   $('.new_type_create_type_select');
            new_type.val('');
            new_type.prop('required',false);
            new_type.prop('disabled',true);
            new_type.hide();
            type_select.select2({
                dropdownParent: $('#newTypeCreateModal')
            });
            type_select.prop('required',true);
            type_select.prop('disabled',false);
            type_select.show();
        }
        function newTypeCreateNewType(){
            var new_type    =   $('#new_type_create_new_type');
            var type_select =   $('.new_type_create_type_select');
            type_select.select2('destroy');
            type_select.prop('required',false);
            type_select.prop('disabled',true);
            type_select.hide();
            new_type.prop('required',true);
            new_type.prop('disabled',false);
            new_type.show();
        }
        function newTypeUpdateShowType(){
            var new_type    =   $('#new_type_update_new_type');
            var type_select =   $('.new_type_update_type_select');
            new_type.val('');
            new_type.prop('required',false);
            new_type.prop('disabled',true);
            new_type.hide();
            type_select.select2({
                dropdownParent: $('#newTypeUpdateModal')
            });
            type_select.prop('required',true);
            type_select.prop('disabled',false);
            type_select.show();
        }
        function newTypeUpdateNewType(){
            var new_type    =   $('#new_type_update_new_type');
            var type_select =   $('.new_type_update_type_select');
            type_select.select2('destroy');
            type_select.prop('required',false);
            type_select.prop('disabled',true);
            type_select.hide();
            new_type.prop('required',true);
            new_type.prop('disabled',false);
            new_type.show();
        }
        $(document).ready(function(){
            $('.new_type_create_type_select').select2({
                dropdownParent: $('#newTypeCreateModal')
            });
            $('.new_type_update_type_select').select2({
                dropdownParent: $('#newTypeUpdateModal')
            });
        });
    </script>
    <script src="{{ asset('js/new_type/main_table.js') }}"></script>
@endsection
