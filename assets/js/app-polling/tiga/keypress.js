$(document).ready(function () {
                $(document).keypress(function (key) {
                    let btnSetting = key.originalEvent.key;
                    if (btnSetting === '1'){
                        $('#jwb_1').click();
                    }
                    if (btnSetting === '2'){
                        $('#jwb_2').click();
                    }
                    if (btnSetting === '3'){
                        $('#jwb_3').click();
                    }
                });
});
