<?php

namespace App\Http\Controllers\AdminDottiesShoes;

use App\Http\Controllers\Controller;
use App\Models\LoaiSanPham;
use App\Models\NhaCungCap;
use Illuminate\Http\Request;
use App\Models\SanPham;

class SanPhamController extends Controller
{
    public function QLSanPham()
    {
        $product = SanPham::paginate(50);
        $nhacungcap = NhaCungCap::all();
        return view('/AdminDottiesShoes/QLSanPham', compact('product','nhacungcap'))->with('i',(request()->input('page',1)-1)*5);
    }

    public function CreateSP()
    {
        $nhasanxuat = NhaCungCap::all();
        $loaisanpham = LoaiSanPham::all();
        return view('/AdminDottiesShoes/CreateSP', ['loaisanpham' => $loaisanpham],['nhasanxuat' => $nhasanxuat]);
    }

    public function StoreSP(Request $request)
    {
        $sp = new SanPham();
        $sp->HinhAnh = $request->input('HinhAnh');
        $sp->MaLoai = $request->input('ID');
        $sp->MaNCC = $request->input('ID');
        $sp->TenSP = $request->input('TenSP');
        $sp->MauSac = $request->input('MauSac');
        $sp->DonGia = $request->input('DonGia');
        $sp->GiaSale = $request->input('GiaSale');
        $sp->GhiChu = $request->input('GhiChu');
        $sp->SoLuong = $request->input('SoLuong');
        $sp->KichThuoc = $request->input('KichThuoc');
        $sp->save();
        
        return redirect()->route('QLSanPham')->with('ThongBao', 'Thêm Sản Phẩm Thành Công!');
    }

    public function show($id)
    {
        //
    }

    public function EditSP($ID)
    {
        $nhasanxuat = NhaCungCap::all();
        $loaisanpham = LoaiSanPham::all();
        $product = SanPham::where('ID', $ID)->first();
        dd($product);
        return view('admin.product.update', compact('product','loaisanpham','nhacungcap'));
    }

    public function UpdateSP(Request $request, $ID)
    {
        SanPham::find($ID)->update([
            'HinhAnh'=> $request->HinhAnh,
            'ID'=> $request->MaLoai,
            'ID'=> $request->MaNCC,
            'TenSP'=> $request->TenSP,
            'MauSac'=> $request->MauSac,
            'DonGia'=> $request->DonGia,
            'GiaSale'=> $request->GiaSale,
            'GhiChu'=> $request->GhiChu,
            'SoLuong'=> $request->SoLuong,
            'KichThuoc'=> $request->KichThuoc
        ]);
        return redirect()->route('QLSanPham')->with('ThongBao', 'Cập Nhật Sản Phẩm Thành Công');
    }
    public function destroy(string $iding)
    {
        $product = SanPham::where('ID', $iding)->delete();
        return redirect()->route('QLSanPham')->with('ThongBao', 'Xoá Sản Phẩm Thành Công');
    }
}
