$(document).ready(function () {
                $(document).keypress(function (key) {
                    let btnSetting = key.originalEvent.key;
                    if (btnSetting === '1'){
                        $('#jwb_9').click();
                    }
                    if (btnSetting === '2'){
                        $('#jwb_10').click();
                    }
                    if (btnSetting === '3'){
                        $('#jwb_11').click();
                    }
                    if (btnSetting === '4'){
                        $('#jwb_12').click();
                    }
                    if (btnSetting === '5'){
                        $('#jwb_13').click();
                    }
                });
            })
