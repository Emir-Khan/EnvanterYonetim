function newTypeCreateNewModel(){
    var new_model = $('#new_type_create_new_model');
    var model_select = $('.new_type_create_model_select');
    model_select.prop('required',false);
    model_select.prop('disabled',true);
    model_select.select2('destroy');
    model_select.hide();
    new_model.prop('required',true);
    new_model.prop('disabled',false);
    new_model.show();
}
function newTypeCreateShowModel(){
    var new_model       =   $('#new_type_create_new_model');
    var model_select    =   $('.new_type_create_model_select');
    new_model.val('');
    new_model.prop('required',false);
    new_model.prop('disabled',true);
    new_model.hide();
    model_select.select2({
        dropdownParent: $('#newTypeCreateModal')
    });
    model_select.prop('required',true);
    model_select.prop('disabled',false);
    model_select.show();
}
$('#newTypeCreateForm').on('submit',function(e){
    e.preventDefault();
    $.ajax({
        type:'POST',
        url: new_type_create_ajax_url,
        data: $('#newTypeCreateForm').serialize(),
        success:function(response){
            if(response.id){
                $('#newTypeCreateModal').modal('toggle');
                $('#new_typeErrorMessage').text('');
                $(".new_type_select").append($('<option>', {value:response.id, text: response.text}));
                var newVal = $('.new_type_select').val();
                newVal.push(response.id);
                $(".new_type_select").val(newVal);
                if(response.model){
                    $(".new_type_create_model_select").append($('<option>', {value:response.model.id, text: response.model.text}));
                    newTypeCreateShowModel();
                }
                $('#new_type_create_detail').val('');
            }
            else{
                $('#new_typeErrorMessage').text(response.error);
            }
        }
    });
});
NgApp.controller('newTypeController',function($http,$scope){
    $http.post(getVehicleElements_url).then(function(response){
        console.log(response.data);
        $scope.models   =   response.data.models;
    });
});
$(document).ready(function(){
    $('.new_type_create_model_select').select2({
        dropdownParent: $('#newTypeCreateModal')
    });
    $('.new_type_select').select2({
        placeholder:"Tür Giriniz",
        language:"tr",
        ajax:{
            type: 'POST',
            url: get_useable_new_type_url,
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
