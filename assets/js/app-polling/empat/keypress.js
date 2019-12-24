$(document).ready(function () {
                $(document).keypress(function (key) {
                    let btnSetting = key.originalEvent.key;
                    if (btnSetting === '5'){
                        $('#jwb_5').click();
                    }
                    if (btnSetting === '6'){
                        $('#jwb_6').click();
                    }
                    if (btnSetting === '7'){
                        $('#jwb_7').click();
                    }
                    if (btnSetting === '8'){
                        $('#jwb_8').click();
                    }
                });
            })