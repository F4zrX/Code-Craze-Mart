<!DOCTYPE html>

<html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <title></title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
    <!--[if !mso]><!-->
    <!--<![endif]-->
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
        }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: inherit !important;
        }

        #MessageViewBody a {
            color: inherit;
            text-decoration: none;
        }

        p {
            line-height: inherit
        }

        .desktop_hide,
        .desktop_hide table {
            mso-hide: all;
            display: none;
            max-height: 0px;
            overflow: hidden;
        }

        .image_block img+div {
            display: none;
        }

        @media (max-width:620px) {

            .desktop_hide table.icons-inner,
            .social_block.desktop_hide .social-table {
                display: inline-block !important;
            }

            .icons-inner {
                text-align: center;
            }

            .icons-inner td {
                margin: 0 auto;
            }

            .mobile_hide {
                display: none;
            }

            .row-content {
                width: 100% !important;
            }

            .stack .column {
                width: 100%;
                display: block;
            }

            .mobile_hide {
                min-height: 0;
                max-height: 0;
                max-width: 0;
                overflow: hidden;
                font-size: 0px;
            }

            .desktop_hide,
            .desktop_hide table {
                display: table !important;
                max-height: none !important;
            }
        }

    </style>
</head>

<body style="margin: 0; background-color: #ffffff; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
    <table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation"
        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff;" width="100%">
        <tbody>
            <tr>
                <td>
                    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1"
                        role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                        <tbody>
                            <tr>
                                <td>
                                    <table align="center" border="0" cellpadding="0" cellspacing="0"
                                        class="row-content stack" role="presentation"
                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 600px; margin: 0 auto;"
                                        width="600">
                                        <tbody>
                                            <tr>
                                                <td class="column column-1"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                    width="100%">
                                                    <table border="0" cellpadding="15" cellspacing="0"
                                                        class="heading_block block-2" role="presentation"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                        width="100%">
                                                        <tr>
                                                            <td class="pad">
                                                                <h3
                                                                    style="margin: 0; color: #000000; direction: ltr; font-family: Arial, Helvetica, sans-serif; font-size: 20px; font-weight: 700; letter-spacing: normal; line-height: 120%; text-align: left; margin-top: 0; margin-bottom: 0; mso-line-height-alt: 24px;">
                                                                    <span class="tinyMce-placeholder">Hai  {{ Auth::user()->name }},</span>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table border="0" cellpadding="0" cellspacing="0" class="table_block block-3" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                    <tr>
                                                        <td class="pad">
                                                            @foreach($data['products'] as $product)
                                                            <table style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; width: 100%; table-layout: fixed; direction: ltr; background-color: #ffffff; font-family: Arial, Helvetica, sans-serif; font-weight: 700; color: #000000; text-align: left; letter-spacing: 0px;" width="100%">
                                                                <tbody style="vertical-align: top; font-size: 15px; line-height: 200%;">
                                                                    <tr>
                                                                        <td style="padding: 10px; word-break: break-word; border-top: 1px solid #9a9a9a; border-right: 1px solid #9a9a9a; border-bottom: 1px solid #9a9a9a; border-left: 1px solid #9a9a9a;" width="100%">ID Pesanan : {{ $product['order_id'] }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="padding: 10px; word-break: break-word; border-top: 1px solid #9a9a9a; border-right: 1px solid #9a9a9a; border-bottom: 1px solid #9a9a9a; border-left: 1px solid #9a9a9a;" width="100%">Barang : {{ $product['product_name'] }} <br></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="padding: 10px; word-break: break-word; border-top: 1px solid #9a9a9a; border-right: 1px solid #9a9a9a; border-bottom: 1px solid #9a9a9a; border-left: 1px solid #9a9a9a;" width="100%">Tanggal pembelian : {{ $product['order_date'] }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="padding: 10px; word-break: break-word; border-top: 1px solid #9a9a9a; border-right: 1px solid #9a9a9a; border-bottom: 1px solid #9a9a9a; border-left: 1px solid #9a9a9a;" width="100%">Code : {{ $randomString }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="padding: 10px; word-break: break-word; border-top: 1px solid #9a9a9a; border-right: 1px solid #9a9a9a; border-bottom: 1px solid #9a9a9a; border-left: 1px solid #9a9a9a;" width="100%">Harga : IDR.{{ number_format($product['product_price'], 0, ',', '.') }} <br></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            @endforeach
                                                            <br>
                                                            <br>
                                                        </td>
                                                    </tr>
                                                </table>
                                                    <table border="0" cellpadding="10" cellspacing="0"
                                                        class="heading_block block-4" role="presentation"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                        width="100%">
                                                        <tr>
                                                            <td class="pad">
                                                                <h3
                                                                    style="margin: 0; color: #000000; direction: ltr; font-family: Arial, Helvetica, sans-serif; font-size: 24px; font-weight: 700; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0; mso-line-height-alt: 28.799999999999997px;">
                                                                    <span class="tinyMce-placeholder">Terima Kasih Telah
                                                                        Berbelanja</span></h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table><!-- End -->
</body>

</html>
