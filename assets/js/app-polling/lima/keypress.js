$(document).ready(function () {
                $(document).keypress(function (key) {
                    let btnSetting = key.originalEvent.key;
                    if (btnSetting === '9'){
                        $('#jwb_9').click();
                    }
                    if (btnSetting === '10'){
                        $('#jwb_10').click();
                    }
                    if (btnSetting === '11'){
                        $('#jwb_11').click();
                    }
                    if (btnSetting === '12'){
                        $('#jwb_12').click();
                    }
                    if (btnSetting === '13'){
                        $('#jwb_13').click();
                    }
                });
            })