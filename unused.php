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






        // This method will trigger user permissions
    Html5Qrcode.getCameras().then(devices => {
    /**
     * devices would be an array of objects of type:
     * { id: "id", label: "label" }
     */
    if (devices && devices.length) {
        var cameraId = devices[0].id;
        // .. use this to start scanning.
    }
    }).catch(err => {
    // handle err
    });

    // Create instance of the object. The only argument is the "id" of HTML element created above.
    const html5QrCode = new Html5Qrcode("reader");

    html5QrCode.start(
    cameraId,     // retreived in the previous step.
    {
        fps: 10,    // sets the framerate to 10 frame per second
        qrbox: 250  // sets only 250 X 250 region of viewfinder to
                    // scannable, rest shaded.
    },
    qrCodeMessage => {
        // do something when code is read. For example:
        console.log(`QR Code detected: ${qrCodeMessage}`);
    },
    errorMessage => {
        // parse error, ideally ignore it. For example:
        console.log(`QR Code no longer in front of camera.`);
    })
    .catch(err => {
    // Start failed, handle it. For example,
    console.log(`Unable to start scanning, error: ${err}`);
    });
