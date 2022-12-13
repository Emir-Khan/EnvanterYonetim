@extends('front.layouts.master')
@section('title',"Renk Kodu Yönetim")
@section('product_type_active',"active")
@section('content')
    @include('front.product_type.content.main')
@endsection
@section("script")
    <script>
        var product_type_table_ajax_url = "{{route('product_type_table_ajax')}}";
        function productTypeUpdate(id){
            $.ajax({
                type:'POST',
                url:`{{route('get_product_type')}}`,
                data:{id},
                dataType:'json',
                success:function(response){
                    console.log(response);
                    $('#product_type_update_detail').val(response.detail);
                    $("#update_name_input").val(response.name);
                    //$('.product_type_update_type_select').select2("val",type_id);
                    // $('.product_type_update_type_select').val(response.type_id).trigger('change');
                    $('#product_type_update_id').val(response.id);
                }
            });
        }
        function productTypeDelete(id){
            $.ajax({
                type:'POST',
                url:`{{route('get_product_type')}}`,
                data:{id},
                dataType:'json',
                success:function(response){
                    console.log(response);
                    $('#product_type_delete_detail').html(response.detail);
                    $('#product_type_delete_type').text(response.name);
                    $('#product_type_delete_id').val(response.id);
                }
            });
        }
        function productTypeCreateShowType(){
            var new_type    =   $('#product_type_create_new_type');
            var type_select =   $('.product_type_create_type_select');
            new_type.val('');
            new_type.prop('required',false);
            new_type.prop('disabled',true);
            new_type.hide();
            type_select.select2({
                dropdownParent: $('#productTypeCreateModal')
            });
            type_select.prop('required',true);
            type_select.prop('disabled',false);
            type_select.show();
        }
        function productTypeCreateNewType(){
            var new_type    =   $('#product_type_create_new_type');
            var type_select =   $('.product_type_create_type_select');
            type_select.select2('destroy');
            type_select.prop('required',false);
            type_select.prop('disabled',true);
            type_select.hide();
            new_type.prop('required',true);
            new_type.prop('disabled',false);
            new_type.show();
        }
        function productTypeUpdateShowType(){
            var new_type    =   $('#product_type_update_new_type');
            var type_select =   $('.product_type_update_type_select');
            new_type.val('');
            new_type.prop('required',false);
            new_type.prop('disabled',true);
            new_type.hide();
            type_select.select2({
                dropdownParent: $('#productTypeUpdateModal')
            });
            type_select.prop('required',true);
            type_select.prop('disabled',false);
            type_select.show();
        }
        function productTypeUpdateNewType(){
            var new_type    =   $('#product_type_update_new_type');
            var type_select =   $('.product_type_update_type_select');
            type_select.select2('destroy');
            type_select.prop('required',false);
            type_select.prop('disabled',true);
            type_select.hide();
            new_type.prop('required',true);
            new_type.prop('disabled',false);
            new_type.show();
        }
        $(document).ready(function(){
            $('.product_type_create_type_select').select2({
                dropdownParent: $('#productTypeCreateModal')
            });
            $('.product_type_update_type_select').select2({
                dropdownParent: $('#productTypeUpdateModal')
            });
        });
    </script>
    <script src="{{ asset('js/product_type/main_table.js') }}"></script>
@endsection
