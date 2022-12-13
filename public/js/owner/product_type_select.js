function productTypeCreateNewModel(){
    var new_model = $('#product_type_create_new_model');
    var model_select = $('.product_type_create_model_select');
    model_select.prop('required',false);
    model_select.prop('disabled',true);
    model_select.select2('destroy');
    model_select.hide();
    new_model.prop('required',true);
    new_model.prop('disabled',false);
    new_model.show();
}
function productTypeCreateShowModel(){
    var new_model       =   $('#product_type_create_new_model');
    var model_select    =   $('.product_type_create_model_select');
    new_model.val('');
    new_model.prop('required',false);
    new_model.prop('disabled',true);
    new_model.hide();
    model_select.select2({
        dropdownParent: $('#productTypeCreateModal')
    });
    model_select.prop('required',true);
    model_select.prop('disabled',false);
    model_select.show();
}
$('#productTypeCreateForm').on('submit',function(e){
    e.preventDefault();
    $.ajax({
        type:'POST',
        url: product_type_create_ajax_url,
        data: $('#productTypeCreateForm').serialize(),
        success:function(response){
            if(response.id){
                $('#productTypeCreateModal').modal('toggle');
                $('#product_typeErrorMessage').text('');
                $(".product_type_select").append($('<option>', {value:response.id, text: response.text}));
                var newVal = $('.product_type_select').val();
                newVal.push(response.id);
                $(".product_type_select").val(newVal);
                if(response.model){
                    $(".product_type_create_model_select").append($('<option>', {value:response.model.id, text: response.model.text}));
                    productTypeCreateShowModel();
                }
                $('#product_type_create_detail').val('');
            }
            else{
                $('#product_typeErrorMessage').text(response.error);
            }
        }
    });
});
NgApp.controller('productTypeController',function($http,$scope){
    $http.post(getVehicleElements_url).then(function(response){
        console.log(response.data);
        $scope.models   =   response.data.models;
    });
});
$(document).ready(function(){
    $('.product_type_create_model_select').select2({
        dropdownParent: $('#productTypeCreateModal')
    });
    $('.product_type_select').select2({
        placeholder:"Renk Kodu Giriniz",
        language:"tr",
        ajax:{
            type: 'POST',
            url: get_useable_product_type_url,
            dataType: 'json',
            delay:250,
            data:function(params){
                console.log(params);
                return{
                    search:params.term,
                };
            },
            processResults:function(data){
                console.log(data);
                return{
                    results:data
                };
            },
            cache:true
        },
        theme: 'classic',
        escapeMarkup: function(markup) {
            console.log(markup);
            return markup;
        },
        templateResult: function(data) {
            console.log(data.html);
            return data.html;
        },
        templateSelection: function(data) {
            console.log(data.text);
            return data.text;
        }
    })
})
