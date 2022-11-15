<div id='userName' data-name='{{$user->name}}' class="card mt-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('homepage')}}"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{route('user')}}">Kullanıcı</a></li>
            <li class="breadcrumb-item active" aria-current="page"><b>{{$user->name}}</b>&nbsp;Zimmet Yönetim</li>
        </ol>
    </nav>
    <div class="col-12">
        <div class="card my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-danger">
                    <li class="breadcrumb-item">
                        <a class="text-white" data-toggle="collapse" href="#hardwareCollapse" onclick="createHardwareTable()" role="button" aria-expanded="false" aria-controls="hardwareCollapse"><i class="fas fa-hdd"></i> Donanımlar</a>
                    </li>
                </ol>
            </nav>
            <div class="col-12 pb-3">
                <div id='hardwareCollapse' class="collapse card" style="border: none">
                    <table id="hardwareTable" class="table table-sm table-striped table-bordered table-hover dt-responsive nowrap" style="width: 100%"></table>
                </div>
            </div>
        </div>
        <div class="card my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-info">
                    <li class="breadcrumb-item">
                        <a class="text-white" data-toggle="collapse" href="#softwareCollapse" onclick="createSoftwareTable()" role="button" aria-expanded="false" aria-controls="softwareCollapse"><i class="fas fa-compact-disc"></i> Yazılımlar</a>
                    </li>
                </ol>
            </nav>
            <div class="col-12 pb-3">
                <div id='softwareCollapse' class="collapse card" style="border: none">
                    <table id="softwareTable" class="table table-sm table-striped table-bordered table-hover dt-responsive nowrap" style="width: 100%"></table>
                </div>
            </div>
        </div>
        <div class="card my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-purple">
                    <li class="breadcrumb-item">
                        <a class="text-white" data-toggle="collapse" href="#commonCollapse" onclick="createCommonTable()" role="button" aria-expanded="false" aria-controls="commonCollapse"><i class="fas fa-handshake"></i> Ortak Kullanılan Ekipmanlar</a>
                    </li>
                </ol>
            </nav>
            <div class="col-12 pb-3">
                <div id='commonCollapse' class="collapse card" style="border: none">
                    <table id="commonTable" class="table table-sm table-striped table-bordered table-hover dt-responsive nowrap" style="width: 100%"></table>
                </div>
            </div>
        </div>
        <div class="card my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-dark">
                    <li class="breadcrumb-item">
                        <a class="text-white" data-toggle="collapse" href="#materialCollapse" onclick="createMaterialTable()" role="button" aria-expanded="false" aria-controls="materialCollapse"><i class="fas fa-tools"></i> Malzemeler (Son 1 Aylık)</a>
                    </li>
                </ol>
            </nav>
            <div class="col-12 pb-3">
                <div id='materialCollapse' class="collapse card" style="border: none">
                    <table id="materialTable" class="table table-sm table-striped table-bordered table-hover dt-responsive nowrap" style="width: 100%"></table>
                    <div class="row" id="materialWidget"></div>
                </div>
            </div>
        </div>
        <div class="card my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-warning">
                    <li class="breadcrumb-item">
                        <a class="text-white" data-toggle="collapse" href="#vehicleCollapse" onclick="createVehicleTable()" role="button" aria-expanded="false" aria-controls="vehicleCollapse"><i class="fas fa-truck"></i> Araçlar</a>
                    </li>
                </ol>
            </nav>
            <div class="col-12 pb-3">
                <div id='vehicleCollapse' class="collapse card" style="border: none">
                    <table id="vehicleTable" class="table table-sm table-striped table-bordered table-hover dt-responsive nowrap" style="width: 100%"></table>
                </div>
            </div>
        </div>
        <div class="card my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-success">
                    <li class="breadcrumb-item">
                        <a class="text-white" data-toggle="collapse" href="#colorCodeCollapse" onclick="createColorCodeTable()" role="button" aria-expanded="false" aria-controls="colorCodeCollapse"><i class="fas fa-truck"></i> Renk Kodları</a>
                    </li>
                </ol>
            </nav>
            <div class="col-12 pb-3">
                <div id='colorCodeCollapse' class="collapse card" style="border: none">
                    <table id="colorCodeTable" class="table table-sm table-striped table-bordered table-hover dt-responsive nowrap" style="width: 100%"></table>
                </div>
            </div>
        </div>
        <div class="card my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-success">
                    <li class="breadcrumb-item">
                        <a class="text-white" data-toggle="collapse" href="#newTypeCollapse" onclick="createNewTypeTable()" role="button" aria-expanded="false" aria-controls="newTypeCollapse"><i class="fas fa-truck"></i> Renk Kodları</a>
                    </li>
                </ol>
            </nav>
            <div class="col-12 pb-3">
                <div id='newTypeCollapse' class="collapse card" style="border: none">
                    <table id="newTypeTable" class="table table-sm table-striped table-bordered table-hover dt-responsive nowrap" style="width: 100%"></table>
                </div>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mr-auto my-3">
                <a href="{{ route('user') }}" class="btn btn-sm btn-primary btn-block">Kullanıcı</a>
            </div>
            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 ml-auto my-3">
                @canany(['isAdmin','isIT'])
                <a target="blank" href="{{ route('owner_pdf', ['id'=>$user->id]) }}" class="btn btn-sm btn-danger btn-block ">Zimmet Fişi</a>
                @else
                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Yetkiniz Yok!" style="width: 100%">
                    <button class="btn btn-sm btn-danger btn-block" style="pointer-events: none;" type="button" disabled>Zimmet Fişi</button>
                </span>
                @endcanany
            </div>
            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2  my-3">
                @canany(['isAdmin','isIT','isProducer'])
                <a href="{{ route('owner_create', ['id'=>$user->id]) }}" class="btn btn-sm btn-success btn-block">Zimmet Ekle</a>
                @else
                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Yetkiniz Yok!" style="width: 100%">
                    <button class="btn btn-sm btn-success btn-block" style="pointer-events: none;" type="button" disabled>Zimmet Ekle</button>
                </span>
                @endcanany
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="hardwareDropModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Donanım İade İşlemi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('hardware_drop') }}" method="POST">
                @csrf
                <div class="modal-body px-5">
                    <div>
                        <b><u>Tip:</u></b> <span id="hardware_drop_type"></span></br>
                        <b><u>Model:</u></b> <span id="hardware_drop_model"></span></br>
                        <b><u>Barkod No:</u></b> <span id="hardware_drop_barcode_number"></span></br>
                        <b><u>Seri No:</u></b> <span id="hardware_drop_serial_number"></span></br>
                        <b><u>Zimmet Tarihi:</u></b> <span id="hardware_drop_issue_time"></span></br>
                        <b><u>Detay:</u></b></br> <span id="hardware_drop_detail"></span></br>
                    </div>
                    <div class="mt-3 my-2 text-center">
                        <u>Donanımı İade Almak Üzeresiniz!</u></br>
                        <b>İade İşlemi Geri Döndürülemez!</b>
                    </div>
                    <input type="hidden" name="hardware_id" id="hardware_drop_hardware_id">
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="submit">İade Al</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Geri Dön</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="softwareDropModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Yazılım İade İşlemi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('software_drop') }}" method="POST">
                @csrf
                <div class="modal-body px-5">
                    <div>
                        <b><u>Yazılım Adı:</u></b> <span id="software_drop_name"></span></br>
                        <b><u>Tip:</u></b> <span id="software_drop_type"></span></br>
                    </div>
                    <div class="mt-3 my-2 text-center">
                        <u>Yazılımı İade Almak Üzeresiniz!</u></br>
                        <b>İade İşlemi Geri Döndürülemez!</b>
                    </div>
                    <input type="hidden" name="software_id" id="software_drop_software_id">
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="submit">İade Al</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Geri Dön</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="commonDropModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ortak Kullanımdan Kaldırma İşlemi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('common_drop') }}" method="POST">
                @csrf
                <div class="modal-body px-5">
                    <div>
                        <b><u>Ekipman Adı:</u></b> <span id="common_drop_name"></span></br>
                        <b><u>Türü:</u></b> <span id="common_drop_type"></span></br>
                        <b><u>Detay:</u></b></br> <span id="common_drop_detail"></span></br>
                    </div>
                    <div class="mt-3 my-2 text-center">
                        <u>Kullanıcıyı Ortak Kullanımdan Kaldırmak Üzeresiniz!</u></br>
                        <b>Bu İşlem Geri Döndürülemez!</b>
                    </div>
                    <input type="hidden" name="common_item_id" id="common_drop_common_id">
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="submit">Kullanımdan Kaldır</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Geri Dön</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="materialDropModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Malzeme İade İşlemi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('material_drop') }}" method="POST">
                @csrf
                <div class="modal-body px-5">
                    <div>
                        <b><u>Tip:</u></b> <span id="material_drop_type"></span></br>
                        <b><u>Detay:</u></b></br> <span id="material_drop_detail"></span></br>
                    </div>
                    <div class="mt-3 my-2 text-center">
                        <u>Malzemeyi İade Almak Üzeresiniz!</u></br>
                        <b>İade İşlemi Geri Döndürülemez!</b>
                    </div>
                    <input type="hidden" name="id" id="material_drop_id">
                    <input type="hidden" name="material_id" id="material_drop_material_id">
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="submit">İade Al</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Geri Dön</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="vehicleDropModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Araç Teslim İşlemi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('vehicle_drop') }}" method="POST">
                @csrf
                <div class="modal-body px-5">
                    <div>
                        <b><u>Araç Adı:</u></b> <span id="vehicle_drop_name"></span></br>
                        <b><u>Marka:</u></b> <span id="vehicle_drop_model"></span></br>
                        <b><u>Detay:</u></b></br> <span id="vehicle_drop_detail"></span></br>
                    </div>
                    <div class="mt-3 my-2 text-center">
                        <u>Kullanıcıdan Aracı Teslim Almak Üzeresiniz!</u></br>
                        <b>Bu İşlem Geri Döndürülemez!</b>
                    </div>
                    <input type="hidden" name="vehicle_id" id="vehicle_drop_vehicle_id">
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="submit">Teslim Al</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Geri Dön</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="colorCodeDropModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Renk Kodu Teslim Alma İşlemi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('color_code_drop') }}" method="POST">
                @csrf
                <div class="modal-body px-5">
                    <div>
                        <b><u>Araç Adı:</u></b> <span id="color_code_drop_name"></span></br>
                        <b><u>Detay:</u></b></br> <span id="color_code_drop_detail"></span></br>
                    </div>
                    <div class="mt-3 my-2 text-center">
                        <u>Kullanıcıdan Aracı Teslim Almak Üzeresiniz!</u></br>
                        <b>Bu İşlem Geri Döndürülemez!</b>
                    </div>
                    <input type="hidden" name="color_code_id" id="color_code_drop_id">
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="submit">Teslim Al</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Geri Dön</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="newTypeDropModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Renk Kodu Teslim Alma İşlemi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('new_type_drop') }}" method="POST">
                @csrf
                <div class="modal-body px-5">
                    <div>
                        <b><u>Araç Adı:</u></b> <span id="new_type_drop_name"></span></br>
                        <b><u>Detay:</u></b></br> <span id="new_type_drop_detail"></span></br>
                    </div>
                    <div class="mt-3 my-2 text-center">
                        <u>Kullanıcıdan Aracı Teslim Almak Üzeresiniz!</u></br>
                        <b>Bu İşlem Geri Döndürülemez!</b>
                    </div>
                    <input type="hidden" name="new_type_id" id="new_type_drop_id">
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="submit">Teslim Al</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Geri Dön</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="changeIssueTimeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Zimmet Tarihi Değiştirme</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('change_issue_time') }}" method="POST">
                @csrf
                <div class="modal-body px-5">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Zimmet Tarihi</span>
                        </div>
                        <input type="date" max="{{date('Y-m-d')}}" class="form-control" id="issue_time" name="issue_time" required>
                    </div>
                    <input type="hidden" id="item_type" name="item_type">
                    <input type="hidden" id="item_id" name="item_id">
                    <input type="hidden" id="old_issue_time" name="old_issue_time">
                    <input type="hidden" value="{{$user->id}}" name="user_id">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit">Değiştir</button>
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
