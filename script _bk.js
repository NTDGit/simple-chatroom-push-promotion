var listNotification = [];

const epochs = [
    ['năm', 31536000],
    ['tháng', 2592000],
    ['ngày', 86400],
    ['giờ', 3600],
    ['phút', 60],
    ['giây', 1]
];

const getDuration = (timeAgoInSeconds) => {
    for (let [name, seconds] of epochs) {
        const interval = Math.floor(timeAgoInSeconds / seconds);
        if (interval >= 1) {
            return {
                interval: interval,
                epoch: name
            };
        }
    }
};

const timeAgo = (date) => {
    const timeAgoInSeconds = Math.floor((new Date() - new Date(date)) / 1000);
    const {
        interval,
        epoch
    } = getDuration(timeAgoInSeconds);
    const suffix = interval === 1 ? '' : '';
    return `${interval} ${epoch}${suffix} trước`;
};

function voucherRender(name, priceValue, desc, exp, link) {
    var myvar = '<div class="_22mspj _1CKvCJ">' +
        '				   <article class="_28ddEb" style="color: rgb(14 19 110);">' +
        '					  <div class="_1bBnhG">' +
        '						 <div class="_25_r8I mR8Q41" style="background-color: rgb(14 19 110);">' +
        '							<div class="mR8Q41 _2GchKS" style="background-image: url(logo-lazada-2.png);background-size: cover;background-repeat: no-repeat;"></div>' +
        '						 </div>' +
        '						 <span class="_3GOM4x typo-r10" style="color: rgb(255, 255, 255);">' + name + '</span>' +
        '					  </div>' +
        '					  <div class="_2GdCzy"></div>' +
        '					  <div class="_19KiQd border" style="background-color: rgb(255, 255, 255);">' +
        '						 <div class="_19KiQd">' +
        '							<div class="_4DuhLm">' +
        '							   <h1 class="typo-m14 _1U5AHc" style="color: rgb(33, 33, 33);">' + priceValue + '</h1>' +
        '							   <p class="typo-m10 _1Lw8TX" style="color: rgb(117, 117, 117);">' + desc + '</p>' +
        '							   <div class="_1Yncph" style="color: rgb(105, 105, 105);">' +
        '								  <div class="_1pY6-s"><span>' + exp + '</span></div>' +
        '							   </div>' +
        '							</div>' +
        '							<a href="' + link + '" target="_blank">' +
        '							<button class="_20kzHc typo-r12" style="background: linear-gradient(to bottom right, #f76a00 0%, #f30283 100%); color: rgb(255, 255, 255);">Sưu tầm</button>' +
        '							</a>' +
        '						 </div>' +
        '					  </div>' +
        '				   </article>' +
        '				</div>';

    return myvar;
}


