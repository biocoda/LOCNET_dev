function addSteamFunc() {
                var stTBvalue = $('#addSteamTE').val();

                if (stTBvalue == steamValNM.innerHTML) {
                    $('input[name="steamIsolatedHD"]').val(1);
                    showRemSteamFrm();
                    console.log('devices match');

                } else {
                    console.log('devices do not match');
                    alert('Devices do not match');

                }
            }

            function remSteamFunc() {
                var stTBvalue = $('#remSteamTE').val();

                if (stTBvalue == steamValNM.innerHTML) {
                    $('input[name="steamIsolatedHD"]').val(0);
                    showAddSteamFrm();
                    console.log('devices match');

                } else {
                    console.log('devices do not match');
                    alert('Devices do not match');
                    
                }
            }


            // var y = "'".concat(callingTBid, "'");
                // var deviceTB = $('input[name=y]').attr('value');
                // var deviceTB = $(callingTBid).attr('value');


                $emailTo = "posman@blueyonder.co.uk";
        $subject = "Maybe this works";
        $body = "Hola";
        $headers = "from: posman@blueyonder.co.uk";
        if (mail($emailTo, $subject, $body, $headers)) {
            echo "email sent";
        } else {
            echo "email not sent";
        }