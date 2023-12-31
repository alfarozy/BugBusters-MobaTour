<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Invoice</title>
    <style type="text/css">
        @font-face {
            font-family: opensans;
            src: url('{{ public_path('font/OpenSans-Bold.ttf') }}');
            font-weight: bold;
            font-style: normal;
        }

        @font-face {
            font-family: opensans;
            src: url('{{ public_path('font/OpenSans-Regular.ttf') }}');
            font-weight: normal;
            font-style: normal;
        }

        body {
            color: #1F1F1F;
            letter-spacing: 0.3px;
            padding: 40px 80px 0 80px;
        }

        .font-14 {
            font-size: 14px;
        }

        .text-right {
            text-align: right;
        }

        .border-line {
            border-top: 1px solid #130CB7;
        }

        .d-block {
            display: block
        }
    </style>
</head>

<body>
    <table style="width: 100%;margin-bottom:24px;">
        <tr>
            <td>
                <img style="width:auto;height:85px;" src="https://moba-tourney.dikaeoa.com/image/logo.svg" />
            </td>
            <td class="text-right" style="font-family: opensans; font-weight: bold; font-size: 36px;">INVOICE</td>
        </tr>
    </table>
    <table style="font-family: opensans; font-size:12px; margin-bottom:32px;width:100%;">
        <tr>
            <td>
                <table>
                    <tr style="font-weight: bold;">
                        <td style="vertical-align: top;">ID transaksi</td>
                        <td style="vertical-align: top;">:</td>
                        <td style="vertical-align: top;">{{ $invoice }}</td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;">Diterbitkan oleh</td>
                        <td style="vertical-align: top;">:</td>
                        <td style="vertical-align: top;">Mobatourney Indonesia</td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;">Tanggal</td>
                        <td style="vertical-align: top;">:</td>
                        <td style="vertical-align: top;">{{ $date }}</td>
                    </tr>
                </table>
            </td>
            <td style="vertical-align: top;">
                <table style="float: right;">
                    <tr style="font-weight: bold;">
                        <td style="vertical-align: top;">Nama Member</td>
                        <td style="vertical-align: top;">:</td>
                        <td style="vertical-align: top;">{{ $memberName }}</td>
                    </tr>
                    <tr style="font-weight: bold;">
                        <td style="vertical-align: top;">Nama Member</td>
                        <td style="vertical-align: top;">:</td>
                        <td style="vertical-align: top;">{{ $email }}</td>
                    </tr>
                    <tr style="font-weight: bold;">
                        <td style="vertical-align: top;">Kode Registrasi</td>
                        <td style="vertical-align: top;">:</td>
                        <td style="vertical-align: top;">{{ $code }}</td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
    <table class="font-14" style="border: 1.5px solid #130CB7;border-spacing: 0px;font-family:opensans;width:100%;">
        <tbody>

            <tr style="font-weight: bold;color: #130CB7; background-color: #E5EBFF;">
                <td style="padding: 14px 0 14px 30px;">Tournamen</td>>
                <td style="padding: 14px 0 14px 30px;">Nama Team</td>>
                <td style="padding: 14px 30px 14px 0px;">Harga</td>
            </tr>
            <tr>
                <td style="font-weight: bold;padding: 14px 0 14px 30px;">
                    <span class="d-block">{{ $tournament }}</span>
                </td>
                <td style="font-weight: bold;padding: 14px 0 14px 30px;">
                    <span class="d-block">{{ $teamName }}</span>
                </td>
                <td class="text-center" style="padding: 14px 30px 14px 0px;">
                    Rp{{ number_format($total_price, 0, ',', '.') }}</td>
            </tr>

            <tr style="font-weight: bold;">
                <td class="border-line"></td>
                <td class="text-right border-line" style="padding: 14px 0;">Total Pembayaran</td>
                <td class="text-right border-line" style="padding: 14px 30px 14px 0px;">
                    Rp{{ number_format($total_price, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>
    <img style="position:absolute;top:60%;left:45%;width:300px;height:auto;z-index:-1000;"
        src="https://cda-interlokal.s3.ap-southeast-1.amazonaws.com/invoice/lunas.png" />
</body>

</html>