$(document).ready(function() {

    var source = new EventSource("flush.php");
    source.onmessage = function(event) {
        var data = JSON.parse(event.data);
        // console.log(data);
        if (data.time == "1" && data.name != "ClearScreen" && data.name != "ClearVoucher" && data.name != "ClearLog") {
            var variable = '' +
                '<div class="toast show align-items-center text-white bg-primary border-0 shadow-none" role="alert" aria-live="assertive" aria-atomic="true">' +
                '  <div class="d-flex">' +
                '    <div class="toast-body">' +
                '      <b>' + data.name + '</b> vừa đăng nhập.' +
                '    </div>' +
                '    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>' +
                '  </div>' +
                '</div>' +
                '';

            if (listNotification.indexOf(parseInt(data.text)) == -1) {
                listNotification.push(parseInt(data.text));
                $("#toastPlacement").prepend(variable);
            }
        }
        if ((data.time == "1") && (data.name == "ClearScreen")) {
            var variable = '' +
                '<div class="toast show align-items-center text-white bg-warning border-0 shadow-none" role="alert" aria-live="assertive" aria-atomic="true">' +
                '  <div class="d-flex">' +
                '    <div class="toast-body shadow-none">' +
                '      <b>' + data.name + '</b> vừa xóa màn hình.' +
                '    </div>' +
                '    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>' +
                '  </div>' +
                '</div>' +
                '';

            if (listNotification.indexOf(parseInt(data.text) + 1) == -1) {
                listNotification = [];
                listNotification.push(parseInt(data.text) + 1);
                $("#toastPlacement").html('');
                $("#toastPlacement").html(variable);
            }
        }
        if ((data.time == "1") && (data.name == "ClearVoucher")) {
            var variable = '' +
                '<div class="toast show align-items-center text-white bg-warning border-0 shadow-none" role="alert" aria-live="assertive" aria-atomic="true">' +
                '  <div class="d-flex">' +
                '    <div class="toast-body shadow-none">' +
                '      <b>' + data.name + '</b> vừa xóa toàn bộ Voucher.' +
                '    </div>' +
                '    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>' +
                '  </div>' +
                '</div>' +
                '';

            if (listNotification.indexOf(parseInt(data.text) + 1) == -1) {
                listNotification.push(parseInt(data.text) + 1);
                $("#toastPlacement").prepend(variable);
            }
        }

        if (data.time.length == 10) {
            var variable = '' +
                '<div class="toast show shadow-none" role="alert" aria-live="assertive" aria-atomic="true">' +
                '					  <div class="toast-header">' +
                '						<img class="rounded me-2" src="logo-lazada-2.png"  width="20px" height="20px">' +
                '						<strong class="me-auto">' + data.name + '</strong>' +
                '						<small>' + timeAgo(parseInt(data.time) * 1000) + '</small>' +
                '					  </div>' +
                '					  <div class="toast-body">' +
                '						' + data.text +
                '					  </div>' +
                '					</div>' +
                '';

            if (listNotification.indexOf(parseInt(data.time)) == -1) {
                listNotification.push(parseInt(data.time));
                $("#toastPlacement").prepend(variable);
            }
        }

        if (data.name == "voucher") {
            var datavc = JSON.parse(data.text);
            if (listNotification.indexOf(parseInt(data.time)) == -1) {
                var variable = '' +
                    '<div class="toast show align-items-center text-white bg-success border-0 shadow-none" role="alert" aria-live="assertive" aria-atomic="true">' +
                    '  <div class="d-flex">' +
                    '    <div class="toast-body shadow-none">' +
                    '      <b>System</b> vừa cập nhật voucher: ' + datavc.pricevalue +
                    '    </div>' +
                    '    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>' +
                    '  </div>' +
                    '</div>' +
                    '';

                $("#toastPlacement").prepend(variable);
                listNotification.push(parseInt(data.time));
                setTimeout(() => {
                    $('#voucher_data').fadeOut();
                    $('#voucher_data').html(voucherRender(datavc.name, datavc.pricevalue, datavc.desc, datavc.exp, datavc.link));
                    $('#voucher_data').fadeIn();
                }, 5000);
            }
        }

        if (data.name == "Banned") {
            if (listNotification.indexOf(parseInt(data.time)) == -1) {
                listNotification.push(parseInt(data.time));
                $.getJSON("https://api.ipify.org?format=json", function(e) {
                    if (data.text == e.ip) location.reload();
                });
            }

        }

    }

    var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'), {
        keyboard: false
    })


    if (localStorage.getItem("yourname") == null) {

        myModal.show();
        $("#btn_name_login").click(function() {

            const dataName = $("#yourname")[0].value;
            if (dataName.length > 3 && dataName != "voucher") {
                $.get("chat.php?login=true&name=" + dataName, function(data) {
                    if (data.name == dataName) {
                        localStorage.setItem("yourname", data.name);
                        myModal.hide();
                    }
                });
            }
        })
    } else {
        const dataName = localStorage.getItem("yourname");
        /*
        $.get("chat.php?login=true&name="+dataName, function(data) {
        		if(data.name == dataName) { 
        			localStorage.setItem("yourname", data.name);
        		}
        	}) */
    }




    $("#submit_msg").click(function() {
        const dataName = localStorage.getItem("yourname");
        var msg = $('#message')[0].value;
        if (msg == "/clear") $('#message')[0].value = "";
        if (msg.length > 5) $.get("chat.php?text=" + msg + "&name=" + localStorage.getItem("yourname"), function(data) {
            if ((data.time).toString().length == 10) {
                var variable = '' +
                    '<div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">' +
                    '					  <div class="toast-header">' +
                    '						<img class="rounded me-2" src="logo-lazada-2.png"  width="20px" height="20px">' +
                    '						<strong class="me-auto">' + dataName + '</strong>' +
                    '						<small>vừa xong</small>' +
                    '					  </div>' +
                    '					  <div class="toast-body">' +
                    '						' + msg +
                    '					  </div>' +
                    '					</div>' +
                    '';

                if (listNotification.indexOf(data.time) == -1) {
                    $('#message')[0].value = "";
                    listNotification.push(data.time);
                    $("#toastPlacement").prepend(variable);
                }
            }

        })

    });


    $("#message").keypress(function(e) {
        if (e.keyCode == 13) {
            var msg = $('#message')[0].value;
            if (msg == "/voucher") {
                var modal_input = '<input type="text" class="form-control mt-2" id="voucherID" placeholder="VoucherID" value="">' +
                    '<input type="text" class="form-control mt-2" id="nameVoucher" placeholder="NameVoucher" value="Lazada Voucher">' +
                    '<input type="text" class="form-control mt-2" id="priceVoucher" placeholder="Giá trị Voucher" value="">' +
                    '<input type="text" class="form-control mt-2" id="descVoucher" placeholder="Mô tả Voucher" value="">' +
                    '<input type="text" class="form-control mt-2" id="expVoucher" placeholder="Hạn SD" value="">' +
                    '<input type="text" class="form-control mt-2" id="linkVoucher" placeholder="Link Voucher" value="">';
                $('.modal-body').html('');
                $('.modal-body').html(modal_input);
                var modal_footer = '<button type="button" id="close_vc_done" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>' +
                    '<button type="button" onclick="voucherSubmit();" class="btn btn-primary">Cập nhật</button>';
                $('.modal-footer').html('');
                $('.modal-footer').html(modal_footer);


                myModal.show();

            } else {
                if (msg == "/log") window.open("chat.php?log=1");
                else $("#submit_msg")[0].click();
            }

        }
    });

});

function voucherSubmit() {
    const voucherID = $('#voucherID')[0].value;
    const nameVoucher = $('#nameVoucher')[0].value;
    const priceVoucher = $('#priceVoucher')[0].value;
    const descVoucher = $('#descVoucher')[0].value;
    const expVoucher = $('#expVoucher')[0].value;
    const linkVoucher = encodeURIComponent($('#linkVoucher')[0].value);

    $.get("chat.php?voucherID=" + voucherID + "&nameVoucher=" + nameVoucher + "&priceVoucher=" + priceVoucher + "&descVoucher=" + descVoucher + "&expVoucher=" + expVoucher + "&linkVoucher=" + linkVoucher,
        function(data) {
            if (data.time == 1) $('#close_vc_done')[0].click();
        })
}