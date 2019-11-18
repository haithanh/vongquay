<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Vòng Quay') }}</title>
    <link rel="shortcut icon" href="{{ asset('img/vongquay/logo180.png') }}">
    <link rel="icon" href="{{ asset('img/vongquay/logo180.png') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.blockUI.js') }}"></script>
    <!-- Styles -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vongquay3.css?v=1') }}<?php echo time(); ?>" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div
                class="col-xl-6 col-lg-5 col-md-12 col-sm-12 col-xs-12 col-12 justify-content-center hns-data-container">
                <div class="hns-logo">
                    <img class="hns-logo-img" src="{{ asset('img/vongquay3/logo.png') }}" />
                </div>
                <div class="hns-title">
                    <img class="hns-title-img" src="{{ asset('img/vongquay3/title.png') }}" />
                </div>
                <div class="hns-sale">
                    <img class="hns-sale-img" src="{{ asset('img/vongquay3/sales.png') }}" />
                </div>
                <div class="hns-brands d-none d-lg-block">
                    <img class="hns-brands-img" src="{{ asset('img/vongquay3/brands.png') }}" />
                </div>
            </div>
            <div
                class="col-xl-6 col-lg-7 col-md-12 col-sm-12 col-xs-12 col-12 justify-content-center hns-data-container">
                <div class="hns-spinner">
                    <div id="hns-spinner-bg" class="hns-spinner-bg"></div>
                    <div class="hns-arrow"></div>
                    <a href="javascript:;" onclick="startPin();" class="hns-start-button"></a>
                </div>
            </div>
            <div class="col-12 d-block d-md-none d-lg-none d-xl-none hns-data-container-bottom">
                <div class="hns-brands">
                    <img class="hns-brands-img" src="{{ asset('img/vongquay3/brands.png') }}" />
                </div>
            </div>
        </div>
    </div>

    <div id="thele-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header hns-modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body hns-thele-body">
                    <div class="hns-thele-content hns-scroll-y">
                        <h5 style="text-align:center;">RINH LỘC ĐẦU NĂM - MAY MẮN NGẬP TRÀN</h5>
                        <br>
                        Mừng xuân Kỷ Hợi, Mắt Việt thực hiện chương trình quà tặng “Vòng quay may mắn” dành cho Quý
                        khách
                        hàng, áp dụng từ mùng 1 đến hết mùng 6 Tết (tức 05.02 - 10.02.2019) tại tất cả cửa hàng trên
                        toàn hệ
                        thống.
                        <br>
                        <br>
                        THỂ LỆ CHƯƠNG TRÌNH:
                        <br>
                        <br>
                        Mỗi khách mua hàng tại cửa hàng sẽ có cơ hội nhận 100% quà tặng từ Mắt Việt với nhiều phần quà
                        hấp
                        dẫn.
                        <br>
                        <br>
                        BAO GỒM:
                        <br>
                        <ul>
                            <li>Vali cao cấp, sang trọng.</li>
                            <li>Bình giữ nhiệt Lock & Lock 400 ml.</li>
                            <li> Dù (ô) cao cấp.</li>
                            <li>Túi đeo Hangten.</li>
                            <li> Voucher giảm giá 15%.</li>
                            <li>Bộ vệ sinh mắt kính chuyên dụng.</li>
                            <li> Phiếu tập</li>
                            <li> Voucher giảm giá 35%.</li>
                        </ul>
                        <br>
                        Lưu ý:
                        Số lượng quà tặng có hạn.
                        Voucher giảm giá không có giá trị quy đổi thành tiền mặt và chỉ áp dụng cho lần mua hàng tiếp
                        theo.
                        Riêng Voucher giảm giá 35% được giảm tối đa 2 triệu VNĐ cho một đơn hàng.
                        <br>
                        <br>
                        Mọi chi tiết và thắc mắc, vui lòng liên hệ Tổng đài CSKH Mắt Việt theo Hotline: 1900 6081 hoặc
                        gửi
                        email
                        về địa chỉ: cskh@matkinh.com.vn.
                        <br>
                        <br>
                        Trân trọng.
                    </div>
                </div>
                <div class="modal-footer hns-modal-footer">
                    <a class="btn btn-secondary hns-btn-close" data-dismiss="modal">Đóng</a>
                </div>
            </div>
        </div>
    </div>

    <div id="register-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header hns-modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Black Friday</h4>
                    <div class="hns-sub">Đăng nhập thông tin bên để được tham gia quay số</div>
                    <form id="hns-register-form" onsubmit="return false;" class="container">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-3 col-form-label">Họ & Tên</label>
                            <div class="col-sm-9">
                                <input name="name" type="text" class="form-control" id="hns-name" value=""
                                    placeholder="Họ & Tên">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Điện thoại</label>
                            <div class="col-sm-9">
                                <input name="phone" type="number" class="form-control" id="hns-phone"
                                    placeholder="Điện thoại">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Địa chỉ</label>
                            <div class="col-sm-9">
                                <input name="address" type="text" class="form-control" id="hns-email"
                                    placeholder="Địa chỉ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <a href="javascript:;" onclick="registerTurn();"
                                class="btn btn-secondary hns-btn-close">Đăng
                                ký</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="alert-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header hns-modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body hns-thele-body">
                    <div class="hns-thele-content"></div>
                </div>
                <div class="modal-footer hns-modal-footer">
                    <a class="btn btn-secondary hns-btn-close" data-dismiss="modal">Đóng</a>
                </div>
            </div>
        </div>
    </div>

    <div id="empty-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header hns-modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body hns-thele-body">
                    <div class="hns-thele-content">Quà tặng tạm thời đã hết</div>
                </div>
                <div class="modal-footer hns-modal-footer">
                    <a class="btn btn-secondary hns-btn-close" data-dismiss="modal">Đóng</a>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var start = false;
    var timer = null;
    var end = 120;
    var range = 5;
    var msg = '';

    function registerTurn() {
        $.blockUI({
            baseZ: 99999,
            'message': '<img src="{{ asset('img/vongquay/busy.gif') }}" />',
            css: {width: '10%', left: '45%', backgroundColor: 'transparent', border: 'none'}
        });
        $.ajax({
            method: "GET",
            url: '{{ url('register') }}',
            data: $("#hns-register-form").serialize()
        }).done(function (result) {
            jQuery.unblockUI();
            if (result.code == 1) {
                $(".modal").modal("hide");
                setTimeout(function () {
                    showAlert(result.msg);
                }, 1000);
            } else {
                showAlert(result.msg);
            }
        }).fail(function (msg) {
            $.unblockUI();
            alert('fail');
            console.log(msg);
            start = false;
        });
    }

    function startPin() {
        if (!start) {
            start = true;
            $.blockUI({
                baseZ: 99999,
                'message': '<img src="{{ asset('img/vongquay/busy.gif') }}" />',
                css: {width: '10%', left: '45%', backgroundColor: 'transparent', border: 'none'}
            });
            $.ajax({
                method: "GET",
                url: '{{ url('start') }}'
            }).done(function (result) {
                jQuery.unblockUI();
                if (result.code == 1) {
                    end = result.data.result;
                    msg = result.msg;
                    $(".hns-spinner-bg").removeClass('paused');
                    if (!$(".hns-spinner-bg").hasClass('orbit')) {
                        $(".hns-spinner-bg").addClass('orbit');
                    }
                    $(".hns-start-button").addClass('start');
                    setTimeout(function () {
                        stopPin();
                    }, 6000);
                } else if (result.code == -1) {
                    showRegister();
                    start = false;
                } else {
                    showAlert(result.msg);
                    start = false;
                }
            }).fail(function (msg) {
                $.unblockUI();
                alert('fail');
                console.log(msg);
                start = false;
            });
        }
    }

    function stopPin() {
        timer = setInterval(function () {
            var angle = getCurrentRotation('hns-spinner-bg');
            if (angle < 0) {
                angle += 360;
            }
            if (angle < (end + range) && angle > (end - range)) {
                $(".hns-spinner-bg").addClass('paused');
                $(".hns-start-button").removeClass('start');
                clearInterval(timer);
                setTimeout(function () {
                    showAlert(msg);
                }, 2000);
                start = false;
            }
        }, 10);
    }

    function getCurrentRotation(elid) {
        var el = document.getElementById(elid);
        var st = window.getComputedStyle(el, null);
        var tr = st.getPropertyValue("-webkit-transform") ||
            st.getPropertyValue("-moz-transform") ||
            st.getPropertyValue("-ms-transform") ||
            st.getPropertyValue("-o-transform") ||
            st.getPropertyValue("transform") ||
            "fail...";

        if (tr !== "none") {

            var values = tr.split('(')[1];
            values = values.split(')')[0];
            values = values.split(',');
            var a = values[0];
            var b = values[1];
            var c = values[2];
            var d = values[3];

            var scale = Math.sqrt(a * a + b * b);

            // arc sin, convert from radians to degrees, round
            /** /
             var sin = b/scale;
             var angle = Math.round(Math.asin(sin) * (180/Math.PI));
             /*/
            var angle = Math.round(Math.atan2(b, a) * (180 / Math.PI));
            /**/

        } else {
            var angle = 0;
        }
        return angle;
    }

    function showAlert(msg) {
        $("#alert-modal .hns-thele-body .hns-thele-content").html(msg);
        $("#alert-modal").modal();
    }

    function showRegister() {
        $("#register-modal input").val('');
        $("#register-modal").modal();
    }

    @if($bEmpty)
    $("document").ready(function () {
        $("#empty-modal").modal({backdrop:'static', keyboard:false});
    });
    @endif
    </script>
</body>

</html>
