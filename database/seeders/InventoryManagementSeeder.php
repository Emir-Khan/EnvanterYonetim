<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hardware\Hardware;
use App\Models\Hardware\HardwareType;
use App\Models\Hardware\HardwareModel;
use App\Models\Software\Software;
use App\Models\Software\SoftwareType;
use App\Models\Material\Material;
use App\Models\Material\MaterialType;
use App\Models\CommonItem\CommonItem;
use App\Models\CommonItem\CommonItemType;
use App\Models\User\Department;
use App\Models\User\User;
use App\Models\Admin\Admin;
use App\Models\Admin\Role;
use App\Models\ColorCode\ColorCode;
use App\Models\NewType\NewType;
use App\Models\ProductType\ProductType;
use App\Models\Status\Status;
use App\Models\Transaction\TransactionType;

class InventoryManagementSeeder extends Seeder
{
    public function run()
    {
        Role::insert(
            ['name'=>'Yönetici','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Bilgi İşlem','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Üretim','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'İnsan Kaynakları','created_at'=>now(),'updated_at'=>now()]
        );
        Admin::insert([
            ['name'=>'Ramazan Erdoğan','role_id'=>'1','user_name'=>'admin','password'=>bcrypt('admin'),'email'=>'ramazan.erdogan@gruparge.com','created_at'=>now(),'updated_at'=>now()],
        ]);
        Department::insert([
            ['name' => 'Yazılım','created_at'=> now(),'updated_at'=> now()],
            ['name' => 'Ar-Ge','created_at'=> now(),'updated_at'=> now()],
            ['name' => 'Satış Destek','created_at'=> now(),'updated_at'=> now()],
            ['name' => 'Sevkiyat','created_at'=> now(),'updated_at'=> now()],
            ['name' => 'Muhasebe','created_at'=> now(),'updated_at'=> now()],
            ['name' => 'Üretim','created_at'=> now(),'updated_at'=> now()]
        ]);
        HardwareType::insert([
            ['name' => 'Bilgisayar','prefix'=>'PC','created_at'=> now(),'updated_at'=> now()],
        ]);
        HardwareModel::insert([
            ['name' => 'HP','created_at'=> now(),'updated_at'=> now()],
        ]);
        SoftwareType::insert([
            ['name'=>'Microsoft','created_at'=>now(),'updated_at'=>now()],
        ]);
        MaterialType::insert([
            ['name' => 'Maktap Ucu','created_at'=> now(),'updated_at'=> now()],
        ]);
        CommonItemType::insert([
            ['name' => '3D Printer','created_at'=> now(),'updated_at'=> now()],
        ]);
        NewType::insert([
            ['name' => 'BOYA','created_at'=> now(),'updated_at'=> now()],
            ['name' => 'DESEN','created_at'=> now(),'updated_at'=> now()],
            ['name' => 'MAT','created_at'=> now(),'updated_at'=> now()],
            ['name' => 'PARLAK','created_at'=> now(),'updated_at'=> now()],
            ['name' => 'SOFTAJ','created_at'=> now(),'updated_at'=> now()],
        ]);
        ProductType::insert([
            ['name' => 'GÖVDE OTOMATİK','created_at'=> now(),'updated_at'=> now()],
            ['name' => 'SAP OTOMATİK','created_at'=> now(),'updated_at'=> now()],
            ['name' => 'KLİPS','created_at'=> now(),'updated_at'=> now()],
            ['name' => 'GÖVDE MENTEŞE','created_at'=> now(),'updated_at'=> now()],
            ['name' => 'SAP MENTEŞE','created_at'=> now(),'updated_at'=> now()],
        ]);
        ColorCode::insert([
            ['name' => 'C05','created_at'=> now(),'updated_at'=> now()],
            ['name' => 'C06','created_at'=> now(),'updated_at'=> now()],
            ['name' => 'B04','created_at'=> now(),'updated_at'=> now()],
            ['name' => 'A03','created_at'=> now(),'updated_at'=> now()],
        ]);
        Status::insert([
            ['name' => 'DEPO','created_at'=> now(),'updated_at'=> now()],
            ['name' => 'ÜRETİM','created_at'=> now(),'updated_at'=> now()],
            ['name' => 'KALIPHANE','created_at'=> now(),'updated_at'=> now()],
            ['name' => 'MÜŞTERİYE TESLİM ','created_at'=> now(),'updated_at'=> now()],
            ['name' => 'ARIZALI','created_at'=> now(),'updated_at'=> now()],
            ['name' => 'VERNİKHANE','created_at'=> now(),'updated_at'=> now()],
            ['name' => 'MONTAJ','created_at'=> now(),'updated_at'=> now()],
        ]);        
        TransactionType::insert([
            ['name' => 'Renk Kodu Atama','created_at'=> now(),'updated_at'=> now()],
            ['name' => 'Renk Kodu İade','created_at'=> now(),'updated_at'=> now()],
            ['name' => 'Tür Atama','created_at'=> now(),'updated_at'=> now()],
            ['name' => 'Tür İade','created_at'=> now(),'updated_at'=> now()],
            ['name' => 'Durum Atama','created_at'=> now(),'updated_at'=> now()],
            ['name' => 'Durum İade','created_at'=> now(),'updated_at'=> now()],
            ['name' => 'Ürün Türü Atama','created_at'=> now(),'updated_at'=> now()],
            ['name' => 'Ürün Türü İade','created_at'=> now(),'updated_at'=> now()]
        ]);
    }
}
