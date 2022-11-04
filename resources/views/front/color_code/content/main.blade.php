<div class="card mt-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('homepage')}}"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Renk Kodu</li>
        </ol>
    </nav>
    <div class="col-12 mx-auto mt-3">
        <table id="materialTable" class="table table-sm table-striped table-bordered dt-responsive nowrap" style="width: 100%;"></table>
        <div class="row my-3">
            <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 mb-2">
                <button type="button" data-toggle="modal" data-target="#colorCodeCreateModal" class="btn btn-sm btn-success btn-block">Yeni Renk Kodu</button>
            </div>
            <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 ml-auto">
                
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="colorCodeCreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Yeni Renk Kodu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('color_code_create') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button onclick="materialCreateShowType()" class="btn btn-outline-secondary" type="button">Tür</button>
                        </div>
                        <input class="form-control" id="create_color_code_name" name="name" required>
                            {{-- @foreach ($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach --}}                        
                        <div class="input-group-append">
                            <button onclick="materialCreateNewType()" class="btn btn-outline-secondary" type="button">Yeni</button>
                        </div>
                    </div>
                    <label for="detail">Detay</label>
                    <div class="input-group mb-3">
                        <textarea id="color_code_create_detail" rows="5" maxlength="255" class="form-control" aria-label="With textarea" name="detail" style="resize: none;"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit">Ekle</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Geri Dön</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="colorCodeUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Renk Kodu Güncelleme</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('color_code_update') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button onclick="colorCodeShowType()" class="btn btn-outline-secondary" type="button">Tür</button>
                        </div>
                        <input class="form-control" id="update_name_input" name="name" type="text" required>
                            {{-- @foreach ($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach --}}                                                
                        <div class="input-group-append">
                            <button onclick="colorCodeNewType()" class="btn btn-outline-secondary" type="button">Yeni</button>
                        </div>
                    </div>
                    <label for="detail">Detay</label>
                    <div class="input-group mb-3">
                        <textarea id="color_code_update_detail" rows="5" maxlength="255" class="form-control" aria-label="With textarea" name="detail" style="resize: none;"></textarea>
                    </div>
                    <input type="hidden" id="color_code_update_id" name="id">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit">Güncelle</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Geri Dön</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="materialDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Renk Kodu Silme İşlemi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('color_code_delete') }}" method="POST">
                @csrf
                <div class="modal-body px-5">
                    <div>
                        <b><u>Türü:</u></b> <span id="color_code_delete_type"></span></br>
                        <b><u>Detay:</u></b> <span id="color_code_delete_detail"></span></br>
                    </div>
                    <div class="mt-3 my-2 text-center">
                        <u>Renk Kodunu Silmek Üzeresiniz!</u></br>
                        <b>Silme İşlemi Geri Döndürülemez!</b>
                    </div>
                    <input type="hidden" name="id" id="color_code_delete_id">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="submit">Sil</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Geri Dön</button>
                </div>
            </form>
        </div>
    </div>
</div>
@if (Cookie::get('success'))
    <div class="alert alert-dismissible fade show alert-success text-center" role="alert">
        <b class="mx-auto">{{Cookie::get('success')}}</b>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding: 5px 7px;">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (Cookie::get('error'))
    <div class="alert alert-dismissible fade show alert-error text-center" role="alert">
        <b class="mx-auto">{{Cookie::get('error')}}</b>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding: 5px 7px;">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
