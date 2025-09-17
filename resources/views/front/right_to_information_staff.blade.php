@extends('front.master')
@section('title','Home')


@section('content')
<style>
    table {
        border: 1px solid #24947d;
    }

    td,
    th,
    tr {
        border: 1px solid #24947d;
    }
    .table td, .table th{
        border-top:#24947d;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12" style="margin-top: 10px;">
            <div class="designation_title">
                <h4>{{$info_sel->titel}}</h4>
            </div>
            <div class="table-responsive" style="width: 78%;">
                @foreach($view_staff as $key)
                <table class="table">
                    <tbody>
                        <tr>
                            <td align="center">
                                <div class="info_officer_img">
                                    <img style="width:120px; height:120px" src="{{asset('public/upload/').$key->image}}" alt="" /> 
                                </div>
                            </td>
                            <td>
                                <table style="width:100%;">
                                    <tbody>
                                        <tr>
                                            <td >
                                                <table>
                                                    <tbody>
                                                        <tr style="width:100%;">
                                                            <td>নাম</td>
                                                            <td>{{$key->name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>পদবি</td>
                                                            <td>{{$key->surname}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>অফিস</td>
                                                            <td>{{$key->address}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>ই-মেইল</td>
                                                            <td>{{$key->email}}</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </td>
                                            <td >
                                                <table>
                                                    <tbody style="width:100%;">
                                                        <tr>
                                                            <td>ফোন (অফিস)</td>
                                                            <td>{{$key->phone}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>ফোন (বাসা)</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>মোবাইল</td>
                                                            <td>{{$key->mobile}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>ফ্যাক্স</td>
                                                            <td>{{$key->fax}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection