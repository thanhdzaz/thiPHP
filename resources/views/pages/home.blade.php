@extends('layout')
@section('home')
    {{-- <input type="file" onchange="changePhoto(this)" id="sc" >
    <img src="" alt="" id='view' width="100px" height="100px">
    <script>
        function changePhoto(obj) {
            console.log(1)
            document.getElementById('view').src = URL.createObjectURL(obj.files[0]);
        }
    </script> --}}
    <title>Danh sách khách hàng</title>
    <h1 class="pb-0 pt-3 text-center">Danh sách khách hàng</h1>
    @php
    if (isset($mess)) {
        echo $mess;
    }
    @endphp
    <div class="p-5">
        <div class="row">
            <div class="col"><a name="crBtn" id="crBtn" class="btn btn-primary" href="{{ url('/customers/create') }}"
                    role="button">Thêm</a></div>

            <div class="col-8 pr-2">
                <form action="" method="get">
                    <div class="form-group">

                        <input type="text" class="form-control" name="search" id="search" value="@php
                            if(isset($_GET['search'])){
                                echo $_GET['search'];
                            }
                        @endphp" aria-describedby="helpId"
                            placeholder="Tìm kiếm">
                        <button type="submit" class="btn btn-primary" style="position: absolute; top: 0; right: 8px;">Search</button>
                    </div>




                </form>
            </div>

        </div>
        <div class="w-100 h-100 p-5">
            <table class="table p-6 hover border pagination-lg h-100 scrollbox table-responsive-lg table-bordered">
                <thead>
                    <tr>
                        <th>Mã khách hàng</th>
                        <th>Ảnh đại diện</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Giới tính</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                        <tr>
                            <td class="text-center">{{ $item->id }}</td>
                            <td class="text-center"><img src="{{ $item->img }}" width="100" height="100"></td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phoneNum }}</td>
                            <td>@php
                                echo $item->gender == 0 ? 'Nam' : ($item->gender == 1 ? 'Nữ' : 'Gay');
                            @endphp</td>
                      

                        </tr>
                    @empty
                        <tr>
                            <td span="7">Không có dữ liệu</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

    </div>
@endsection
