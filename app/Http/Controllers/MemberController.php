<?php

namespace App\Http\Controllers;

use App\Models\MemberModel;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mbr = MemberModel::paginate(5);
        return view('member.member')
        ->with('mbr', $mbr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.create_member')
            ->with('url_form', url('/member'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_member' => 'required|string|max:4|unique:member,kode_member',
            'nama' => 'required|string|max:50',
            'alamat' => 'required|string|max:50',
            'hp' => 'required|digits_between:6,12',
        ]);
        $data = MemberModel::create($request->except(['_token']));
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect('member')
            ->with('success', 'Member Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(MemberModel $member)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = MemberModel::find($id);
        return view('member.create_member')
                    ->with('mbr', $member)
                    ->with('url_form', url('/member/'. $id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_member' => 'required|string|max:4|unique:member,kode_member,'.$id,
            'nama' => 'required|string|max:50',
            'alamat' => 'required|string|max:50',
            'hp' => 'required|digits_between:6,12',
        ]);
        $data = MemberModel::where('id', '=', $id)->update($request->except(['_token', '_method']));
        return redirect('member')
            ->with('success', 'Member Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MemberModel::where('id', '=', $id)->delete();
        return redirect('member')
        ->with('success', 'Member Berhasil Dihapus');
    }
    public function cariMember(Request $request)
    {
        $cariMember = $request->input('cariMember');
        $mbr = MemberModel::where('nama', 'like', '%'.$cariMember.'%')->paginate(5);
        return view('member.member')
        ->with('mbr', $mbr);
    }
}

