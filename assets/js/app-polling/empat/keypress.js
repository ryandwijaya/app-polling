$(document).ready(function () {
                $(document).keypress(function (key) {
                    let btnSetting = key.originalEvent.key;
                    if (btnSetting === '1'){
                        $('#jwb_5').click();
                    }
                    if (btnSetting === '2'){
                        $('#jwb_6').click();
                    }
                    if (btnSetting === '3'){
                        $('#jwb_7').click();
                    }
                    if (btnSetting === '4'){
                        $('#jwb_8').click();
                    }
                });
            })
