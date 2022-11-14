function colorCodeCreateNewModel(){
    var new_model = $('#color_code_create_new_model');
    var model_select = $('.color_code_create_model_select');
    model_select.prop('required',false);
    model_select.prop('disabled',true);
    model_select.select2('destroy');
    model_select.hide();
    new_model.prop('required',true);
    new_model.prop('disabled',false);
    new_model.show();
}
function colorCodeCreateShowModel(){
    var new_model       =   $('#color_code_create_new_model');
    var model_select    =   $('.color_code_create_model_select');
    new_model.val('');
    new_model.prop('required',false);
    new_model.prop('disabled',true);
    new_model.hide();
    model_select.select2({
        dropdownParent: $('#colorCodeCreateModal')
    });
    model_select.prop('required',true);
    model_select.prop('disabled',false);
    model_select.show();
}
$('#colorCodeCreateForm').on('submit',function(e){
    e.preventDefault();
    $.ajax({
        type:'POST',
        url: color_code_create_ajax_url,
        data: $('#colorCodeCreateForm').serialize(),
        success:function(response){
            if(response.id){
                $('#colorCodeCreateModal').modal('toggle');
                $('#color_codeErrorMessage').text('');
                $(".color_code_select").append($('<option>', {value:response.id, text: response.text}));
                var newVal = $('.color_code_select').val();
                newVal.push(response.id);
                $(".color_code_select").val(newVal);
                if(response.model){
                    $(".color_code_create_model_select").append($('<option>', {value:response.model.id, text: response.model.text}));
                    colorCodeCreateShowModel();
                }
                $('#color_code_create_detail').val('');
            }
            else{
                $('#color_codeErrorMessage').text(response.error);
            }
        }
    });
});
NgApp.controller('colorCodeController',function($http,$scope){
    $http.post(getVehicleElements_url).then(function(response){
        console.log(response.data);
        $scope.models   =   response.data.models;
    });
});
$(document).ready(function(){
    $('.color_code_create_model_select').select2({
        dropdownParent: $('#colorCodeCreateModal')
    });
    $('.color_code_select').select2({
        placeholder:"Araç Giriniz",
        language:"tr",
        ajax:{
            type: 'POST',
            url: get_useable_color_code_url,
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
