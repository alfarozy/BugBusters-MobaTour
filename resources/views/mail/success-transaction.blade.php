<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <title></title>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Open+Sans:300,400,700");

        html {
            font-family: "GOTHAM", sans-serif !important;
            color: #575756;
            font-weight: 300;
            font-size: 16px;
            background-color: #f4f4f4;
        }

        .email-container {
            padding: 50px 0;
        }

        @media screen and (max-width: 680px) {
            .email-container {
                padding: 0;
            }
        }

        .primary {
            color: #00549A;
            font-weight: bold;
        }

        .body-wrapper {
            margin: 40px 0;
        }

        .text-wrapper {
            margin: 24px 0;
            color: #25353C;
        }

        .text-wrapper .title__ {
            margin-bottom: 16px;
            font-size: 24px;
            font-weight: bold;
        }

        .text-wrapper p {
            font-size: 16px;
            margin: 0;
        }

        .text-wrapper a {
            font-weight: bold;
            color: #28a745;
            text-decoration: unset;
        }

        .text-wrapper .group {
            margin-bottom: 24px;
        }

        .btn {
            text-align: center;
        }

        .btn .btn-success {
            text-transform: uppercase;
            background-color: #28a745;
            color: #fff;
            font-size: 16px;
            padding: 16px 45px;
            text-decoration: none;
            font-weight: bold;
            height: 50px;
            line-height: 50px;
            border-radius: 4px;
            box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.16);
        }

        .footer {
            /* color: white; */
            border-top: 1px solid #D3D3D3;
            color: #2F2737;

        }

        /* .footer p {
            margin: 0 0 8px;
        } */

        .footer .social {
            padding: 0 6px;

        }

        .footer a {
            display: inline-block;
            text-decoration: none;
            /* color: white; */
        }

        .footer a:hover {
            text-decoration: none;
        }

        .footer-cp {
            padding: 16px;
            text-align: center;
            background-color: #000;
            display: block;
            color: white;
            font-size: 12px;
        }
    </style>

</head>

<body width="100%" bgcolor="#FAFAFA" style="margin: 0; mso-line-height-rule: exactly;">
    <center style="width: 100%; background: #ECEBED; text-align: left;">

        <div style="max-width: 680px; margin: auto;" class="email-container">
            <!-- Start Email Body -->
            <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center"
                width="100%"
                style="
                    max-width: 680px;
                    overflow:hidden;
                    background-color: white;">
                <!-- Start Header -->
                {{-- <tr>
                    <td bgcolor="#fff">
                        <div class="row">

                            <img style="float: left;margin:20px" src="{{ url('/backoffice/dist/img/logo/logo.png') }}"
                                width="75px">

                        </div>
                    </td>
                </tr> --}}
                <!-- End Header -->
                <!-- Start Isi -->
                <tr>
                    <td bgcolor="#ffffff">
                        <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0"
                            width="100%">
                            <tr>
                                <td style="padding:0 24px; font-size: 16px; line-height: 26px; color: #555555;">

                                    <div class="body-wrapper">

                                        <div class="text-wrapper">
                                            <div class="title__">
                                                Hi, {{ $data['name'] }}
                                            </div>

                                            <div class="group">
                                                <div class="group">
                                                    <p>
                                                        Selamat pemabyaran anda dengan invoice {{ $data['invoice'] }}
                                                        telah kami konfirmasi.
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!-- End Isi -->

                <tr>
                    <td>
                        <div class="footer-cp">Copyright ©2023 Moba Tourney</div>
                    </td>
                </tr>
            </table>
            <!-- End Email Body-->
        </div>
    </center>
</body>

</html>
