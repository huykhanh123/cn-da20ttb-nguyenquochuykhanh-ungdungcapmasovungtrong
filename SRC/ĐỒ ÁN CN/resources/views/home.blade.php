<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang Chủ Ứng dụng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script type="text/javascript" src="{{ asset('javascript/qrcode.js') }}"></script>
    <script type="text/javascript" src="{{ asset('javascript/jquery.min.js') }}"></script>
</head>
<style>
    body{
        background-image:url('images/3.jpg');
        background-size: cover;
    }
    .custom-modal-lg {
    max-width: 60%; 
    width: 60%;     
}
.modal-title{
    font-size:45px;
    font-weight: bold;
}
.btn-default {
    padding: 10px 20px;
    font-size: 28px; 
    border-radius: 8px;
    border: 2px solid #ccc;
    width:300px;
    background-color:aqua;
}

.btnn{
    border-radius: 10px;
    width:100px;
    height:px;
    background-color:red;
    color:white;
}

</style>
<body>
<header class="container">
    <nav class="navbar navbar-light custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand">Trang chủ</a>
            <div class="d-flex">
                <a href="{{ route('logout') }}"><button type="button" class="btnn"  >Đăng xuất</button></a>
            </div>
        </div>
    </nav>
</header>

    <main class="container main">
    <div class="container mb-5" style="background-color: white; border: 2px solid black; border-radius: 10px;">

        <h3 class="my-5 text-primary fw-bolder text-center" style="color: #71fcbd;">THÔNG TIN MÃ QR CODE CÂY CÂY TRỒNG </h3>
            <div class="row my-3 p-4 border">
                <div class="col-md-6 mb-6 md-12 mt-3">
                    <label class="form-label">Tỉnh/thành phố <span style="color: red;">
                                    *</span></label>
                    <select class="form-select" id="province">
                        @foreach($provinces as $province)
                            <option value="{{ $province->name }}" >{{ $province->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-6 md-12 mt-3">
                    <label class="form-label">Quận/huyện<span style="color: red;">
                                    *</span></label>
                    <select class="form-select" id="district" districts='{{ json_encode($districts) }}' >
                        @foreach($districts as $district)
                            <option value="{{ $district->id }}" >{{ $district->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-6 md-12 mt-3">
                    <label class="form-label">Phường/xã<span style="color: red;">
                                    *</span></label>
                    <select class="form-select" id="ward" wards='{{ json_encode($wards) }}'>
                        @foreach($wards as $ward)
                            @if($ward->district_id == $districts[0]->id)
                                <option value="{{ $ward->id }}" >{{ $ward->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-6 md-12 mt-3">
                    <label class="form-label">Loại cây<span style="color: red;">
                                    *</span></label>
                    <select class="form-select" id="tree_type">
                        @foreach($treeTypes as $treeType)
                           <option value="{{ $treeType->name }}">{{ $treeType->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 mt-3">
                    <label class="form-label">Loại nước<span style="color: red;">
                                    *</span></label>
                    <div class="row" style="margin: unset;">
                        @foreach($waterTypes as $waterType)
                            <div class="form-check col-md-3 mb-3 md-6">
                                <input class="form-check-input water" type="checkbox" value="{{ $waterType->name }}" id="water_{{ $waterType->id }}">
                                <label class="form-check-label" for="water_{{ $waterType->id }}">
                                    {{ $waterType->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <label class="form-label">Loại đất<span style="color: red;">
                                    *</span></label>
                    <div class="row" style="margin: unset;">
                        @foreach($soilTypes as $soilType)
                            <div class="form-check col-md-3 mb-3 md-6">
                                <input class="form-check-input soil" type="checkbox" value="{{ $soilType->name }}" id="soil_{{ $soilType->id }}">
                                <label class="form-check-label" for="soil_{{ $soilType->id }}">
                                    {{ $soilType->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-12 mt-5 text-center">
                    <button class="btn btn-success" id="create">Tạo Mã QR</button>
                </div>
                <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="showQRCode" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Bảng đánh giá và mã QRCODE</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-8 col-xl-8 col-md-12 md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tỉnh/thành phố</th>
                                            <th scope="col" id="show-province"></th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Quận/huyện</th>
                                            <th scope="col" id="show-district"></th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Phường/xã</th>
                                            <th scope="col" id="show-ward"></th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Loại cây</th>
                                            <th scope="col" id="show-tree"></th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Loại nước</th>
                                            <th scope="col" id="show-warter"></th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Loại đất</th>
                                            <th scope="col" id="show-soil"></th>
                                        </tr>
                                    </thead>
                                </table>
                                <p><img style="width: 100%;" src="images/1.jpg" alt=""></p>
                            </div>
                   
                            <div class="col-lg-4 col-xl-4 col-md-12 mb-12 md-12 d-flex justify-content-center">
                                <div id="qrcode" style="width:250px; height:250px; margin-top:15px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript">
        var districts = '';
        var wards = '';
        var qrcodeRender = new QRCode(document.getElementById("qrcode"), {
            width : 250,
            height : 250,
            correctLevel: QRCode.CorrectLevel.M,
        });

        $(document).ready(function(){
            wards = JSON.parse($('#ward').attr('wards'));
            districts = JSON.parse($('#district').attr('districts'))
        });

        $(document).on('change', '#district', function(){
            let districtId = $('#district').val();
            renderAddress(wards, districtId)
        });

        $(document).on('click', '#create', function(){
            let qrcode = '';
            let soil = '';
            let warter = '';
            let province = $('#province').val();
            let districtId = getNameDistrict(districts, $('#district').val());
            let ward = getNameWard(wards, $('#ward').val());
            let treeType = $('#tree_type').val();
            // Xây dựng chuỗi thông tin cây trồng để đặt vào mã QR code
            if (province.length > 0) {
                qrcode += 'Tỉnh/thành phố: ' + province.concat('\n');
                $('#show-province').text(province)
            }

            if (districtId.length > 0) {
                qrcode += 'Quận/huyện: ' + districtId.concat('\n');
                $('#show-district').text(districtId)
            }

            if (ward.length > 0) {
                qrcode += 'Phường/xã: ' + ward.concat('\n');
                $('#show-ward').text(ward)
            }

            if (treeType.length > 0) {
                qrcode += 'Loại cây: ' + treeType.concat('\n');
                $('#show-tree').text(treeType)
            }
            // Xây dựng chuỗi thông tin về loại nước từ các checkbox đã chọ
            $(".water:checked").each(function(){
                if ($(this).prop('checked') == true) {
                    warter += $(this).val() + ', ';
                }
            });
            // Kiểm tra và hiển thị thông tin về loại nước
            if (warter.length > 0) {
                warter = warter.slice(0, -2);
                qrcode += 'Loại nước: ' + warter.concat('\n');
                $('#show-warter').text(warter)
            }
            // Xây dựng chuỗi thông tin về loại đất từ các checkbox đã chọn
            $(".soil:checked").each(function(){
                if ($(this).prop('checked') == true) {
                    soil += $(this).val() + ', ';
                }
            });
            // Kiểm tra và hiển thị thông tin về loại đất
            if (soil.length > 0) {
                soil = soil.slice(0, -2);
                qrcode += 'Loại đất: ' + soil.concat('\n');
                $('#show-soil').text(soil)
            }
             // Tạo mã QR code và hiển thị ra modal
            console.log(qrcode.length)
            qrcodeRender.makeCode(qrcode);
            $('#showQRCode').modal('show');
        });

        function renderAddress(wards, districtId)
        {
            let options = '';
            wards.forEach(ward => {
                if (ward.district_id == districtId) {
                    options += `<option value="${ward.id}" >${ward.name}</option>`
                }
            });
            $('#ward').html(options);
        }

        function getNameDistrict(districts, distictId)
        {
            let name = '';
            districts.forEach(district => {
                if (district.id == distictId) {
                    name = district.name;
                }
            });
            return name;
        }

        function getNameWard(wards, wardId)
        {
            let name = '';
            wards.forEach(ward => {
                if (ward.id == wardId) {
                    name = ward.name;
                }
            })
            return name;
        }
    </script>
</body>
</html>
