@extends('front.layouts.master')
@section('title',"Renk Kodu Yönetim")
@section('color_code_active',"active")
@section('content')
    @include('front.color_code.content.main')
@endsection
@section("script")
    <script>
        var color_code_table_ajax_url = "{{route('color_code_table_ajax')}}";
        function colorCodeUpdate(id){
            $.ajax({
                type:'POST',
                url:`{{route('get_color_code')}}`,
                data:{id},
                dataType:'json',
                success:function(response){
                    console.log(response);
                    $('#color_code_update_detail').val(response.detail);
                    $("#update_name_input").val(response.name);
                    //$('.color_code_update_type_select').select2("val",type_id);
                    // $('.color_code_update_type_select').val(response.type_id).trigger('change');
                    $('#color_code_update_id').val(response.id);
                }
            });
        }
        function colorCodeDelete(id){
            $.ajax({
                type:'POST',
                url:`{{route('getMaterial')}}`,
                data:{id},
                dataType:'json',
                success:function(response){
                    $('#color_code_delete_detail').html(response.detail);
                    $('#color_code_delete_type').text(response.get_type.name);
                    $('#color_code_delete_id').val(response.id);
                }
            });
        }
        function colorCodeCreateShowType(){
            var new_type    =   $('#color_code_create_new_type');
            var type_select =   $('.color_code_create_type_select');
            new_type.val('');
            new_type.prop('required',false);
            new_type.prop('disabled',true);
            new_type.hide();
            type_select.select2({
                dropdownParent: $('#colorCodeCreateModal')
            });
            type_select.prop('required',true);
            type_select.prop('disabled',false);
            type_select.show();
        }
        function colorCodeCreateNewType(){
            var new_type    =   $('#color_code_create_new_type');
            var type_select =   $('.color_code_create_type_select');
            type_select.select2('destroy');
            type_select.prop('required',false);
            type_select.prop('disabled',true);
            type_select.hide();
            new_type.prop('required',true);
            new_type.prop('disabled',false);
            new_type.show();
        }
        function colorCodeUpdateShowType(){
            var new_type    =   $('#color_code_update_new_type');
            var type_select =   $('.color_code_update_type_select');
            new_type.val('');
            new_type.prop('required',false);
            new_type.prop('disabled',true);
            new_type.hide();
            type_select.select2({
                dropdownParent: $('#colorCodeUpdateModal')
            });
            type_select.prop('required',true);
            type_select.prop('disabled',false);
            type_select.show();
        }
        function colorCodeUpdateNewType(){
            var new_type    =   $('#color_code_update_new_type');
            var type_select =   $('.color_code_update_type_select');
            type_select.select2('destroy');
            type_select.prop('required',false);
            type_select.prop('disabled',true);
            type_select.hide();
            new_type.prop('required',true);
            new_type.prop('disabled',false);
            new_type.show();
        }
        $(document).ready(function(){
            $('.color_code_create_type_select').select2({
                dropdownParent: $('#colorCodeCreateModal')
            });
            $('.color_code_update_type_select').select2({
                dropdownParent: $('#colorCodeUpdateModal')
            });
        });
    </script>
    <script src="{{ asset('js/color_code/main_table.js') }}"></script>
@endsection
