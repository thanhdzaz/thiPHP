@extends('layout')
@section('create')
    <title>Thêm khách hàng</title>
    <div class="row p-5 w-100">

        <p style="color: red">
            @php
                if (isset($mess)) {
                    echo $mess;
                }
            @endphp</p>

        <form action="" method="POST" enctype="multipart/form-data" onchange="validate()" onsubmit="return validate()"
            class="w-100">
            @csrf
            <div class="form-group">
                <label for="name">Họ tên</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="nameH"
                    placeholder="Nhập họ tên">
                <small style="color : red" class="err"></small>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailH"
                    placeholder="Email">
                <small style="color : red" class="err"></small>

            </div>

            <div class="form-group">
                <label for="phoneNum">Số điện thoại</label>
                <input type="text" class="form-control" name="phoneNum" id="phoneNum" aria-describedby="phoneNumH"
                    placeholder="Số điện thoại">
                <small style="color : red" class="err"></small>

            </div>

            <div class="form-group">
                <label for="gender">Giới tính</label>
                <select class="form-control" name="gender" id="gender">
                    <option value="0" selected>Nam</option>
                    <option value="1">Nữ</option>
                    <option value="2">Gay</option>
                </select>
            </div>
            <div class="form-group">
                <label for="avatar">Avatar</label>
                <input type="file" class="form-control" name="avatar" id="avatar" onchange="changePhoto(this)">
            </div>

            <img alt="" id='view' width="100px" height="100px">
            <script>
                function changePhoto(obj) {
                    console.log(1)
                    document.getElementById('view').src = URL.createObjectURL(obj.files[0]);
                }

                function validate() {
                    let regName =
                        /^([A-Za-zÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂ ưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,})$/g;
                    let regMail =
                        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/g;
                    let regPhone = /(84|0[3|5|7|8|9])+([0-9]{8,9})\b/g;
                    let vName = document.getElementById('name');
                    let vPhone = document.getElementById('phoneNum');
                    let vEmail = document.getElementById('email');

                    let err = document.getElementsByClassName('err');
                    let num = 0;
                    if (!regName.test(vName.value)) {
                        vName.style.border = '1px red solid';
                        err[0].innerHTML = 'Tên không chứa ký tự đặc biệt và số.'
                        num++;
                    } else {
                        vName.style.border = '1px green solid';
                        err[0].innerHTML = ''

                    }

                    if (!regPhone.test(vPhone.value)) {
                        vPhone.style.border = '1px red solid';
                        err[2].innerHTML = 'Số điện thoại sai định dạng vd: 84xxxxxxxx';
                        num++;
                    } else {
                        vPhone.style.border = '1px green solid';
                        err[2].innerHTML = '';

                    }

                    if (!regMail.test(vEmail.value)) {
                        vEmail.style.border = '1px red solid';
                        err[1].innerHTML = 'Email sai định dạng vd: abc@gmail.com';
                        num++;
                    } else {
                        vEmail.style.border = '1px green solid';
                        err[1].innerHTML = '';

                    }
                    if (num > 0) {
                        return false;
                    } else {
                        return true
                    }

                }
            </script>
            <div class="mt-5"><button type="submit" name="" id="" class="btn btn-primary btn-lg btn-block">Thêm</button>
            </div>

        </form>
    </div>
@endsection
