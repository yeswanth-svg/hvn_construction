<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print - HVN Builders & Developers</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }


        .header {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .header img {
            height: 60px;
            margin-right: 15px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            color: black;
            /* Optional: Add a color for the text */
        }



        .section-title {
            font-size: 18px;
            margin-bottom: 10px;
            color: #1e88e5;
            border-bottom: 2px solid #1e88e5;
            display: inline-block;
        }

        .details-table,
        .payment-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .details-table td,
        .payment-table th,
        .payment-table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        .details-table td:first-child {
            font-weight: bold;
            background-color: #f4f4f4;
        }

        .details-table td:nth-child(2) {
            background-color: #ffffff;
        }

        .text-right {
            text-align: right;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }

        .highlight {
            font-weight: bold;
            color: #e53935;
        }
    </style>

    <style>
        @media print {

            /* Reset default margins and paddings */
            body,
            html {
                margin: 0;
                padding: 0;
                width: 100%;
                height: 100%;
            }

            /* Ensure content fits the page */
            .container {
                margin: 0 auto;
                padding: 20px;
                width: 100%;
                max-width: 800px;
                overflow: hidden;
                /* Prevent overflow issues */
            }

            /* Prevent page breaks */
            .container,
            .details-table,
            .payment-table {
                page-break-inside: avoid;
            }

            /* Remove extra whitespace and space-consuming elements */
            .footer {
                margin-top: 10px;
                padding-top: 10px;
                border-top: 1px solid #ddd;
            }
        }
    </style>

</head>

<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <img src="{{ asset('assets/logo.jpg') }}" alt="HVN Logo">
            <h1>HVN Builders & Developers</h1>
        </div>


        <!-- Project and Customer Details -->
        <h2 class="section-title">Project Details</h2>
        <table class="details-table">
            <tr>
                <td>Project Name:</td>
                <td>{{ $details->project->project_name }}</td>
            </tr>
            <tr>
                <td>LP Number:</td>
                <td>{{ $details->project->lp_no }}</td>
            </tr>
            <tr>
                <td>Location:</td>
                <td>{{ $details->project->location }}</td>
            </tr>
            <tr>
                <td>Plot No:</td>
                <td>{{ $details->plot_no }}</td>
            </tr>
            <tr>
                <td>Plot Area - Sq Yds:</td>
                <td>{{ $plot_details->plot_area_sq_yds ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Plot Area - Cents:</td>
                <td>{{ $plot_details->plot_area_cents ?? 'N/A' }}</td>
            </tr>

            <tr>
                <td>Facing:</td>
                <td>{{ $plot_details->facing }}</td>
            </tr>
            <tr>
                <td>Customer Name:</td>
                <td>{{ $details->customer_name }}</td>
            </tr>
        </table>

        <!-- Payment Details -->
        <h2 class="section-title">Payment Details</h2>
        <table class="payment-table">
            <thead>
                <tr>
                    <th>S. No</th>
                    <th>Date</th>
                    <th>Amount (₹)</th>
                    <th>Amount in Words</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($details->payments as $key => $payment)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $payment->date }}</td>
                        <td class="text-right">{{ formatCurrency($payment->amount) }}</td>
                        <td>{{ convertToWords($payment->amount)}}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2"><strong>Total:</strong></td>
                    <td class="text-right highlight">{{ formatCurrency($details->payments->sum('amount')) }}</td>
                    <td>{{ convertToWords($details->payments->sum('amount'))}}</td>
                </tr>
                <tr>
                    <td colspan="2"><strong>Balance:</strong></td>
                    <td class="text-right highlight">
                        {{ formatCurrency($details->total_plot_value - $details->payments->sum('amount')) }}
                    </td>
                    <td>{{convertToWords($details->total_plot_value - $details->payments->sum('amount'))}}</td>
                </tr>
            </tfoot>
        </table>

        <!-- Footer -->
        <div class="footer">
            <p>Thank you for choosing HVN Builders & Developers.</p>
        </div>
    </div>
</body>
<script>
    // Trigger the print dialog
    window.onload = function () {
        window.print();
    };

    // Auto-close the window after print dialog
    window.onafterprint = function () {
        window.close(); // Closes the print view if "Cancel" is pressed
    };

    // Fallback for browsers that don't support `onafterprint`
    window.addEventListener("focus", function () {
        // Close the window if the user returns focus to the page without printing
        setTimeout(() => {
            if (!window.printed) {
                window.close();
            }
        }, 500);
    });

    // Track successful print action
    window.printed = false;
    window.addEventListener("beforeprint", function () {
        window.printed = true;
    });
</script>

</html>